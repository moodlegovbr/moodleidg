<?php
/**
 * Created by PhpStorm.
 * User: Lucart
 * Date: 18/08/2017
 * Time: 10:09
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    require('settings/general.php');
    require('settings/boost.php');
    require('settings/advanced.php');
}