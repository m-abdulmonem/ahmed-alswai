
<div class="content">
    <div class="container">

        <div class="panel">

            <div class="panel-body">
                <div class="row">
                    <div class="box">
                        <div class="box-header">
                            <div class="box-title">
                                <a class="btn btn-default waves-effect waves-light" href="/admin/home/add-slider">إضافة صوره جديده</a>
                            </div>
                        </div><!-- /.box-header -->
                        <div id="msg">

                        </div>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الصورة</th>
                                    <th>إسم المحتوى</th>
                                    <th>المحتوى</th>
                                    <th>التحكم</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($sliders as $slider){
                                    ?>
                                    <tr class="<?php echo $slider['title'] ?>">
                                        <td><?php echo $slider['id'] ?></td>
                                        <td><img src="<?php echo $slider['image'] ?>" alt="<?php echo $slider['title'] ?>" class="gallery"> </td>
                                        <td><?php echo $slider['title'] ?></td>
                                        <td><?php echo mb_substr(\AlMOSTAQBAL\Vendor\Helper\Filter::htmlToString($slider['content']),0,50,'UTF-8') . " ...." ?></td>
                                        <td>
                                            <a href="/admin/home/edit-slider/<?php echo $slider['id'] ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                            <confirm class="btn btn-danger delete-slider" id="<?php echo $slider['id'] ?>"><i class="fa fa-times"></i></confirm>

                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>الصورة</th>
                                    <th>إسم المحتوى</th>
                                    <th>المحتوى</th>
                                    <th>التحكم</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div><!-- /.box-body -->
                    </div>
                </div>
                <!-- end: page -->

            </div> <!-- end Panel -->

        </div> <!-- container -->
    </div>
