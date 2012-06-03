<?php
/**
 * SigGen - Signature and Avatar Generator for WoWRoster
 *
 * SigGen generator class
 *
 * @copyright  2012
 * @author     Joshua Clark
 * @license    http://www.gnu.org/licenses/gpl.html   Licensed under the GNU General Public License v3.
 * @version    SVN: $Id$
 * @link       http://www.wowroster.net
 * @package    SigGen
 * @filesource
 */

if (!defined('IN_ROSTER')) {
  exit('Detected invalid access to this file!');
}

/**
 * The meat and potatoes of Sig Image Generation
 *
 * @package    SigGen
 * @subpackage SigGenerator
 * @version    1.0.0
 */
class SigGen {
  private $im;                   // GD image
  private $config     = array(); // SigGen Config Data
  private $design     = array(); // SigGen Design Config
  private $data       = array(); // Data for Image
  private $theme      = array(); // Theme data
  private $colorindex = array(); // Index of all colors used
  private $layers;               // All siggen layers

  /**
   * Image based error handler
   *
   * @var Siggen_Error
   */
  public $error; // Image based error handler

  /**
   * Tag parser class
   *
   * @var GenTag
   */
  public $tag; // Tag parser class

  /**
   * Modifier class
   *
   * @var Modify
   */
  public $modify; // Modifier class

  function __construct($addondata, $design = 'sig', $theme = 'default') {
    $this->config = $addondata;

    // Initialize the image based error handler
    require($this->config['inc_dir'] . 'siggenerror.class.php');
    $this->error =& new SigGenError;

    // Initialize the tag parser class
    require($this->config['inc_dir'] . 'tagparser.class.php');
    $this->tag = new TagParser;

    // Initialize the string modify class
    require($this->config['inc_dir'] . 'tagmodify.class.php');
    $this->modify = new TagModify;

    // Get our current theme data
    $this->_get_theme_data($design, $theme);
  }

  function __destruct() {
    $this->finish();
  }

  public function make_image() {
    // Create a transparent image
    $this->imagecreatetruecolortrans();

    // Get all the layers in this design and theme
    $this->_get_layer_data();

    // Process the layers
    $this->_make_layers();
  }

  /**
   * Get the data for the SigGen theme selected
   *
   * @param string $design
   * @param string $theme
   */
  private function _get_theme_data($design, $theme) {
    global $roster;

    $sql = "SELECT `design`.`design_name`, `theme`.* "
      . "FROM `" . $roster->db->table('designs', $this->config['basename']) . "` AS design "
      . "LEFT JOIN `" . $roster->db->table('themes', $this->config['basename']) . "` AS theme "
      . "ON `design`.`design_id` = `theme`.`design_id` "
      . "WHERE `design`.`design_name` = '" . $roster->db->escape($design) . "' "
      . "AND `theme`.`theme_name` = '" . $roster->db->escape($theme) . "';";
    $result = $roster->db->query($sql);

    $row = $roster->db->fetch($result, SQL_ASSOC);
    $this->theme = $row;

    $this->theme['default_dir'] = $this->config['dir'] . 'themes' . DIR_SEP . 'default' . DIR_SEP;
    $this->theme['dir'] = $this->config['dir'] . 'themes' . DIR_SEP . $this->theme['theme_name'] . DIR_SEP;
  }

  private function _get_layer_data() {
    global $roster;

    $sql = "SELECT * " . "FROM `" . $roster->db->table('layers', $this->config['basename']) . "` "
      . "WHERE `theme_id` = '" . $this->theme['theme_id'] . "' "
      . "ORDER BY `layer_order` ASC;";
    $result = $roster->db->query($sql);

    $row = array();
    $layer_rows = $roster->db->num_rows();
    if ($layer_rows > 0) {
      for ($i = 0; $i < $layer_rows; $i++) {
        $row[$i] = $roster->db->fetch($result, SQL_ASSOC);
        $row[$i]['functionname'] = $row[$i]['type'] . '_' . $row[$i]['subtype'];
        $row[$i]['data'] = unserialize($row[$i]['data']);
        $this->check_module($row[$i]['functionname']);
      }
      $this->layers = $row;
    }
  }

  /**
   * Run each layer through its intened function
   */
  private function _make_layers() {
    $layer_count = count($this->layers);

    for ($i = 0; $i < $layer_count; $i++) {
      call_user_func($this->layers[$i]['functionname'], $this, $this->layers[$i]['data']);
      // $this->layers[$i]['functionname']($this, $this->layers[$i]['data']);
    }
  }

  /**
   * Check to see if a module is loaded
   * Useful for modules that depend on other modules
   *
   * @param string $module | Module name
   */
  public function check_module($module) {
    if (!function_exists($module)) {
      $module_file = $this->config['dir'] . 'modules' . DIR_SEP . $module . '.php';

      if (file_exists($module_file)) {
        require($module_file);
      } else {
        trigger_error(sprintf($roster->locale->act['error_module_not_exist'], $module));
      }
    }
  }

  /**
   * Function to set color of text
   * We store the color as a class variable
   * If the same color is requested, we just return the stored value
   * Hopefully this will reduce processing time some, every little bit helps
   *
   * @param string $color | Color represented in hex
   * @param int $alpha | Alpha value
   * @return int | Color Index
   */
  public function set_color($color, $alpha = 0) {

    $color_alpha = $color . $alpha;

    // See if our color index exists already, if not, do some processing
    if (!isset($this->colorindex[$color_alpha])) {
      // Initial values for r/g/b, in case our color string is messed up
      $red = 100;
      $green = 100;
      $blue = 100;

      $ret = array();
      if (preg_match("/[#]?([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})/i", $color, $ret)) {
        $red = hexdec($ret[1]);
        $green = hexdec($ret[2]);
        $blue = hexdec($ret[3]);
      }

      // Get a transparent color if trans > 0
      if ($alpha > 0) {
        $this->colorindex[$color_alpha] = imagecolorallocatealpha($this->im, $red, $green, $blue, $alpha);
      } else // Get a non-transparent color
        {
        $this->colorindex[$color_alpha] = imagecolorallocate($this->im, $red, $green, $blue);
      }
    }

    // Return stored color index
    return $this->colorindex[$color_alpha];
  }

  /**
   * Text Alignment Function
   *
   * @param int $size | The font size in pixels
   * @param int $angle | Angle in degrees in which $text will be measured
   * @param string $font | The name of the TrueType font file
   * @param string $text | The string to be measured
   * @param int $align | Alignment type
   *    0 = left : 1 = center : 2 = right
   * @return string | Calculated text offset
   */
  public function text_align($size, $angle, $font, $text, $align = 0) {
    // Gets the points of the image coordinates
    $txtsize = imagettfbbox($size, $angle, $font, $text);

    switch ($align) {
      case 2: // Right align
        $offset = $txtsize[2];
        break;

      case 1: // Center align
        $offset = $txtsize[2] / 2;
        break;

      default: // Left align (default)
        $offset = 0;
        break;
    }
    return $offset;
  }

  /**
   * Function to convert strings to a GD True Type compatable format
   * This function was copied from http://www.php.net/manual/en/function.imagettftext.php
   * Under post made by limalopex.eisfux.de
   * Thanks
   *
   * @param string $text | String to convert
   * @return string | Converted string
   */
  public function utf8_to_nce($text = '') {
    if ($text == '') {
      return ($text);
    }

    $max_count = 5; // flag-bits in $max_mark ( 1111 1000 == 5 times 1)
    $max_mark = 248; // marker for a (theoretical ;-)) 5-byte-char and mask for a 4-byte-char;

    $html = '';
    for ($str_pos = 0; $str_pos < strlen($text); $str_pos++) {
      $old_val = ord($text{$str_pos});
      $new_val = 0;

      $utf8_marker = 0;

      // skip non-utf-8-chars
      if ($old_val > 127) {
        $mark = $max_mark;
        for ($byte_ctr = $max_count; $byte_ctr > 2; $byte_ctr--) {
          // actual byte is utf-8-marker?
          if (($old_val & $mark) == (($mark << 1) & 255)) {
            $utf8_marker = $byte_ctr - 1;
            break;
          }
          $mark = ($mark << 1) & 255;
        }
      }

      // marker found: collect following bytes
      if ($utf8_marker > 1 && isset($text{$str_pos + 1})) {
        $str_off = 0;
        $new_val = $old_val & (127 >> $utf8_marker);
        for ($byte_ctr = $utf8_marker; $byte_ctr > 1; $byte_ctr--) {
          // check if following chars are UTF8 additional data blocks
          // UTF8 and ord() > 127
          if ((ord($text{$str_pos + 1}) & 192) == 128) {
            $new_val = $new_val << 6;
            $str_off++;
            // no need for Addition, bitwise OR is sufficient
            // 63: more UTF8-bytes; 0011 1111
            $new_val = $new_val | (ord($text{$str_pos + $str_off}) & 63);
          }
          // no UTF8, but ord() > 127
          // nevertheless convert first char to NCE
          else {
            $new_val = $old_val;
          }
        }
        // build NCE-Code
        $html .= '&#' . $new_val . ';';
        // Skip additional UTF-8-Bytes
        $str_pos += $str_off;
      } else {
        $html .= chr($old_val);
        $new_val = $old_val;
      }
    }
    return $html;
  }

  /**
   * Convert an accented character to an English compatible format
   *
   * @param string $string | String to convert
   * @return string | Converted string
   */
  public function convert_accents($string) {
    return utf8_encode(strtr(utf8_decode($string),
                       "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ",
                       'AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn'));
  }

  /**
   * Write Text to GD
   *
   * @param float $size | The font size in pixels
   * @param float $angle | The angle in degrees, with 0 degrees being left-to-right reading text
   * @param int $xpos | The coordinates given by x and y will define the basepoint of the first character
   * @param int $ypos | The y-ordinate. This sets the position of the fonts baseline, not the very bottom of the character
   * @param string $color | The color
   * @param int $alpha | Transparentcy level
   * @param string $font | The path to the TrueType font you wish to use
   * @param string $text | The text string
   * @param int $align | Alignment type
   *    0 = left : 1 = center : 2 = right
   * @param array $outline | Outline data
   * @param array $shadow | Drop Shadow data
   * @return array | Bounding box coordinates of written text. Extra points are returned for text baselines
   */
  public function write_text($size, $angle, $xpos, $ypos, $color, $alpha, $font, $text, $align, $outline = array(), $shadow = array()) {
    // Get the font
    $font = $this->get_font($font);

    // Get the color
    $color = $this->set_color($color, $alpha);

    // Convert utf8 text for display
    $text = $this->utf8_to_nce($text);

    // Calculate alignment offest
    $xpos -= $this->text_align($size, $angle, $font, $text, $align);

    // Create drop shadow
    if (isset($shadow['color']) && $shadow['color'] != '') {
      $this->shadow_text($size, $angle, $xpos, $ypos, $shadow['color'], $font, $text, $shadow['distance'], $shadow['direction'], $shadow['spread']);
    }

    // Create outline / border
    if (isset($outline['color']) && $outline['color'] != '') {
      $this->outline_text($size, $angle, $xpos, $ypos, $outline['color'], $font, $text, $outline['width'], $outline['color']);
    }

    // Write the text
    $coords = imagettftext($this->im, $size, $angle, $xpos, $ypos, $color, $font, $text);

    // The true y axis baseline
    $coords[8] = imagettfbbox($size, $angle, $font, $text);
    $coords[8] = ($coords[3] - $coords[8][1]);

    return $coords;
  }

  /**
   * Creates a drop shadow
   *
   * @param float $size | The font size in pixels
   * @param float $angle | The angle in degrees, with 0 degrees being left-to-right reading text
   * @param int $xpos | The coordinates given by x and y will define the basepoint of the first character
   * @param int $ypos | The y-ordinate. This sets the position of the fonts baseline, not the very bottom of the character
   * @param string $color | The color
   * @param string $font | The path to the TrueType font you wish to use
   * @param string $text | The text string
   * @param int $distance | How far the shadow should drop
   * @param int $direction | Direction of the shadow
   * @param int $spread | The spread of the shadow
   */
  public function shadow_text($size, $angle, $xpos, $ypos, $color, $font, $text, $distance, $degrees, $spread = 0) {
    $rad = deg2rad($degrees);
    $xoff = $distance * cos($rad);
    $yoff = $distance * sin($rad);

    $xpos += $xoff;
    $ypos += $yoff;

    if ($spread != 0) {
      $this->outline_text($size, $angle, $xpos, $ypos, $color, $font, $text, $spread);
    }
    $color = $this->set_color($color);
    imagettftext($this->im, $size, $angle, $xpos, $ypos, $color, $font, $text);
  }

  /**
   * Create an outline/border around text
   *
   * @param float $size | The font size in pixels
   * @param float $angle | The angle in degrees, with 0 degrees being left-to-right reading text
   * @param int $xpos | The coordinates given by x and y will define the basepoint of the first character
   * @param int $ypos | The y-ordinate. This sets the position of the font baseline, not the very bottom of the character
   * @param string $color | The color
   * @param string $font | The path to the TrueType font you wish to use
   * @param string $text | The text string
   * @param int $width | Set how thick the outline will be
   */
  public function outline_text($size, $angle, $xpos, $ypos, $color, $font, $text, $width) {
    $color = $this->set_color($color);

    // For every X pixel to the left and the right
    for ($xc = $xpos - abs($width); $xc <= $xpos + abs($width); $xc++) {
      // For every Y pixel to the top and the bottom
      for ($yc = $ypos - abs($width); $yc <= $ypos + abs($width); $yc++) {
        // Draw the text in the outline color
        imagettftext($this->im, $size, $angle, $xc, $yc, $color, $font, $text);
      }
    }
  }

  /**
   * Get the full font path
   *
   * @param string $font | Font filename
   * @return string | Full path to the font file
   */
  public function get_font($font = '') {
    // Set our secondary font backup
    // If it works on Star Trek, it can work here!
    $_2ndary_backup = ROSTER_BASE . 'fonts' . DIR_SEP . 'VERANDA.TTF';

    // We should never have a blank font, but oh well
    if ($font != '') {
      // We look in the theme's font dir, then Roster's font dir
      // Nice way to allow fonts packaged with themes
      $theme_font = $this->config['dir'] . 'fonts' . DIR_SEP . $font;
      $default_font = ROSTER_BASE . 'fonts' . DIR_SEP . $font;

      // Check to see if SigGen can see the font
      if (file_exists($theme_font)) {
        return $theme_font;
      } elseif (file_exists($default_font)) {
        return $default_font;
      } else {
        return $_2ndary_backup;
      }
    } else {
      return $_2ndary_backup;
    }
  }

  /**
   * Funtion to merge images with the main image
   *
   * @param string $filename | Full path to image
   * @param int $dst_x | x-coordinate of destination point
   * @param int $dst_y | y-coordinate of destination point
   * @param int $src_x | x-coordinate of source point
   * @param int $src_y | y-coordinate of source point
   * @param mixed $width | width to resize image to
   *  Leave blank to preserve aspect ratio
   *  (not implemented) Append a % for percent resize
   * @param int $height | height to resize image to
   *  Leave blank to preserve aspect ratio
   *  (not implemented) Append a % for percent resize
   */
  public function combine_image($filename, $dst_x, $dst_y, $src_x = 0, $src_y = 0, $width = 0, $height = 0) {
    $info = getimagesize($filename);

    switch ($info['mime']) {
      case 'image/jpeg':
      case 'image/jpg':
        $im_temp = imagecreatefromjpeg($filename);
        break;

      case 'image/png':
        $im_temp = imagecreatefrompng($filename);
        break;

      case 'image/gif':
        $im_temp = imagecreatefromgif($filename);
        break;

      default:
        trigger_error('Unhandled image type [' . $info['mime'] . ']', E_USER_ERROR);
    }

    // Get the image dimentions
    $im_temp_width = imagesx($im_temp);
    $im_temp_height = imagesy($im_temp);

    if ($width != 0 && $height != 0) {
      $new_width = $width;
      $new_height = $height;
    } elseif ($width != 0) {
      $new_width = $width;
      $new_height = ((int) ($new_width * $im_temp_height) / $im_temp_width);
    } elseif ($height != 0) {
      $new_height = $height;
      $new_width = ((int) ($new_height * $im_temp_width) / $im_temp_height);
    } else {
      // No resizing, use fastest copy method
      imagecopy($this->im, $im_temp, $dst_x, $dst_y, $src_x, $src_y, $im_temp_width, $im_temp_height);

      // Destroy the temp image
      imagedestroy($im_temp);

      return;
    }

    imagecopyresampled($this->im, $im_temp, $dst_x, $dst_y, $src_x, $src_y, $new_width, $new_height, $im_temp_width, $im_temp_height);

    // Destroy the temp image
    imagedestroy($im_temp);
  }

  /**
   * Converts a string to its English counterpart
   *
   * @param string $keyword
   * @param string $locale
   * @return string
   */
  public function get_en_value($keyword, $locale = null) {
    global $roster;

    if (!is_null($locale)) {
      $locale = $roster->config['locale'];
    }

    if (array_key_exists($keyword, $roster->locale->wordings[$locale])) {
      return $roster->locale->wordings[$locale][$keyword];
    } else {
      foreach ($roster->multilanguages as $lang) {
        if (array_key_exists($keyword, $roster->locale->wordings[$lang])) {
          return $roster->locale->wordings[$lang][$keyword];
        }
      }
    }
  }

  /**
   * imagecreateformsting equivalent to a blank png image
   *
   * @return string
   */
  function blankpng() {
    return base64_decode("iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29m"
                       . "dHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAADqSURBVHjaYvz//z/DYAYAAcTEMMgBQAANegcCBNCg"
                       . "dyBAAA16BwIE0KB3IEAADXoHAgTQoHcgQAANegcCBNCgdyBAAA16BwIE0KB3IEAADXoHAgTQoHcgQAAN"
                       . "egcCBNCgdyBAAA16BwIE0KB3IEAADXoHAgTQoHcgQAANegcCBNCgdyBAAA16BwIE0KB3IEAADXoHAgTQ"
                       . "oHcgQAANegcCBNCgdyBAAA16BwIE0KB3IEAADXoHAgTQoHcgQAANegcCBNCgdyBAAA16BwIE0KB3IEAA"
                       . "DXoHAgTQoHcgQAANegcCBNCgdyBAgAEAMpcDTTQWJVEAAAAASUVORK5CYII=");
  }

  /**
   * Combined with SigGen::blankpng, this creates a blank transparent image
   *
   * @param bool $return | Return the image resource?
   * @return unknown
   */
  public function imagecreatetruecolortrans($return = false) {
    $im = imagecreatetruecolor($this->theme['width'], $this->theme['height']);

    $b = imagecreatefromstring($this->blankpng());

    imagealphablending($im, false);
    //    imagesavealpha($im,true);
    imagecopyresized($im, $b, 0, 0, 0, 0, $this->theme['width'], $this->theme['height'], imagesx($b), imagesy($b));
    imagealphablending($im, true);

    if ($return) {
      return $im;
    } else {
      $this->im = $im;
    }
  }

  /**
   * Browser cache detection, setting, etc...
   *
   * @param int $time | Unix timestamp
   * @param mixed $etag | Identifier for the etag
   */
  public function etag($time, $etag) {
    // Get browser last modified since
    $condDTS = (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ? $_SERVER['HTTP_IF_MODIFIED_SINCE'] : 0);

    if (isset($_SERVER['HTTP_IF_NONE_MATCH']) && ereg(md5($etag), $_SERVER['HTTP_IF_NONE_MATCH'])) {
      header('HTTP/1.1 304 Not Modified');
      exit;
    } elseif ($condDTS && ($_SERVER['REQUEST_METHOD'] == 'GET') && (strtotime($condDTS) >= $time)) {
      header('HTTP/1.1 304 Not Modified');
      exit;
    } else {
      header('Last-Modified: ' . gmdate('D, d M Y H:i:s T', $time));
      header('ETag: "{ ' . md5($etag) . ' }"');
    }
  }

  /**
   * GIF image creator
   * This is here so we do not taint the true color image
   * Just in case we have the save option set for a different format
   *
   * @param string $save | Full path to save image to
   */
  public function makeimagegif($save = '') {
    // Create a new true color image because we don't want to ruin the original
    $im_gif = imagecreatetruecolor($this->theme['width'], $this->theme['height']);

    // Copy the original image into the new one
    imagecopy($im_gif, $this->im, 0, 0, 0, 0, $this->theme['width'], $this->theme['height']);

    // Convert the new image to palette mode
    imagetruecolortopalette($im_gif, $this->theme['quality_gif'], 255);

    // Check if this should be saved to disk
    if (!empty($save)) {
      imagegif($im_gif, $save);
    } else {
      imagegif($im_gif);
    }

    // Destroy palette image
    imagedestroy($im_gif);
  }

  /**
   * Saves the image with the specified name to the save folder
   *
   * @param string $save_file
   */
  public function store_image($save_file) {
    if (file_exists($this->theme['save_dir'])) {
      if (is_writable($this->theme['save_dir'])) {
        switch ($this->theme['saveformat']) {
          case 'gif':
            $this->makeimagegif($save_file);
            break;

          case 'jpg':
            imagejpeg($this->im, $save_file, $this->theme['quality_jpg']);
            break;

          case 'png':
            imagepng($this->im, $save_file);
            break;
        }
      } else {
        trigger_error('Cannot save image to the server. [' . $this->theme['save_dir'] . '] was not writable', E_USER_ERROR);
      }
    } else {
      trigger_error('Cannot save image to the server. [' . $this->theme['save_dir'] . '] was not found', E_USER_ERROR);
    }
  }

  /**
   * Output generated image
   * Dies and exits upon completion
   *
   * @param string $save_name
   */
  public function get_image($save_name) {
    header('Content-type: image/' . $this->theme['imageformat']);
    header('Content-Disposition: filename=' . $save_name . '.' . $this->theme['imageformat']);

    switch ($this->theme['imageformat']) {
      case 'gif':
        $this->makeimagegif();
        break;

      case 'jpg':
        imagejpeg($this->im, '', $this->theme['quality_jpg']);
        break;

      case 'png':
        imagepng($this->im);
        break;
    }
  }

  public function finish() {
    $this->error->stop();
    imagedestroy($this->im);
  }

}
