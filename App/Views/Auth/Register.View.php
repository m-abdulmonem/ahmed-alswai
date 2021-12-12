<div class="auth-panel">
    <div class="container">
        <st class="text-center">Insert Your Data Here</st>

        <div class="form-auth">
            <div class="text-error">
                <?php
                if (isset($OK))
                    echo $OK;
                else
                    if (isset($error))
                        echo $error;
                ?>
            </div>
            <form class="form-horizental" role="form" method="POST" action="#">
                <div class="form-group">
                    <input type="text" name="user" placeholder="Username" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="email" placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="name" placeholder="Name" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" name="pass" placeholder="Password" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" name="repass" placeholder="RePassword" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" name="register" value="Sign UP" class="btn btn-auth">
                </div>
            </form>
            <hr />
            <st class="text-center">- Or -</st>
            <button class="btn btn-auth-social face"><i class="fa fa-facebook-official"></i> <span> Sign In</span></button>
            <hr />
            <a href="/auth/login">Do You Have An Account?</a>
        </div>
    </div>
</div>