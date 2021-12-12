<?php

namespace MRDEVELOPER\Models;

/**
 * Class UsersModel
 * @package MRDEVELOPER\Models
 */
class Users extends Model
{

    /**
     * @var string
     */
    protected static $key = "id";
    /**
     * @var string
     */
    protected static $table = "users";
    /**
     * @var array
     */
    protected static $columns = [
        'username',
        'email',
        'password',
        'desc',
        'status',
        'permission',
        'fullname',
        'picture',
        'dateAtime',
        'permlink',
        'passChange',
        'Activation',
        'ip',
        'email_send',
        'block'
    ];


}