<?php

/**
 * Version info
 *
 * @package    theme
 * @subpackage moodleidg
 * @copyright  2018 Fábio Rodrigues dos Santos - fabio.santos@ifrr.edu.br
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

$templatecontext = [
    // Moodle IDG
    'fullname' => format_string($SITE->fullname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'shortname' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'organization' => get_config('theme_moodleidg', 'organization'),
    'subordination' => get_config('theme_moodleidg', 'subordination'),
    'addressm' => get_config('theme_moodleidg', 'addressm'),
    'container' => $container,
    'brand' => $OUTPUT->image_url('ifrr-brand','theme_moodleidg'),
    'barracodigo' => get_config('theme_moodleidg', 'barracodigo'),
    'googlemetasearch' => get_config('theme_moodleidg', 'googlemetasearch'),


    //Boost
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,

    'sidepreblocks' => $blockshtml,
    'hasblocks' => $hasblocks,

    'bodyattributes' => $bodyattributes,
    'navdraweropen' => $navdraweropen,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),

];

$templatecontext['flatnavigation'] = $PAGE->flatnav;

$PAGE->requires->jquery();
$PAGE->requires->js('/theme/moodleidg/javascript/sticky_navbar.js');
$PAGE->requires->js('/theme/moodleidg/javascript/moodleidg.js');