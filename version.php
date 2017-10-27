<?php
/**
 * Created by PhpStorm.
 * User: Lucart
 * Date: 18/08/2017
 * Time: 09:38
 */

defined('MOODLE_INTERNAL') || die();

$plugin->version = '2017102700';

$plugin->requires = '2016070700';

$plugin->component = 'theme_moodleidg';

$plugin->dependencies = [
    'theme_boost' => '2016102100'
];