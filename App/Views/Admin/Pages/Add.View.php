<?php
?>

<div class="content">
    <div class="container">

        <form method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="MA-panel-heading">
                        <div class="panel-title" >
                            <h4 style="float:right!important">إضافة صفحة جديده</h4>
                            <a class="btn btn-danger" href="/admin/pages" style="float:left!important"> إالغاء <i class="fa fa-arrow-circle-o-left"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="box">
                                <div class="massage-area">
                                    <?php
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
                                            <input id="title" type="text" class="form-control" value="<?php echo is(post('title')) ? post('title') : null?>" name="title" required="required" placeholder="إسم الصفحة">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <label for="content">محتوى الصفحة : </label>
                                            <textarea id="content" placeholder="محتوى الصفحة" class="form-control text-area" name="content" title="Content"><?php echo is(post('content')) ? post('content') : null?></textarea>
                                        </div>
                                    </div>
                                    <div >
                                        <div class="col-md-8">
                                            <label></label>
                                        </div>
                                    </div>
                                    <div class="form-group" >
                                        <input type="submit" style="display: block;width: 100%" class="btn btn-primary add" name="add" value="إضافة الصفحة">
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
