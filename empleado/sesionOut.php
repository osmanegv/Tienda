<?php
session_start();
//session_destroy();
unset($_SESSION['loge']);
header('location: logine.php');

?>