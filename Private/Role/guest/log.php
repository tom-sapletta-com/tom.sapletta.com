<?php
/**
 * Project: tom.sapletta.com
 * User: tom.sapletta.com
 * Date: 21.01.14 10:03
 */
?>

<?php

//TODO split log -> move class to dubphp, leave only configurable data for log
//TODO - mesages, info, error type of log
//TODO - when is error do some special

class log {

    public $message = array(
        'FILE_NOT_LOADED' => 'file is not loaded',
        'FILE_REMOTE_NOT_LOADED' => 'file remote is not loaded',
        'FILE_DATA_IS_EMPTY' => 'data of file is empty',
        'FILE_REMOTE_EXIST' => 'data of file exist'


    );

    public $log = array();

    /**
     * add message to log
     *
     * @param $name
     * @param string $value
     */
    public function addLog( $name, $value = '')
    {
        if( !empty($this->message[$name]) )
        {
            $this->log[] = $this->message[$name] . ' ' . $value;
        }
        else
        {
            // when name not exist in array, try use alias or make error
            if(!empty($name))
            {
                $this->log[] = $name . ' ' . $value;
            }
            else
            {
                $this->log[] = 'The name: ' . $name . ' not exist in array message';
            }
        }
    }


    /**
     * get array of logs
     *
     * @return array
     */
    public function getLog()
    {
        return $this->log;
    }

    /**
     * print log
     */
    public function printLog()
    {
        echo '<ul class="print-log">';
        foreach( $this->log as $id => $value)
        {
            echo '<li class="' . strtolower( $id ) . '">' . $value . '</li>';
        }
        echo '</ul>';
    }

    /**
     * dump log and stop application
     */
    public function dump()
    {
        echo '<pre>';
        var_dump( $this->log );
        echo '</pre>';
        die;
    }

    /**
     * print info about server
     */
    public function printServerInfo()
    {
        echo '<pre>';
        var_dump( $_SERVER );
        echo '</pre>';
    }

} 