<?php
use MRDEVELOPER\Vendor\Language\Lang;
?>
<div class="auth-panel">
    <div class="container">
        <st class="text-center"><?php echo Lang::lang("SIGN_IN") ?></st>
        <div class="  text-errors">
            <?php
            if (isset($error))
               echo $error;
            $user = isset($_POST['user']) ? $_POST['user']: null;
            if (isset($msg))
                echo $msg;
            ?>
        </div>
        <div class="form-auth">
            <form class="form-horizental" role="form" method="POST">
                <div class="form-group">
                    <input type="text" name="user" value="<?php echo $user ?>" placeholder="<?php echo Lang::lang("username") ?>" class="form-control user-input" required="required">
                    <label class="error-label user"></label>
                </div>
                <div class="form-group">
                    <input type="password" name="pass" placeholder="<?php echo Lang::lang("password") ?>" class="form-control pass-input" required="required">
                    <label class="error-label pass"></label>
                </div>
                <div class="form-group session-group">
                    <label for="session" style="display: inline-block"> <?php echo Lang::lang("remember_me") ?></label>
                    <input id="session" value="session" type="checkbox" name="remmeber">
                </div>
                <div class="form-group">
                    <input type="submit" name="login" value="<?php echo Lang::lang("SIGN_IN") ?>" class="btn btn-auth login">
                </div>
            </form>
            <hr />
            <st class="text-center">- Or -</st>
            <button class="btn btn-auth-social face"><i class="fa fa-facebook-official"></i> <span> Sign In</span></button>
            <hr />
            <a href="/auth/forget"><?php echo Lang::lang("f_pass") ?></a>
            <a href="/auth/register"><?php echo Lang::lang("Register") ?></a>
        </div>
    </div>
</div>