<?php
    include "../koneksi.php";

    if(isset($_POST['insert'])){
        $judul = $_POST['judul'];
        $tanggal = $_POST['tanggal'];
        $konten = $_POST['konten'];

        $input = mysqli_query($koneksi,"INSERT INTO HALAMAN VALUES ('', '$judul', '$tanggal', '$konten')");
        if($input){
            header("Location:../adminHalaman.php");
        }
    }else if(isset($_POST['update'])){
        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $tanggal = $_POST['tanggal'];
        $konten = $_POST['konten'];
        
        $edit = mysqli_query($koneksi,"UPDATE HALAMAN SET judul_halaman='$judul', tanggalpost_halaman='$tanggal', konten_halaman='$konten' WHERE id_halaman='$id'");
        if($edit){
            header("Location:../adminHalaman.php");
        }
        
    }else if(isset($_GET['perintah'])){
        $id = $_GET['id'];

        $hapus = mysqli_query($koneksi,"DELETE FROM HALAMAN WHERE id_halaman = '$id'");
        if($hapus){
            header("Location:../adminHalaman.php");
        }

    }
        


?>