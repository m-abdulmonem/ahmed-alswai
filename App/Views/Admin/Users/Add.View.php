<div class="content">
    <div class="container">
        <form method="POST" enctype="multipart/form-data">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading">
                                <h3 class="panel-title">إختر صورتك</h3>
                            </div>
                            <div class="panel-body">
                                <p class="ma-img">

                                </p>
                            </div>

                            <!-- List group -->
                            <ul class="list-group">
                                <li class="img list-group-item">
                                    <img class="img profile" src="/Site/images/avatar5.png">
                                </li>
                                <li class="list-group-item">
                                   <div class="form-group file">
                                       <span>إختر صورتك</span>
                                       <input id="file" type="file" class="form-control picture btn-file" name="image">
                                   </div>
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
                         <h4 style="float:right!important">إضافة مستخدم جديد</h4>
                           <a class="btn btn-danger" href="/admin/users" style="float:left!important"> إالغاء <i class="fa fa-arrow-circle-o-left"></i></a>
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
                                            <label for="user">إسم المستخدم : </label>
                                            <input id="user" value="<?php echo is(post('user')) ? post('user') : null?>" type="text" class="form-control" name="user" required placeholder="إسم المستخدم">
                                        </div>
                                    </div>

                                    <br/>

                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <label for="name">الإسم كاملا : </label>
                                            <input id="name" value="<?php echo is(post('name')) ? post('name') : null?>" type="text" class="form-control" name="name" required="required" placeholder="الإسم كاملا">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <label for="email">البريد الالكترونى : </label>
                                            <input id="email" value="<?php echo is(post('email')) ? post('email') : null?>" type="email" class="form-control" name="email" required="required" placeholder="البريد الالكترونى">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <label for="pass">كلمة المرور : </label>
                                            <input id="pass" type="password" class="form-control" name="pass" required="required" placeholder="كلمة المرور">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <label for="repass">تأكيد كلمة المرور : </label>
                                            <input id="repass" type="password" class="form-control" name="repass" required="required" placeholder="تأكيد كلمة المرور">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <label for="desc">الوصف : </label>
                                            <textarea id="desc" class="form-control" name="desc" placeholder="الوصف"><?php echo is(post('desc')) ? post('desc') : null?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <label for="permission">الصلاحية : </label>
                                            <select id="permission" class="form-control" name="perm">
                                                <option>الصلاحيات</option>
                                                <option value="1">مدير</option>
                                                <option value="2">موظف</option>
                                                <option value="3">مستخدم عادى</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" name="MA_ADD_USER" value="إضافة">
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
