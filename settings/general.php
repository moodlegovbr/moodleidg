<?php
/**
 * Created by PhpStorm.
 * User: Dipead
 * Date: 15/09/2017
 * Time: 11:24
 */
$settings = new theme_boost_admin_settingspage_tabs('themesettingmoodleidg',
    get_string('configtitle', 'theme_moodleidg'));

$page = new admin_settingpage('theme_moodleidg_general', get_string('generalsettings', 'theme_moodleidg'));

// Organization.
$setting = new admin_setting_configtext('theme_moodleidg/organization', get_string('organization',
    'theme_moodleidg'), get_string('organization_desc', 'theme_moodleidg'), 'Instituição Federal de Ensino',
    PARAM_RAW);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Subordination.
$setting = new admin_setting_configtext('theme_moodleidg/subordination', get_string('subordination',
    'theme_moodleidg'), get_string('subordination_desc', 'theme_moodleidg'), 'Ministério da Educação',
    PARAM_RAW);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Rodapé Manual.
$setting = new admin_setting_confightmleditor('theme_moodleidg/addressm', get_string('addressm',
    'theme_moodleidg'), get_string('addressm_desc', 'theme_moodleidg'), '',
    PARAM_RAW);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Layout Fixo ou Fluid.
$setting = new admin_setting_configcheckbox('theme_moodleidg/layout', get_string('layout',
    'theme_moodleidg'), get_string('layout_desc', 'theme_moodleidg'), 'Fluid', 'Fluid', 'Fixed');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Acessibilidade.
$setting = new admin_setting_confightmleditor('theme_moodleidg/acessibilidade', get_string('acessibilidade',
    'theme_moodleidg'), get_string('acessibilidade_desc', 'theme_moodleidg'), '',
    PARAM_RAW);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);


$settings->add($page);