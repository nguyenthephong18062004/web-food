
<?php
session_start();


define('SITEURL', 'http://localhost/BtlWeb-main/');
$host = "localhost";
$fullname = "root";
$password = "";
$dbname = "food-order";

$conn = new mysqli ( $host, $fullname, $password, $dbname);

if( $conn->connect_error ){
    die("kết nối không thành công".$conn->connect_error);
}
?>