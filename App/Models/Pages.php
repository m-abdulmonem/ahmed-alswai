<?php
namespace MRDEVELOPER\Models;

/**
 * Class PageModel
 * @package AlMOSTAQBAL\Vendor
 */
class Pages extends Model
{

    /**
     * @var string
     */
    protected static $key = 'id';
    /**
     * @var string
     */
    protected static $table = 'pages';
    /**
     * @var array
     */
    protected static $columns = [
        'title', 'content', 'visitor', 'permlink'
    ];

}