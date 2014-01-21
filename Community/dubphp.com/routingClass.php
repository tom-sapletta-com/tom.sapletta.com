<?php
/**
 * Created by PhpStorm.
 * User: tom
 * Date: 01.01.14
 * Time: 23:03
 */


class routingClass
{

    public $path_list;

    public function __construct( $path_list = '', $class_list = '', $files_list = '')
    {
        $this->path_list = $path_list;
    }

    public function obj($class_file, $class_name = '', $class_data = '' )
    {
        return $this->object( $class_file, $class_name, $class_data );
    }

    public function object( $class_file, $class_name = '', $class_data = '' )
    {
        foreach($this->path_list as $path)
        {
            $file = $path . $class_file;
            if( is_readable($file) )
            {
                include_once( $file );
                $part = pathinfo( $file );
                $class_name = $part['filename'];
//                die($class_name);
                return new $class_name( $class_data );
            }
        }
    }

    public function render( $class_file )
    {
        $path = $this->path_list[0]; //current( $this->path_list );
        $file = $path . $class_file;
        require_once( $file );
    }

}