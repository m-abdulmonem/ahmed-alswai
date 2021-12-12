<?php
namespace MRDEVELOPER\Controllers;

use MRDEVELOPER\Vendor\Language\Lang;

/**
 * Class PageController
 * @package AlMOSTAQBAL\Controllers
 */
class PageController extends Controller
{
    public function index()
    {
        echo "Welcome";
    }
    public function pages()
    {
        $this->View();
    }
    public function page()
    {
        echo "This Is Page";
    }
    public function MA_Aboutus_Action()
    {
        $this->Data['MA_Page_Name'] = Lang::lang("ABOUT_US");
        $this->View();
    }

    public function MA_Contactus()
    {
        $this->Data['MA_Page_Name'] = Lang::lang("CONTACT_US");
    }

}