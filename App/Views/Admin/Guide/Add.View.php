<?php
use MRDEVELOPER\Models\Category;
use MRDEVELOPER\Models\Alphabet;
?>
<style>
    .imgs{
        width: 100%;
        height: auto;
        min-height: 50px;
        background: #fff;
        border-radius: 4px;
        border: 1px solid #eaeef3;
        margin-bottom: 10px;
        padding: 10px;
    }
</style>
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
                                    <img class="img profile" src="/Site/images/place-logo.png">
                                </li>
                                <li class="list-group-item">
                                    <div class="form-group file">
                                        <span>إختر صورتك</span>
                                        <input id="file" type="file" multiple class="form-control picture btn-file" name="image">
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
                                            <label for="title">إسم المكان : </label>
                                            <input id="title" value="<?php echo is(post('title')) ? post('title') : null?>" type="text" class="form-control" name="title" required placeholder="إسم المكان">
                                        </div>
                                    </div>

                                    <br/>

                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <label for="phone">الهاتف : </label>
                                            <input id="phone" value="<?php echo is(post('phone')) ? post('phone') : null?>" type="text" class="form-control" name="phone" required placeholder="الهاتف">
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
                                            <label for="cate">التصنيف : </label>
                                            <select id="cate" class="form-control" name="category">
                                                <?php
                                                echo is(post('category')) ? "<option>" . post('category') . "</option>" : null;
                                                foreach (Category::all() as $category)
                                                    echo "<option value='" . $category[Category::getKey()] . "'>" . $category[Category::getColumn(0)] . "</option>"

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <label for="type">النوع : </label>
                                            <select id="type" name="type" class="form-control" style="text-align: center">
                                                <?php
                                                echo is(post('type')) ? "<option>" . post('type') . "</option>" : null;
                                                $alphabets = Alphabet::where('guide',1);
                                                if (empty($alphabets))
                                                    echo "<option>Sorry! The Alphabet Is empty</option>";
                                                foreach ($alphabets as $type)
                                                    echo "<option value='" . $type[Alphabet::getKey()] . "'>" . $type[Alphabet::getColumn(0)] . "</option>";
                                                ?>
                                            </select>
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
                                            <label for="map">المكان على الخريطة : </label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" name="add" value="إضافة">
                                    </div>
                                </div><!-- /.box-body -->
                            </div>
                        </div>
                        <!-- end: page -->
                    </div> <!-- end Panel -->
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="imgs">
                        <img id="thumbnil" src="" alt="image"/>
                    </div>
                   <div class="input form-group file">
                       <span>إختر صور المكان</span>
                       <input type="file" accept="image/*" multiple class="form-control picture btn-file" />
                   </div>
                </div>
            </div>
            <!-- end row -->



    </div>
        </form>

    </div><!-- container -->
</div>
