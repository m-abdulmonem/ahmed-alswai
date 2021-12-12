<?php

namespace MRDEVELOPER\Controllers;


use MRDEVELOPER\Models\Error;
use MRDEVELOPER\Models\Ip;
use MRDEVELOPER\Vendor\Cookie;
use MRDEVELOPER\Vendor\Helper\Filter;
use MRDEVELOPER\Vendor\Helper\Helper;
use MRDEVELOPER\Vendor\Helper\Redirect;
use MRDEVELOPER\Vendor\Http\EmailTemplate;
use MRDEVELOPER\Vendor\Http\Request;
use MRDEVELOPER\Vendor\Language\Lang;
use MRDEVELOPER\Vendor\session;
use MRDEVELOPER\Models\Users;

class AuthController extends Controller
{

    public function index()
    {
        pre(Request_Uri());
//        Redirect::back('/');
    }




    public function login()
    {
        if (session::has("MR_DEVELOPER_ADMIN"))
            Redirect::back('/admin');
        if (!session::has("MR_DEVELOPER")) {
            $this->Data['Name'] = Lang::lang("LOGIN");
            if (isset($_POST['login'])) {

                $auth = Filter::String(Request::post('user'));
                $pass = Filter::String(Filter::htmlToString(Request::post('pass')));
                $redirect = isset($this->_Params[0]) && ! empty($this->_Params[0]) && Filter::isUrl($this->_Params[0]) ? Filter::url($this->_Params[0]) : "/";
                if (!Filter::isEmail($auth)){
                    $user = Filter::String(Filter::htmlToString($auth));
                    $Login = Users::where(Users::getColumn(0),$user);
                }
                else {
                    $email = Filter::email(Filter::String($auth));
                    $Login = Users::where(Users::getColumn(1),$email);
                }

                $errors = [];


                if (empty($user) && empty($pass))
                    $errors[] = Lang::lang("FORM_ERROR_EM");
                if (empty($user))
                    $errors[] = Lang::lang("USER_ERROR_EM");
                if (empty($pass))
                    $errors[] = Lang::lang("PASS_ERROR_EM");
                if (($user != $Login['username']) && $pass != $Login['password'])
                    $errors[] = Lang::lang("LOGIN_INVALID");
                if (!Filter::isString($user))
                    $errors[] = Lang::lang("user_must_string");
                if ($user != $Login['username'])
                    $errors[] = Lang::lang("USER_ERROR_dr");
                if (!password_verify($pass, $Login['password']))
                    $errors[] = Lang::lang("pass_error_dr");
                if ($Login['status'] == 0)
                    $errors[] = Lang::lang("login_activation");
                if ($Login['permission'] == 1)
                {
                    if (empty($errors))
                    {
                        if (Helper::isset(Request::post("session")) or Request::post("session") === "session"){
                            Cookie::set("MR_DEVELOPER_ADMIN",$Login['username'],60*60);
                            Cookie::set("MR_DEVELOPER_ADMIN_ID",$Login['id'],60*60);
                        } else {
                            session::set("MR_DEVELOPER_ADMIN", $Login['username']);
                            session::set("MR_DEVELOPER_ADMIN_ID", $Login['id']);
                        }
                        Redirect::location($redirect);
                    }
                }
                else
                {
                    if (empty($errors))
                    {
                        if (Helper::isset(Request::post("session")) or Request::post("session") === "session"){
                            Cookie::set("MR_DEVELOPER",$Login['username'],60*60);
                            Cookie::set("MR_DEVELOPER_ID",$Login['id'],60*60);
                        } else {
                            session::set("MR_DEVELOPER", $Login['username']);
                            session::set("MR_DEVELOPER_ID", $Login['id']);
                        }

                        redirect($this->getReturnUrl());
                    }
                }

                if (!empty($errors))
                {
                    foreach ($errors as $error) {
                        $error = "<div class='alert alert-danger'> " . $error . " </div>";
                    }
                    $this->Data['error'] = $error;
                }
            }
            $this->View();
        } else{
            Redirect::back("/");
        }
    }

    public function register()
    {
        if (session::has("MR_DEVELOPER_ADMIN"))
            Redirect::back('/');
        if (!session::has("MR_DEVELOPER"))  {
            $this->Data['Name'] = "إنشاء حساب جديد";
            if (isset($_POST['register'])) {

                $Name    = filter::String($_POST['name']);
                $User    = filter::String($_POST['user']);
                $Email   = filter::email($_POST['email']);
                $Pass    = filter::String($_POST['pass']);
                $rePass  = filter::String($_POST['repass']);
                $code    = ma_hash(rand(0,100000));
                $errors  = array();

                $isUserNotExists = Users::where(Users::getColumn(0),$User);

                if (empty($Name) && empty($User) && empty($Pass) && empty($rePass)) {
                    $errors[] = Lang::lang("FORM_ERROR_EM");
                }
                if (empty($Name)) {
                    $errors[] = Lang::lang("NAME_ERROR_EM");
                }
                if (empty($User)) {
                    $errors[] = Lang::lang("USER_ERROR_EM");
                }
                if (empty($Email)) {
                    $errors[] = Lang::lang("EMAIL_ERROR_EM");
                }
                if (empty($Pass)) {
                    $errors[] = Lang::lang("PASS_ERROR_EM");
                }
                if (empty($rePass)) {
                    $errors[] = Lang::lang("RE_PASS_ERROR_EM");
                }

                if (strlen($User) < 4){
                    $errors[] = Lang::lang("USER>4");
                }
                if (strlen($Pass) < 6) {
                    $errors[] = Lang::lang("pass>6");
                }
                if (($rePass != $Pass) or ($Pass != $rePass)) {
                    $errors[] = Lang::lang("pass_not_match");
                }
                if (!Filter::isEmail($Email))
                    $errors[] = Lang::lang("register_invalid_mail");
                if ($Email == $isUserNotExists['email'])
                    $errors[] = Lang::lang("EMAIL_EXISTS");
                if ($User == $isUserNotExists['username'])
                    $errors[] = Lang::lang("user_EXISTS");
                if (!Filter::isEmail($Email)){
                    $errors[] = Lang::lang("VALID_EMAIL");
                }


                if (empty($errors)) {
                    $Add_User = Users::insert([
                        'username'        => $User,
                        'password'        => pass_hash($Pass),
                        'email'           => $Email,
                        'status'          => 0,
                        'fullname'        => $Name,
                        'permission'      => 3,
                        'ip'              => Request::server("REMOTE_ADDR"),
                        'passChange'      => $code,
                        'Activation'      => $code,
                        'picture'         => '/Site/images/avatar5.png',
                        'dateAtime'       => now()
                    ]);
                    if ($Add_User) {
                        $email = Request::mail($Email,Lang::lang("SUBJECT_ACTIVE"),
                            EmailTemplate::Activate(Users::getLastID(),$code,$User));
                        if ($email) {
                            $this->Data['OK'] = "<div class='alert alert-success'>" . Lang::lang("account_created") . "</div>";
                            session::set("active_account",Lang::lang("REGISTER_MSG_OK"));
                            session::set("time",(time() + 900));
                            $email_send = Users::update([Users::getColumn(13)],Users::getLastID());
                            if ($email_send)
                                Redirect::reload(3,Redirect::referer() !== null);
                        } else{
                            $errors[] = Lang::lang("Try_Again");
                            $error = Error::insert([
                              Error::getColumn(0)  => "PhpMailer library",
                              Error::getColumn(1)  => 'When Send Active Message To User This Message Shown '. Request::getMailError(),
                              Error::getColumn(2)  => 0,
                            ]);
                            if ($error)
                                $errors[] = Lang::lang("Try_Again");
                        }
                    } else {
                        $errors[] = Lang::lang("u_have_error");
                    }

                }


                if(!empty($errors)){
                    foreach ($errors as $Error) {
                        $Error = "<div class='alert alert-danger'>" . $Error . "</div>";
                    }
                    $this->Data['error'] = $Error;
                }


            }
            $this->View();
        }
        else
        {
            Redirect::back();
        }
    }

    
    public function logout()
    {
        $this->Data['Name'] = "تسجيل الخرورج";
        if ($_SERVER['HTTP_REFERER'] = "/admin")
        {
            if (session::has("MR_DEVELOPER_ADMIN") or session::has("MR_DEVELOPER_ADMIN_ID")) {
                session::remove("MR_DEVELOPER_ADMIN");
                session::remove("MR_DEVELOPER_ADMIN_ID");
            }else{
                Redirect::redirect("/auth/login");
            }
        }
        else
        {
            if (session::has("MR_DEVELOPER") or session::has("MR_DEVELOPER_ID")) {
                session::remove("MR_DEVELOPER");
                session::remove("MR_DEVELOPER_ID");
            }else{
                Redirect::redirect("/auth/login");
            }
        }
        session::destroy();
        Redirect::location("/auth/login");
    }


    public function activation()
    {
        $this->Data['Name'] = "Activate Your Account";
        $userID = Filter::int($this->_Params[0]);
        $code = Filter::String($this->_Params[1]);

        $user = Users::where('UserId',$userID);

        $this->Data['Name'] = "تفعيل حسابك";
        $errors = array();

        if (!$user){
            $errors[] = "عفوا هذا المستخدم غير موجود";
        }
        if (!Filter::isString($code))
            $errors[] = "عفوا لايمكن تفعيل حسابك";
        if (!Filter::isInt($userID))
            $errors[] = "عفوا لايمكن تفعيل حسابك";
        if ($user['MA_Active_Code'] == $code){
            $active = $this->connection()->data(['Status' => 1])->where('id = ? ',$userID)->update('users');
            if ($active)
            {
                $this->Data['ok'] = "<div class='alert alert-success'><i class='fa fa-check-circle-o'></i> تم تفعيل حسابك</div>";
                Redirect::location("/auth/login");
            }
            else
                $errors[] = "لم يتم تفعيل حسابك";
            if (!empty($errors)){
                foreach ($errors as $error){
                    $error = "<div class='alert alert-danger'><i class='fa fa-times-circle-o'></i>" .$error . "</div>";
                }
                $this->Data['error'] =$error;
            }
        }

        $this->View();
    }



    public function lockscreen()
    {
        $this->Data['Name'] = 'Lock Screen';
        if (!session::has()){
            if (session::has("MR_DEVELOPER_ADMIN_ID")){
                if (session::has())
                    $this->locksession();
                else{
                    if (Filter::isInt(session::get("MR_DEVELOPER_ADMIN_ID")))
                        $id = Filter::int(session::get("MR_DEVELOPER_ADMIN_ID"));

                    $user = $this->Data['member'] = Users::where('UserId', $id);
                    if (Request::post("open")){
                        $pass = Filter::String(Request::post('pass'));

                        if (password_verify($pass,$user['Password'])) {
                            session::set("MR_DEVELOPER_ADMIN",$user['Username']);
                            Redirect::location("/admin");
                        }
                        else
                            $this->Data['error'] = "<div class='alert alert-danger'>Sorry! Password Not Match</div>";
                    }
                }
                $this->View();

            } else{
                Redirect::location('/');
            }
        } else
            Redirect::location("/");

    }

    public function locksession(){

        if (session::has()) {
            session::remove("MR_DEVELOPER_ADMIN");
            Redirect::location('/auth/lock-screen');
        }
    }


    private function session(){
        if (session::has())
            Redirect::location("/");
        if (session::has("MR_DEVELOPER"))
            Redirect::location("/");
    }


    public function forget()
    {
        $this->Data['Name'] = "Recovery Your Password";
        $this->session();
        if (Request::post('send'))
        {
            $uname = Filter::String(Request::post('uname'));
            $errors = [];

            if (Filter::isEmail($uname)) {
                $email = Filter::email($uname);
                $user = Users::where('Email',$email);
            }
            elseif (Filter::isString($uname)){
                $uname = Filter::String($uname);
                $user = Users::where('Username',$uname);
            }


            if (!$user)
                $errors[] = "Sorry! This Username Or Email  Not Exists ";


            if (($uname === $user[Users::getColumn(0)]) or ($email === $user[Users::getColumn(1)])){
                $reset = Request::mail($user[Users::getColumn(1)],'Reset Your Password',EmailTemplate::reset($user[Users::getKey()],$user[Users::getColumn(10)],$user[Users::getColumn(0)]));
                if ($reset)
                {
                    if (time() + 5 > time())
                        $this->Data['ok'] = "<div class='alert alert-success'>Check Your Email,Thank You</div>";
                    else
                        refresh();
                }
                else
                    $errors[] = "Sorry! I Can't Send The Message ";
            }
            if (!Filter::empty($errors)){
                foreach ($errors as $error)
                    $error = "<div class='alert alert-danger'>" . $error. "</div>";
                $this->Data['error'] = $error;
            }
        }
        $this->View();
    }

    public function reset()
    {
        $this->Data['Name'] = "Reset Your Password";
        $this->session();
        $id = Filter::int($this->_Params[0]);
        $code = Filter::String($this->_Params[1]);
        $user = Users::where(Users::getKey(),$id);
        if ($user) {

            if (Helper::isset(post('reset'))){

                $pass = Filter::String(post('pass'));
                $re = Filter::String(post('re'));
                $code = pass_hash(md5(sha1(rand(0,1000),uniqid())));
                $errors = [];

                if ($re !== $pass or $pass !== $re)
                    $errors[] = "Sorry! Password not Match ";
                if (!Filter::isString($pass) or !Filter::isString($pass))
                    $errors[] = "Pleas! Enter A Valid Password";
                if (Filter::empty($pass) && Filter::empty($re))
                    $errors[] = "Sorry! All Fields Are Require";
                if (Filter::empty($pass))
                    $errors[] = "Sorry! Password Is Require";
                if (Filter::empty($re))
                    $errors[] = "Sorry! repeat Password Is Require";
                if (password_verify($pass,$user['Password']))
                    $errors[] = "Sorry! please Select  New Password";


                if (empty($errors)){
                    $userU = Users::update([
                        'password'     => pass_hash($pass),
                        'passChange'   => $code
                    ],$id);

                    if ($userU) {
                        $ip = Ip::insert([
                            'ip'        => ip(),
                            'block'     => 0
                        ]);

                        if ($ip){
                            $reset = Request::mail($user[Users::getColumn(1)],"Your Password Has Been Changed",EmailTemplate::rested($user[Users::getKey()],$user[Users::getColumn(0)],ip()));
                            if ($reset){
                                Cookie::set("SUCCESS_RESET","Your Password Has Been Updated",120);
                                redirect("/auth/login");
                            }else
                                $errors[] = "Sorry! I Can't Change Your Password ";
                        }
                        else
                            $errors[] = "Please try Again";
                    }
                    else
                        $errors[] = "Sorry! I Can't Change Your Password";
                }


                if (!Filter::empty($errors)){
                    foreach ($errors as $error)
                        $error = "<div class='alert alert-danger'>" . $error . "</div>";
                    $this->Data['error'] = $error;
                }
            }
            $this->View();
        }else
            Redirect::location('/');
    }


    public function notme()
    {
        $this->Data['Name'] = "Stop Your Account";
        $id = Filter::int(@$this->_Params[0]);
        $ip = Filter::int(@$this->_Params[1]);
        $user = Users::where('UserId',$id);
        if ( Helper::isset($id)&& Filter::isInt($id) && $user && Helper::isset($ip)  && Filter::isInt($ip)) {

            $stop = $this->connection()->data(['Blocked' => 1])->where('UserId  = ?',$id)->update('users');
            if ($stop){
                $insert = $this->connection()->data([
                    'ip'        => $ip,
                    'blocked'   => 1
                ])->insert('ip');
                if ($insert){
                    session::set("ACCOUNT_STOPPED","Your Account Has Been Stop");
                    session::set("STOPPED_TIME",time()+800);
                    if (session::has()){
                        session::remove("MR_DEVELOPER_ADMIN");
                        session::remove("MR_DEVELOPER_ADMIN_ID");
                    } elseif (session::has("MR_DEVELOPER")) {
                        session::remove("MR_DEVELOPER");
                        session::remove("MR_DEVELOPER_ID");
                    }
                    Redirect::location("/");
                }else
                    $this->Data['error'] = "Try Again";
            }else
                $this->Data['error'] = "try again";

            $this->View();
        }
        else
            Redirect::location('/');

    }

    public function facebook()
    {
        
    }

    public function facebookcallback()
    {
        
    }
}