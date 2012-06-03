<?php
/**
 * SigGen - Signature and Avatar Generator for WoWRoster
 *
 * SigGen Tag Parser Class
 *
 * @copyright  2012
 * @author     Joshua Clark
 * @license    http://www.gnu.org/licenses/gpl.html   Licensed under the GNU General Public License v3.
 * @version    SVN: $Id$
 * @link       http://www.wowroster.net
 * @package    SigGen
 * @subpackage TagParser
 * @filesource
 */

if (!defined('IN_ROSTER')) {
  exit('Detected invalid access to this file!');
}

/**
 * SigGen Tag Parser Class
 *
 * @package    SigGen
 * @subpackage TagParser
 */
class TagParser {
  public $tags = array();

  public function get_data($name, $cfa = '') {
    if (!array_key_exists($name, $this->tags)) {
      return '';
    }
    $data = $this->tags[$name];
    if ($cfa) {
      $sbc = $cfa;
    } else {
      $sbc = $name;
    }
    if (!is_array($data)) {
      $data = preg_replace('/^ALIAS(.+)$/', '$1', $data);
      return $this->get_data($data, $sbc);
    } else {
      $data['tag'] = $sbc;
      return $data;
    }
  }

  public function add_alias($name, $aliasof) {
    if (!array_key_exists($aliasof, $this->tags) || array_key_exists($name, $this->tags)) {
      return FALSE;
    }
    $this->tags[$name] = 'ALIAS' . $aliasof;
    return TRUE;
  }

  public function onparam($param, $regexarray) {
    $param = $this->replace_pcre_array($param, $regexarray);
    return $param;
  }

  public function add_tag($params) {
    if (!is_array($params)) {
      trigger_error('Paramater is not an array');
    }
    if (!array_key_exists('tag', $params) || empty($params['tag'])) {
      trigger_error('"tag" is required');
    }
    if (array_key_exists($params['tag'], $this->tags)) {
      trigger_error('"tag" ' . $params['tag'] . ' is already defined');
    }
    if (preg_match('/[^A-Za-z_-]/', $params['tag'])) {
      trigger_error('"tag" can only contain letters, dashes, and underscores');
    }
    if (!array_key_exists('data', $params)) {
      trigger_error('"data" not defined');
    }
    if (!array_key_exists('regex_replace', $params)) {
      $params['regex_replace'] = array();
    }
    if (!array_key_exists('regex', $params)) {
      $params['regex'] = '[^\\]]+';
    }
    if (!array_key_exists('end', $params)) {
      $params['has_end'] = FALSE;
    } else {
      $params['has_end'] = TRUE;
    }
    $this->tags[$params['tag']] = $params;

    return TRUE;
  }

  public function parse($text, $recurse = FALSE) {
    global $siggen;

    foreach ($this->tags as $tagname => $tagdata) {
      if (!is_array($tagdata)) {
        $tagdata = $this->get_data($tagname);
      }

      // Regular tag find
      $startfind = "/\\[{$tagdata['tag']}\\]/";

      // Tag with modifiers find
      $modifyfind = "/\\[{$tagdata['tag']}:(.+?)\\]/";

      // Tag to parse out parameters in modifier
      $funcfind = "/(.+?)\\((.+?)\\)/";

      if (preg_match_all($modifyfind, $text, $modify)) {
        $modified_tags_count = count($modify[1]);

        for ($m = 0; $m < $modified_tags_count; $m++) {
          $functions = explode(':', $modify[1][$m]);

          $tagdata_data = '';
          foreach ($functions as $name) {
            $parameters = ($tagdata_data == '' ? array(
              $tagdata['data']
            ) : array(
              $tagdata_data
            ));

            if (preg_match($funcfind, $name, $function)) {
              $parameters = array_merge($parameters, explode(',', $function[2]));
              $tagdata_data = call_user_func_array(array(
                $siggen->modify,
                '_' . $function[1]
              ), $parameters);
            } else {
              $tagdata_data = call_user_func_array(array(
                $siggen->modify,
                '_' . $name
              ), $parameters);
            }
          }
          $text = preg_replace($modifyfind . 'e', "'|b|" . $tagdata_data . "|b|'", $text, 1);
        }
      }
      $text = preg_replace($startfind . 'e', "'" . $tagdata['data'] . "'", $text);
    }
    return $text;
  }

  public function replace_pcre_array($text, $array) {
    $pattern = array_keys($array);
    $replace = array_values($array);
    $text = preg_replace($pattern, $replace, $text);

    return $text;
  }

  public function export_definition() {
    return serialize($this->tags);
  }

  public function import_definiton($definition, $mode = 'append') {
    switch ($mode) {
      case 'append':
        $array = unserialize($definition);
        $this->tags = $array + $this->tags;
        break;

      case 'prepend':
        $array = unserialize($definition);
        $this->tags = $this->tags + $array;
        break;

      case 'overwrite':
        $this->tags = unserialize($definition);
        break;

      default:
        return FALSE;
    }
    return TRUE;
  }
}
