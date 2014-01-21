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
//echo $config->getHomeUrl();
//print_r($_SERVER);
//die('stop');

if( $config->getParam() == 'cv' )
{
    // ZMIANA na serwerze nazwy domeny
    header('Location: http://'.$config->getHomeUrl().'/cv/'.$lang);
}
//elseif( $config->getParam() == 'learn' )
//{
//    header('Location: http://'.$config->getHomeUrl().'/learn/'.$lang);
//}
//elseif( $config->getParam() == 'blog' )
//{
//    header('Location: http://'.$config->getHomeUrl().'/blog/'.$lang);
//}
else
{
    header('Location: http://'.$config->getHomeUrl().'/error/'.$lang);
}

//include('Public/blog/index.php');
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Tomasz Sapletta - Życiorys, Lebenslauf, Curriculum Vitae</title>

    <link rel="stylesheet" href="Public/cv/History/11-12-2013/skin/default/css/style.css" />
    <style>

    </style>
</head>
<body>

<a href="/" >home</a> |
<a href="cv" >cv</a> |
<a href="blog" >blog</a> |
<!--<a href="app" >APP</a>-->
<!--<a href="demo" >APP</a>-->
<!--<a href="projects" >APP</a> -->
<!--<a href="doc" >APP</a>-->
<!--<a href="download" >APP</a>-->

<div class="cv">


</div>


<a style="bottom: 0px; float: right;" href="http://sapletta.com" >sapletta.com</a>

</body>
</html>