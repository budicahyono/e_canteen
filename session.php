<?php

session_start();
if (isset($_SESSION['username']) and isset($_SESSION['level']) ) {


$encrypt = $_SESSION['username'];
$level = $_SESSION['level'];

$user_now = $encrypt;

} 
?> 