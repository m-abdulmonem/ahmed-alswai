<?php

namespace MRDEVELOPER\Models;

/**
 * Class CategoryModel
 * @package MRDEVELOPER\Models
 */

class Category extends Model
{

    /**
     * @var string
     */
    protected static $table = "category";

    /**
     * @var string
     */
    protected static $key = "id";

    /**
     * @var array
     */
    protected static $columns = [
        'main_title',
        'sub_id',
        'desc'
    ];

}