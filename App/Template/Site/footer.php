<?php
use MRDEVELOPER\Vendor\Language\Lang;
?>
<footer class="footer">
    <div class="footer-top">
        <div class="col-sm-4 text-center">
            <st><?php echo Lang::lang("ABOUT_ME")?></st>
            <img src="/Site/images/index.jpeg" alt="Essam jumea" class="-rounded-circle">
            <p><?php echo Lang::lang("MANGER")?></p>
            <span><?php echo Lang::lang("MANGER_DESC") ?></span>
        </div><!-- ./col-sm-4 - ./aboutme  -->
        <div class="col-sm-4">
            <st><?php echo Lang::lang("FACEBOOK_NEWS")?></st>
            <ul>
                <div class="fb-page" data-href="https://www.facebook.com/itcmans/" data-tabs="timeline" data-width="100%" data-height="100%" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/itcmans/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/itcmans/">‎مركز تقنية المعلومات المنصورة‎</a></blockquote></div>
            </ul>
        </div><!-- ./col-sm-4 - ./facebooknews  -->
        <div class="col-sm-4">
            <st><?php echo Lang::lang("SITE_MAP")?></st>
            <ul>
                <li><a href="#"><?php echo Lang::lang("HOME_PAGE")?></a></li>
                <li><a href="#"><?php echo Lang::lang("ABOUT_US")?></a></li>
                <li><a href="#"><?php echo Lang::lang("OUR_PROJECTS")?></a></li>
                <li><a href="#"><?php echo Lang::lang("OUR_PHOTOS")?></a></li>
                <li><a href="#"><?php echo Lang::lang("CONTACT_US")?></a></li>
                <li><a href="#"><?php echo Lang::lang("ACCOUNT")?></a></li>
            </ul>
        </div><!-- ./col-sm-4 - ./sitemap  -->
    </div><!-- ./Header-Top -->
    <div class="footer-bottom">
        <p><?php echo Lang::lang("FIRST_RIGHT")?> <a href="/">Al-Mostaqbal Group</a> &copy.
            <span><?php echo Lang::lang("DEVELOPER")?> : <a href="https://facebook.com/mabdulalmonem"><?php echo Lang::lang("ME")?></a></span></p>
    </div>
</footer>


<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="Site/js/jquery-3.2.1.min.js"></script>
<script src="Site/js/tether.min.js" ></script>
<script src="Site/js/bootstrap.min.js"></script>
<script src="Site/js/jquery.nicescroll.min.js"></script>
<script src="Site/js/app.js"></script>


</body>
</html>