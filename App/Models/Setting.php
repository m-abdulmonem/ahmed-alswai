<?php
namespace MRDEVELOPER\Models;


use MRDEVELOPER\Vendor\Database\Database;

class Setting extends Model
{

    /**
     * @var Database
     */
    protected static $connection;
    /**
     * @var string
     */
    protected static $key = "id";
    /**
     * @var string
     */
    protected static $table = "settings";

    /**
     * @var array
     */
    protected static $columns = [
        'title',
        'desc',
        'keywords',
        'url',
        'icon',
        'lang',
        'status'
    ];


    /**
     * @param array $params
     * @return Database
     */
    public static function updateSettings($params = [])
    {
        return self::connection()->data($params)->update(static::$table);
    }

}