<?php
namespace MRDEVELOPER\Models;

/**
 * Class Alphabet
 * @package MRDEVELOPER\Models
 */
class Alphabet extends Model
{

    /**
     * @var string
     */
    protected static $key = "id";
    /**
     * @var string
     */
    protected static $table = "alphabet";

    /**
     * @var array
     */
    protected static $columns = [
        'title',
        'desc',
        'guide',
        'permissions',
    ];

}