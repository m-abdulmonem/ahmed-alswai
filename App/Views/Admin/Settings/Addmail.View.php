<?php
use MRDEVELOPER\Vendor\Http\Request;
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
                                        if (isset($Ok)){
                                            echo $Ok;
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
                                                                    <label for="host">المستضيف</label>
                                                                    <input id="host" value="<?php echo $h = is_post(Request::post('host')) ? Request::post('host') : null ?>" type="text" class="form-control" name="host" required="required" placeholder="المستضيف">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="col-md-8">
                                                                    <label for="auth">تمكين مصادقة SMTP</label>
                                                                    <input id="auth" value="<?php echo $h = is_post(Request::post('host')) ? Request::post('auth') : null ?>" type="bool" class="form-control" name="auth" required="required" placeholder="تمكين مصادقة SMTP">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="col-md-8">
                                                                    <label for="user">إسم المستخدم</label>
                                                                    <input id="user" value="<?php echo $h = is_post(Request::post('host')) ? Request::post('user') : null ?>" type="email" class="form-control" name="user" required="required" placeholder="إسم المستخدم">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="col-md-8">
                                                                    <label for="pass">كلمة المرور</label>
                                                                    <input id="pass" value="<?php echo $h = is_post(Request::post('host')) ? Request::post('pass') : null ?>" type="password" class="form-control" name="pass" required="required" placeholder="كلمة المرور">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="col-md-8">
                                                                    <label for="secure">تامين الاتصال</label>
                                                                    <input id="secure" value="<?php echo $h = is_post(Request::post('host')) ? Request::post('secure') : null ?>" type="text" class="form-control" name="secure" required="required" placeholder="تامين الاتصال">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="col-md-8">
                                                                    <label for="port">رقم المنفذ</label>
                                                                    <input id="port" value="<?php echo $h = is_post(Request::post('host')) ? Request::post('port') : null ?>" type="number" class="form-control" name="port" required="required" placeholder="رقم المنفذ">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-8">
                                                                    <label for="active"></label>
                                                                    <select id="active" class="form-control" name="active">
                                                                        <?php
                                                                        if (Request::post("active") == 0){
                                                                          ?>
                                                                            <option value="0" selected="selected">غير مفعل</option>
                                                                            <option value="1">مفعل</option>
                                                                        <?php
                                                                        } else
                                                                        {
                                                                            ?>
                                                                            <option value="1">مفعل</option>
                                                                            <option value="0" selected="selected">غير مفعل</option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-primary add" name="add" value="حفظ التغيرات">
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