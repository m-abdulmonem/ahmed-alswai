<?php
use MRDEVELOPER\Vendor\Helper\Filter;
use MRDEVELOPER\Models\Pages;
?>
<div class="content">
    <div class="container">



        <div class="panel">

            <div class="panel-body">
                <div class="row">
                    <div class="box">
                        <div class="box-header">
                            <div class="box-title">
                                <a class="btn btn-default waves-effect waves-light" href="/admin/pages/add">إضافة صفحة جديده</a>

                            </div>
                        </div><!-- /.box-header -->
                        <div id="msg">

                        </div>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>إسم الصفحة</th>
                                    <th>المحتوى</th>
                                    <th>الزيارات</th>
                                    <th>التحكم</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($Pages as $page ){
                                    ?>
                                    <tr class="<?php echo $page[Pages::getColumn(0)] ?>">
                                        <td><?php echo $page[Pages::getKey()] ?></td>

                                        <td><?php echo $page[Pages::getColumn(0)] ?></td>
                                        <td><?php echo mb_substr(Filter::String($page[Pages::getColumn(1)]),0,50,'UTF-8')  ?></td>
                                        <td><?php echo $page['visitor'] ?></td>
                                        <td>
                                            <a href="/admin/pages/edit/<?php echo $page[Pages::getKey()] ?>" title="Edit Page [ <?php echo $page[Pages::getColumn(0)]?> ]" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                            <delete-page
                                                    class="btn btn-danger delete"
                                                    title="Delete Page [ <?php echo $page[Pages::getColumn(0)] ?> ]"
                                                    user="<?php echo $page[Pages::getColumn(0)] ?>"
                                                    id="<?php echo $page[Pages::getKey()] ?>"
                                                    data-color="mint"
                                                    data-style="zoom-in"><i class="fa fa-times"></i></delete-page>

                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>إسم الصفحة</th>
                                    <th>المحتوى</th>
                                    <th>الزيارات</th>
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
