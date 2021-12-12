<?php
use AlMOSTAQBAL\Vendor\Language\Lang;
?>

<div class="content">
    <div class="container">

            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading">
                                <h3 class="panel-title">صورته</h3>
                            </div>
                            <div class="panel-body">
                                <p class="ma-img">

                                </p>
                            </div>

                            <!-- List group -->
                            <ul class="list-group">
                                <li class="img list-group-item">
                                    <?php
                                    if (!empty($member['Picture'])){
                                        echo "<img class='img profile' src='" . $member['Picture'] . "'>";
                                    } else {
                                        ?>
                                        <img class="img profile" src="/images/avatar5.png">
                                        <?php
                                    }
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="MA-panel-heading">
                        <div class="panel-title" >
                            <h4 style="float:right!important">حذف هذا المستخدم</h4>
                            <a class="btn btn-danger" href="/admin/users" style="float:left!important"> <?php echo Lang::lang("CANCEL") ?> <i class="fa fa-arrow-circle-o-left"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="box">
                                <div class="massage-area">

                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <input value="<?php echo $member['Username']?>" disabled type="text" class="form-control" name="user" required="required" placeholder="<?php echo Lang::lang("USERNAME") ?>">
                                        </div>
                                    </div>

                                    <br/>

                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <input value="<?php echo $member['FullName']?>" disabled type="text" class="form-control" name="name" required="required" placeholder="<?php echo Lang::lang("FULL_NAME") ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <input value="<?php echo $member['Email']?>" disabled type="email" class="form-control" name="email" required="required" placeholder="<?php echo Lang::lang("EMAIL") ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <textarea class="form-control" name="desc" disabled placeholder="<?php echo Lang::lang("DESC") ?>"><?php echo $member['uDesc']?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-8" style="height: 50px;">
                                                <label>الصلاحية</label>
                                                <?php
                                                if ($member['Permission'] == 1) {
                                                    ?>
                                                    <span><?php echo Lang::lang("PERM_ADMIN") ?></span>
                                                    <?php
                                                }
                                                elseif ($member['Permission'] == 2) {
                                                    ?>
                                                    <span><?php echo Lang::lang("PERM_JOBBER") ?></span>
                                                    <?php
                                                }
                                                elseif ($member['Permission'] == 2) {
                                                    ?>
                                                    <span><?php echo Lang::lang("PERM_USER") ?></span>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <span>لايملك صلاحية</span>
                                                    <?php
                                                }
                                                ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <confirm class="btn btn-primary confirm" id="<?php echo $member['UserId'] ?>"><i class="fa fa-times"></i><?php echo Lang::lang("DELETE_USER") ?></confirm>
                                    </div>
                                </div><!-- /.box-body -->
                            </div>
                        </div>
                        <!-- end: page -->
                    </div> <!-- end Panel -->
                </div>
            </div>
    </div><!-- container -->
</div>
