<?php
use MRDEVELOPER\Vendor\Language\Lang;
?>
<div class="auth-panel">
    <div class="container">
        <st class="text-center">Entre New Password</st>
        <div class="  text-errors">
            <?php
            if (isset($error))
                echo $error;
            ?>
        </div>
        <div class="form-auth">
            <form class="form-horizental" role="form" method="POST">
                <div class="form-group">
                    <input type="password" name="pass" placeholder="<?php echo Lang::lang("password") ?>" autocomplete="off"  class="form-control pass-input" required="required">
                    <label class="error-label user"></label>
                </div>
                <div class="form-group">
                    <input type="password" name="re" placeholder="<?php echo Lang::lang("RE_Password") ?>" autocomplete="off" class="form-control pass-input" required="required">
                    <label class="error-label pass"></label>
                </div>
                <div class="form-group">
                    <input type="submit" name="reset" value="Reset" class="btn btn-auth login">
                </div>
            </form>
            <hr />
            <p>Do You Have An Account? <a href="/auth/login"> <?php echo Lang::lang("sign_in") ?></a></p>
        </div>
    </div>
</div>