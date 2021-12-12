<?php
namespace MRDEVELOPER\Controllers\Admin;


use MRDEVELOPER\Controllers\Controller;
use MRDEVELOPER\Models\Guide;

/**
 * Class GuideController
 * @package MRDEVELOPER\Controllers\Admin
 */
class GuideController extends Controller
{

    public function index()
    {
        $this->Data['Name'] = "كل الأماكن";
        $this->Data['javascript'] =[DataTable("desc")];
        $this->Data['guides'] = Guide::order("DESC");
        return $this->View();
    }

    public function all()
    {
        $this->setAction("index");
        $this->index();
    }

    public function add()
    {
        $this->Data['css'] = "dropzone";
        $this->Data['script'] = "dropzone";
        if (post('add')){
            $title = string(post("title"));

        }
        $this->View();
    }

    public function edit()
    {
        $this->View();
    }

}