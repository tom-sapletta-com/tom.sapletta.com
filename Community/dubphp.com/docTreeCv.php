<?php
/**
 * Project: www
 * User: tom.sapletta.com
 * Date: 16.12.13 10:52
 */

include_once('docTree.php');

class docTreeCv extends docTree
{



    public function render( $data )
    {
//        var_dump( $data );
        $lang = $this->lang->getString();
//        $sep1 = "\n";
        $html = '';

        if( !empty($data['items']) && is_array($data['items']) && count($data['items'])>0 )
        {
            $html .= $this->render( $data['items'] );
        }
        else
        {
//            $data = $this->yaml->getString();

            if(is_array($data) && count($data)>0)
            {
                foreach($data as $key => $item)
                {
                    // Validate data
                    $value = '';
                    if( isset($item['value']) )
                    {
                        $value = $this->getValue( $item['value'], $lang );
                    }

                    $name = '';
                    if( isset($item['name']) )
                    {
                        $name = $this->getValue( $item['name'], $lang );
                    }

                    $type = '';
                    if( isset($item['type']) )
                    {
                        $type = $item['type'];
                    }

                    // get Values
                    if( !empty( $item['values'] ) )
                    {
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
                            $value = $values;
                            $type = 'values';
//                            var_dump($item['values']);
                        }
//                        die('values');
                    }
                    $html .= $this->getValueOfType($type, $lang, $name, $value );

//                $item = ;
                }
            }
            else
            {
//                die('brak elementu');
            }
        }
//        die('rrr');
        return $html;
    }

} 