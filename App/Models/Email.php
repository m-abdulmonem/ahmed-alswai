<?php

namespace MRDEVELOPER\Models;
/**
 * Class EmailModel
 * @package AlMOSTAQBAL\Models
 */

class Email extends Model
{

    /**
     * @var string
     */
    protected static $key = "id";
    /**
     * @var string
     */
    protected static $table = "email_settings";

    /**
     * @var array
     */
    protected static $columns = [
        'host',
        'smtpAuth',
        'username',
        'password',
        'smtpSecure',
        'port',
        'active'
    ];

}