<?php

if(isset($_POST['kirim'])){

    $admin = 'erickwahyu19@gmail.com'; //ganti email dg email admin (email penerima pesan)

    $nama	= htmlentities($_POST['name']);
    $email	= htmlentities($_POST['email']);
    $judul	= htmlentities($_POST['subject']);
    $pesan	= "Dari : ". $nama. ",pesan :".htmlentities($_POST['message']);

    $pengirim	= "From: " . $email ;

    if(mail($admin,$judul,$pesan,$pengirim)){
      echo "<script>
      alert('Pesan email berhasil terkirim !'); window.location='../index.php';
      </script>";
      return false;
    }else{
        die;
      echo "<script>
      alert('Pesan email gagal terkirim, silahkan coba lagi !'); window.location='../index.php#contact';
      </script>";
      return false;
    }
  }else{
    header("Location:index.php");
  }

