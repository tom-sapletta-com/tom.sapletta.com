<?php
/**
 * Project: www
 * User: tom.sapletta.com
 * Date: 16.12.13 10:52
 */

include_once('docTree.php');

class docTreeSentence extends docTree
{



    /**
     * Solution for Translate
     * @param $data
     * @return string
     */
    public function render( $data )
    {
        die;
        $lang = $this->lang->getString();
        $sep1 = "\n";
        $html = '';

        if( !empty($data['items']) && is_array($data['items']) && count($data['items'])>0 )
        {
            $html .= $this->renderTree( $data['items'] );
        }
        else
        {
//            $data = $this->yaml->getString();
            if(is_array($data) && count($data)>0)
            {
                foreach($data as $key => $item)
                {
                    $lang = 'en';



                    $value = $this->getValue( $item['value'], $lang );
                    $name = $this->getValue( $item['name'], $lang );
                    $type = $item['type'];

//                    if( !empty( $item['values'] ) )
//                    {
//                        $value = $this->getValues($item, $lang );
//                        $type = 'values';
//                    }
                    $html .= $this->getValueOfType($type, $lang, $name, $value );
//                    var_dump( $this->getValueOfType($type, $lang, $name, $value ) );


                    $lang = 'pl';

                    $value = $this->getValue( $item['value'], $lang );
                    $name = $this->getValue( $item['name'], $lang );
                    $type = $item['type'];

//                    if( !empty( $item['values'] ) )
//                    {
//                        $value = $this->getValues($item, $lang );
//                        $type = 'values';
//                    }
                    $html .= $this->getValueOfType($type, $lang, $name, $value );
//                    var_dump( $this->getValueOfType($type, $lang, $name, $value ) );
                }
            }
            else
            {
//                die('brak elementu');
            }
        }
        return $html;
    }


} 