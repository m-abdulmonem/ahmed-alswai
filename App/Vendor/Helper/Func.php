<?php

namespace MRDEVELOPER\Vendor\Helper;


/**
 * Class Func
 * @package MAECOMMERCE\ma_libs\Helper
 */
class Func
{

    /**
     * @param $array
     * @param $key
     * @param null $default
     * @return null
     */

    public static function array_get($array,$key,$default = null){
        return isset($array[$key]) ? $array[$key] : $default;
    }

    /**
     * get Site Title
     */
    public static function getTitle(){
        global $Name;
        if (isset($Name) && !empty($Name)){
            echo $Name . " | ";
        }
        echo settings()['title'];
    }

}