<?php
/**
 * Created by PhpStorm.
 * User: fabio
 * Date: 08/11/17
 * Time: 08:48
 */

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * A two column layout for the boost theme.
 *
 * @package   theme_boost
 * @copyright 2016 Damyon Wiese
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

user_preference_allow_ajax_update('drawer-open-nav', PARAM_ALPHA);
require_once($CFG->libdir . '/behat/lib.php');

if (isloggedin()) {
    $navdraweropen = (get_user_preferences('drawer-open-nav', 'true') == 'true');
} else {
    $navdraweropen = false;
}
$extraclasses = [];
if ($navdraweropen) {
    $extraclasses[] = 'drawer-open-left';
}
$bodyattributes = $OUTPUT->body_attributes($extraclasses);

$blockshtml = $OUTPUT->blocks('side-pre');
$hasblocks = strpos($blockshtml, 'data-block=') !== false;

$homeleftblock = $OUTPUT->blocks('home-left');
$homelefthasblocks = strpos($homeleftblock, 'data-block=') !== false;
$homemiddleblock = $OUTPUT->blocks('home-middle');
$homemiddlehasblocks = strpos($homemiddleblock, 'data-block=') !== false;
$homerightblock = $OUTPUT->blocks('home-right');
$homerighthasblocks = strpos($homerightblock, 'data-block=') !== false;
$regionmainsettingsmenu = $OUTPUT->region_main_settings_menu();

$container = get_config('theme_moodleidg', 'layout')?'container-fluid':'container';

/* Problema de lentidão no tema ao carregar o dodapé de um json */
// Rodapé
//$polos = array();
//$rodape = file_get_contents(get_config('theme_moodleidg', 'address'));
//$foot = json_decode($rodape);
//foreach ($foot as $linha){
//    if ($tmp++ >6) {
//    $polos[]['info'] = $linha->Info;
//    }
//}

$PAGE->requires->jquery();
// $PAGE->requires->js('/theme/moodleidg/javascript/jquery.cookie.js'); // precisa de atualização
// $PAGE->requires->js('/theme/moodleidg/javascript/template.js'); // precisa de atualização
$PAGE->requires->js('/theme/moodleidg/javascript/moodleidg.js');