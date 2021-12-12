<?php

namespace MRDEVELOPER\Vendor;

/**
 * Class session
 * @package AlMOSTAQBAL\Vendor
 */
class session
{

    public function __construct()
    {
        $this->start();
    }

    /**
     * Start The Session
     *
     */
    public function start()
    {
        // ini_set('session.use_only_cookies',1);

        if (!session_id()){
            session_start();
        }
    }

    /**
     * Set Session
     *
     * @param $key
     * @param $value
     */
    public static function set($key, $value)
    {
        $key = strtoupper($key);
        $_SESSION[$key] =  $value;
    }

    /**
     * get Session
     *
     * @param string $key
     * @param null $default
     * @return null
     */
    public static function get(string $key, $default = null)
    {
        $key = strtoupper($key);
        return array_get($_SESSION,$key,$default);
    }

    /**
     * Check If The Key Are exists Or Not
     *
     * @param $key
     * @return bool
     */
    public static function has($key = "MR_DEVELOPER_ADMIN")
    {
        $key = strtoupper($key);
        return isset($_SESSION[$key]);
    }

    /**
     * @param $key
     * @return mixed
     */
    public static function isNull($key)
    {
        $key = strtoupper($key);
        return @$_SESSION[$key];
    }

    /**
     * Remove Session By key
     *
     * @param $key
     */
    public static function remove($key)
    {
        $key = strtoupper($key);
        unset($_SESSION[$key]);
    }

    /**
     *  Return Session Value And Than Remove session key
     * @param $key
     * @return null
     */
    public static  function pull($key)
    {
        $key = strtoupper($key);
        $value = self::get($key);
        self::remove($key);
        return $value;
    }

    /**
     * Destroy All Sessions
     */
    public static function destroy()
    {
        session_destroy();
        unset($_SESSION);
    }

    /**
     * get All Sessions
     *
     * @return array
     */
    public static function all()
    {
        return $_SESSION;
    }

}