<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "db_kape";

    try {
        //create PDO connection
        // $koneksi = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        $koneksi = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
    } catch(PDOException $e) {
        //show error
        die("Terjadi masalah: " . $e->getMessage());
    }
?>
