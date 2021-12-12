<?php
use MRDEVELOPER\Models\Social;
?>
<div class="content">
    <div class="container">
        <div class="panel" >
            <div class="panel-body" style="display: block;margin-bottom: 50px;">
                <div class="row">
                    <div class="box">
                        <div class="box-header">
                            <div class="box-title">
                                <a class="btn btn-default waves-effect waves-light" href="/admin/settings/add-social">إضافة موقع جديد</a>

                            </div>
                        </div><!-- /.box-header -->
                        <div id="msg">

                        </div>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الرمز</th>
                                    <th>إسم الخدمة</th>
                                    <th>عنوان الموقع</th>
                                    <th>التحكم</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($socials as $social ){
                                    ?>
                                    <tr class="<?php echo $social[Social::getColumn(1)] ?>">
                                        <td><?php echo $social[Social::getKey()] ?></td>
                                        <td><i class="fa fa-<?php echo $social[Social::getColumn(0)] ?>"></i></td>
                                        <td><?php echo $social[Social::getColumn(1)] ?></td>
                                        <td><?php echo $social[Social::getColumn(2)] ?></td>
                                        <td>
                                            <a href="/admin/settings/edit-social/<?php echo $social[Social::getKey()] ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                            <delete-social
                                                    class="btn btn-danger delete"
                                                    title="Delete Site [ <?php echo $social[Social::getColumn(1)] ?> ]"
                                                    user="<?php echo $social[Social::getColumn(1)] ?>"
                                                    id="<?php echo $social[Social::getKey()] ?>"
                                                    data-color="mint"
                                                    data-style="zoom-in"><i class="fa fa-times"></i></delete-social>                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>الرمز</th>
                                    <th>إسم الخدمة</th>
                                    <th>عنوان الموقع</th>
                                    <th>التحكم</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div><!-- /.box-body -->
                    </div>
                </div>
                <!-- end: page -->
            </div> <!-- end Panel -->
        </div>
    </div>