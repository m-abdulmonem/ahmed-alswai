<?php

namespace MRDEVELOPER\Controllers\Admin;

use MRDEVELOPER\Controllers\Controller;
use MRDEVELOPER\Models\Pages;
use MRDEVELOPER\Vendor\Helper\Filter;
use MRDEVELOPER\Vendor\Helper\Redirect;
use MRDEVELOPER\Vendor\session;

/**
 * Class PagesController
 * @package MAECOMMERCE\Controllers
 */
class PagesController extends Controller
{

    public function index()
    {
        $this->Data['Name'] = "الصفحات";
        $this->Data['javascript'] = [DataTable("desc")];
        $this->Data['Pages'] = Pages::order("DESC");
        $this->view();
    }

    public function add()
    {
        $this->Data['Name'] = "إضافة صفحة جديدة";
        if (isset($_POST['add'])){
            $title = Filter::String($_POST['title']);
            $content = Filter::html($_POST['content']);

            $errors = [];
            $page = Pages::where('title',$title);
            if ($page){
                if (!strpos('-',$page['title'])){
                    for ($i = 0; $i <= count($page); $i++)
                        $title .= "-" . $i;
                }
            }
            $permLink = Filter::spaceToMains($title);
            if (empty($title))
                $errors[] = "عفوا لايجب ترك إسم الصفحة فارغ";
            if (! Filter::isString($title))
                $errors[] = "برجاء كتابة عنوان صحيح";

            if (empty($errors)){
                $add = Pages::insert([
                    'title'    => $title,
                    'content'  => $content,
                    'permLink' => $permLink
                ]);
                $last_id = Pages::getLastID();
                if ($add){
                    session::set("PAGE_ADDED","<div class='alert alert-success'>تم إضافة صفحة جديدة </div>") ;
                    session::set("PAGE_ADDED_TIME",time()+300);
                    redirect("/admin/pages/edit/" . $last_id);
                }else{
                    $errors[] = "لم يتم إضافتة الصفحة";
                }
            }

            if (! empty($errors)){
                foreach ($errors as $error){
                    $error = "<div class='alert alert-danger'>" . $error . "</div>";
                }
                $this->Data['error'] = $error;
            }
        }
        $this->view();
    }

    public function remove()
    {
        $id = post('id');
        $id = Filter::int($id);
        $page = Pages::where('id',$id);
        if ($page['id'] && isset($id) && Filter::isInt($id)) {
            $delete = Pages::delete('id',$id);
            if ($delete){
                $msg = "تم حذف الصفحة بنجاح";
            } else{
                $msg = "لم يتم حذف الصفحة";
            }
        } else{
            $msg = "عفوا لا يمكن حذف الصفحة لوجد مشكلة";
        }
        echo $msg;
    }
    
    public function edit()
    {

        $this->Data['Name'] = "تعديل الصفحة";
        $id  = Filter::int($this->_Params[0]);
        $this->Data['page'] = Pages::where('id',$id);
        $page =  Pages::where('id',$id);
        if ($page['id'] && isset($id) && Filter::isInt($id)) {
            if (isset($_POST['save'])) {
                $title = Filter::String($_POST['title']);
                $content = Filter::html($_POST['content']);
                $link = Filter::spaceToMains($title);
                $errors = [];
                $page = Pages::where('title', $title);
                if ($page) {
                    $errors[] = "عفوا هذه الصفحة موجوده مسبقا";
                }
                if (empty($title)) {
                    $errors[] = "عفوا لايجب ترك إسم الصفحة فارغ";
                }
                if (empty($errors)) {
                    $add = $this->connection()->data([
                        'title' => $title,
                        'content' => $content,
                        'permLink' => $link
                    ])->where('id = ?', $id)->update('page');
                    if ($add) {
                        $this->Data['msg'] = "<div class='alert alert-success'>تم حفظ الصفحة  </div>";
                    } else {
                        $errors[] = "لم يتم حفظ الصفحة";
                    }
                } else {
                    foreach ($errors as $error) {
                        $error = "<div class='alert alert-danger'>" . $error . "</div>";
                    }
                    $this->Data['error'] = $error;
                }
            }
            $this->View();
        } else{
            Redirect::redirect('/admin/pages');
        }
    }


}