<?php
namespace MRDEVELOPER;


use MRDEVELOPER\Vendor\Router;
use MRDEVELOPER\Vendor\session;

if (!defined('MA_DS')) {
	define('DS',DIRECTORY_SEPARATOR);
}
/**
 *
 */
define('RESOURCES', dirname(realpath(__FILE__)) . DS .'Uploads' .DS . 'Images' .DS );

/**
 *
 */
require_once '..' . DS . 'App' . DS . 'Config.php';
require_once '..'.DS . 'vendor' . DS . 'phpmailer'.DS.'phpmailer'.DS.'PHPMailerAutoload.php';
require_once '..' .DS .'vendor' .DS .'autoload.php';
require_once APP_PATH . "/Vendor/Functions/main.php";
/**
 *
 */
require_once APP_PATH . DS . 'Vendor' . DS . 'AutoLoad.php';
/**
 *
 */
require_once APP_PATH . DS . 'Vendor' . DS . 'Language' . DS . 'Lang.php';

/**
 * Create New object From Router Class
 */
$session = new session();
$router = new Router();
/**
 * Start Url Router
 */
$router->DisPatch();
/**
 * Session Start Object
 */
$session->start();
