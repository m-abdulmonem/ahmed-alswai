<?php

namespace MRDEVELOPER\Models;


/**
 * Class Error
 * @package MRDEVELOPER\Models
 */
class Error extends Model
{

    /**
     * @var string
     */
    protected static $table = "error";
    /**
     * @var string
     */
    protected static $key = 'id';
    /**
     * @var array
     */
    protected static $columns = [
        'place',
        'desc',
        'fixed'
    ];

}