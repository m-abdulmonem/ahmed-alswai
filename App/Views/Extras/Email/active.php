<?php
use AlMOSTAQBAL\Models\Users;
use AlMOSTAQBAL\Vendor\Language\Lang;
?>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo Lang::lang("SUBJECT_ACTIVE")?></title>
    </head>
    <body>

        <div class="container">
            <div class="content">
                <st><?php echo Lang::lang("ACTIVE_title")?></st>
                <div class="cont">
                    <p>Please Click On Active Button To Activate Your Account</p>
                    <a href="/auth/active/<?php  echo Users::where('MA_Active_Code ', $code)['MA_Active_Code'] ?>"></a>
                </div>
            </div>
        </div>

    </body>
</html>