<?php
    include "koneksi.php";

    if(isset($_POST['insert'])){
        $nama = $_POST['nama'];

        $input = mysqli_query($koneksi,"INSERT INTO KATEGORI_GALLERY VALUES ('', '$nama')");
        if($input){
            header("Location:../pages/table.kategorigallery.php");
        }
    }else if(isset($_POST['update'])){
        $id = $_POST['id'];
        $nama = $_POST['nama'];

        $edit = mysqli_query($koneksi,"UPDATE KATEGORI_GALLERY SET nama_kategori_gallery='$nama' WHERE id_kategori_gallery='$id'");
        if($edit){
           header("Location:../pages/table.kategorigallery.php");
        }

    }else if(isset($_GET['delete'])){
        $id = $_GET['id'];

        $hapus = mysqli_query($koneksi,"DELETE FROM KATEGORI_GALLERY WHERE id_kategori_gallery = '$id'");
        if($hapus){
           header("Location:../pages/table.kategorigallery.php");
        }

    }

?>
