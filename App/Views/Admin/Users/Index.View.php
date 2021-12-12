<?php
use MRDEVELOPER\Models\Users;
?>
<div class="content">
    <div class="container">
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="box">
                        <div class="box-header">
                            <div class="box-title">
                                <a class="btn btn-default waves-effect waves-light" href="/admin/users/add">إضافة عضو جديد</a>

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
                                    <th>إسم المستخدم</th>
                                    <th>البريد الإلكترونى</th>
                                    <th>اللإسم كامل</th>
                                    <th>الصلاحية</th>
                                    <th>الحالة</th>
                                    <th>التحكم</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    foreach ($users as $user){
                                        ?>
                                        <tr class="<?php echo $user[Users::getColumn(0)] . " ";  $user[Users::getColumn(1)];  " " . $user[Users::getColumn(6)] ?>">
                                            <td><?php echo $user[Users::getKey()] ?></td>
                                            <td><?php
                                                if (!empty($user[Users::getColumn(7)]))
                                                {
                                                    echo "<img src='" . $user[Users::getColumn(7)] . "' alt=' " . $user[Users::getColumn(0)] ." ' class='img-index'>";
                                                }
                                                else
                                                {
                                                    echo "<img  class='img-index' src='/images/avatar5.png' alt='" . $user[Users::getColumn(0)] . "'>";
                                                }?></td>
                                            <td><?php echo $user[Users::getColumn(0)] ?></td>
                                            <td><?php echo $user[Users::getColumn(1)] ?></td>
                                            <td><?php echo $user[Users::getColumn(6)]  ?></td>
                                            <td><?php
                                                if ($user[Users::getColumn(5)]  == 1){
                                                    echo "مدير";
                                                } elseif($user[Users::getColumn(5)] == 2){
                                                    echo "مسئول";
                                                } elseif($user[Users::getColumn(5)] == 3){
                                                    echo "بائع";
                                                } else{
                                                   echo "مستخدم عادى";
                                                }
                                                ?></td>
                                            <td><?php
                                                if ($user[Users::getColumn(14)] == 1)
                                                    echo "محظور";
                                                else
                                                    echo "يعمل";
                                                ?></td>
                                            <td>
                                                <a href="/admin/users/edit/<?php echo $user[Users::getKey()] ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                <?php
                                                if ($user[Users::getColumn(4)] == 0)
                                                    echo "<approve id='" . $user[Users::getKey()] . "' class='btn btn-success'> <i class='fa fa-check-square-o'></i></approve>"
                                                ?>
                                                <delete
                                                    data-color="mint"
                                                    data-style="zoom-in"
                                                    id="<?php echo $user[Users::getKey()] ?>"
                                                    user="<?php echo $user[Users::getColumn(0)] ?>"
                                                    class="btn btn-danger <?php echo $user[Users::getColumn(0)] ?> "><i class="fa fa-times"></i></delete>
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
                                    <th>إسم المستخدم</th>
                                    <th>البريد الإلكترونى</th>
                                    <th>اللإسم كامل</th>
                                    <th>الصلاحية</th>
                                    <th>الحالة</th>
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
