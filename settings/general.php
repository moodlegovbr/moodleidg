<?php

/**
 * Version info
 *
 * @package    theme
 * @subpackage moodleidg
 * @copyright  2018 Fábio Rodrigues dos Santos - fabio.santos@ifrr.edu.br
 */

$settings = new theme_boost_admin_settingspage_tabs('themesettingmoodleidg',
    get_string('configtitle', 'theme_moodleidg'));

$page = new admin_settingpage('theme_moodleidg_general', get_string('generalsettings', 'theme_moodleidg'));

// Organization.
$setting = new admin_setting_configtext('theme_moodleidg/organization', get_string('organization',
    'theme_moodleidg'), get_string('organization_desc', 'theme_moodleidg'), 'Instituto Federal de Educação, Ciência e Tecnologia de Roraima',
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



$name = 'theme_moodleidg/preset';
$title = get_string('preset', 'theme_moodleidg');
$description = get_string('preset_desc', 'theme_moodleidg');
$default = 'template-verde.scss';


$context = context_system::instance();
$fs = get_file_storage();
$files = $fs->get_area_files($context->id, 'theme_moodleidg', 'preset', 0,
    'itemid, filepath, filename', false);

$choices = [];
foreach ($files as $file) {
    $choices[$file->get_filename()] = $file->get_filename();
}

$choices['template-verde'] = 'template-verde';
$choices['template-amarelo'] = 'template-amarelo';
$choices['template-azul'] = 'template-azul';
$choices['template-branco'] = 'template-branco';

$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);



$settings->add($page);