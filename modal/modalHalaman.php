<?php
    include "koneksi.php";

    //ekstensi gambar
    $gambarName = $_FILES['gambar']['name'];
    $gambarType = $_FILES['gambar']['type'];
    $gambarError = $_FILES['gambar']['error'];
    $gambarTmp = $_FILES['gambar']['tmp_name'];

    if(isset($_POST['insert'])){
        //ekstensi inputan
        $judul = $_POST['judul'];
        $tanggal = $_POST['tanggal'];
        $konten = $_POST['konten'];

        // pengecekan file
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
        // lolos pengecekan file gambar
        }else{
            //nama gambar unik
            $gambarNamenew = uniqid();
            $gambarNamenew .= '.';
            $gambarNamenew .= $gambarName;

            //upload gambar
            move_uploaded_file($gambarTmp,'../img/halaman/'.$gambarNamenew);
            $input = mysqli_query($koneksi,"INSERT INTO HALAMAN VALUES ('', '$gambarNamenew','$judul', '$tanggal', '$konten')");
                if($input){
                    header("Location:../pages/table.halaman.php");
                }
        }
    }else if(isset($_POST['update'])){
        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $tanggal = $_POST['tanggal'];
        $konten = $_POST['konten'];

        if($_FILES['gambar']['error'] == 4){
            $gambarNamenew = $_POST['gambarlama'];
        }else{
            if($gambarType != "image/png" and $gambarType != "image/jpeg"){
                header("Location:../pages/table.halaman.php");
                return false;
            // lolos pengecekan file gambar
            }else{
                //hapus gambar lama
                $gambarLama = $_POST['gambarlama'];
                $gambar = glob('../img/halaman/*');
                foreach($gambar as $gam){
                    if($gam == "../img/halaman/$gambarLama"){
                    unlink($gam);
                    }
                }
            }
            $gambarName = $_FILES['gambar']['name'];
            $gambarNamenew = uniqid();
            $gambarNamenew .= '.';
            $gambarNamenew .= $gambarName;

        }
        //upload gambar baru
        move_uploaded_file($gambarTmp,'../img/halaman/'.$gambarNamenew);
        $edit = mysqli_query($koneksi,"UPDATE HALAMAN SET gambar_halaman='$gambarNamenew', judul_halaman='$judul', tanggalpost_halaman='$tanggal', konten_halaman='$konten' WHERE id_halaman='$id'");
            if($edit){
            header("Location:../pages/table.halaman.php");
        }

    }else if(isset($_GET['delete'])){
        $id = $_GET['id'];
        $gambarNamenew = $_GET['gambar'];
        //file hapus gambar
        $gambar = glob('../img/halaman/*');
        foreach($gambar as $gam){
            if($gam == "../img/halaman/$gambarNamenew"){
               unlink($gam);
               echo "lolos";
            }
        }
        //hapus database
        $hapus = mysqli_query($koneksi,"DELETE FROM HALAMAN WHERE id_halaman = '$id'");
        if($hapus){
            header("Location:../pages/table.halaman.php");
        }

    }

?>
