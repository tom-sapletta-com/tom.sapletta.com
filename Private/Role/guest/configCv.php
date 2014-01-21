<?php

// general config
include_once('../../Private/Role/guest/config.php');

$config = new config();

// library for read yaml format  - https://github.com/mustangostang/spyc/
include($config->path_lib . 'github.com/mustangostang/spyc/Spyc.php');
// TODO - version of file for all data //setFolder, setVersion, getFileVersion('cv.yaml')


/**
 * Class configCv
 */
class configCv extends config
{
    public $path_data = '../../Private/cv/data/';
    public $url_data = 'sapletta.com/Private/';
    public $path = 'path.yaml';
    public $page = 'page.yaml';
    public $cv = 'cv.yaml';
    public $lang = 'en';
    public $get;
    public $url;


    /**
     * loading config when use config object
     */
    public function __construct()
    {
        $this->loadDataConfig();
    }



    // TODO use object for data: page, path, etc
    /**
     * load data config
     */
    public function loadDataConfig()
    {
        $this->lang = $this->getLanguage();
        $this->path = (object)$this->getFile($this->path);
        $this->page = (object)$this->getFile($this->page);
        $this->cv = $this->getFileRemote($this->cv);
        if( empty($this->cv) )
        {
            $this->addLog( 'FILE_REMOTE_NOT_LOADED' );
            $this->printLog();
            return false;
        }
        return true;
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
//        $cache_dir_real = realpath($cache_dir);
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
                file_put_contents($pathfile, $filedata);
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