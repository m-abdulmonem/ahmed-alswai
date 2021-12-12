<?php
use MRDEVELOPER\Vendor\Http\Request;
use MRDEVELOPER\Vendor\session;
?>
<style>
    img.img{
        width: 100%;
        height: 350px;
        margin-bottom: 15px;
        display: block !important;
    }
    input[type=url]{
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
                            <a class="btn btn-danger" href="/admin/settings/social-media" style="float:left!important"> إلغاء<i class="fa fa-arrow-circle-o-left"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="box">
                                <div class="massage-area">
                                    <?php
                                    if (is(session::has("SOCIAL_ADDED"))){
                                        if (session::get("SOCIAL_ADDED_TIME") > time()){
                                            if (referer() == "/admin/settings/add-social")
                                                echo session::get('SOCIAL_ADDED');
                                        }else{
                                            session::remove("SOCIAL_ADDED");
                                            session::remove("SOCIAL_ADDED_TIME");
                                        }
                                    }
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
                                                            <h1 style="text-align: center"><a href="<?php echo $media['url']?>" target="_blank"><i class="fa fa-<?php echo $media['ico'] ?>"></i></a> </h1>
                                                            <div class="col-md-8">
                                                                <label for="f"><i class="fa fa-facebook"></i></label>
                                                                <input type="radio" value="facebook" name="ico" id="f" checked>
                                                                <label for="t"><i class="fa fa-twitter"></i></label>
                                                                <input type="radio" value="twitter" name="ico" id="t">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-8">
                                                                <label for="title">إسم الموقع : </label>
                                                                <input id="title" value="<?php echo $h = is_post(post('title')) ? post('title') : $media['title'] ?>" type="text" class="form-control" name="title" required="required" placeholder="إسم الموقع">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-md-8">
                                                                <label for="url">عنوان موقع التواصل الإجتماعى : </label>
                                                                <input id="url" value="<?php echo $h = is_post(post('url')) ? post('url') : $media['url'] ?>" type="text" class="form-control" name="url" required="required" placeholder="عنوان موقع التواصل الإجتماعى">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="submit" class="btn btn-primary add" name="edit" value="حفظ التغيرات">
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