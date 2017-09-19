<?php
/**
 * Created by PhpStorm.
 * User: Dipead
 * Date: 15/09/2017
 * Time: 11:22
 */
$page = new admin_settingpage('theme_moodleidg_cardsvideo', get_string('cardsvideo', 'theme_moodleidg'));
// Cards.
$setting = new admin_setting_configtext('theme_moodleidg/card1_title', get_string('card1_title',
    'theme_moodleidg'), get_string('card1_title_desc', 'theme_moodleidg'), '',
    PARAM_RAW);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$setting = new admin_setting_confightmleditor('theme_moodleidg/card1_content', get_string('card1_content',
    'theme_moodleidg'), get_string('card1_content_desc', 'theme_moodleidg'), '',
    PARAM_RAW);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$setting = new admin_setting_configtext('theme_moodleidg/saibamais1', get_string('saibamais1',
    'theme_moodleidg'), get_string('saibamais1_desc', 'theme_moodleidg'), '',
    PARAM_RAW);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$setting = new admin_setting_configtext('theme_moodleidg/card2_title', get_string('card2_title',
    'theme_moodleidg'), get_string('card2_title_desc', 'theme_moodleidg'), '',
    PARAM_RAW);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$setting = new admin_setting_confightmleditor('theme_moodleidg/card2_content', get_string('card2_content',
    'theme_moodleidg'), get_string('card2_content_desc', 'theme_moodleidg'), '',
    PARAM_RAW);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$setting = new admin_setting_configtext('theme_moodleidg/saibamais2', get_string('saibamais2',
    'theme_moodleidg'), get_string('saibamais2_desc', 'theme_moodleidg'), '',
    PARAM_RAW);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$setting = new admin_setting_configtext('theme_moodleidg/card3_title', get_string('card3_title',
    'theme_moodleidg'), get_string('card3_title_desc', 'theme_moodleidg'), '',
    PARAM_RAW);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$setting = new admin_setting_confightmleditor('theme_moodleidg/card3_content', get_string('card3_content',
    'theme_moodleidg'), get_string('card3_content_desc', 'theme_moodleidg'), '',
    PARAM_RAW);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$setting = new admin_setting_configtext('theme_moodleidg/saibamais3', get_string('saibamais3',
    'theme_moodleidg'), get_string('saibamais3_desc', 'theme_moodleidg'), '',
    PARAM_RAW);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Video.
$setting = new admin_setting_configtext('theme_moodleidg/video', get_string('video',
    'theme_moodleidg'), get_string('video_desc', 'theme_moodleidg'), '',
    PARAM_RAW);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$settings->add($page);