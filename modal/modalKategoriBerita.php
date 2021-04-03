<?php
    include "koneksi.php";

    if(isset($_POST['insert'])){
        $nama = $_POST['nama'];

        $input = mysqli_query($koneksi,"INSERT INTO KATEGORI_BERITA VALUES ('', '$nama')");
        if($input){
            header("Location:../pages/table.kategoriberita.php");
        }
    }else if(isset($_POST['update'])){
        $id = $_POST['id'];
        $nama = $_POST['nama'];

        $edit = mysqli_query($koneksi,"UPDATE KATEGORI_BERITA SET nama_kategori_berita='$nama' WHERE id_kategori_berita='$id'");
        if($edit){
            header("Location:../pages/table.kategoriberita.php");
        }

    }else if(isset($_GET['delete'])){
        $id = $_GET['id'];

        $hapus = mysqli_query($koneksi,"DELETE FROM KATEGORI_BERITA WHERE id_kategori_berita = '$id'");
        if($hapus){
            header("Location:../pages/table.kategoriberita.php");
        }

    }

?>
