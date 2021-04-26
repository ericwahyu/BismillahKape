<?php

require_once("../koneksi.php");

if(isset($_POST['login'])){
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

  $sql = "SELECT * FROM users WHERE username=:username OR email=:email";
  $stmt = $koneksi->prepare($sql);

  $params = array(
      ":username" => $username,
      ":email" => $username
  );

  $stmt->execute($params);

  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if($user){
    if(password_verify($password, $user["password"])){
        session_start();
        $_SESSION["user"] = $user;
        header("Location: ../pages/table.berita.php");
    }
  }
}
