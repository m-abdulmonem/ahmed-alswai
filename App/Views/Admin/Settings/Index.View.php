<?php
use MRDEVELOPER\Models\Setting;
use MRDEVELOPER\Vendor\Http\Request;
$close = settings()['status'] == 1 ? 0 : 1;
$close_text = settings()['status'] == 1 ? 'فتح الموقع' : ' إغلاق الموقع ';
$close_ico  = settings()['status'] == 1 ? 'unlock' : 'lock';
?>
<div class="content">
    <div class="container">

        <form method="POST" enctype="multipart/form-data" class="settings-edit">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading">
                                <h3 class="panel-title"> إختر رمز الموقع</h3>
                            </div>
                            <div class="panel-body">
                                <p class="ma-img">

                                </p>
                            </div>

                            <!-- List group -->
                            <ul class="list-group">
                                <li class="img list-group-item">
                                    <img class="img profile" src="<?php echo $i = !empty(settings()[Setting::getColumn(4)]) ? settings()[Setting::getColumn(4)] : "/Site/images/favico.ico"?>">
                                </li>
                                <li class="list-group-item">
                                    <div class="form-group file">
                                        <span>إختر رمز الموقع</span>
                                        <input id="file" type="file" class="form-control picture btn-file" name="image">
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
                            <h4 style="float:right!important">تعديل بيانات الموقع</h4>
                            <a class="btn btn-info" href="/admin" style="float:left!important"> إالغاء <i class="fa fa-arrow-circle-o-left"></i></a>
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
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <label for="title">إسم الموقع : </label>
                                            <input id="title" type="text" class="form-control" name="title" value="<?php echo $t = is_post(Request::post("title")) ? Request::post("title") : settings()[Setting::getColumn(0)] ?>"  placeholder="إسم الموقع">
                                        </div>
                                    </div>

                                    <br/>

                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <label for="desc">وصف الموقع : </label>
                                            <textarea id="desc" maxlength="150" class="form-control" name="desc"  placeholder="وصف الموقع"><?php echo $d = is_post(Request::post("desc")) ? Request::post("desc") : settings()[Setting::getColumn(1)] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <label for="tags">الكلمات الدلالية : </label>
                                            <input id="tags" type="text" data-role="tagsinput" class="form-control" name="keywords" value="<?php echo $k = is_post(Request::post("keywords")) ? Request::post("keywords") : settings()[Setting::getColumn(2)]  ?>" placeholder="الكلمات الدلالية">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <label for="url">رابط الموقع : </label>
                                            <input id="url" type="url" class="form-control" name="url"  value="<?php echo $u = is_post(Request::post("url")) ? Request::post("url") : settings()[Setting::getColumn(3)] ?>" placeholder="رابط الموقع">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <label for="lang">لغة الموقع : </label>
                                            <select id="lang"  class="form-control" name="lang" title="لغة الموقع">
                                                <?php
                                                $l = is_post(Request::post("lang")) ? "<option>" .Request::post("lang") . "</option>" : "<option>" . settings()[Setting::getColumn(5)] . "</option>";
                                                if (settings()[Setting::getColumn(5)] == "ar") {
                                                    echo "<option value='ar'>اللغة العربية</option>";
                                                    echo "<option value='en'>اللغة الإنجليزية</option>";
                                                } elseif(settings()[Setting::getColumn(5)] == "en"){
                                                    echo "<option value='en'>اللغة الإنجليزية</option>";
                                                    echo "<option value='ar'>اللغة العربية</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <close status="<?php echo $close?>" class="btn btn-danger width-100"><i class="fa fa-<?php echo $close_ico?>"></i> <?php echo $close_text?></close>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" name="update" value="حفظ">
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
