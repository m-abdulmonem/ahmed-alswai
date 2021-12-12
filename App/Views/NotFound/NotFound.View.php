<?php
if (isset($page)){
    $url = $page;
}
?>
<style>
    b{
        font-size: 111px;
        color: #5fbeaa;
    }
</style>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <div class="wrapper-page">
                <div class="ex-page-content text-center">
                    <div class="text-error">
                        <span class="text-primary">4</span><b>0</b><span class="text-info">4</span>
                    </div>
                    <h2>Who0ps! Page not found</h2>
                    <br>
                    <p class="text-muted">
                        This page cannot found or is missing.
                    </p>
                    <p class="text-muted">
                        Use the navigation above or the button below to get back and track.
                    </p>
                    <br>
                    <a class="btn btn-default waves-effect waves-light" href="<?php echo $url?>"> Return Home</a>

                </div>
            </div>
            <!-- end wrapper page -->

        </div> <!-- container -->

    </div> <!-- content -->

    <footer class="footer">
        © 2016. All rights reserved.
    </footer>

</div>
