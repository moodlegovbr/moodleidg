<?php

/**
 * Version info
 *
 * @package    theme
 * @subpackage moodleidg
 * @copyright  2018 Fábio Rodrigues dos Santos - fabio.santos@ifrr.edu.br
 */

include "layout.inc.php";

$templatecontext['homeleftblocks'] = $homeleftblock;
$templatecontext['homelefthasblocks'] = $homelefthasblocks;

$templatecontext['homemiddleblocks'] = $homemiddleblock;
$templatecontext['homemiddlehasblocks'] = $homemiddlehasblocks;

$templatecontext['homerightblocks'] = $homerightblock;
$templatecontext['homerighthasblocks'] = $homerighthasblocks;

echo $OUTPUT->render_from_template('theme_moodleidg/frontpage', $templatecontext);