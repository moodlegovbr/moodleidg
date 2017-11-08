<?php

include 'layout.inc.php';

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
    'polos' => $polos,
    'container' => $container,
    'twitter' => get_config('theme_moodleidg','twitterurlicon'),
    'facebook' => get_config('theme_moodleidg','facebookurlicon'),
    'youtube' => get_config('theme_moodleidg','youtubeurlicon'),
    'instagram' => get_config('theme_moodleidg','instagramurlicon')
];

$templatecontext['flatnavigation'] = $PAGE->flatnav;

echo $OUTPUT->render_from_template('theme_boost/columns2', $templatecontext);


