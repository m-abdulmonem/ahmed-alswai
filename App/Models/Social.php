<?php

namespace MRDEVELOPER\Models;

/**
 * Class Social
 * @package MRDEVELOPER\Models
 */
class Social extends Model
{

    /**
     * @var string
     */
    protected static $table = "socials_settings";
    /**
     * @var string
     */
    protected static $key = "id";
    /**
     * @var array
     */
    protected static $columns = [
        'ico',
        'title',
        'url'
    ];


}