<?php
use MRDEVELOPER\Models\Users;
use MRDEVELOPER\Vendor\session;
?>
<div class="content">
    <div class="container">

        <form method="POST" enctype="multipart/form-data">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading">
                                <h3 class="panel-title">إختار صوره</h3>
                            </div>
                            <div class="panel-body">
                                <p class="ma-img">

                                </p>
                            </div>

                            <!-- List group -->
                            <ul class="list-group">
                                <li class="img list-group-item">
                                    <?php
                                    if (!empty($member[Users::getColumn(7)])){
                                        echo "<img class='img profile' src='" . $member[Users::getColumn(7)] . "'>";
                                    } else {
                                        ?>
                                        <img class="img profile" src="/images/avatar5.png">
                                        <?php
                                    }
                                    ?>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-group file">
                                        <span>إختر صوره</span>
                                        <input id="file" type="file" class="form-control picture btn-file" src="<?php echo $member['Picture'] ?>" name="image">
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="MA-panel-heading">
                        <div class="panel-title" >
                            <h4 style="float:right!important">تعديل مستخدم جديد</h4>
                            <a class="btn btn-danger" href="/admin/users" style="float:left!important"> إالغاء <i class="fa fa-arrow-circle-o-left"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="box">
                                <div class="massage-area">
                                    <?php
                                    if (session::has("ADDED_NEW_USER")){
                                        if (session::get("ADDED_NEW_USER_TIME") > time())
                                            echo "<div class='alert alert-success'>" . session::get("ADDED_NEW_USER") . "</div>";
                                        else{
                                            session::remove("ADDED_NEW_USER");
                                            session::remove("ADDED_NEW_USER_TIME");
                                        }
                                    }
                                    if (isset($edited)){
                                        echo $edited;
                                    }
                                    if (isset($error)) {
                                        echo $error;
                                    }
                                    ?>
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <label for="user">إسم المستخدم : </label>
                                            <input id="user" value="<?php echo $u = is_post(post('user')) ? post('user') : $member[Users::getColumn(0)] ?>" type="text" class="form-control" name="user" required="required" placeholder="إسم المستخدم">
                                        </div>
                                    </div>

                                    <br/>

                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <label for="name">الإسم كاملا : </label>
                                            <input id="name" value="<?php echo $n = is(post('name')) ? post('name') : $member[Users::getColumn(6)]?>" type="text" class="form-control" name="name" required="required" placeholder="الإسم كامل">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <label for="email">البريد الإلكترونى : </label>
                                            <input id="email" value="<?php echo $e = is(post('email')) ? post('email') : $member[Users::getColumn(1)] ?>" type="email" class="form-control" name="email" required="required" placeholder="البريد الإلكترونى">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="col-md-8">
                                            <label for="pass">كلمة المرور : </label>
                                            <input id="pass" type="password" class="form-control clicked-pass" name="pass" placeholder="كلمة المرور">
                                        </div>
                                    </div>
                                    <div class="form-group pass">
                                        <div class="col-md-8">
                                            <label for="repass">تأكيد كلمة المرور : </label>
                                            <input id="repass" type="password" class="form-control" name="repass" placeholder="تأكيد كلمة المرور">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <label for="desc">الوصف : </label>
                                            <textarea id="desc" class="form-control" name="desc" placeholder="الوصف"><?php echo $d =  is(post('desc')) ? post('desc') : $member[Users::getColumn(3)] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <label for="permission">الصلاحية : </label>
                                            <select id="permission" class="form-control" name="perm">
                                                <?php
                                                if ($member[Users::getColumn(5)] == 1) {
                                                    ?>
                                                    <option value="1">مدير</option>
                                                    <option value="2">معلن</option>
                                                    <option value="3">مستخدم</option>
                                                    <?php
                                                }
                                                elseif ($member[Users::getColumn(5)] == 2) {
                                                    ?>
                                                    <option value="1">معلن</option>
                                                    <option value="2">مدير</option>
                                                    <option value="3">مستخدم</option>
                                                    <?php
                                                }
                                                elseif ($member[Users::getColumn(5)] == 3) {
                                                    ?>
                                                    <option value="1">مستخدم</option>
                                                    <option value="2">مدير</option>
                                                    <option value="3">معلن</option>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <option value="1">مدير</option>
                                                    <option value="2">معلن</option>
                                                    <option value="3">مستخدم</option>
                                                    <?php
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" name="edit">
                                            <i class="fa fa-floppy-o"></i> حفظ التغيرات </button>
                                        <?php
                                        if ($member[Users::getColumn(13)] == 1)
                                            echo "<resend data-color='mint' data-style='zoom-in' class='btn btn-success ladda-button' id='" . $member[Users::getKey()] . "'>إعادة إرسال رسالة التفعيل</resend>";
                                        ?>
                                        <div style="float: left;">
                                            <?php
                                            if ($member[Users::getColumn(4)] == 0) {
                                                ?>
                                                <approve
                                                        data-color="mint"
                                                        data-style="zoom-in"
                                                        id='<?php echo $member[Users::getKey()] ?>'
                                                        class='btn btn-success ladda-button'><i class='fa fa-check-square-o'></i> تفعيل الحساب
                                                </approve>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if ($member[Users::getColumn(14)] == 0) {
                                                ?>
                                                <block id="<?php echo $member[Users::getKey()] ?>"
                                                       data-color="mint"
                                                       data-style="zoom-in"
                                                       user="<?php echo $member[Users::getColumn(0)] ?>"
                                                       class="btn btn-warning ladda-button"> حظر المستخدم
                                                </block>
                                                <?php
                                            } else{
                                                ?>
                                                <unblock
                                                        data-color="mint"
                                                        data-style="zoom-in"
                                                        class="btn btn-success ladda-button"
                                                        id="<?php echo $member[Users::getKey()] ?>">فك الحظر</unblock>
                                                <?php
                                            }
                                            ?>
                                            <delete
                                                    data-color="mint"
                                                    data-style="zoom-in"
                                                    class="btn btn-danger ladda-button"
                                                    user="<?php echo $member[Users::getColumn(0)] ?>"
                                                    id="<?php echo $member[Users::getKey()] ?>"><i class="fa fa-times"></i> حذف المستخدم </delete>
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->
                            </div>
                        </div>
                        <!-- end: page -->
                    </div> <!-- end Panel -->
                </div>
            </div>
        </form>
    </div><!-- container -->
</div>
