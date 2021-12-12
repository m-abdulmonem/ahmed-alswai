<?php
namespace MRDEVELOPER\Controllers;


use MRDEVELOPER\Vendor\Helper\Filter;
use MRDEVELOPER\Vendor\session;

class AjaxController extends Controller
{


    public function lang()
    {
        $param = Filter::String($this->_Params[0]);
        if ($param && isset($param) && Filter::isString($param)){
            if (session::has("MR_DEVELOPER") or session::has("MR_DEVELOPER_ADMIN")){
                $this->connection()->data(['lang' => $param])
                    ->where("UserId = ? ", session::get("MR_DEVELOPER_ID") or session::get("MR_DEVELOPER_ADMIN_ID"))
                    ->update('users');
            } else {
                $lang = $this->connection()->data(['lang' => $param])->where('MA_ID = ?', 1)->update('ma_settings');
                if ($lang) {
                    $msg = "Lang is Changed";
                } else {
                    $msg = "lang Is Not Changed";
                }
            }
        }
        return $msg;
    }

    public function addpage()
    {
        echo "params";
        var_dump($this->_Params);
////        echo $_GET['title'] . "<br>";
////        echo $_GET['link'] . "<br>";
//        echo $_GET['content'];
    }

}