<?php
 require_once("koneksi.php");

 if(isset($_GET['login'])){
     session_start();
     if(isset($_SESSION['username'])){
      header("location:pages/table.berita.php");
    }
 }else{
    header("location:pages/auth-login.php");
 }

