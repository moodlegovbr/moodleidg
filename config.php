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
    get_config('theme_moodleidg', 'preset'),
    'fontes',
    'font-awesome\css\font-awesome',
    'moodleidg');

// Additional theme options.
//$THEME->supportscssoptimisation = false;

$THEME->yuicssmodules = array();
$THEME->enable_dock = false;
$THEME->rendererfactory = 'theme_overridden_renderer_factory';
$THEME->requiredblocks = '';
$THEME->addblockposition = BLOCK_ADDBLOCK_POSITION_FLATNAV;
$THEME->scss = function($theme) {
    return theme_moodleidg_get_main_scss_content($theme);
};

$THEME->layouts = [
    // Most backwards compatible layout without the blocks - this is the layout used by default
    'base' => array(
        'file' => 'columns2.php',
        'regions' => array(),
    ),
    // Standard layout with blocks, this is recommended for most pages with default information
    'standard' => array(
        'file' => 'columns2.php',
        'regions' => array('side-pre', 'side-post'),
        'defaultregion' => 'side-pre',
    ),
    // The site home page.
    'frontpage' => array(
        'file' => 'frontpage.php',
        'regions' => array('side-pre',
                                'home-left', 'home-middle', 'home-right',
                                'footer-left', 'footer-middle', 'footer-right'),
        'defaultregion' => 'side-pre',
        'options' => array('nonavbar' => true),
    ),
];