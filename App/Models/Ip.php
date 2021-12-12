<?php

namespace MRDEVELOPER\Models;

/**
 * Class Ip
 * @package MRDEVELOPER\Models
 */
class Ip extends Model
{

    /**
     * @var string
     */
    protected static $table = "ip";
    /**
     * @var string
     */
    protected static $key = 'id';

    /**
     * @var array
     */
    protected static $columns = [
        'ip',
        'block',
        'user_id'
    ];
}