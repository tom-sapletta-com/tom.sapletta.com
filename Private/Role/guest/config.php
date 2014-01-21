<?php
/**
 * Created by PhpStorm.
 * User: tom.sapletta.com
 * Date: 12.12.13
 * Time: 20:13
 */
?>

<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

//include_once('../../Private/Role/guest/log.php');
include_once('log.php');

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


    /**
     * get current language
     *
     * @return string
     */
    public function getLanguage()
    {
        if (isset($_SERVER['PATH_INFO']) && !empty($_SERVER['PATH_INFO'])) {
            $path = $_SERVER['PATH_INFO'];
        } else if (isset($_SERVER['REDIRECT_URL']) && !empty($_SERVER['REDIRECT_URL'])) {
            $path = $_SERVER['REDIRECT_URL'];
        } else if (isset($_SERVER['REQUEST_URI']) && !empty($_SERVER['REQUEST_URI'])) {
            $path = $_SERVER['REQUEST_URI'];
        } else {
            $path = '';
        }

        if (!empty($path)) {
            $path_list = explode('/', $path);
            $path_list_count = count($path_list);
            if (!empty($path_list[$path_list_count])) {
                $lang = $path_list[$path_list_count];
            } else if (!empty($path_list[$path_list_count - 1])) {
                $lang = $path_list[$path_list_count - 1];
            }
        }

        if (strlen($lang) < 2) {
            $lang = $this->lang;
        }

        // validation of language
        if ($lang == 'en' || $lang == 'de' || $lang == 'pl' || $lang == 'ru') {

        } else {
            $lang = $this->lang;
        }

        return $lang;
    }


    /**
     * recursively create a long directory path
     *
     * @param $path
     * @param int $filemode
     * @return bool
     */
    function createPath($path, $filemode = 0777)
    {
        if (is_dir($path)) return true;
        // You should change access for folder by admin, when is permission denied for mkdir()
        return mkdir($path, $filemode, true);
    }


    /**
     * recursively change mode in path
     *
     * @param $path
     * @param int $filemode
     * @param int $limit
     */
    function chmodTree($path, $filemode = 0777, $limit = 5)
    {
        for ($x = 0; $x < $limit; $x++) {
            @chmod($path, $filemode);
            $path = substr($path, 0, strrpos($path, '/', -2) + 1);
        }
    }

    /**
     * check if file exist
     *
     * @param $url
     * @return bool
     */
    function isFileRemote($url) {
        $context  = stream_context_create(array('http' =>array('method'=>'HEAD')));
        $fd = @fopen($url, 'rb', false, $context);
        if ($fd!==false) {
            fclose($fd);
            $this->addLog( 'FILE_REMOTE_EXIST', $url );
            return true;
        }
        $this->addLog( 'FILE_REMOTE_NOT_EXIST', $url );
        return false;
    }

    /**
     * get file from external server
     *
     * @param $filename
     * @return array
     */
    public function getFileRemote($filename)
    {
        $cache_dir = '../../Private/Cache/';

        $pathdir = $cache_dir . $this->url_data;

        // when not exist path, creati path to source
        if ($this->createPath($pathdir)) {
            $pathfile = $pathdir . $filename;

            if (!is_readable($this->url_data . $filename)) {
                $this->url = 'http://' . $this->url_data . $filename;
                if( !$this->isFileRemote( $this->url ) )
                {
                    return false;
                }

                $filedata = file_get_contents($this->url);
                if( empty($filedata) )
                {
                    $this->addLog( 'FILE_DATA_IS_EMPTY', $this->url );
                    return false;
                }
//                $cache_dir_real = realpath($cache_dir);
                file_put_contents( $pathfile , $filedata);
            }

            // Everything for owner, read and execute for others
            $this->chmodTree($pathfile);

            $return = Spyc::YAMLLoad($pathfile);
            return $return;
        }
        return false;
    }

    /**
     * get file from path on local filesystem
     * @param $filename
     * @return array
     */
    public function getFile($filename)
    {
        $return = Spyc::YAMLLoad($this->path_data . $filename);
        return $return;
    }

} 