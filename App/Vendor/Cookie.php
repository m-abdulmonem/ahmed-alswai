<?php

namespace MRDEVELOPER\Vendor;


use MRDEVELOPER\Vendor\Helper\Func;

class Cookie
{

    /**
     * set Cookie
     *
     * @param $key
     * @param $value
     * @param int $hour
     */
    public static function set($key, $value, $hour = 60)
    {
        setcookie($key,$value,time() + $hour,'','',false,true);
    }

    /**
     * get Cookie
     *
     * @param $key
     * @param null $default
     * @return null
     */
    public static function get($key, $default = null)
    {
        return Func::array_get($_COOKIE,$key,$default);
    }

    /**
     * Check If The Cookie Is exists
     *
     * @param $key
     * @return bool
     */
    public static function has($key)
    {
        return array_key_exists($key,$_COOKIE);
    }

    /**
     * Remove Cookie
     *
     * @param $key
     */
    public static function remove($key)
    {
        self::set($key,'',-1);
        unset($_COOKIE[$key]);
    }

    /**
     * Destroy Cookie
     */
    public static function destroy()
    {
        foreach (array_keys(self::all()) as $key){
            self::remove($key);
        }
        unset($_COOKIE);
    }

    /**
     * Get All Cookies
     * @return array
     */
    public static function all()
    {
        return $_COOKIE;
    }

}