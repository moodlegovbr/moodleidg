<?php

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
$regionmainsettingsmenu = $OUTPUT->region_main_settings_menu();

// Feeds de Noticias
$feed = file_get_contents(get_config('theme_moodleidg', 'rss'));

try {
    $xml = new SimpleXmlElement($feed);
    $news['link'] = (string) $xml->channel->link;
    foreach($xml->channel->item as $value) {
        $news['item'][] = (array) $value;
    }
    $news['featured'] = $news['item'][0];
    $news['item'] = array_slice($news['item'],1 ,3);

} catch (Exception $e) {
    $xml = false;
    $news = null;
}

$slides['images'][0]['img'] = $OUTPUT->pix_url('Bannerteste/banner_teste-01', 'theme_moodleidg');
$slides['images'][0]['active'] = 'active';
$slides['images'][0]['url'] = '#';
$slides['images'][1]['img'] = $OUTPUT->pix_url('Bannerteste/dead-01', 'theme_moodleidg');
$slides['images'][1]['url']='http://boavista.ifrr.edu.br/dead';
$slides['images'][2]['img'] = $OUTPUT->pix_url('Bannerteste/dipead-01', 'theme_moodleidg');
$slides['images'][2]['url']='http://ead.ifrr.edu.br/moodle/';


// .fim do Feeds de Noticias

$templatecontext = [
    'fullname' => format_string($SITE->fullname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'shortname' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'sidepreblocks' => $blockshtml,
    'hasblocks' => $hasblocks,
    'bodyattributes' => $bodyattributes,
    'navdraweropen' => $navdraweropen,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
    'organization' => get_config('theme_moodleidg', 'organization'),
    'subordination' => get_config('theme_moodleidg', 'subordination'),
    'address' => get_config('theme_moodleidg', 'address'),
    'news' => $news,
    'slides' => $slides,
    'card1_title' => get_config('theme_moodleidg', 'card1_title'),
    'card1_content' => get_config('theme_moodleidg', 'card1_content'),
    'card2_title' => get_config('theme_moodleidg', 'card2_title'),
    'card2_content' => get_config('theme_moodleidg', 'card2_content'),
    'card3_title' => get_config('theme_moodleidg', 'card3_title'),
    'card3_content' => get_config('theme_moodleidg', 'card3_content'),
    'video' => get_config('theme_moodleidg', 'video')
];

$templatecontext['flatnavigation'] = $PAGE->flatnav;

$PAGE->requires->jquery();
// $PAGE->requires->js('/theme/moodleidg/javascript/jquery.cookie.js'); // precisa de atualização
// $PAGE->requires->js('/theme/moodleidg/javascript/template.js'); // precisa de atualização
$PAGE->requires->js('/theme/moodleidg/javascript/moodleidg.js');

echo $OUTPUT->render_from_template('theme_moodleidg/frontpage', $templatecontext);