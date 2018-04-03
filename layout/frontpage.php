<?php
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

include 'layout.inc.php';

// Feeds de Noticias

$feed = file_get_contents(get_config('theme_moodleidg', 'rss'));

/*
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
} */

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
    'container' => $container,
    'url'=> get_config('theme_moodleidg','facebookurl'),
];

$templatecontext['flatnavigation'] = $PAGE->flatnav;

echo $OUTPUT->render_from_template('theme_moodleidg/frontpage', $templatecontext);