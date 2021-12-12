<?php
use MRDEVELOPER\Models\Alphabet;
?>
<div class="content">
    <div class="container">
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="box">
                        <div class="box-header">
                            <div class="box-title">
                                <a class="btn btn-default waves-effect waves-light" href="/admin/alphabet/add">إضافة فئة </a>

                            </div>
                        </div><!-- /.box-header -->
                        <div id="msg">

                        </div>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الإسم</th>
                                    <th>الوصف</th>
                                    <th>الصلاحيات</th>
                                    <th>النوع</th>
                                    <th>التحكم</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($alphabets as $alphabet){
                                    ?>
                                    <tr class="<?php echo $alphabet->Alphabet::getColumn(0)  ?>">
                                        <td><?php echo $alphabet->Alphabet::getKey() ?></td>
                                        <td><?php echo $alphabet->Alphabet::getColumn(0) ?></td>
                                        <td><?php echo $alphabet->Alphabet::getColumn(1) ?></td>
                                        <td>
                                            <?php
                                             $permissions = explode(",",$alphabets->Alphabet::getColumn(3));
                                             foreach ($permissions as $permission)
                                                 echo $permission
                                            ?>
                                        </td>
                                        <td>
                                            <?php

                                            ?>
                                        </td>
                                        <td>
                                            <a
                                                href="/admin/alphabet/edit/<?php echo $alphabet->Alphabet::getKey() ?>"
                                                class="btn btn-info"><i class="fa fa-edit"></i></a>
                                            <delete-alphabet
                                                data-color="mint"
                                                data-style="zoom-in"
                                                id="<?php echo $alphabet->Alphabet::getKey() ?>"
                                                user="<?php echo $alphabet->Alphabet::getColumn(0) ?>"
                                                class="btn btn-danger"><i class="fa fa-times"></i></delete-alphabet>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>الإسم</th>
                                    <th>الوصف</th>
                                    <th>الصلاحيات</th>
                                    <th>النوع</th>
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
