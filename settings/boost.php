<?php
/**
 * Created by PhpStorm.
 * User: fabio
 * Date: 12/09/17
 * Time: 14:04
 */

// Aba de configuracao do Boost
$page = new admin_settingpage('theme_moodleidg_boostset', get_string('boostset', 'theme_moodleidg'));

$name = 'theme_moodleidg/preset';
$title = get_string('preset', 'theme_moodleidg');
$description = get_string('preset_desc', 'theme_moodleidg');
$default = 'default.scss';


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
$choices['template-branco'] = 'template-branco';
$choices['template-azul'] = 'template-azul';

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