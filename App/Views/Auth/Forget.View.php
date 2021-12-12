<div class=" card-box">
    <div class="panel-body">
        <form method="POST" action="" role="form" class="text-center">

            </div>
            <div class="form-group">
                <h3 class="text-center">Reset Password</h3>
                <p class="alert alert-info alert-dismissable text-center ">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Enter your Email and instructions will be <br /> sent to you!

                </p>
                <div class="alerts">
                    <?php
                    if (isset($ok))
                        echo $ok;
                    if (isset($error))
                        echo $error
                    ?>
                </div>
                <div class="input-group m-t-30">
                    <input
                        type="text"
                        name="uname"
                        style="margin-right: 1px;background: #eee"
                        class="form-control"
                        placeholder="Username Or Email"
                        required=""
                        autocomplete="off">
                    <span class="input-group-btn">
                <input
                    style="background: #E91E63;border: 0;color: #fff;"
                    type="submit"
                    name="send"
                    class="btn btn-auth"
                    value="Reset" />
            </span>
                </div>
            </div>

        </form>


    </div>
</div>
