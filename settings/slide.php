<?php
/**
 * Created by PhpStorm.
 * User: dipead
 * Date: 15/09/2017
 * Time: 11:39
 */

// Slideshow settings.
$page = new admin_settingpage('theme_moodleidg_slideshow', get_string('slidesshow', 'theme_moodleidg'));
// Toggle slideshow.
$name = 'theme_moodleidg/toggleslideshow';
$title = get_string('toggleslideshow', 'theme_moodleidg');
$description = get_string('toggleslideshowdesc', 'theme_moodleidg');
$alwaysdisplay = get_string('alwaysdisplay', 'theme_moodleidg');
$displaybeforelogin = get_string('displaybeforelogin', 'theme_moodleidg');
$displayafterlogin = get_string('displayafterlogin', 'theme_moodleidg');
$dontdisplay = get_string('dontdisplay', 'theme_moodleidg');
$default = 1;
$choices = array(1 => $alwaysdisplay, 2 => $displaybeforelogin, 3 => $displayafterlogin, 0 => $dontdisplay);
$setting = new essential_admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Number of slides.
$name = 'theme_moodleidg/numberofslides';
$title = get_string('numberofslides', 'theme_moodleidg');
$description = get_string('numberofslides_desc', 'theme_moodleidg');
$default = 4;
$choices = array(
    1 => '1',
    2 => '2',
    3 => '3',
    4 => '4',
    5 => '5',
    6 => '6',
    7 => '7',
    8 => '8',
    9 => '9',
    10 => '10',
    11 => '11',
    12 => '12',
    13 => '13',
    14 => '14',
    15 => '15',
    16 => '16'
);
$page->add(new essential_admin_setting_configselect($name, $title, $description, $default, $choices));

// Hide slideshow on phones.
$name = 'theme_moodleidg/hideontablet';
$title = get_string('hideontablet', 'theme_moodleidg');
$description = get_string('hideontabletdesc', 'theme_moodleidg');
$default = false;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Hide slideshow on tablet.
$name = 'theme_moodleidg/hideonphone';
$title = get_string('hideonphone', 'theme_moodleidg');
$description = get_string('hideonphonedesc', 'theme_moodleidg');
$default = true;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Slide interval.
$name = 'theme_moodleidg/slideinterval';
$title = get_string('slideinterval', 'theme_moodleidg');
$description = get_string('slideintervaldesc', 'theme_moodleidg');
$default = '5000';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
// Show caption options.
$name = 'theme_moodleidg/slidecaptionoptions';
$title = get_string('slidecaptionoptions', 'theme_moodleidg');
$description = get_string('slidecaptionoptionsdesc', 'theme_moodleidg');
$default = 0;
$choices = array(
    0 => get_string('slidecaptionbeside', 'theme_moodleidg'),
    1 => get_string('slidecaptionontop', 'theme_moodleidg'),
    2 => get_string('slidecaptionunderneath', 'theme_moodleidg')
);
$images = array(
    0 => 'beside',
    1 => 'on_top',
    2 => 'underneath'
);
$setting = new essential_admin_setting_configradio($name, $title, $description, $default, $choices, false, $images);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Show caption centred.
$name = 'theme_moodleidg/slidecaptioncentred';
$title = get_string('slidecaptioncentred', 'theme_moodleidg');
$description = get_string('slidecaptioncentreddesc', 'theme_moodleidg');
$default = false;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);


$numberofslides = get_config('theme_moodleidg', 'numberofslides');
for ($i = 1; $i <= $numberofslides; $i++) {
    // This is the descriptor for the slide.
    $name = 'theme_moodleidg/slide_info_'.$i;
    $heading = get_string('slideno', 'theme_moodleidg', array('slide' => $i));
    $information = get_string('slidenodesc', 'theme_moodleidg', array('slide' => $i));
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    // Title.
    $name = 'theme_moodleidg/slide_'.$i;
    $title = get_string('slidetitle', 'theme_moodleidg');
    $description = get_string('slidetitledesc', 'theme_moodleidg');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Image.
    $name = 'theme_moodleidg/slide_image_'.$i;
    $title = get_string('slideimage', 'theme_moodleidg');
    $description = get_string('slideimagedesc', 'theme_moodleidg');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide'.$i.'image');
    $setting->set_updatedcallback('theme_photo_update_settings_images');
    $page->add($setting);

    // Caption text.
    $name = 'theme_moodleidg/slide_caption_'.$i;
    $title = get_string('slidecaption', 'theme_moodleidg');
    $description = get_string('slidecaptiondesc', 'theme_moodleidg');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // URL.
    $name = 'theme_moodleidg/slide_url_'.$i;
    $title = get_string('slideurl', 'theme_moodleidg');
    $description = get_string('slideurldesc', 'theme_moodleidg');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // URL target.
    $name = 'theme_moodleidg/slide_target_'.$i;
    $title = get_string('slideurltarget', 'theme_moodleidg');
    $description = get_string('slideurltargetdesc', 'theme_moodleidg');
    $target1 = get_string('slideurltargetself', 'theme_moodleidg');
    $target2 = get_string('slideurltargetnew', 'theme_moodleidg');
    $target3 = get_string('slideurltargetparent', 'theme_moodleidg');
    $default = '_blank';
    $choices = array('_self' => $target1, '_blank' => $target2, '_parent' => $target3);
    $setting = new essential_admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}
$settings->add($page);