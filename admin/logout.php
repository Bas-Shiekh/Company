<?php
session_start();
session_unset();
session_destroy();
setcookie("username", "", time()-(60*60), "/");
header("location:adminlogin.php");