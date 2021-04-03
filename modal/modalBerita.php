<?php
    include "koneksi.php";

    if(isset($_POST['insert'])){
        $idkategori = $_POST['idkategori'];
        $judul = $_POST['judul'];
        $tanggal = $_POST['tanggal'];
        $konten = $_POST['konten'];

        $input = mysqli_query($koneksi,"INSERT INTO BERITA VALUES ('', '$idkategori', '$judul', '$tanggal', '$konten')");
        if($input){
            header("Location:../pages/table.berita.php");
        }
    }else if(isset($_POST['update'])){
        $id = $_POST['id'];
        $idkategori = $_POST['idkategori'];
        $judul = $_POST['judul'];
        $tanggal = $_POST['tanggal'];
        $konten = $_POST['konten'];

        $edit = mysqli_query($koneksi,"UPDATE BERITA SET id_kategori_berita='$idkategori', judul_berita='$judul', tanggalpost_berita='$tanggal', konten_berita='$konten' WHERE id_berita='$id'");
        if($edit){
            header("Location:../pages/table.berita.php");
        }

    }else if(isset($_GET['delete'])){
        $id = $_GET['id'];

        $hapus = mysqli_query($koneksi,"DELETE FROM BERITA WHERE id_berita = '$id'");
        if($hapus){
            header("Location:../pages/table.berita.php");
        }

    }

?>
