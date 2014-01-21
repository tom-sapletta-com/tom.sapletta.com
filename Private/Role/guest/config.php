<?php
/**
 * Project: dubdoc.com
 * User: tom.sapletta.com
 * Date: 13.12.13 11:05
 */

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

//include_once('../../Private/Role/guest/log.php');
include_once('log.php');

//TODO - get functions from CV

class config extends log
{

    public $lang_list_available = array('pl' => 1, 'en' => 1, 'de' => 1, 'ru' => 0);
    public $lang_list_label = array('pl' => 'Polski', 'en' => 'Englisch', 'de' => 'Deutsch', 'ru' => 'R');
    public $lang_default = 'en';
    public $path_lib = '../../Community/';
    public $localhost_name = 'localhost';


    //TODO extends for POST, etc
    /**
     * get POST/GET param
     *
     * @return bool
     */
    public function getParam()
    {
        if ( !empty($_GET['param']) )
        {
            return $_GET['param'];
        }
        return false;
    }


    /**
     * get language from variable (path) or set default from config
     *
     * @return string
     */
    public function getLang()
    {
        $lang = $_GET['lang'];

        // validation of language
        if ($lang == 'en' || $lang == 'de' || $lang == 'pl' || $lang == 'ru') {

        } else {
            $lang = $this->lang_default;
        }
        return $lang;
    }

    /**
     * get Home url
     *
     * @return string
     */
    public function getHomeUrl()
    {
        if ($_SERVER['SERVER_ADDR'] == "127.0.0.1" OR $_SERVER['SERVER_NAME'] == "localhost" OR $_SERVER['SERVER_NAME'] == "neptun.nep")
        {
            return $this->localhostName() . '/tom.sapletta.com';
        } else {
            return 'tom.sapletta.com';
        }
    }


    /**
     * important on local server
     *
     * @return string
     */
    public function localhostName()
    {
        if ( !empty($_SERVER['HTTP_HOST']) )
        {
            return $_SERVER['HTTP_HOST'];
        }
        else if ( !empty($_SERVER['SERVER_NAME']) )
        {
            return $_SERVER['SERVER_NAME'];
        }
        else
        {
            return $this->localhost_name;
        }
    }


    /**
     * get path
     *
     * @return string
     */
    public function getHomePath()
    {
        if ($_SERVER['SERVER_ADDR'] == "127.0.0.1" )
        {
            return 'neptun.nep/tom.sapletta.com';
        } else {
            return 'tom.sapletta.com';
        }
    }

} 