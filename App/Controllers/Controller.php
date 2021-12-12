<?php
namespace MRDEVELOPER\Controllers;


use MRDEVELOPER\Vendor\Database\Database;
use MRDEVELOPER\Vendor\Helper\Filter;
use MRDEVELOPER\Vendor\Helper\Redirect;
use MRDEVELOPER\Vendor\Helper\upload;
use MRDEVELOPER\Vendor\Http\Request;
use MRDEVELOPER\Vendor\Router;
use MRDEVELOPER\Vendor\session;

/**
 * Class Controller
 * @package MRDEVELOPER\Controllers
 */
class Controller
{
    /**
     * Template Path
     *
     * @var string
     */
    const Temp = APP_PATH . DS . 'Template' . DS;
    /**
     * @var string
     */
    protected $_Controller;
    /**
     * @var string
     */
    protected $_Action;
    /**
     * @var string
     */
    protected $_Params;
    /**
     * @var bool
     */
    protected $_Admin;
    /**
     * @var array
     */
    protected $Data = [];
    /**
     * Content View
     *
     * @var string
     */
    protected $view;
    /**
     * @var string
     */
    protected $Page;
    /**
     * Controller constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param $prop
     * @param $val
     */
    public function __set($prop, $val)
    {
        $this->haeder();
        require_once $this->getNotFoundPath();
        $this->footer();
    }

    /**
     * @param $prop
     */
    public function __get($prop)
    {
        $this->haeder();
        require_once $this->getNotFoundPath();
        $this->footer();
    }

    /**
     * @param $method
     * @param $params
     */
    public function __call($method, $params)
    {
        $this->haeder();
       require_once $this->getNotFoundPath();
       $this->footer();
    }

    /**
     *
     */
    public function NotFound()
    {

        if (isset($this->_Admin)) {
            if (!empty($this->_Admin)) {
                if ($this->_Admin)
                    $this->Data['page'] = "/admin/";
                else
                    $this->Data['page'] = "/";
            }
        }
        $this->View();
    }

    public function setPage($page)
    {
        $this->Page = $page;
    }
    /**
     * @param $MA_Controller_Name
     */
    public function setController($MA_Controller_Name)
    {
        $this->_Controller = $MA_Controller_Name;
    }

    /**
     * @param bool $bool
     */
    public function setAdmin($bool)
    {
        $this->_Admin = $bool;
    }

    /**
     * @param $MA_Action
     */
    public function setAction($MA_Action)
    {
        $this->_Action = $MA_Action;
    }

    /**
     * @param $MA_Params
     */
    public function setParams($MA_Params)
    {
        $this->_Params = $MA_Params;
    }

    /**
     *
     */
    protected function View()
    {
        $this->getView();
        if ($this->_Action == Router::NOT_FOUND or $this->_Controller == Router::NOT_FOUND) {
            $this->Data['Name'] = "Error 404 ):";
            if ($this->_Admin){
                $this->getAdminPath(true);
            } else{
                $this->getSitePath(true);
            }
        } else {
            if (file_exists($this->view)) {
                if ($this->_Admin) {
                    $this->getAdminPath(false);
                } else {
                    $this->getSitePath(false);
                }
            } else {
                $this->Data['Name'] = "Error 404 ):";
                if ($this->_Admin) {
                    $this->adminHeader();
                    require self::Temp . "Admin" . DS . "navBar.php";
                    require_once $this->getNotFoundPath();
                    $this->adminFooter();
                } else
                {
                    $this->haeder();
                    require $this->getNotFoundPath();
                    $this->footer();
                }
            }
        }
    }

    /**
     * get Admin Layout
     * @internal param bool|null $notFoundPath
     * @param $notFound
     */
    private function getAdminPath($notFound = false)
    {
        if (session::has('MR_DEVELOPER_ADMIN'))
            $this->admin($notFound);
        else
        {
            if (session::has("MR_DEVELOPER_ADMIN_ID")) {
                if (Request::server('REQUEST_URI') == "/auth/lock-screen")
                    $this->lock();
                else
                    Redirect::location("/auth/lock-screen");
            } else
                Redirect::location("/auth/login/?url=".window_link());
        }
    }


    /**
     *
     */
    private function lock(){
        extract($this->Data);
        $this->adminHeader();
        require_once VIEWS_PATH . "Admin" . DS . "Home" . DS . "Lockscreen.View.php";
        $this->adminFooter();
    }

    /**
     *
     */
    private function haeder()
    {
        extract($this->Data);
        require_once self::Temp . 'Site' . DS . 'header.php';
    }

    /**
     *
     */
    private function adminHeader(){
        extract($this->Data);
        require_once self::Temp . 'Admin' . DS . 'header.php';
    }

    /**
     *
     */
    private function footer(){
        extract($this->Data);
        require_once self::Temp . 'Site' .DS . 'footer.php';
    }

    /**
     *
     */
    private function adminFooter(){
        extract($this->Data);
        require_once self::Temp . 'Admin' . DS . 'footer.php';
    }

    /**
     * @internal param $notFoundPath
     * @param bool $notFound
     */
    private function admin($notFound = false)
    {
        extract($this->Data);
        $this->adminHeader();
        require_once self::Temp . 'Admin' . DS . 'navBar.php';
        if ($notFound) {
            require_once $this->getNotFoundPath() ;
        } else {
            require_once $this->view;
        }
        $this->adminFooter();
    }

    /**
     * get User InterFace Layout
     *
     * @param bool $notFound
     */
    private function getSitePath($notFound = false)
    {
        if (settings()['status'] == 1){
            require_once  VIEWS_PATH . "Extras" . DS . "Maintenance.View.php";
        } else {
            extract($this->Data);
            $this->haeder();
            if ($notFound) {
                require_once $this->getNotFoundPath();
            } else {
                require_once $this->view;
            }
            $this->footer();
        }
    }

    /**
     * Get Content View path
     * @return string
     */
    private function getView(){
        if ($this->_Admin) {
            $View = VIEWS_PATH . "Admin" . DS . ucfirst($this->_Controller) . DS . ucfirst(str_replace('-','',$this->_Action)) . '.View.php';
        } else {
            $View = VIEWS_PATH . ucfirst($this->_Controller) . DS . ucfirst(str_replace('-', '', $this->_Action)) . '.View.php';
        }
        return $this->view = $View;
    }

    /**
     * Get Not Found path
     * @return string
     */
    private function getNotFoundPath(){
        return VIEWS_PATH . 'NotFound' . DS . 'NotFound.View.php';
    }

    /**
     * @return string
     */
    public function getReturnUrl(): string
    {
        return Filter::url(get("url"));
    }


    /**
     * @return Database
     */
    protected function connection(){
        return new Database();
    }

    /**
     * @return false|string
     */
    protected function now(){
        return date("Y-m-d H:i:s");
    }

    /**
     * @return upload
     */
    protected function uploadImg(){
        return new upload();
    }

    /**
     * @return upload
     */
    protected function images(){
        return new upload("img","s");
    }
}