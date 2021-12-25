<?php 

session_start();
if (isset($_SESSION['username']) ) {


$encrypt = $_SESSION['username'];

$user_now = $encrypt;

} 

if (!isset($_SESSION['session_user'])) {
$_SESSION['session_user']  = 0;
}




define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'e_canteen');


//define the timezone of this application
date_default_timezone_set("Asia/Tokyo");


//mengambil parameter 
function connect() {
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if (mysqli_connect_errno($connect)) {
        die("Failed to connect:" . mysqli_connect_error());
    }

    mysqli_set_charset($connect, "utf8");

    return $connect;
}

$connect = connect();

?> 