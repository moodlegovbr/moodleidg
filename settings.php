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

    $settings->add($page);

    // Aba de configuracao do Boost
    $page = new admin_settingpage('theme_moodleidg_boostset', get_string('boostset', 'theme_moodleidg'));

    $name = 'theme_moodleidg/preset';
    $title = get_string('preset', 'theme_moodleidg');
    $description = get_string('preset_desc', 'theme_moodleidg');
    $default = 'default.scss';


    $context = context_system::instance();
    $fs = get_file_storage();
    $files = $fs->get_area_files($context->id, 'theme_moodleidg', 'preset', 0, 'itemid, filepath, filename', false);

    $choices = [];
    foreach ($files as $file) {
        $choices[$file->get_filename()] = $file->get_filename();
    }
    $choices['default.scss'] = 'default.scss';
    $choices['plain.scss'] = 'plain.scss';

    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_moodleidg/presetfiles';
    $title = get_string('presetfiles','theme_moodleidg');
    $description = get_string('presetfiles_desc', 'theme_moodleidg');

    $setting = new admin_setting_configstoredfile($name, $title, $description, 'preset', 0,
        array('maxfiles' => 20, 'accepted_types' => array('.scss')));
    $page->add($setting);

    $name = 'theme_moodleidg/brandcolor';
    $title = get_string('brandcolor', 'theme_moodleidg');
    $description = get_string('brandcolor_desc', 'theme_moodleidg');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

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
}