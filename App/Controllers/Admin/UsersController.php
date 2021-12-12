<?php
namespace MRDEVELOPER\Controllers\Admin;


use MRDEVELOPER\Controllers\Controller;
use MRDEVELOPER\Models\Ip;
use MRDEVELOPER\Models\Users;
use MRDEVELOPER\Vendor\Helper\Filter;
use MRDEVELOPER\Vendor\Http\EmailTemplate;
use MRDEVELOPER\Vendor\Http\Request;
use MRDEVELOPER\Vendor\Language\Lang;
use MRDEVELOPER\Vendor\session;

/**
 * Class UsersController
 * @package MRDEVELOPER\Controllers\Admin
 *
 */
class UsersController extends Controller
{

    public function index()
    {
        $this->Data['Name'] = "المستخدمون";
        $this->Data['javascript'] = [DataTable("desc")];
        $this->Data['users'] = Users::order("DESC");
        $this->View();
    }

    public function delete()
    {
        $this->Data['Name'] = "تعديل مستخدم";
        $id = filter::int($this->_Params[0]);
        $user = $this->Data['member'] = Users::where(Users::getKey(),$id);
        if ($user['UserId'] && isset($id) && Filter::isInt($id)) {

            $this->view();
        }
        else
        {
            back('/admin/users');
        }
    }

    public function remove()
    {
        $id = Filter::int(post('id'));
        $delete = Users::delete(Users::getKey(),$id);
        if ($delete){
            $msg = "تم الحذف بنجاح";
        }else{
            $msg = "عفوا لم يتم حذف";
        }
        echo $msg;
    }
    public function approve()
    {
        $id = Filter::int($this->_Params[0]);
        $approve = Users::update([Users::getColumn(4) => 1],$id);
        if ($approve){
            $msg = "تم التفعيل بنجاح";
        } else{
            $msg = "عفوا لم يتم التفعيل";
        }
        echo $msg;
    }

    /**
     *
     */
    public function add()
    {
        $this->Data['Name']= "إضافة مستخدم جديد";
        if (is(post('MA_ADD_USER'))) {
            $errors     = array();
            $User       = Filter::String(post('user'));
            $Name       = Filter::String(post('name'));
            $Pass       = Filter::String(post('pass'));
            $repass     = Filter::String(post('repass'));
            $Email      = Filter::email(post('email'));
            $Perm       = Filter::int(post('perm'));
            $desc       = Filter::String(post('desc'));
            $AAC        = ma_hash(sha1(md5(rand(1000,1000000))));
            $picture    = $this->uploadImg()->hasUpload("image") ? $this->uploadImg()->getUrl() : "/Site/images/avatar5.png";


            $Exists_user = Users::where(Users::getColumn(0),$User);

            if (empty($Name) && empty($User) && empty($Pass) && empty($repass))
                $errors[] = "عفوا جميع الحقول مطلوبة";
            if (empty($Name))
                $errors[] = "عفوا الإسم مطلوب";
            if (empty($User))
                $errors[] = "عفوا إسم المستخدم مطلوب";
            if (empty($Email))
                $errors[] = "البريد الإلكترونى";
            if (strlen($User) < 4)
                $errors[] = "إسم السمتخدم لابد ان يكون أكبر من 4 حرورف";
            if (empty($Pass))
                $errors[] = "كملة المرور مطلوبة";
            if (empty($repass))
                $errors[] = "تأكيد كلمة المرور مطلوب";
            if (strlen($Pass) < 6)
                $errors[] = "عفوا! كلمة المرور يجب ان تكون اكبر من 6 حروف";
            if (($repass != $Pass) or ($Pass != $repass))
                $errors[] = "عفوا! كلمة المرور غير مطتابقة";
            if ($Email == $Exists_user[Users::getColumn(1)])
                $errors[] = "عفوا البريد مستخدم هذا محجوز";
            if ($User == $Exists_user[Users::getColumn(0)])
                $errors[] = "عفوا إسم المستخدم هذا محجوز";
            if (! Filter::isString($User))
                $errors[] = "برجاء كتابة إسم مستخدم صحيح";
            if (! Filter::isEmail($Email))
                $errors[] = "برجاء كتابة بريد إالكترونى صحيح";
            if (! Filter::isString($Name))
                $errors[] = "برجاء كتابة الإسم صحيح";
            if (! Filter::isInt($Perm))
                $errors[] = "عفوا برجاء إختيار صلاحية صحيحة";
            if (! Filter::isString($desc))
                $errors[] = "برجاء كتابة وصف صحيح";
            if ($this->uploadImg()->hasUpload('image')) {
                if (!$this->uploadImg()->hasError())
                    $errors[] = $this->uploadImg()->getError();
            }



            if (empty($errors)) {
                $user = Users::insert([
                    'username'       => $User,
                    'password'       => pass_hash($Pass),
                    'email'          => $Email,
                    'status'         => 1,
                    'fullname'       => $Name,
                    'permission'     => $Perm,
                    'ip'             => ip(),
                    'passChange'     => $AAC,
                    'Activation'     => $AAC,
                    'picture'        => $picture,
                    'desc'           => $desc,
                    'dateAtime'      => now(),
                    'block'          => 0,
                    'permlink'       => $User,
                ]);
                $last_id = Users::getLastID();
                $invented_user = Users::where(Users::getKey(),session::get("MR_DEVELOPER_ADMIN_ID"));
                if ($user) {
                    $register_mail = Request::mail($Email,Lang::lang("REGISTER_MAIL"), EmailTemplate::Register($invented_user[Users::getColumn(0)],$User));
                    if (!$register_mail) {
                        Users::update([Users::getColumn(13) => 1],$last_id);
                    }
                    $added = "تمت الإضافة بنجاح";
                    session::set("ADDED_NEW_USER",$added);
                    session::set("ADDED_NEW_USER_TIME", time() + 250);
                    redirect("/admin/users/edit/" . $last_id);
                } else {
                    $errors[] = "لم يتم الإضافة  ";
                }
              }

              if (! empty($errors)){
                    $this->Data['msg'] = errors($errors);
              }
        }
        $this->View();
    }

    /**
     *
     */
    public function edit()
    {

        $id = filter::int($this->_Params[0]);
        $user = $this->Data['member'] = Users::where(Users::getKey(),$id);
        $this->Data['Name'] = "تعديل مستخدم [" . $user[Users::getColumn(0)] . "] ";
        $errors = [];
        if ($user && isset($id) && Filter::isInt($id)) {
            if (is(post('edit'))) {
                $User    = filter::String(post('user'));
                $Name    = filter::String(post('name'));
                $Pass    = filter::String(post('pass'));
                $pass    = empty($Pass) ? $user[Users::getColumn(2)] : pass_hash($Pass);
                $repass  = filter::String(post('repass'));
                $Email   = filter::email(post('email'));
                $Perm    = filter::int(post('perm'));
                $desc    = filter::String(post('desc'));

                $picture = empty($user[Users::getColumn(7)]) ? "/images/avatar5.png" : $user[Users::getColumn(7)];
                $picture = $this->uploadImg()->hasUpload("image") ? $this->uploadImg()->getUrl() : $picture;

                if (empty($Name) && empty($User) && empty($Pass) && empty($repass))
                    $errors[] = "عفوا جميع الحقول مطلوبة";
                if (empty($Name))
                    $errors[] = "عفوا الإسم مطلوب";
                if (empty($User))
                    $errors[] = "عفوا إسم المستخدم مطلوب";
                if (empty($Email))
                    $errors[] = "البريد الإلكترونى";
                if (strlen($User) < 4)
                    $errors[] = "إسم السمتخدم لابد ان يكون أكبر من 4 حرورف";
                if (is(post($pass))) {
                    if (strlen($Pass) < 6)
                        $errors[] = "عفوا! كلمة المرور يجب ان تكون اكبر من 6 حروف";
                }
                if (($repass != $Pass) or ($Pass != $repass))
                    $errors[] = "عفوا! كلمة المرور غير مطتابقة";
                if (!Filter::isEmail($Email))
                    $errors[] = "برجاء كتابة بريد إلكترونى صحيح";
                if ($this->uploadImg()->hasError())
                    $errors[] = $this->uploadImg()->getError();



                if (empty($errors)) {

                    $edit = Users::update([
                        'username'       => $User,
                        'password'       => pass_hash($pass),
                        'email'          => $Email,
                        'status'         => 1,
                        'fullname'       => $Name,
                        'permission'     => $Perm,
                        'picture'        => $picture,
                        'desc'           => $desc,
                    ],$id);

                    if ($edit) {
                        $this->Data['edited'] = "<div class='alert alert-success'>تم التعديل</div>";
                        refresh();
                    } else
                        $errors[] = "هناك خطأ برجاء المحاولة مره أخرى";
                }

                if (!empty($errors)){
                    $this->Data['error'] = errors($errors);
                }
            }

            $this->View();
        } else{
            back("/admin/users");
        }
    }

    /**
     *
     */
    public function block()
    {
        $id = Filter::int($this->_Params[0]);
        if (Filter::isInt($id))
        $user = Users::where(Users::getKey(),$id);
        if ($user && Filter::isInt($id)){
            $block_mail = Request::mail($user[Users::getColumn(1)],Lang::lang("block_mail"),EmailTemplate::stopped($user[Users::getColumn(0)]));
            if ($block_mail){
                $block = Users::update([Users::getColumn(14)=>1],$user[Users::getKey()]);
                if ($block){
                    $ip = Ip::insert([
                        'ip'       => $user[Users::getColumn(12)],
                        'block'    => 1,
                        'user_id'  => $user[Users::getKey()]
                    ]);
                    if ($ip)
                        $msg = "تم الحظر بنجاح";
                    else
                        $msg = "لم يتم الحظر برجاء المحالة مره أخرى";
                } else
                    $msg = "لم يتم الحظر برجاء المحالة مره أخرى";
            } else
                $msg = Request::getMailError();
        } else
            $msg = "I Can't Do AnyThing";
        echo $msg;
    }

    public function unblock(){
        $id = Filter::int($this->_Params[0]);
        if (Filter::isInt($id))
            $user = Users::where(Users::getKey(),$id);
        if ($user && Filter::isInt($id)){
            $block_mail = Request::mail($user[Users::getColumn(1)],Lang::lang("unblock_mail"),EmailTemplate::unblock($user[Users::getColumn(0)]));
            $mail_error = Request::getMailError();
            if ($block_mail){
                $block = Users::update([Users::getColumn(14)=>0],$user[Users::getKey()]);
                if ($block){
                    $ip = Ip::update([
                        'block'    => 0,
                    ]);
                    if ($ip)
                        $msg = "تم فك الحظر بنجاح";
                    else
                        $msg = "لم يتم فك الحظر برجاء المحالة مره أخرى";
                } else
                    $msg = "لم يتم فك الحظر برجاء المحالة مره أخرى";
            } else
                $msg = $mail_error;
        } else
            $msg = "I Can't Do AnyThing";
        echo $msg;
    }

    public function resend()
    {
        $id = Filter::int($this->_Params[0]);
        if (Filter::isInt($id))
            $user = Users::where(Users::getKey(),$id);
        if ($user && Filter::isInt($id)){
            $active = Request::mail($user[Users::getColumn(1)],Lang::lang("SUBJECT_ACTIVE"),
                EmailTemplate::Activate($user[Users::getKey()],$user[Users::getColumn(11)],$user[Users::getColumn(0)]),$user[Users::getColumn(6)]);
            if ($active) {
                $resend = Users::update([Users::getColumn(13) => 0],$id);
                if ($resend)
                    $msg = "تم الإرسال بنجاح";
                else
                    $msg = "لم يتم الإرسال برجاء المحاولة مره أخرى";
            } else
                $msg = Request::getMailError();
        } else
            $msg = "Sorry! i can not do anything";
        echo $msg;
    }


}
