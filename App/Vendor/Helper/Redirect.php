<?php
namespace MRDEVELOPER\Vendor\Helper;
use MRDEVELOPER\Vendor\Http\Request;

/**
 * Class Redirect
 * @package MAECOMMERCE\Vendor\Helper
 */
class Redirect
{


    /**
     * @param $url
     */
    public static function redirect($url = "/")
    {
        if (self::referer() === null){
            self::location($url);
        } else{
            self::back("");
        }
    }

    /**
     * Back To url is going from it
     * @param $uri
     */
    public static function back(string $uri = "/")
    {
        $url = Request::server('HTTP_REFERER');
        if ($url != null)
            self::location($url);
        else
            self::location($uri);
    }

    /**
     * Reload Page
     * @param $time
     * @param $url
     */
    public static function reload($time, $url)
    {
        header("refresh: $time;url: $url");
    }

    /**
     * Redirect To Given Page
     * @param $url
     */
    public static function location($url)
    {
        header("Location: $url");
        exit();
    }


    /**
     * @return mixed
     */
    public static function referer()
    {
        return Request::server('HTTP_REFERER');
    }

}