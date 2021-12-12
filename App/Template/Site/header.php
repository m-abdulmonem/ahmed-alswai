<?php

use MRDEVELOPER\Vendor\session;
use MRDEVELOPER\Vendor\Cookie;
use MRDEVELOPER\Models\Email;
use MRDEVELOPER\Vendor\Language\Lang;
use MRDEVELOPER\Models\Contact;
$settings = settings();
$contact = Contact::where(Contact::getKey(),1);
?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <!-- Required meta tags -->
    <title><?php
        if (isset($Name) && !empty($Name)){
            echo $Name . " | ";
        }
        echo settings()['title'];
        ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/Site/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Site/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/Site/css/app.css">
    <?php
    if ($settings['lang'] == 'ar'){
        ?>
        <link rel="stylesheet" type="text/css" href="/Site/css/lang/ar.css">
        <?php
    } else{
        ?>
        <link rel="stylesheet" type="text/css" href="/Site/css/lang/en.css">
        <?php
    }
    ?>

</head>
<body class="body">
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=1622913844593873";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <?php
    $time = session::get("time");
    if ($time > time()) {
        echo "<msg>";
            echo session::get("active_account");
        echo "</msg>";
    } elseif($time < time() || $time == time()){
        session::remove("active_account");
        session::remove("time");
    }
    if (Cookie::has("SUCCESS_RESET"))
        echo "<msg>" . Cookie::get('SUCCESS_RESET') . "</msg>";

    if (session::get("STOPPED_TIME") > time())
        echo "<info>" .session::get('ACCOUNT_STOPPED') . "</info>";
    elseif(session::get("STOPPED_TIME")< time() || session::get('STOPPED_TIME') == time()){
        session::remove('STOPPED_TIME');
        session::remove('ACCOUNT_STOPPED');
    }


    $lang = $settings['lang'] == "ar" ? "en" : "ar";
    ?>
<lang class="lang" id="<?php echo $lang ?>">
    <i class="fa fa-language"></i>
    <span><?php
        if ($settings['lang'] == "ar"){
            echo "English";
        } else{
            echo "Arabic";
        }
        ?></span>
</lang>

<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <div class="col-sm-8">
        <div class="contact-list">
            <ul>
                <!-- <li><a href="mailto:<?php #echo Email::all()[0]['username']?>"><i class="fa fa-envelope-o"></i> <?php #echo Email::all()[0]['username']?></a></li> -->
                <!-- <li><a href="callto:<?php #echo $contact[Contact::getColumn(0)] ?>"><i class="fa fa-phone"></i> <?php #echo  $contact[Contact::getColumn(0)] ?></a></li> -->
            </ul>
        </div><!-- ./contact-list -->
    </div><!-- ./col-sm-8 -->
    <div class="col-sm-4">
        <div class="social-list">
            <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
        </div><!-- ./social-list -->
    </div><!-- ./col-sm-4 -->
</nav>
<div class="header">
    <div class="container">
        <div class="col-lg-4">
            <div class="logo">
                <a href="/">
                    <h3><span>Al-</span>Mostaqbal Group</h3>
                    <p class="text-default"><?php echo Lang::lang("LOGO") ?></p>
                </a>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="menu">
                <ul>
                    <button class="btn btn-menu"><i class="fa fa-list"></i></button>
                    <?php
                    if ((session::has("MR_DEVELOPER")) or (session::has("MR_DEVELOPER_ADMIN")) ) {
                        if (session::has()) {
                            ?>
                            <li><a href="/ma-admin" target="_blank"><i class="fa fa-tachometer"></i> <?php echo Lang::lang("ADMIN") ?></a></li>
                            <?php
                        }
                        ?>
                        <li><a href="#"><i class="fa fa-user"></i> <?php echo Lang::lang("ACCOUNT") ?></a></li>
                        <li><a href="#"><i class="fa fa-shopping-cart"></i> <?php echo Lang::lang("ORDERS") ?></a></li>
                        <li><a href="#"><i class="fa fa-plus-circle"></i> <?php echo Lang::lang("BUY_PRODUCT") ?></a></li>
                        <li><a href="/auth/logout"><i class="fa fa-power-off"></i> <?php echo Lang::lang("LOG_OUT") ?></a></li>
                        <?php
                    } else{
                        ?>
                        <li><a href="auth/login/?url=<?php echo window_link() ?>"><i class="fa fa-lock"></i> <?php echo Lang::lang("SIGN_IN") ?></a></li>
                        <li><a href="auth/register/?url=<?php echo window_link() ?>"><i class="fa fa-user-plus"></i> <?php echo Lang::lang("SIGN_UP") ?></a></li>
                        <?php
                    }
                    ?>

                </ul>
            </div>
        </div>
    </div>
</div>
<!-- ./Mian Header Code  -->