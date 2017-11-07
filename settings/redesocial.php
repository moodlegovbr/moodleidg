<?php
/**
 * Created by PhpStorm.
 * User: fabio
 * Date: 12/09/17
 * Time: 14:05
 */

$page = new admin_settingpage('theme_moodleidg_redesocial', get_string('redesocial', 'theme_moodleidg'));
//facebook frame
$setting = new admin_setting_configtext('theme_moodleidg/facebookurl',
    get_string('facebookurl', 'theme_moodleidg'), get_string('URL', 'theme_moodleidg'), '', PARAM_RAW);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$setting = new admin_setting_configcheckbox_with_advanced('theme_moodleidg/facebookcabe', get_string('facebookcabe', 'theme_moodleidg'),
    get_string('facebookcabe', 'theme_moodleidg'), '', PARAM_RAW);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Twitter
$setting = new admin_setting_configtext('theme_moodleidg/twittertam', get_string('twittertam',
    'theme_moodleidg'), get_string('twittertam_desc', 'theme_moodleidg'), '',
    PARAM_RAW);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// icones redes socias
$setting = new admin_setting_configtext('theme_moodleidg/facebookurlicon',get_string('facebookurlicon', 'theme_moodleidg'), get_string('facebookurlicon', 'theme_moodleidg'), '', PARAM_RAW);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$setting = new admin_setting_configtext('theme_moodleidg/twitterurlicon',get_string('twitterurlicon', 'theme_moodleidg'), get_string('twitterurlicon', 'theme_moodleidg'), '', PARAM_RAW);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$setting = new admin_setting_configtext('theme_moodleidg/youtubeurlicon',get_string('youtubeurlicon', 'theme_moodleidg'), get_string('youtubeurlicon', 'theme_moodleidg'), '', PARAM_RAW);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$setting = new admin_setting_configtext('theme_moodleidg/instagramurlicon',get_string('instagramurlicon', 'theme_moodleidg'), get_string('instagramurlicon', 'theme_moodleidg'), '', PARAM_RAW);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$settings->add($page);