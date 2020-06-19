<?php
session_start();
session_destroy();
echo "<script>window.open('loginadmin.php','_self')</script>";

?>