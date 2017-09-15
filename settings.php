<?php
/**
 * Created by PhpStorm.
 * User: Lucart
 * Date: 18/08/2017
 * Time: 10:09
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {

    $settings = new theme_boost_admin_settingspage_tabs('themesettingmoodleidg',
        get_string('configtitle', 'theme_moodleidg'));

    $page = new admin_settingpage('theme_moodleidg_general', get_string('generalsettings', 'theme_moodleidg'));

    // Organization.
    $setting = new admin_setting_configtext('theme_moodleidg/organization', get_string('organization',
        'theme_moodleidg'), get_string('organization_desc', 'theme_moodleidg'), '',
        PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Subordination.
    $setting = new admin_setting_configtext('theme_moodleidg/subordination', get_string('subordination',
        'theme_moodleidg'), get_string('subordination_desc', 'theme_moodleidg'), '',
        PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Address.
    $setting = new admin_setting_confightmleditor('theme_moodleidg/address', get_string('address',
        'theme_moodleidg'), get_string('address_desc', 'theme_moodleidg'), '',
        PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // RSS.
    $setting = new admin_setting_configtext('theme_moodleidg/rss', get_string('rss',
        'theme_moodleidg'), get_string('rss_desc', 'theme_moodleidg'), '',
        PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    $settings->add($page);








    require('settings/slide.php');
    require('settings/boost.php');
    require('settings/advanced.php');
}