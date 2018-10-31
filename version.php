<?php

/**
 * Version info
 *
 * @package    theme
 * @subpackage moodleidg
 * @copyright  2018 Fábio Rodrigues dos Santos - fabio.santos@ifrr.edu.br
 */

defined('MOODLE_INTERNAL') || die();

$plugin->component = 'theme_moodleidg';
$plugin->version = 2018091800;
$plugin->requires = 2018050800;
$plugin->release = 'v1.02';

$plugin->dependencies = [
    'theme_boost' => 2018051400
];