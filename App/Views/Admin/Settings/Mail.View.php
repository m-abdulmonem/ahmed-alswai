<?php
use MRDEVELOPER\Models\Email;
?>
<style>
    img.img{
        width: 100%;
        height: 350px;
        margin-bottom: 15px;
        display: block !important;
    }
    input{
        direction: ltr;
    }
</style>
<div class="content">
    <div class="container">


        <div class="panel" >
            <div class="panel-body" style="display: block;margin-bottom: 50px;">
                <div class="row">
                    <div class="box">
                        <div class="box-header">
                            <div class="box-title">
                                <a class="btn btn-default waves-effect waves-light" href="/admin/settings/add-mail">Add New Post</a>

                            </div>
                        </div><!-- /.box-header -->
                        <div id="msg">

                        </div>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>المضيف</th>
                                    <th>SmtpAuth</th>
                                    <th>إسم المستخدم</th>
                                    <th>كلمة المرور</th>
                                    <th>SmtpSecure</th>
                                    <th>المنفذ</th>
                                    <th>الحالة</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($mails as $mail ){
                                    ?>
                                    <tr class="<?php echo $mail[Email::getColumn(0)] ?>">
                                        <td><?php echo $mail[Email::getKey()] ?></td>
                                        <td><?php echo $mail[Email::getColumn(0)] ?></td>
                                        <td><?php echo $mail[Email::getColumn(1)] ?></td>
                                        <td><?php echo $mail[Email::getColumn(2)] ?></td>
                                        <td><?php echo $mail[Email::getColumn(3)]  ?></td>
                                        <td><?php echo $mail[Email::getColumn(4)] ?></td>
                                        <td><?php echo $mail[Email::getColumn(5)] ?></td>
                                        <td><?php
                                            if ($mail[Email::getColumn(6)] == 1)
                                                echo "مفعل";
                                            else
                                                echo "غير مفعل";
                                            ?></td>
                                        <td>
                                            <?php
                                            if ($mail[Email::getColumn(6)] != 1){
                                                echo "<a href='/admin/settings/active-mail/". $mail[Email::getKey()] . ".' class='btn btn-info'><i class='fa fa-check-square-o '></i></a>";
                                            }
                                            ?>
                                            <button-delete class="delete-mail btn btn-danger" id="<?php echo $mail[Email::getKey()] ?>"><i class="fa fa-times"></i></button-delete>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>المضيف</th>
                                    <th>SmtpAuth</th>
                                    <th>إسم المستخدم</th>
                                    <th>كلمة المرور</th>
                                    <th>SmtpSecure</th>
                                    <th>المنفذ</th>
                                    <th>الحالة</th>
                                    <th>Actions</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div><!-- /.box-body -->
                    </div>
                </div>
                <!-- end: page -->

            </div> <!-- end Panel -->



            <form method="POST" enctype="multipart/form-data">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="MA-panel-heading">
                        <div class="panel-title" >
                            <h4 style="float:right!important">إعدادات البريد الإلكترونى</h4>
                            <a class="btn btn-danger" href="/admin/settings" style="float:left!important"> إلغاء<i class="fa fa-arrow-circle-o-left"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="box">
                                <div class="massage-area">
                                    <?php
                                    if (isset($updated)){
                                        echo $updated;
                                    }
                                    if (isset($error)) {
                                        echo $error;
                                    }
                                    ?>
                                </div>
                                <div class="box-body">
                                    <div id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="card">

                                            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="card-block">
                                                    <form method="POST">
                                                        <div class="form-group">
                                                            <div class="col-md-8">
                                                                <input value="<?php echo $mail[Email::getColumn(0)]?>" type="text" class="form-control" name="host" required="required" placeholder="المستضيف">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-md-8">
                                                                <input value="<?php echo $mail[Email::getColumn(1)]?>" type="text" class="form-control" name="auth" required="required" placeholder="تمكين مصادقة SMTP">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-md-8">
                                                                <input value="<?php echo $mail[Email::getColumn(2)]?>" type="text" class="form-control" name="user" required="required" placeholder="إسم المستخدم">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-md-8">
                                                                <input value="<?php echo $mail[Email::getColumn(3)]?>" type="password" class="form-control" name="pass" required="required" placeholder="كلمة المرور">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-md-8">
                                                                <input value="<?php echo $mail[Email::getColumn(4)]?>" type="text" class="form-control" name="secure" required="required" placeholder="تامين الاتصال">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-md-8">
                                                                <input value="<?php echo $mail[Email::getColumn(5)]?>" type="text" class="form-control" name="port" required="required" placeholder="رقم المنفذ">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="submit" class="btn btn-primary add" name="mail" value="حفظ التغيرات">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
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