<?php
namespace MRDEVELOPER\Models;

/**
 * Class ContactModel
 * @package MRDEVELOPER\Models
 */
class Contact extends Model
{

    /**
     * @var string
     */
    protected static $key = "id";
    /**
     * @var string
     */
    protected static $table = 'contact_settings';

    /**
     * @var array
     */
    protected static $columns = [
        'phone',
    ];
}