<?php
namespace MRDEVELOPER\Vendor;

use MRDEVELOPER\Models\Pages;
use MRDEVELOPER\Vendor\Http\Request;

/**
 * Class Router
 *
 * @package MRDEVELOPER\Vendor
 */
class Router
{
    /**
     *
     */
	const NOT_FOUND= "NotFound";
    /**
     *
     */
	const NOT_FOUND_CONTROLLER = "MRDEVELOPER\\Controllers\\NotFoundController";
    /**
     * @var string
     */
	private static $url;

    /**
     * @var string
     */
	private $page;
    /**
     * @var string
     */
	private $_Controller = "index";
    /**
     * @var string
     */
	private $_Action = "index";
    /**
     * @var array
     */
    private $_Params = [];
    /**
     * @var bool
     */
    private $_Admin = false;

    /**
     * Router constructor.
     */
    public function __construct()
    {
        self::_ParseUrl();
    }


    /**
     *
     */
    private function _ParseUrl()
	{
	    $uri =  $_SERVER['REQUEST_URI'];
	    if (Request::server('SCRIPT_NAME')){
	       $uri = str_replace(Request::server('SCRIPT_NAME'),'',$uri);
        }
		$Url = explode('/', trim( parse_url($uri , PHP_URL_PATH ) , '/' ),4);
		$permLink =  Pages::where('permLink',$Url[0]) ;
        $permLinkVal = $permLink  != null ? $permLink['permLink'] : "";
        if (!empty($Url[0]) && $Url[0] == $permLinkVal){
            $this->_Controller = "page";
            $this->_Action = "pages";
            $this->_Params = $permLink;
            $this->page = $permLink;
            $this->_Admin =false;
        } else {
            if ($Url[0] == "ma-admin") {
                if (isset($Url[1]) && $Url[1] != '') {
                    $this->_Controller = $Url[1];
                }

                if (isset($Url[2]) && $Url[2] != '') {
                    $this->_Action = $Url[2];
                }

                if (isset($Url[3]) && $Url[3] != '') {
                    $this->_Params = explode('/', $Url[3]);
                }
                $this->_Admin = true;
            } else {
                $Url = explode('/',trim(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH),'/'),3);
                if (isset($Url[0]) && $Url[0] != '') {
                    $this->_Controller = $Url[0];
                }
                if (isset($Url[1]) && $Url[1] != '') {
                    $this->_Action = $Url[1];
                }

                if (isset($Url[2]) && $Url[2] != '') {
                    $this->_Params = explode('/', $Url[2]);
                }

                $this->_Admin = false;
            }
        }
	}
	public function DisPatch(){

        $this->_Action = str_replace('-','',$this->_Action);
        if ($this->_Admin){
            $className = 'MRDEVELOPER\Controllers\\Admin\\' . ucfirst($this->_Controller) . "Controller";
        }
        else{
            $className = 'MRDEVELOPER\Controllers\\' . ucfirst($this->_Controller) . "Controller";
        }
		$Action_Name = strtolower($this->_Action) ;

        new session();


        if (!class_exists($className)) {
            $className = self::NOT_FOUND_CONTROLLER;
        }

        $Controller = new $className();

        /*
         * set Not Found View For Users Requests
         */
        if (!method_exists($Controller, $Action_Name)) {
            $this->_Action = $Action_Name = self::NOT_FOUND;
        }

        $Controller->setPage($this->page);
        $Controller->setController($this->_Controller);
        $Controller->setAdmin($this->_Admin);
        $Controller->setAction($this->_Action);
        $Controller->setParams($this->_Params);
        $Controller->$Action_Name();
	}

}