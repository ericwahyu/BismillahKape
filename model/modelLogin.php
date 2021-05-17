<?php

require_once("../koneksi.php");

  if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = mysqli_query($koneksi, "SELECT * FROM USERS WHERE username ='$username' AND password ='$password'");
    $user = mysqli_fetch_array($cek);

    if($user['username'] == $username && $user['password'] == $password){
      session_start();
      include "../koneksi.php";

      $_SESSION['username'] = $user['username'];
      $_SESSION['name'] = $user['name'];
      echo "<script>
          alert('Login Berhasil !'); window.location='../index.php?login';
        </script>";
      return false;
    }else{
      echo "<script>
          alert('Username dan Password Salah !'); window.location='../index.php';
        </script>";
      return false;
    }
  }else if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['nama_depan']." ".$_POST['nama_belakang'];

    $daftar = mysqli_query($koneksi, "INSERT INTO USERS (id, name, username, email, password) VALUES ('', '$name', '$username', '$email', '$password')");
    if($daftar){
      echo "<script>
            alert('Registrasi Berhasil !); window.location='../index.php';
            </script>";
            return false;
    }else{
      echo "<script>
        alert('Registrasi Gagal !); window.location='../pages/auth-register.php';
      </script>";
      return false;
    }

  }else if(isset($_GET['logout'])){
    session_unset();
    session_destroy();
    echo "<script>
            alert('Logout Berhasil !'); window.location='../index.php';
          </script>";
          return false;

  }
  // $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
  // $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

  // $sql = "SELECT * FROM users WHERE username=:username OR email=:email";
  // $stmt = $koneksi->prepare($sql);

  // $params = array(
  //     ":username" => $username,
  //     ":email" => $username
  // );

  // $stmt->execute($params);

  // $user = $stmt->fetch(PDO::FETCH_ASSOC);

  // if($user){
  //   if(password_verify($password, $user["password"])){
  //       session_start();
  //       $_SESSION["user"] = $user;
  //       header("Location: ../pages/table.berita.php");
  //   }
  // }
// }if(isset($_POST['register'])){
//   // filter data yang diinputkan
//   $nama_depan = filter_input(INPUT_POST, 'nama_depan', FILTER_SANITIZE_STRING);
//   $nama_belakang = filter_input(INPUT_POST, 'nama_belakang', FILTER_SANITIZE_STRING);
//   $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
//   // enkripsi password
//   $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
//   $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

//   // menyiapkan query
//   $sql = "INSERT INTO users (nama_depan, nama_belakang, username, email, password)
//           VALUES (:nama_depan, :nama_belakang , :username, :email, :password)";
//   $stmt = $koneksi->prepare($sql);

//   // bind parameter ke query
//   $params = array(
//       ":nama_depan" => $nama_depan,
//       ":nama_belakang" => $nama_belakang,
//       ":username" => $username,
//       ":password" => $password,
//       ":email" => $email
//   );
//   $saved = $stmt->execute($params);

//   if($saved) header("Location: ../pages/auth-login.php");
// }

