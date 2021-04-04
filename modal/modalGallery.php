<?php
    include "koneksi.php";

    if(isset($_POST['insert'])){
        $idkategori = $_POST['idkategori'];
        $caption = $_POST['caption'];
        $tanggal = $_POST['tanggal'];

        $input = mysqli_query($koneksi,"INSERT INTO GALLERY VALUES ('', '$idkategori', '$caption', '$tanggal')");
        if($input){
            header("Location:../pages/table.gallery.php");
        }
    }else if(isset($_POST['update'])){
        $id = $_POST['id'];
        $idkategori = $_POST['idkategori'];
        $caption = $_POST['caption'];
        $tanggal = $_POST['tanggal'];

        $edit = mysqli_query($koneksi,"UPDATE GALLERY SET id_kategori_gallery='$idkategori', caption_gallery='$caption', tanggal_gallery='$tanggal' WHERE id_gallery='$id'");
        if($edit){
            header("Location:../pages/table.gallery.php");
        }

    }else if(isset($_GET['delete'])){
        $id = $_GET['id'];

        $hapus = mysqli_query($koneksi,"DELETE FROM GALLERY WHERE id_gallery = '$id'");
        if($hapus){
            header("Location:../pages/table.gallery.php");
        }

    }



?>
