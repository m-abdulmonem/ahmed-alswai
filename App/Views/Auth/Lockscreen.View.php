<div class=" card-box">
<div class="panel-body">
    <?php
    if (isset($error))
        echo $error
    ?>
    <form method="POST" action="" role="form" class="text-center">
        <div class="user-thumb">
            <img src="<?php echo $member['Picture']?>" class="img-responsive img-circle img-thumbnail" alt="thumbnail"
                 style="width: 100px;height: 100px;border-radius: 50%;">
        </div>
        <div class="form-group">
            <h3><?php echo $member['Username'] ?></h3>
            <p class="text-muted">
                Enter your password to access the admin.
            </p>
            <div class="input-group m-t-30">
                <input
                        type="password"
                        name="pass"
                        style="margin-right: 1px;background: #eee"
                        class="form-control"
                        placeholder="Password"
                        required=""
                        autocomplete="off">
                <span class="input-group-btn">
                <input
                        style="background: #E91E63;border: 0;color: #fff;"
                        type="submit"
                        name="open"
                        class="btn btn-auth"
                        value="Log in" />
            </span>
            </div>
        </div>

    </form>


</div>
    <div class="row">
        <div class="col-sm-12 text-center">
            <p>
                Not <span style="background: #da514e;color: #fff;padding: 0 8px 0;"><?php echo $member['Username']?></span>? <a href="/auth/login" class="text-primary m-l-5"><b>Sign In</b></a>
            </p>
        </div>
    </div>
</div>


