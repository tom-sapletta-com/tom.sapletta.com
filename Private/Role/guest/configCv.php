<?php
/**
 * Created by PhpStorm.
 * User: tom.sapletta.com
 * Date: 12.12.13
 * Time: 20:13
 */
?>

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
    public $path_data = '../../Private/Data/cv/';
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

}