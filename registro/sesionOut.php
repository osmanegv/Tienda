<?php
session_start();
session_destroy();
//unset($_SESSION['log']);
header('location: login.php');

?>