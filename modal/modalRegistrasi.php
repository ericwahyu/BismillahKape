<?php

  require_once("../koneksi.php");

  if(isset($_POST['register'])){
    // filter data yang diinputkan
    $nama_depan = filter_input(INPUT_POST, 'nama_depan', FILTER_SANITIZE_STRING);
    $nama_belakang = filter_input(INPUT_POST, 'nama_belakang', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    // menyiapkan query
    $sql = "INSERT INTO users (nama_depan, nama_belakang, username, email, password)
            VALUES (:nama_depan, :nama_belakang , :username, :email, :password)";
    $stmt = $koneksi->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":nama_depan" => $nama_depan,
        ":nama_belakang" => $nama_belakang,
        ":username" => $username,
        ":password" => $password,
        ":email" => $email
    );
    $saved = $stmt->execute($params);

    if($saved) header("Location: ../pages/auth-login.php");
 }

