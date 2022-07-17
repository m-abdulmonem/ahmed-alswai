<?php

namespace MRDEVELOPER\Vendor\Helper;

/**
 * Class Filter
 * @package AlMOSTAQBAL\Vendor\Helper
 */

class Filter
{


    /**
     * Sanitize String
     * @param $string
     * @return string
     */
    public static function String($string): string
    {
        $str = preg_replace('/\x00|<[^>]*>?/', '', $string);
        return (string) str_replace(["'", '"'], ['&#39;', '&#34;'], $str);
    }

    /**
     * @param $data
     * @return bool
     */
    public static function isString($data)
    {
        return is_string($data);
    }

    /**
     * @param int $data
     * @return int
     */
    public static function int($data)
    {
        if (self::isInt($data))
            return filter_var($data, FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_ALLOW_FRACTION);
        else
            return false;
    }

    /**
     * @param int $data
     * @return bool
     */
    public static function isInt($data)
    {
        return is_numeric($data);
    }

    /**
     * @param string $data
     * @return string
     */
    public static function email(string $data)
    {
        if (self::isEmail($data))
            return filter_var($data, FILTER_SANITIZE_EMAIL);
        else
            return false;
    }

    /**
     * @param string $data
     * @return bool
     */
    public static function isEmail(string $data)
    {
        return filter_var(($data), FILTER_VALIDATE_EMAIL);
    }

    /**
     * @param string $data
     * @return string
     */
    public static function url( $data)
    {
        if (self::isUrl($data))
            return filter_var($data,FILTER_SANITIZE_URL);
        else
            return false;
    }

    /**
     * @param string $data
     * @return bool
     */
    public static function isUrl(string $data)
    {
        return filter_var(($data), FILTER_VALIDATE_URL);
    }

    /**
     * @param $data
     * @return string
     */
    public static function html($data)
    {
        return htmlspecialchars($data);
    }


    /**
     * @param $data
     * @return string
     */
    public static function htmlToString($data)
    {
        return htmlentities(self::String($data));
    }


    /**
     * @param $data
     * @param string $filter
     * @return mixed
     */
    public static function spaceToMains($data, $filter = "string")
    {
        if ($filter == "int")
            return str_replace(' ','-',self::int($data));
        else
            return str_replace(' ','-',self::String($data));
    }

    /**
     * @param $data
     * @return mixed
     */
    public static function bool($data)
    {
        return self::String(is_bool($data));
    }

    /**
     * @param $data
     * @return bool
     */
    public static function is_null($data)
    {
        return is_null($data);
    }

    /**
     * @param $data
     * @return bool
     */
    public static function empty($data)
    {
        return empty($data);
    }

    public static function isArray($data)
    {
       $data = self::String($data);
       return is_array($data);
    }


}