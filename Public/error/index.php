<?php
/**
 * Created by PhpStorm.
 * User: tom.sapletta.com
 * Date: 12.12.13
 * Time: 20:13
 */
?>

<?PHP
ini_set('display_errors', 'On');
error_reporting(E_ALL);
?>

<?php

// get Config
include_once('../../Private/Role/guest/configError.php');
$config = new configError();

include_once('../../Community/dubphp.com/routingClass.php');
$error = new routingClass(
    array(
        $config->path->template,
        $config->path->lib
        //            'Community' => '',
        //            'Private' => '',
        //            'Public' => ''
    )
);

// render View
// Header
//    require_once( $config->path->template . 'index_header.php');
$error->render('index_header.php');
$error->render('index_header_menu.php');
$error->render('index_content.php');

// Footer
$error->render('index_footer.php');
