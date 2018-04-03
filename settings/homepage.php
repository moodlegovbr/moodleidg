<?php
/**
 * Created by PhpStorm.
 * User: Dipead
 * Date: 15/09/2017
 * Time: 11:24
 */

$page = new admin_settingpage('theme_moodleidg_homepage', get_string('homepage', 'theme_moodleidg'));

//Message.
$setting = new admin_setting_configtext('theme_moodleidg/message_title', get_string('message_title',
    'theme_moodleidg'), get_string('message_title_desc', 'theme_moodleidg'), '',
    PARAM_RAW);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$setting = new admin_setting_confightmleditor('theme_moodleidg/message_content', get_string('message_content',
    'theme_moodleidg'), get_string('message_content_desc', 'theme_moodleidg'), '',
    PARAM_RAW);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

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

$settings->add($page);