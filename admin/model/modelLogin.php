<?php

include("../koneksi.php");

  if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = mysqli_query($koneksi, "SELECT * FROM USERS WHERE username ='$username' AND password ='$password'");
    $user = mysqli_fetch_array($cek);

    if($user['username'] == $username && $user['password'] == $password){
      session_start();
      $_SESSION['username'] = $user['username'];
      $_SESSION['name'] = $user['name'];
      echo "<script>
          alert('Login Berhasil !'); window.location='../index.php?admin';
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
    session_start();
    unset($_SESSION['username']);
    session_destroy();
    echo "<script>
            alert('Logout Berhasil !'); window.location='../index.php';
          </script>";
          return false;

  }else if(isset($_POST['reset'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordnew = $_POST['confirm-password'];

    if($password == $passwordnew){
      $reset = mysqli_query($koneksi,"UPDATE USERS SET password ='$password' WHERE email='$email'");
        if($reset){
            echo "<script>
                    alert('Password berhasil terupdate !'); window.location='../pages/auth-login.php';
                </script>";
        }else{
          echo "<script>
            alert('Password gagal terupdate !'); window.location='../pages/auth-reset-password.php';
            </script>";
        }
    }else{
      echo "<script>
            alert('Password tidak sama !'); window.location='../pages/auth-reset-password.php';
            </script>";
    }
  }
