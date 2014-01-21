<?PHP
ini_set( 'display_errors', 'On' );
error_reporting( E_ALL );
?>

<?php
    // TODO - formularz kontaktowy
    // TODO dodać obsługę ładowania klas, detekcji plikow

//    global $doc, $config;

    // get Config
    include_once('../../Private/Role/guest/configError.php');
    $config = new configError();

    include_once('../../Community/dubphp.com/routingClass.php');
    $cv = new routingClass(
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
    $cv->render('index_header.php');
    $cv->render('index_header_menu.php');
    $cv->render('index_content.php');

    $docTreeCv = $cv->obj('dubphp.com/docTreeCv.php');

//    var_dump( $docTreeCv );

//die;
//var_dump( $config->path );

    // get Data
//    require_once( $config->path->lib .'dubphp.com/docTreeCv.php');
//    $doc = new docTreeCv();
    $docTreeCv->setLang( $config->lang );
    echo $docTreeCv->render( $config->cv );

//die('ddd');
    // Footer
    $cv->render('index_footer.php');
//    require_once( $config->path->template . 'index_footer.php');