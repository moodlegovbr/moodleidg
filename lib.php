<?php

/**
 * Version info
 *
 * @package    theme
 * @subpackage moodleidg
 * @copyright  2018 Fábio Rodrigues dos Santos - fabio.santos@ifrr.edu.br
 */

defined('MOODLE_INTERNAL') || die();


function theme_moodleidg_get_main_scss_content($theme) {
    global $CFG;
    $scss = file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    return $scss;
}