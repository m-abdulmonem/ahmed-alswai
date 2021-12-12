<style>
    img.img{
        width: 100%;
        height: 350px;
        margin-bottom: 15px;
        display: block !important;
    }
</style>
<div class="content">
    <div class="container">

        <form method="POST" enctype="multipart/form-data">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="MA-panel-heading">
                        <div class="panel-title" >
                            <h4 style="float:right!important">إضافة صوره جديده</h4>
                            <a class="btn btn-danger" href="/admin/home" style="float:left!important"> إلغاء<i class="fa fa-arrow-circle-o-left"></i></a>
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
                                    if (isset($msg)) {
                                        echo $msg;
                                    }
                                    ?>
                                </div>
                                <div class="box-body">

                                    <div class="form-group file">
                                        <div class="col-ms-8">
                                            <span>إختر صوره</span>
                                            <input id="file" type="file"  class="form-control picture btn-file" name="image">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <img class="img profile slider " src="<?php echo $slider['image']?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <input value="<?php echo $slider['title']?>" type="text" class="form-control" name="title" required="required" placeholder="عنوان المحتوى">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <textarea class="form-control text-area" name="content" title="content"><?php echo $slider['content']?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary add" name="update" value="إضافة الصورة">
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













