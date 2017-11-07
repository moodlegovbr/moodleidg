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
$string = get_config('theme_moodleidg', 'video');
$stringvideo = str_replace('watch?v=','embed/', $string);
$string2 = get_config('theme_moodleidg', 'saibamais1');
$stringsaibamais1 = str_replace('http://','', $string2);
$stringsaibamais1 = str_replace('https://','', $string2);
$string3 = get_config('theme_moodleidg', 'saibamais2');
$stringsaibamais2 = str_replace('http://','', $string3);
$stringsaibamais2 = str_replace('https://','', $string3);
$string4 = get_config('theme_moodleidg', 'saibamais3');
$stringsaibamais3 = str_replace('http://','', $string4);
$stringsaibamais3 = str_replace('https://','', $string4);

// Feeds de Noticias
$feed = file_get_contents(get_config('theme_moodleidg', 'rss'));

try {
    $xml = new SimpleXmlElement($feed);
    $news['link'] = (string)$xml->channel->link;
    foreach ($xml->channel->item as $value) {
        $news['item'][] = (array)$value;
    }
    $news['featured'] = $news['item'][0];
    $news['item'] = array_slice($news['item'], 0, 5);

} catch (Exception $e) {
    $xml = false;
    $news = null;
}

// twitter
$str = get_config('theme_moodleidg', 'twittertam')."?ref_src=twsrc%5Etfw";


// Rodapé
$polos = array();
$rodape = file_get_contents(get_config('theme_moodleidg', 'address'));
$foot = json_decode($rodape);
foreach ($foot as $linha){
    if ($tmp++ >6) {
        $polos[]['info'] = $linha->Info;
    }
}

$container = get_config('theme_moodleidg', 'fluid')?'container-fluid':'container';
//fimslide

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
    'addressm' => get_config('theme_moodleidg', 'addressm'),
    'news' => $news,
    'message_title' => get_config('theme_moodleidg', 'message_title'),
    'message_content' => get_config('theme_moodleidg', 'message_content'),
    'card1_title' => get_config('theme_moodleidg', 'card1_title'),
    'card1_content' => get_config('theme_moodleidg', 'card1_content'),
    'saibamais1' => $stringsaibamais1,
    'card2_title' => get_config('theme_moodleidg', 'card2_title'),
    'card2_content' => get_config('theme_moodleidg', 'card2_content'),
    'saibamais2' => $stringsaibamais2,
    'card3_title' => get_config('theme_moodleidg', 'card3_title'),
    'card3_content' => get_config('theme_moodleidg', 'card3_content'),
    'saibamais3' => $stringsaibamais3,
    'video' => $stringvideo,
    'container' => $container,
    'polos' => $polos,
    'url'=> get_config('theme_moodleidg','facebookurl'),
    'twittertam' => $str,
    'url'=> get_config('theme_moodleidg','facebookurl'),
    'twitter' => get_config('theme_moodleidg','twitterurlicon'),
    'facebook' => get_config('theme_moodleidg','facebookurlicon'),
    'youtube' => get_config('theme_moodleidg','youtubeurlicon'),
    'instagram' => get_config('theme_moodleidg','instagramurlicon')
];

$templatecontext['flatnavigation'] = $PAGE->flatnav;

$PAGE->requires->jquery();
// $PAGE->requires->js('/theme/moodleidg/javascript/jquery.cookie.js'); // precisa de atualização
// $PAGE->requires->js('/theme/moodleidg/javascript/template.js'); // precisa de atualização
$PAGE->requires->js('/theme/moodleidg/javascript/moodleidg.js');

echo $OUTPUT->render_from_template('theme_moodleidg/frontpage', $templatecontext);