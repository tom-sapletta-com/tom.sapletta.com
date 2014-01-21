<?php
/**
 * Project: www
 * User: tom.sapletta.com
 * Date: 16.12.13 10:49
 */

class docTreeValues {


    public function getValueOfType( $type = '', $lang = '', $name = '', $value = '' )
    {
//        $html = '';
//        echo ":$type:";
//        echo $name;
        // Profile

        $value = str_replace( array(", \n",",\n","; \n",";\n"), '<br/>', $value);

        $type_val = $type;

        $type_arr = explode(' ',$type);
//        var_dump($type_arr);
        if(count($type_arr) > 1)
        {
//            var_dump($type_arr[1]);
            $type_val = $type_arr[0];

            if( $type_arr[1] == 'base64')
            {
                $value = base64_encode( $value );
            }
            else if( $type_arr[1] == 'url')
            {
                $value = '<a href="http://'.$value.'">'.$value.'</a>';
            }


//            var_dump( $value );
        }

        switch ( $type_val )
        {

            case 'document':
                $html = '<div class="'.$lang.' '.$type.'" ><div class="title">'.$name.'</div><div class="value">'.$value.'</div></div>';
                break;
            case 'image':
//                $html = '<img class="'.$lang.' '.$type.'" src="'.$value['url'].'" />';
                $html = '<div class="'.$lang.' '.$type.'" > <img src="'.$value.'" title="'.$name.'" /> </div>';
                break;
            case 'section':
                $html = '<div class="'.$lang.' '.$type.'" ><div class="title">'.$name.'</div>'.$value.'</div>';
                break;
            case 'row':
                $html = '<div class="'.$lang.' '.$type.'" ><div class="title">'.$name.'</div><div class="value">'.$value.'</div></div>';
                break;
            case 'row-slim':
                $html = '<div class="'.$lang.' '.$type.'" ><div class="title">'.$name.'</div><div class="value">'.$value.'</div></div>';
                break;
            case 'row-h50':
                $html = '<div class="'.$lang.' '.$type.'" ><div class="title">'.$name.'</div><div class="value">'.$value.'</div></div>';
                break;
            case 'line':
                $html = '<div class="'.$lang.' '.$type.'" ><div class="title">'.$name.'</div><div class="value">'.$value.'</div></div>';
                break;
            case 'row50':
                $html = '<div class="'.$lang.' '.$type.'" ><div class="title">'.$name.'</div><div class="value">'.$value.'</div></div>';
                break;
            case 'maintitle':
                $html = '<div class="'.$lang.' '.$type.'" ><div class="title">'.$name.'</div><div class="value">'.$value.'</div></div>';
                break;
            case 'values':
                $html = '<div class="'.$lang.' '.$type.'" >'.$value.'</div>';
                break;
            case 'company':
                $html = '<div class="'.$lang.' '.$type.'" ><div class="title">'.$name.'</div><div class="value">'.$value.'</div></div>';
                break;
            case 'date':
                $html = '<div class="'.$lang.' '.$type.'" ><div class="title">'.$name.'</div><div class="value">'.$value.'</div></div>';
                break;
            case 'position':
                $html = '<div class="'.$lang.' '.$type.'" ><div class="title">'.$name.'</div><div class="value">'.$value.'</div></div>';
                break;
            case 'responsibilities':
                $html = '<div class="'.$lang.' '.$type.'" ><div class="title">'.$name.'</div><div class="value">'.$value.'</div></div>';
                break;
            case 'projects':
                $html = '<div class="'.$lang.' '.$type.'" ><div class="title">'.$name.'</div><div class="value">'.$value.'</div></div>';
                break;
            case 'technologie':
                $html = '<div class="'.$lang.' '.$type.'" ><div class="title">'.$name.'</div><div class="value">'.$value.'</div></div>';
                break;
            case 'description':
                $html = '<div class="'.$lang.' '.$type.'" ><div class="title">'.$name.'</div><div class="value">'.$value.'</div></div>';
                break;
            case 'qualification':
                $html = '<div class="'.$lang.' '.$type.'" ><div class="title">'.$name.'</div><div class="value">'.$value.'</div></div>';
                break;
            case 'school':
                $html = '<div class="'.$lang.' '.$type.'" ><div class="title">'.$name.'</div><div class="value">'.$value.'</div></div>';
                break;
            case 'question':
                $html = '<div class="'.$lang.' '.$type.'" ><div class="title">'.$name.'</div><div class="value">'.$value.'</div></div>';
                break;
            case 'answer':
                $html = '<div class="'.$lang.' '.$type.'" ><div class="title">'.$name.'</div><div class="value">'.$value.'</div></div>';
                break;
            case 'blog':
                $html = '<div class="'.$lang.' '.$type.'" ><a class="link" href="http://'.$value.'" title="'.$value.'">'.$name.'</a></div>';
                break;
            case 'github':
                $html = '<div class="'.$lang.' '.$type.'" ><a class="link" href="http://github.com/'.$value.'" title="'.$value.'">'.$name.'</a></div>';
                break;
            case 'linkedin':
                $html = '<div class="'.$lang.' '.$type.'" ><a class="link" href="http://linkedin.com/'.$value.'" title="'.$value.'">'.$name.'</a></div>';
                break;
            case 'xing':
                $html = '<div class="'.$lang.' '.$type.'" ><a class="link" href="http://xing.com/'.$value.'" title="'.$value.'">'.$name.'</a></div>';
                break;
            case 'skype':
                $html = '<div class="'.$lang.' '.$type.'" ><a class="link" href="call:'.$value.'" title="'.$value.'">'.$name.'</a></div>';
                break;
            case 'email':
                $html = '<div class="'.$lang.' '.$type.'" ><a class="link" href="email:'.$value.'" title="'.$value.'">'.$name.'</a></div>';
                break;
            case 'phone':
                $html = '<div class="'.$lang.' '.$type.'" ><a class="link" href="call:'.$value.'" title="'.$value.'">'.$name.'</a></div>';
                break;
            default:
                $html = '';
        }
        return $html . "\n";
    }

} 