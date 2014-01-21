<?php




// general config
include_once('../../Private/Role/guest/config.php');

$config = new config();

// library for read yaml format  - https://github.com/mustangostang/spyc/
include( $config->path_lib .'github.com/mustangostang/spyc/Spyc.php');
// TODO - version of file for all data //setFolder, setVersion, getFileVersion('cv.yaml')


class configBlog extends config
{

    public $file_list = array( 'page.yaml', 'cv.yaml' );
    public $file_page = 'page.yaml';

    public $path_data = 'data/';
    public $path;
    public $page;
    public $get;
    public $url;


    public function __construct()
    {

        $this->lang = $this->getLanguage();

        $this->path = (object) $this->getFile( 'path.yaml' );
        $this->page = (object) $this->getFile( 'page.yaml' );

        // array
        $this->cv = $this->getFile( 'cv.yaml' );
    }

    public function getLanguage()
    {

//        var_dump( $_SERVER );
        if( isset($_SERVER['PATH_INFO']) && !empty($_SERVER['PATH_INFO']) )
        {
            $path = $_SERVER['PATH_INFO'];
        }
        else if( isset($_SERVER['REDIRECT_URL']) && !empty($_SERVER['REDIRECT_URL']) )
        {
            $path = $_SERVER['REDIRECT_URL'];
        }
        else if(  isset($_SERVER['REQUEST_URI']) &&  !empty($_SERVER['REQUEST_URI']) )
        {
            $path = $_SERVER['REQUEST_URI'];
        }
        else
        {
            $path = '';
        }

//        die( $path );

        if( !empty($path) )
        {
            $path_list = explode('/',$path);
            $path_list_count = count( $path_list );
            if( !empty( $path_list[$path_list_count] ) )
            {
                $lang = $path_list[$path_list_count];
            } else if( !empty( $path_list[$path_list_count-1] ) )
            {
                $lang = $path_list[$path_list_count-1];
            }
//            $lang = $lang[1];

        }

//        die( $lang );

//        $lang = $_GET['lang'];



        if(strlen($lang)<2)
        {
            $lang = 'pl';
        }

        // walidacja języka
        if( $lang == 'en' || $lang == 'de' || $lang == 'pl' || $lang == 'ru' )
        {

        }
        else
        {
            $lang = 'pl';
        }

        return $lang;
    }

    /*
    public function getDomain()
    {
        if( empty($_SERVER['PATH_INFO']) )
        {

        }
        else if( empty($_SERVER['PATH_INFO']) )
        {

        }
        else
        {

        }
        var_dump($_SERVER);
//        die;

        $this->url = $_SERVER['PATH_INFO'];

        SERVER_ADDR


        $return = Spyc::YAMLLoad( $this->path_data . $filename );
        return $return;
    }
*/

    public function getFile( $filename )
    {
        $return = Spyc::YAMLLoad( $this->path_data . $filename );
        return $return;
    }
}