<?php
/**
 * Created by PhpStorm.
 * User: tom.sapletta.com
 * Date: 12.12.13
 * Time: 19:55
 */

class valString
{

    private $value;

    public function setString( $item = '' )
    {
        if( !empty($item) )
        {
            $this->value = $item;
            return true;
        }
        return false;
    }

    public function getString()
    {
        return $this->value;
    }
} 