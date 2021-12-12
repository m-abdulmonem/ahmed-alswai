<?php
use MRDEVELOPER\Vendor\session;
use MRDEVELOPER\Models\Pages;
?>

<div class="content">
    <div class="container">
        <form method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="MA-panel-heading">
                        <div class="panel-title" >
                            <h4 style="float:right!important">تعديل [ <?php  echo $page[Pages::getColumn(0)]  ?> ]</h4>
                            <a class="btn btn-danger" href="/admin/pages" style="float:left!important"> الغاء <i class="fa fa-arrow-circle-o-left"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="box">
                                <div class="massage-area">
                                    <?php
                                    if (referer() == "/admin/pages/add") {
                                        if (session::has("PAGE_ADDED")) {
                                            if (session::get("PAGE_ADDED_TIME") > time())
                                                echo session::get("PAGE_ADDED");
                                            else {
                                                session::remove("PAGE_ADDED");
                                                session::remove("PAGE_ADDED_TIME");
                                            }
                                        }
                                    }
                                    if (isset($added)){
                                        echo $added;
                                    }
                                    if (isset($msg)) {
                                        echo $msg;
                                    }
                                    ?>
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <label for="title">إسم الصفحة : </label>
                                            <input id="title" value="<?php echo is(post('title')) ? post('title') : $page['title'] ?>" type="text" class="form-control" name="title" required="required" placeholder="إسم الصفحة">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <label for="content">محتوى الصفحة : </label>
                                            <textarea id="content" class="form-control text-area" name="content"><?php echo is(post('content')) ? post('content') : $page['content'] ?></textarea>
                                        </div>
                                    </div>
                                    <div >
                                        <div class="col-md-8">
                                            <label></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" style="display: block; width: 100%" class="btn btn-primary ma" name="save" value="حفظ الصفحة">
                                    </div>
                                    <delete-page
                                            style="display: block;width: 100%;"
                                            class="btn btn-danger delete"
                                            title="Delete Page [ <?php echo $page[Pages::getColumn(0)] ?> ]"
                                            user="<?php echo $page[Pages::getColumn(0)] ?>"
                                            id="<?php echo $page[Pages::getKey()] ?>"
                                            data-color="mint"
                                            data-style="zoom-in"><i class="fa fa-times"></i> حذف [ <?php echo $page[Pages::getColumn(0)]  ?> ]</delete-page>
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
