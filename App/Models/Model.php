<?php

namespace MRDEVELOPER\Models;

use MRDEVELOPER\Vendor\Database\Database;
use MRDEVELOPER\Vendor\Helper\Filter;

/**
 * Class Model
 * @package MRDEVELOPER\Models
 */
abstract class Model
{



    /**
     * get Table name
     * @var string
     */
    protected static $table;

    /**
     * @var string id
     */
    protected static $key;
    /**
     * get dataBase Methods
     * @var Database
     */
    protected static $connection;

    /**
     * @var string
     */
    protected static $columns;

    /**
     * @var array
     */
    protected static $error = [];

    /**
     * @var int
     */
    protected static $lastID;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        static::$connection = new Database();
    }

    /**
     * @return array|null|\stdClass
     */
    public static function all()
    {
        return self::connection()->fetchAll(static::$table);
    }

    /**
     * @param string $order
     * @return array|null|\stdClass
     */
    public static function order($order = "DESC")
    {
        $order = Filter::String($order);
        return self::connection()->orderBy(static::$key,$order)->fetchAll(static::$table);
    }


    /**
     * @param $column
     * @param $id
     * @return null|\stdClass
     */
    public static function where($column, $id)
    {
        return self::connection()->select("*")->from(static::$table)->where($column .' = ?',$id)->fetch(static::$table);
    }

    /**
     * @param $column
     * @param $id
     * @return $this
     */
    public static function delete($column, $id)
    {
        return self::connection()->where($column . ' = ?', $id)->from(static::$table)->delete();
    }

    /**
     * @return array
     */
    public static function getError()
    {
        return static::$error;
    }

    /**
     * @param array $params
     * @return Database
     */
    public static function insert($params = [])
    {
        $insert = self::connection()->data($params)->insert(static::$table);
        static::$error = $insert->getError();
        static::$lastID = $insert->getLastID();
        return $insert;
    }

    /**
     * @param array $params
     * @param $id
     * @return Database
     */
    public static function update($params = [], $id = null)
    {
        if ($id)
            return static::connection()->data($params)->where(static::$key . " = ?" ,$id)->update(static::$table);
        else
            return static::connection()->data($params)->update(static::$table);
    }



    /**
     * @param $key
     * @return mixed
     */
    public static function getColumn($key)
    {
        $key = str_replace("-","_",$key);
        return static::$columns[$key];
    }
    /**
     * @return string
     */
    public static function getTable()
    {
        return static::$table;
    }

    /**
     * @return string
     */
    public static function getKey()
    {
        return static::$key;
    }

    /**
     * @return int
     */
    public static function getLastID()
    {
        return static::$lastID;
    }

    /**
     * Get Database Methods
     *
     * @return Database
     */

    protected static function connection(){
       return static::$connection =  $db = new Database();
    }
}