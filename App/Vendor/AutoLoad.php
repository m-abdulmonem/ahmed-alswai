<?php
namespace MRDEVELOPER\Vendor;

/**
 * Class Autoload
 *
 * @package AlMOSTAQBAL\Vendor
 */
class Autoload
{
	
	public static function Autoload($ClassName)
	{
        $ClassName = str_replace('MRDEVELOPER', '', $ClassName);
        $ClassName = str_replace('\\', '/', $ClassName);
        $ClassName = $ClassName . '.php';
//		echo $ClassName;
		if (file_exists(APP_PATH . $ClassName)) {
			require APP_PATH . $ClassName;
		}
		
	}
}
spl_autoload_register(__NAMESPACE__ . '\Autoload::Autoload');