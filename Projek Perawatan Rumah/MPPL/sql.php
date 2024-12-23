<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "perawatanRumah";

    $connect = new mysqli($hostname, $username, $password, $database);

    if($connect->connect_error){
    die('Maaf Koneksi Gagal :'.$connect->connect_error);
    }
?>