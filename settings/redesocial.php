<?php
/**
 * Created by PhpStorm.
 * User: fabio
 * Date: 12/09/17
 * Time: 14:05
 */

// Advanced Settings

$page = new admin_settingpage('theme_moodleidg_redesocial', get_string('redesocial', 'theme_moodleidg'));
ECHO ("Facebook");
$setting = new admin_setting_configtext('theme_moodleidg/facebookurl',
    get_string('facebookurl', 'theme_moodleidg'), get_string('URL', 'theme_moodleidg'), '', PARAM_RAW);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$setting = new admin_setting_configtext('theme_moodleidg/facebooktam', get_string('facebooktam', 'theme_moodleidg'),
    get_string('facebooktam', 'theme_moodleidg'), '', PARAM_RAW);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$settings->add($page);