<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Tomasz Sapletta - Życiorys, Lebenslauf, Curriculum Vitae</title>

    <link rel="stylesheet" href="../Public/cv/skin/css/print.css" type="text/css" media="print" />
    <link rel="stylesheet" href="../Public/cv/skin/css/style.css" type="text/css" />

    <link rel="shortcut icon" href="/Public/cv/skin/image/favicon.ico">

    <script src="../Public/cv/skin/js/jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../Public/cv/skin/js/github.com-carlo/jquery.base64.min.js"></script>
    <script src="../Public/cv/skin/js/dubjs.com/data.conversion.js"></script>

    <style>
    </style>

    <script>
        <!--

        //TODO - split data to files
        function doit(){
            if (!window.print){
                alert("Should be browser NS4.x or IE5,\n Shortcut: [Ctrl] + [P] ")
                return
            }
            window.print()
        }

        var is_decoded = false;

        function decode()
        {
            if( !is_decoded )
            {

                $('.base64 .value').each( function () {
                        var value = $(this).text();
                        var string = Base64.decode( value );
                        var temp = string.split('');
                        for (a in temp ) {
                            temp[a] = '<span>' + temp[a] + '</span>'; // Explicitly include base as per Álvaro's comment
                        }
                        $(this).html( temp );
                        $('.decode_button').hide();
                 });
            }
            is_decoded = true;
        }

        $(document).ready(function () {
            $('.base64 .value').on( "click", function () {
                decode();
            });
        });

        //-->
    </script>

</head>
<body class="page-cv">

<?php //include_once('../default/template/index_header_menu.php'); ?>

