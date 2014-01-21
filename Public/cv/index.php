<?PHP
ini_set( 'display_errors', 'On' );
error_reporting( E_ALL );
?>

<?php
    // TODO - form for a contact
    // TODO - local router for a loading class

    // get Config
    include_once('../../Private/Role/guest/configCv.php');
    $config = new configCv();

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
    $cv->render('index_header.php');
    $cv->render('index_header_menu.php');
    $cv->render('index_content.php');

    $docTreeCv = $cv->obj('dubphp.com/docTreeCv.php');

    $docTreeCv->setLang( $config->lang );
    echo $docTreeCv->render( $config->cv );

    // Footer
    $cv->render('index_footer.php');
