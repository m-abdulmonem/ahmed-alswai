<?php
namespace MRDEVELOPER\Controllers\Admin;

use MRDEVELOPER\Controllers\Controller;
use MRDEVELOPER\Models\Home;
use MRDEVELOPER\Vendor\Helper\Filter;
use MRDEVELOPER\Vendor\Helper\Redirect;

/**
 * Class HomeController
 * @package MRDEVELOPER\Controllers\Admin
 */
class HomeController extends Controller
{


    public function index()
    {
        $this->Data['Name'] = "الصور المتحركة";
        $this->Data['javascript'] = ['<script>$(function() { $("#example1").DataTable(); })</script>'];
        $this->Data['sliders'] = Home::all();
        $this->View();
    }


    public function addslider()
    {
        $this->Data['Name'] = "إضافة صورة متحركة";
        if (isset($_POST['add'])){
            $title = Filter::String($_POST['title']);
            $content = Filter::html($_POST['content']);
            $picture = $this->uploadImg()->hasUpload('image') ? $this->uploadImg()->getUrl() : null;
            $errors = [];
            if (empty($title) && $this->uploadImg()->hasUpload('image') && $this->uploadImg()->isEmpty()){
                $errors[] = "عفوا! كل الحقول مطلوبة";
            }
            if (empty($title)){
                $errors[] = "لا يجب ترك إسم المحتوى فارغا";
            }
            if ($this->uploadImg()->isEmpty()){
                $errors[] = "عفوا لايجب ترك الصورة فارغة";
            }
            if ($this->uploadImg()->hasError()){
                foreach ($this->uploadImg()->getError() as $error) {
                    $errors[] = $error;
                }
            }
            if ($picture !== null){
                $picture = $this->uploadImg()->getUrl()[0];
            }
            if (empty($errors)){
                $add = $this->connection()->data([
                    'title'    => $title,
                    'content'  => $content,
                    'image'    => $picture
                ])->insert('sliders');
                if ($add){
                    $this->Data['added'] = "<div class='alert alert-success'>تم إضافة المحتوى بنجاح</div>";
                } else{
                    $errors[] = "لم يتم إضافة المحتوى ";
                }
            } else{
                foreach ($errors as $error){
                    $error = "<div class='alert alert-danger'>" . $error . "</div>";
                }
                $this->Data['msg'] = $error;
            }
        }
        $this->View();
    }
    
    public function editslider()
    {
        $this->Data['Name'] = "تعديل صورة متحركة";
        $id = Filter::int($this->_Params[0]);
        if ($id && isset($id) && Filter::isInt($id)) {
            $slid = $this->Data['slider'] = Home::where('id', $id);
            if (isset($_POST['update'])){
                $title = isset($_POST['title']) ? Filter::String($_POST['title']) : $slid['title'] ;
                $title = Filter::String($title);
                $content = isset($_POST['content']) ? Filter::html($_POST['content']) : $slid['content'];
                $content = Filter::html($content);
                $picture = $this->uploadImg()->hasUpload('image') ? $this->uploadImg()->getUrl() : $slid['image'];
                $errors = [];
                if (empty($title) && $this->uploadImg()->hasUpload('image') && $this->uploadImg()->isEmpty()){
                    $errors[] = "عفوا! كل الحقول مطلوبة";
                }
                if (empty($title)){
                    $errors[] = "لا يجب ترك إسم المحتوى فارغا";
                }
                if ($this->uploadImg()->isEmpty()){
                    $errors[] = "عفوا لايجب ترك الصورة فارغة";
                }
                if ($this->uploadImg()->hasError()){
                    foreach ($this->uploadImg()->getError() as $error) {
                        $errors[] = $error;
                    }
                }
                if (empty($errors)){
                    $edit = $this->connection()->data([
                        'title'    => $title,
                        'content'  => $content,
                        'image'    => $picture
                    ])->where('id = ?',$id)->update('sliders');
                    if ($edit){
                        $this->Data['updated'] = "<div class='alert alert-success'>تم تعديل المحتوى بنجاح</div>";
                    } else{
                        $errors[] = "لم يتم إضافة المحتوى ";
                    }
                } else{
                    foreach ($errors as $error){
                        $error = "<div class='alert alert-danger'>" . $error . "</div>";
                    }
                    $this->Data['msg'] = $error;
                }
            }
            $this->View();
        } else{
            Redirect::back();
        }
    }

    public function removeslider()
    {
        $id = Filter::int($this->_Params[0]);
        $slider = Home::where('id',$id);
        if ($slider && isset($id) && Filter::isInt($this->_Params[0])){
            $delete = Home::delete('id',$id);
            if ($delete){
                $msg = "تم الحذف بنجاح";
            }else{
                $msg = "لم يتم الحذف بنجاح";
            }
        } else{
            $msg = "i can not do anything for you";
        }
        echo $msg;
    }


    
    

}