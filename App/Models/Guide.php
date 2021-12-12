<?php

namespace MRDEVELOPER\Models;


/**
 * Class Guide
 * @package MRDEVELOPER\Models
 */

class Guide extends Model
{

    /**
     * @var string
     */
    protected static $key = 'id';
    /**
     * @var string
     */
    protected static $table = 'guide';
    /**
     * @var array
     */
    protected static $columns = [
        'title',
        'place_address',
        'desc',
        'phone',
        'mail',
        'dir',
        'photos',
        'search_word',
        'category',
        'pay_way',
        'logo',
        'type',
        'food_menu'
    ];
}