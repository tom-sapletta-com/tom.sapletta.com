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

<?PHP

include_once('Private/Role/guest/config.php');

$config = new config();

if ($config->getParam() == 'cv' OR empty($config->getParam())) {
    header('Location: http://' . $config->getHomeUrl() . '/cv/' . $config->getLang());
} else {
    header('Location: http://' . $config->getHomeUrl() . '/error/' . $config->getLang());
}