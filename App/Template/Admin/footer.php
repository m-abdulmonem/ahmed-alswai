
</div> <!-- content -->

<footer class="footer">
    © 2016. All rights reserved.
</footer>

</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->





</div>
<!-- END wrapper -->


<!-- jQuery  -->
<script src="/Admin/js/jquery-3.2.1.min.js"></script>
<script src="/Admin/js/jquery.min.js"></script>
<script src="/Admin/js/bootstrap-rtl.min.js"></script>
<script src="/Admin/js/fastclick.js"></script>
<script src="/Admin/js/jquery.slimscroll.js"></script>
<script src="/Admin/js/waves.js"></script>
<script src="/Admin/js/plugins/jquery.dataTables.min.js"></script>
<script src="/Admin/js/plugins/dataTables.bootstrap.min.js"></script>
<script src="/Admin/js/plugins/spin.js"></script>
<script src="/Admin/js/plugins/ladda.js"></script>
<script src="/Admin/js/plugins/ladda.jquery.min.js"></script>
<?php
error_reporting(0);
 if (isset($javascript) or isset($script)){

     foreach (@$javascript as $script){
         echo $script;
     }
     foreach (@$script as $java){
         echo "<script src='/Admin/js/plugins/" . $java . ".js'></script>";
     }
 }
echo "<script src='/Admin/js/plugins/" . $script . ".js'></script>";

?>

<script src="/Admin/js/plugins/froala_editor.min.js"></script>
<script src="/Admin/js/plugins/ar.js"></script>
<script src="/Admin/js/jquery.core.js"></script>
<script src="/Admin/js/jquery.app.js"></script>
<script src="/Admin/js/MA.Main.js"></script>
</body>
</html>