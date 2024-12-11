<?php
$host = "localhost";
$fullname = "root";
$password = "";
$dbname = "dangky";

$conn = new mysqli ( $host, $fullname, $password, $dbname);

if( $conn->connect_error ){
    die("kết nối không thành công".$conn->connect_error);
}
?>