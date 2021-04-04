<?php
    include "koneksi.php";

    if(isset($_POST['insert'])){
        //ekstensi harus gambar
        $gambarName = $_FILES['gambar']['name'];
        $gambarType = $_FILES['gambar']['type'];
        $gambarError = $_FILES['gambar']['error'];
        $gambarTmp = $_FILES['gambar']['tmp_name'];

        //ekstensi inputan
        $judul = $_POST['judul'];
        $tanggal = $_POST['tanggal'];
        $konten = $_POST['konten'];


        if($gambarError == 4){
            // echo "<script>
            //         alert('pilih file gambar terlebih dahulu !');
            //         document.location.herf = '../pages/form.halaman.php';
            //       </script>";
            header("Location:../pages/form.halaman.php");
            return false;
        }else if($gambarType != "image/png" and $gambarType != "image/jpeg"){
            header("Location:../pages/form.halaman.php");
            return false;
        }else{
            move_uploaded_file($gambarTmp,'../img/halaman/'.$gambarName);
            $input = mysqli_query($koneksi,"INSERT INTO HALAMAN VALUES ('', '$gambarName','$judul', '$tanggal', '$konten')");
                if($input){
                    header("Location:../pages/table.halaman.php");
                }
        }
    }else if(isset($_POST['update'])){
        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $tanggal = $_POST['tanggal'];
        $konten = $_POST['konten'];

        $edit = mysqli_query($koneksi,"UPDATE HALAMAN SET judul_halaman='$judul', tanggalpost_halaman='$tanggal', konten_halaman='$konten' WHERE id_halaman='$id'");
        if($edit){
            header("Location:../pages/table.halaman.php");
        }

    }else if(isset($_GET['delete'])){
        $id = $_GET['id'];

        $hapus = mysqli_query($koneksi,"DELETE FROM HALAMAN WHERE id_halaman = '$id'");
        if($hapus){
            header("Location:../pages/table.halaman.php");
        }

    }



?>
