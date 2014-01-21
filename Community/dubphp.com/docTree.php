<?php
/**
 * Created by PhpStorm.
 * User: tom.sapletta.com
 * Date: 12.12.13
 * Time: 19:55
 */

include_once('valString.php');
include_once('docTreeValues.php');

class docTree extends docTreeValues
{

    public $lang, $yaml;

    function __construct()
    {
        $this->lang = new valString();
        $this->yaml = new valString();
    }

    public function setLang( $lang = 'en' )
    {
        if( empty($lang) )
        {
            $lang = 'en';
        }
        return $this->lang->setString( $lang );
    }

    public function setData( $yaml = '' )
    {
        return $this->yaml->setString( $yaml );
    }



    public function getValue( $var, $lang )
    {
        $sep1 = "\n";
        $value = '';
        if( empty( $var ) )
        {
            $value = '';
        }
        else if( is_array( $var ) )
        {
            if( !empty( $var[$lang]) )
            {
                if( is_array( $var[$lang] ) )
                {
                    $value = implode($sep1 , $var[$lang]);
                }
                else
                {
                    $value = $var[$lang];
                }
            }
            else
            {
                $value = current( $var );
            }
        }
        else
        {
            $value = $var;
        }
        return $value;
    }




    public function getValues($item, $lang)
    {
        echo $item['name'];

        if(is_array( $item['values'] ) && count( $item['values'] )>0)
        {
            $values = '';
            foreach($item['values'] as $name2 => $value2)
            {
                $type2 = $name2;
//                                $lang2 = $lang;
                $name2 = $this->getValue( $name2, $lang );
                $value2 = $this->getValue( $value2, $lang );

                $values .= $this->getValueOfType($type2, $lang, $name2, $value2 );
            }
            return $value = $values;
//                            var_dump($item['values']);
        }
    }

} 