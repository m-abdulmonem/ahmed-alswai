<?php
use MRDEVELOPER\Models\Guide;
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
                                <a class="btn btn-default waves-effect waves-light" href="/admin/guide/add">إضافة مكان جديد</a>

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
                                    <th>الإسم</th>
                                    <th>البريد الإلكترونى</th>
                                    <th>الهاتف</th>
                                    <th>النوع</th>
                                    <th>العنوان</th>
                                    <th>الوصف </th>
                                    <th>التحكم</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($guides as $guide){
                                    $type = Alphabet::where(Alphabet::getKey(),Guide::getColumn(11))
                                    ?>
                                    <tr class="<?php echo $guide[Guide::getColumn(0)] . " ";  $guide[Guide::getColumn(1)] . " "; $guide[Guide::getColumn(2)] . " "; $guide[Guide::getColumn(3)] .""; $guide[Guide::getColumn(5)] ?>">
                                        <td><?php echo $guide[Guide::getKey()] ?></td>
                                        <td><?php echo "<img src='" . $guide[Guide::getColumn(10)] . "'>"?></td>
                                        <td><?php echo $guide[Guide::getColumn(0)] ?></td>
                                        <td><?php echo $guide[Guide::getColumn(4)] ?></td>
                                        <td><?php echo $guide[Guide::getColumn(3)]  ?></td>
                                        <td><?php echo $type[Alphabet::getColumn(0)]  ?></td>
                                        <td><?php echo $guide[Guide::getColumn(1)] ?></td>
                                        <td><?php echo $guide[Guide::getColumn(2)] ?></td>
                                        <td>
                                            <a href="/admin/guide/edit/<?php echo $guide[Guide::getKey()] ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                            <?php
                                            if ($guide[Guide::getColumn(12)] == 0)
                                                echo "<approve-guide id='" . $guide[Guide::getKey()] . "' class='btn btn-success'> <i class='fa fa-check-square-o'></i></approve>"
                                            ?>
                                            <delete-guide
                                                data-color="mint"
                                                data-style="zoom-in"
                                                id="<?php echo $guide[Guide::getKey()] ?>"
                                                user="<?php echo $guide[Guide::getColumn(0)] ?>"
                                                class="btn btn-danger"><i class="fa fa-times"></i></delete-guide>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>الرمز</th>
                                    <th>الإسم</th>
                                    <th>البريد الإلكترونى</th>
                                    <th>الهاتف</th>
                                    <th>النوع</th>
                                    <th>العنوان</th>
                                    <th>الوصف </th>
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
