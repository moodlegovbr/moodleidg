<?php
/**
 * Created by PhpStorm.
 * User: fabio
 * Date: 12/09/17
 * Time: 14:05
 */

// Advanced Settings

$page = new admin_settingpage('theme_moodleidg_advanced', get_string('advancedsettings', 'theme_moodleidg'));

$setting = new admin_setting_configtextarea('theme_moodleidg/scsspre',
    get_string('rawscsspre', 'theme_moodleidg'), get_string('rawscsspre_desc', 'theme_moodleidg'), '', PARAM_RAW);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$setting = new admin_setting_configtextarea('theme_moodleidg/scss', get_string('rawscss', 'theme_moodleidg'),
    get_string('rawscss_desc', 'theme_moodleidg'), '', PARAM_RAW);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$settings->add($page);