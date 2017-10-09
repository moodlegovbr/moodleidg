<?php
/**
 * Created by PhpStorm.
 * User: dipead
 * Date: 05/09/2017
 * Time: 12:06
 */
require_once('../../../config.php');
require_once('../lib.php');

$PAGE->set_context(context_system::instance());
$thispageurl = new moodle_url('/theme/moodleidg/pages/acessibilidade.php');
$PAGE->set_context(get_system_context());
$PAGE->set_pagelayout('admin');
$PAGE->set_title("Acessibilidade");
$PAGE->set_heading("Acessibilidade"); // colocar um titulo em cima
$PAGE->set_url($thispageurl, $thispageurl->params());
$PAGE->set_docs_path('');
$PAGE->set_pagelayout('standard');


echo $OUTPUT->header();
echo get_config('theme_moodleidg', 'acessibilidade');
echo $OUTPUT->footer();
