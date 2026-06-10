<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'famira_db';

$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn){
    die("Koneksi gagal: " . mysqli_error_connect());
}

?>
