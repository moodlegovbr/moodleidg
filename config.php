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
