<?php
/**
 * Created by PhpStorm.
 * User: Lucart
 * Date: 18/08/2017
 * Time: 10:05
 */

defined('MOODLE_INTERNAL') || die();

$THEME->name = 'moodleidg';

$THEME->parents = ['boost'];

$THEME->sheets = array(
    'template-verde',
    'fontes',
    'font-awesome\css\font-awesome',
    'moodleidg');

$THEME->enable_dock = false;

$THEME->rendererfactory = 'theme_overridden_renderer_factory';

$THEME->requiredblocks = '';

$THEME->addblockposition = BLOCK_ADDBLOCK_POSITION_FLATNAV;

$THEME->scss = function($theme) {
    return theme_moodleidg_get_main_scss_content($theme);
};

$THEME->layouts = [
    // The site home page.
    'frontpage' => array(
        'file' => 'frontpage.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
        'options' => array('nonavbar' => true, 'langmenu' => true),
    ),
    // Main course page.
    'course' => array(
        'file' => 'course.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
    'incourse' => array(
        'file' => 'course.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
    'coursecategory' => array(
        'file' => 'columns2.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
];

// Additional theme options.
$THEME->supportscssoptimisation = false;
$THEME->enable_dock = false;
$THEME->yuicssmodules = array();
$THEME->requiredblocks = '';
$THEME->addblockposition = BLOCK_ADDBLOCK_POSITION_FLATNAV;