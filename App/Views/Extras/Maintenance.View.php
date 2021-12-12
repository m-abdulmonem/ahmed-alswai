
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <link rel="stylesheet" href="/Site/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Site/css/app.css">
    <link rel="stylesheet" href="/Site/css/loader.css">

    <title>Site Maintenance | <?php echo settings()[\MRDEVELOPER\Models\Setting::getColumn(0)]?></title>


</head>
<body onload="loader()" style="margin: 0;">
<div class="loader" style="margin-top: 40vh">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>
<!-- HOME -->
<section class="margin-top-35 animate-bottom loader-content display-none" >
    <div class="container-alt">
        <div class="">
            <div class="col-sm-12 text-center">
                <div class="home-wrapper">
                    <h1 class="icon-main text-custom"><img src="<?php echo getIco() ?>" style="width: 88px;height: 89px"></h1>
                    <h1 class="home-text text-uppercase"><span class="text-primary">Site is</span> <span class="text-pink">Under</span> <span class="text-info">Maintenance</span></h1>
                    <h4 class="text-muted">We're making the system more awesome.we'll be back shortly.</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END HOME -->


<script src="/Site/js/jquery-3.2.1.min.js"></script>
<script src="/Site/js/jquery.nicescroll.min.js"></script>
<script src="/Site/js/app.js"></script>

</body>
</html>