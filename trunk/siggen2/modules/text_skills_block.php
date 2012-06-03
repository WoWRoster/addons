<?php
/**
 * SigGen - Signature and Avatar Generator for WoWRoster
 *
 * Text Skills Block Function
 *
 * @copyright  2012
 * @author     Joshua Clark
 * @license    http://www.gnu.org/licenses/gpl.html   Licensed under the GNU General Public License v3.
 * @version    SVN: $Id$
 * @link       http://www.wowroster.net
 * @package    SigGen
 * @subpackage Module
 * @filesource
 */

if (!defined('IN_ROSTER')) {
  exit('Detected invalid access to this file!');
}

/**
 * Text Skills Block Function
 *
 * @param class $siggen
 * @param array $data
 * 		int x
 * 		int y
 * 		string color
 * 		int alpha
 * 		int size
 * 		string font
 * 		int angle
 * 		array outline
 * 		array shadow
 *
 * 		int desc_x
 * 		int desc_y
 * 		int level_x
 * 		int level_y
 * 		bool primary
 * 		bool secondary
 * 		bool riding
 * 		bool disp_desc
 * 		bool disp_level
 * 		int desc_length
 * 		int align_desc
 * 		int align_level
 * 		bool disp_levelmax
 * 		int desc_linespace
 * 		int level_linespace
 * 		int desc_gap
 * 		int level_gap
 *
 * @return bool
 *
 * @uses text_static
 */
function text_skills_block($siggen, $data) {
  global $roster;

  if (isset($siggen->tag->tags['professions'])) {
    // This has a dependancy
    // Make sure we have it loaded
    $siggen->check_module('text_static');

    $skills_raw = explode(',', $siggen->tag->tags['professions']['data']);

    foreach ($skills_raw as $skill_set) {
      $skill = explode('|', $skill_set);

      $level = explode(':', $skill[2]);
      $skills[$skill[0]][$skill[1]]['value'] = $level[0];
      $skills[$skill[0]][$skill[1]]['max'] = $level[1];
    }

		$professions = $roster->locale->wordings[$siggen->tag->tags['clientLocale']['data']]['professions'];
		$secondary   = $roster->locale->wordings[$siggen->tag->tags['clientLocale']['data']]['secondary'];
		$riding      = $roster->locale->wordings[$siggen->tag->tags['clientLocale']['data']]['riding'];

    // Display Primary skills
    if ($data['primary']) {
      foreach ($skills[$professions] as $skill => $skill_data) {
        // Print Skill description
        if ($data['disp_desc']) {
          // Shorten long strings based on max length in config
          if (strlen($skill) > $data['desc_length']) {
            $skill = trim(substr($skill, 0, $data['desc_length'])) . '.';
          }

          $text = array(
						'size'    => $data['size'],
						'angle'   => $data['angle'],
						'x'       => $data['desc_x'],
						'y'       => $data['desc_y'],
						'color'   => $data['color'],
						'alpha'   => $data['alpha'],
						'font'    => $data['font'],
						'text'    => $skill,
						'align'   => $data['align_desc'],
						'outline' => $data['outline'],
						'shadow'  => $data['shadow']
          );
          text_static($siggen, $text);
        }

        // Print Skill level
        if ($data['disp_level']) {
          // Print max level if turned on in config
          if ($data['disp_levelmax']) {
            $level = $skill_data['value'] . ':' . $skill_data['max'];
          } else {
            $level = $skill_data['value'];
          }

          $text = array(
						'size'    => $data['size'],
						'angle'   => $data['angle'],
						'x'       => $data['level_x'],
						'y'       => $data['level_y'],
						'color'   => $data['color'],
						'alpha'   => $data['alpha'],
						'font'    => $data['font'],
						'text'    => $level,
						'align'   => $data['align_level'],
						'outline' => $data['outline'],
						'shadow'  => $data['shadow']
          );
          text_static($siggen, $text);
        }

        // Move the line position
				$data['desc_y']  += $data['desc_linespace'];
				$data['level_y'] += $data['level_linespace'];
      }

      // Place a gap based on config
			$data['desc_y']  += $data['desc_gap'];
			$data['level_y'] += $data['level_gap'];
    }

    // Display Secondary skills
    if ($data['secondary']) {
      foreach ($skills[$secondary] as $skill => $skill_data) {
        // Print only secondary skills where the max level does not equal 1
        if ($skill_data['max'] != '1' && $skill != $roster->locale->wordings[$siggen->tag->tags['clientLocale']['data']]['riding']) {
          // Print Skill description
          if ($data['disp_desc']) {
            // Shorten long strings based on max length in config
            if (strlen($skill) > $data['desc_length']) {
              $skill = trim(substr($skill, 0, $data['desc_length'])) . '.';
            }

            $text = array(
							'size'    => $data['size'],
							'angle'   => $data['angle'],
							'x'       => $data['desc_x'],
							'y'       => $data['desc_y'],
							'color'   => $data['color'],
							'alpha'   => $data['alpha'],
							'font'    => $data['font'],
							'text'    => $skill,
							'align'   => $data['align_desc'],
							'outline' => $data['outline'],
							'shadow'  => $data['shadow']
            );
            text_static($siggen, $text);
          }

          // Print Skill level
          if ($data['disp_level']) {
            // Print max level if turned on in config
            if ($data['disp_levelmax']) {
              $level = $skill_data['value'] . ':' . $skill_data['max'];
            } else {
              $level = $skill_data['value'];
            }

            $text = array(
							'size'    => $data['size'],
							'angle'   => $data['angle'],
							'x'       => $data['level_x'],
							'y'       => $data['level_y'],
							'color'   => $data['color'],
							'alpha'   => $data['alpha'],
							'font'    => $data['font'],
							'text'    => $level,
							'align'   => $data['align_level'],
							'outline' => $data['outline'],
							'shadow'  => $data['shadow']
            );
            text_static($siggen, $text);
          }

          // Move the line position
					$data['desc_y']  += $data['desc_linespace'];
					$data['level_y'] += $data['level_linespace'];
        }
      }

      // Place a gap based on config
			$data['desc_y']  += $data['desc_gap'];
			$data['level_y'] += $data['level_gap'];
    }

    // Display Riding Info
    if ($data['riding']) {
			$value = $skills[$roster->locale->wordings[$siggen->tag->tags['clientLocale']['data']]['secondary']][$riding]['value'];
			$max   = $skills[$roster->locale->wordings[$siggen->tag->tags['clientLocale']['data']]['secondary']][$riding]['max'];

      // Shorten long strings based on max length in config
      if (strlen($riding) > $data['desc_length']) {
        $riding = trim(substr($riding, 0, $data['desc_length'])) . '.';
      }

      $text = array(
				'size'    => $data['size'],
				'angle'   => $data['angle'],
				'x'       => $data['desc_x'],
				'y'       => $data['desc_y'],
				'color'   => $data['color'],
				'alpha'   => $data['alpha'],
				'font'    => $data['font'],
				'text'    => $riding,
				'align'   => $data['align_desc'],
				'outline' => $data['outline'],
				'shadow'  => $data['shadow']
      );
      text_static($siggen, $text);

      // Print Skill level
      if ($data['disp_level']) {
        // Print max level if turned on in config
        if ($data['disp_levelmax']) {
          $level = $value . ':' . $max;
        } else {
          $level = $value;
        }

        $text = array(
					'size'    => $data['size'],
					'angle'   => $data['angle'],
					'x'       => $data['level_x'],
					'y'       => $data['level_y'],
					'color'   => $data['color'],
					'alpha'   => $data['alpha'],
					'font'    => $data['font'],
					'text'    => $level,
					'align'   => $data['align_level'],
					'outline' => $data['outline'],
					'shadow'  => $data['shadow']
        );
        text_static($siggen, $text);
      }
    }
  }
  return TRUE;
}
