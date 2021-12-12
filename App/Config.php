<?php
namespace MRDEVELOPER\Vendor;
if (!defined('DS')) {
	define('DS', DIRECTORY_SEPARATOR);
}

/*
 * Application Constants
 */
define('APP_PATH', dirname(realpath(__FILE__)));

/*
 * Views Constants
 */
define('VIEWS_PATH', APP_PATH . DS . 'Views' . DS);

/*
 * Template Constants
 */
define('TEMP_PATH', APP_PATH . DS . 'Template' . DS);

/*
 * DataBase Configure.
 */
defined("DATABASE_HOST_NAME")   ? null : define("DATABASE_HOST_NAME", "localhost");
defined("DATABASE_USER_NAME")   ? null : define("DATABASE_USER_NAME", "root");
defined("DATABASE_PASSWORD")    ? null : define("DATABASE_PASSWORD", "");
defined("DATABASE_DB_NAME")     ? null : define("DATABASE_DB_NAME", "ahmedAlSwai");
defined("DATABASE_PORT_NUMBER") ? null : define("DATABASE_PORT_NUMBER", 3306);
defined("DATABASE_CONN_DRIVER") ? null : define("DATABASE_CONN_DRIVER", 1);
