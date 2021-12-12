<?php
namespace MRDEVELOPER\Controllers\Admin;


use Monolog\Formatter\ScalarFormatter;
use MRDEVELOPER\Controllers\Controller;
use MRDEVELOPER\Models\Email;
use MRDEVELOPER\Models\Setting;
use MRDEVELOPER\Models\Social;
use MRDEVELOPER\Vendor\Helper\Filter;
use MRDEVELOPER\Vendor\Helper\Redirect;
use MRDEVELOPER\Vendor\Http\Request;
use MRDEVELOPER\Vendor\session;

class SettingsController extends Controller
{

    public function index()
    {
        $this->Data['Name'] = "إعدادات الموقع";
        $this->Data['css'] = ['bootstrap-tagsinput'];
        $this->Data['script'] = ['bootstrap-tagsinput'];
        $settings = settings();
        if (isset($_POST['update'])){
            /**
             * Site Title Var
             */
            $title = Filter::String(Request::post('title'));
            /**
             * If Title is Empty set default
             */
            $title = isset($title) ? $title : $settings['title'];
            /**
             *
             */
            $desc = Filter::String(Request::post('desc'));
            /**
             *
             */
            $desc = !empty($desc) ? $desc : $settings['desc'];
            /**
             *
             */
            $keywords = Filter::String(Request::post('keywords'));
            $keywords = !empty($keywords) ? $keywords : $settings['keywords'];
            /**
             *
             */
            $lang = Filter::String(Request::post('lang'));
            /**
             *
             */
            $lang = empty($lang) ? "ar" : $lang;
            /**
             *
             */
            $url = Filter::url(Request::post('url'));
            /**
             *
             */
            $url = empty($url) ? Request::server('REQUEST_SCHEME') . '://' . Request::server('HTTP_HOST') : $url;
            /**
             *
             */
            $ico = $this->uploadImg()->hasUpload('ico') ? $this->uploadImg()->getUrl() : "/Uploads/Images/favico.ico";
            /**
             *
             */
            $errors = [];

            if (empty($title) && empty($desc) && empty($keywords) && empty($status) && empty($lang))
                $errors[] = "عفوا لايمكن ترك جميع الحقول فارغة";
            if (empty($title))
                $errors[] = "عفو لا يجب ترك إسم الموقع فارغا";
            if (empty($desc))
                $errors[] = "من الافضل ان لا تترك وصف الموقع فارغا لأنه مهم لمحركات البحث";
            if (empty($keywords))
                $errors[] = "من الأفضل ان لا تترك الكلمات الدلالية فارغة لأنة مهمة لمحركات البحث";
            if (strlen($desc) > 150)
                $errors[] = "عفوا لايمكن ان يزيد وصف الموقع عن 150 حرف";
            if (! Filter::isUrl($url))
                $errors[] = "عفوا برجاء إدخال رابط الموقع صحيح";
            if (! Filter::isString($title))
                $errors[] = "عفوا برجاء كتابة عنوان الموقع نص";
            if (! Filter::isString($desc))
                $errors[] = "عفوا برجاء كتابة وصف الموقع صحيح";
            if (! Filter::isString($keywords))
                $errors[] = "عفوا برجاء كتابة الكلمات الدلالية صحيحة";
            if (!Filter::isString($lang))
                $errors[] = "عفوا برجاؤ إختيار لغة صحيحة";
            if (strlen($lang) > 2)
                $errors[] = "عفوا برجاء إختيار لغة صحيحة";
            if ($this->uploadImg()->hasError())
                $errors[] = $this->uploadImg()->getError();

            if (empty($errors)){
                $update = Setting::update([
                    'title'         => $title,
                    'desc'          => $desc,
                    'url'           => $url,
                    'icon'          => $ico,
                    'lang'          => $lang,
                    'keywords'      => $keywords
                ]);

                if ($update){
                    $this->Data['updated'] = "<div class='alert alert-success'>تم تحيث البيانات بنجاح</div>";
                    refresh();
                } else{
                    $errors[] = "لم يتم تحيث البيانات ";
                }
            }

            if (!empty($errors)){
                $this->Data['error'] = errors($errors);
            }

        }

        $this->View();
    }

    public function close()
    {
        $status = Filter::int($this->_Params[0]);
        if (isset($status) && Filter::isInt($status)){
            $close = Setting::updateSettings(['status' => $status]);
            $getStatus = settings()[Setting::getColumn(6)];
            if ($close){
                if ($getStatus == 1)
                    $msg = "تم إغلاق الموقع بنجاح";
                else
                    $msg = "تم فتح الموقع بنجاح";
            } else{
                $msg = "لم يتم إغلاف الموقع";
            }

        } else{
            $msg = "i can not do anything";
        }
        echo $msg;
    }


    public function mail()
    {
        $this->Data['javascript'] = [DataTable("desc")];
        $this->Data['Name'] = "إعدادات البريد الإلكترونى ";
        $this->Data['mail'] = Email::where(Email::getColumn(6),1);
        $this->Data['mails'] = Email::all();
        if (isset($_POST['mail'])){
            $host = Filter::String($_POST['host']);
            $auth = Filter::String($_POST['auth']);
            $user = Filter::String($_POST['user']);
            $pass = Filter::String($_POST['pass']);
            $secure = Filter::String($_POST['secure']);
            $port = Filter::int($_POST['port']);
            $active = Filter::int(Request::post("active"));
            $errors = [];
            if (empty($host) && empty($auth)&& empty($user) && empty($pass) && empty($secure) && empty($port))
                $errors[] = "عفوا جميع الحقول مطلوبة";
            if (Filter::empty($host))
                $errors[] = "إسم المستضيف مطلوب";
            if (!Filter::isString($host))
                $errors[] = "عقوا لابد ان يكون إسم المستضيف نص";
            if (Filter::is_null($auth))
                $errors[] = "عفوا لا يمكن ترك حقل تمكين المصادقة فارغ";
            if (Filter::bool($auth))
                $errors[] = "عفوا لابد ان يكون تمكين المصادقة ب [true => وتعنى مفعل] او [false => وتعنى غير مفعل]";
            if (Filter::empty($user))
                $errors[] = "عفوا يحب ان لا تترك إسم المستخدم فارغ";
            if (Filter::empty($pass))
                $errors[] = "عفوا لابد ان لا تترك كلمة المرور فارغة";
            if (Filter::empty($secure))
                $errors[] = "عفوا لايجب ترك نوع التأمين فارغ";
            if (!Filter::isString($secure))
                $errors[] = "لابد ان يكون نوع النامين نص";
            if (Filter::empty($port))
                $errors[] = "عفوا لايجب ترك منفذ الاتصال فارغ";
            if (!Filter::isInt($port))
                $errors[] = "عفوا لابد ان يكون منفذ الاتصال رقمية";

            if (Filter::empty($errors)){
                $mail = Email::update([
                    'host'         => $host,
                    'smtpAuth'     => $auth,
                    'username'     => $user,
                    'password'     => $pass,
                    'smtpSecure'   => $secure,
                    'port'         => $port,
                    'active'       => $active
                ]);
                if ($mail){
                    $this->Data['updated'] = '<div class="alert alert-success"> تم تحيدث بيانات البريد الالكترونى </div>';
                    refresh();
                } else{
                    $errors[] = "لم يتم تحديث بيانات البريد الالكترونى";
                }
            }
            if (!empty($errors)){

                $this->Data['error'] = errors($errors);
            }
        }


        $this->View();
    }

    public function addmail()
    {
        $this->Data['Name'] = "إضافة بريد إلكترونى";
        if (is_post(Request::post('add'))){
            $host = Filter::String($_POST['host']);
            $auth = Filter::String($_POST['auth']);
            $user = Filter::String($_POST['user']);
            $pass = Filter::String($_POST['pass']);
            $secure = Filter::String($_POST['secure']);
            $port = Filter::int($_POST['port']);
            $active = Filter::int(Request::post("active"));
            $errors = [];
            if (empty($host) && empty($auth)&& empty($user) && empty($pass) && empty($secure) && empty($port))
                $errors[] = "عفوا جميع الحقول مطلوبة";
            if (Filter::empty($host))
                $errors[] = "إسم المستضيف مطلوب";
            if (!Filter::isString($host))
                $errors[] = "عقوا لابد ان يكون إسم المستضيف نص";
            if (Filter::is_null($auth))
                $errors[] = "عفوا لا يمكن ترك حقل تمكين المصادقة فارغ";
            if (Filter::bool($auth))
                $errors[] = "عفوا لابد ان يكون تمكين المصادقة ب [true => وتعنى مفعل] او [false => وتعنى غير مفعل]";
            if (Filter::empty($user))
                $errors[] = "عفوا يحب ان لا تترك إسم المستخدم فارغ";
            if (Filter::empty($pass))
                $errors[] = "عفوا لابد ان لا تترك كلمة المرور فارغة";
            if (Filter::empty($secure))
                $errors[] = "عفوا لايجب ترك نوع التأمين فارغ";
            if (! Filter::isEmail($user))
                $errors[] = "عفوا برجاء كتابة إسم مستخدم صحيح";
            if (!Filter::isString($secure))
                $errors[] = "لابد ان يكون نوع النامين نص";
            if (Filter::empty($port))
                $errors[] = "عفوا لايجب ترك منفذ الاتصال فارغ";
            if (!Filter::isInt($port))
                $errors[] = "عفوا لابد ان يكون منفذ الاتصال رقمية";


            if (empty($errors)){
                $insert = Email::insert([
                    'host'        => $host,
                    'smtpAuth'    => $auth,
                    'username'    => $user,
                    'password'    => $pass,
                    'smtpSecure'  => $secure,
                    'port'        => $port,
                    'active'      => $active
                ]);
                if ($insert){
                    $this->Data['Ok'] = "<div class='alert alert-success'> تم إضافة البريد بنجاح </div>";
                    refresh();
                }else
                    $errors[] = "عفوا لم يتم الإضافة بنجاح";
            }
            if (!empty($errors)){
                $this->Data['error'] = errors($errors);
            }
        }
        $this->View();
    }



    public function socialmedia()
    {
        $this->Data['Name'] = "مواقع التواصل الاجتماعى";
        $this->Data['javascript'] = [DataTable("desc")];
        $this->Data['socials'] = Social::all();
        $this->View();
    }

    public function addsocial()
    {
        if (is_post(Request::post('add'))){
            $ico = Filter::String(Request::post('ico'));
            $title = Filter::String(Request::post('title'));
            $url = Filter::url(Request::post('url'));
            $errors = [];

            if (empty($ico) && empty($title) && empty($url))
                $errors[] = "عفوا جميع الحقول مطلوبة";
            if (empty($ico))
                $errors[] = "عفوا الرمز مطلوب";
            if (empty($title))
                $errors[] = "عفوا العنوان مطلوب";
            if (empty($url))
                $errors[] = "عفوا العنوان مطلوب";
            if (!Filter::isString($ico))
                $errors[] = "عفوا برجاء إختيار رمز صحيح";
            if (!Filter::isUrl($url))
                $errors[] = "عفوا برجاء إدخال رابط صحيح";
            if (!Filter::isString($title))
                $errors[] = "عفوا لابد ان يكون العنوان نص";



            if (empty($errors)){
                $add = Social::insert([
                    'ico'     => $ico,
                    'title'   => $title,
                    'url'     => $url
                ]);
                if ($add) {
                    session::set("SOCIAL_ADDED","<div class='alert alert-success'>تمت الإضافة بنجاح</div>");
                    session::set("SOCIAL_ADDED_TIME",time() + 300);
                    redirect("/admin/settings/edit-social/" . Social::getLastID());
                }
                else
                    $errors[] = "عفوا برجاء المحوالة مره اخرى";
            }

            if (!empty($errors))
                $this->Data['error'] = errors($errors);
        }
        $this->View();
    }


    public function editsocial()
    {
        $id  = Filter::int($this->_Params[0]);
        if (Filter::isInt($id))
            $id = Filter::int($id);
        else
            back("/admin/settings/social-media");
        $social = Social::where(Social::getKey(),$id);
        $this->Data['media'] = $social;
        if (isset($id) && Filter::isInt($id) && $social) {
            if (is_post(Request::post('edit'))) {
                $ico = Filter::String(Request::post('ico'));
                $title = Filter::String(Request::post('title'));
                $url = Filter::url(Request::post('url'));
                $errors = [];

                if (empty($ico) && empty($title) && empty($url))
                    $errors[] = "عفوا جميع الحقول مطلوبة";
                if (empty($ico))
                    $errors[] = "عفوا الرمز مطلوب";
                if (empty($title))
                    $errors[] = "عفوا العنوان مطلوب";
                if (empty($url))
                    $errors[] = "عفوا العنوان مطلوب";
                if (!Filter::isString($ico))
                    $errors[] = "عفوا برجاء إختيار رمز صحيح";
                if (!Filter::isUrl($url))
                    $errors[] = "عفوا برجاء إدخال رابط صحيح";
                if (!Filter::isString($title))
                    $errors[] = "عفوا لابد ان يكون العنوان نص";
                if (! Filter::isInt($id))
                    $errors[] = "عفوا هناك خطأ برجاء المحاولة مره اخرى";


                if (empty($errors)) {
                    $edit = Social::update([
                        'ico'    => $ico,
                        'title'  => $title,
                        'url'    => $url,
                    ],$id);

                    if ($edit) {
                        $this->Data['updated'] = "<div class='alert alert-success'>تم التحديث بنجاح</div>";
                        refresh();
                    } else
                        $errors[] = "عفوا برجاء المحوالة مره اخرى";
                }

                if (!empty($errors))
                    $this->Data['error'] = errors($errors);
            }
            $this->View();
        }else
            back("/admin/settings/social-media");
    }


    public function deletesocial()
    {
        $id = Filter::int(post("id"));
        if (Filter::isInt($id))
            $site = Social::where(Social::getKey(),$id);
        if (Filter::isInt($id) && $site && ! empty($id)){
            if ($site){
                $delete = Social::delete(Social::getKey(),$id);
                if ($delete)
                    $msg = "تم حذف [ " . $site[Social::getColumn(1)] . " ] بنجاح";
                else
                    $msg = "لم يتم حذف [  " . Social::getColumn(1) . "]";
            } else
                $msg = "عفوا برجاء المحاولة مره أخرى";

        } else
            $msg = "عفوا برجاء المحاولة مره أخرى بطرقة صحيحة";

        echo $msg;
    }




}