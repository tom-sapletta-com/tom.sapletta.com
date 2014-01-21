<?PHP
ini_set( 'display_errors', 'On' );
error_reporting( E_ALL );
?>

<?php
/**
 * Created by PhpStorm.
 * User: neptun
 * Date: 12.12.13
 * Time: 20:13
 */

include_once('Private/Role/guest/config.php');

$config = new config();
$lang = $config->getLang();


//$config->printServerInfo();
//echo $config->getHomeUrl();
//echo $config->getParam();
echo $config->getHomeUrl();
//print_r($_SERVER);
die('stop');

if( $config->getParam() == 'cv' OR empty( $config->getParam() ) )
{
    header('Location: http://'.$config->getHomeUrl().'/cv/'.$lang);
}
else
{
    header('Location: http://'.$config->getHomeUrl().'/error/'.$lang);
}

?>