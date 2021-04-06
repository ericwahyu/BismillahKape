<?php
    include "koneksi.php";

    if(isset($_POST['insert'])){
        //ekstensi file
        $gambarName = $_FILES['gambar']['name'];
        $gambarType = $_FILES['gambar']['type'];
        $gambarError = $_FILES['gambar']['error'];
        $gambarTmp = $_FILES['gambar']['tmp_name'];

        //ekstensi post
        $judul = $_POST['judul'];
        $tanggal = $_POST['tanggal'];
        $konten = $_POST['konten'];

        // pengecekan file
        if($gambarError == 4){
            //notif
            echo "<script>
                  alert('Silahkan pilih file gambar terlebih dahulu !'); window.location='../pages/form.halaman.php ';
                </script>";
            return false;
        }else if($gambarType != "image/png" and $gambarType != "image/jpeg"){
            //notif
            echo "<script>
                  alert('Yang anda upload bukan file gambar !'); window.location='../pages/form.halaman.php ';
                </script>";
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
                    echo "<script>
                            alert('Data berhasil di tambah !'); window.location='../pages/table.halaman.php ';
                        </script>";
                    return false;
                }
        }
    }else if(isset($_POST['update'])){
        //ekstensi file baru
        $gambarName = $_FILES['gambar']['name'];
        $gambarType = $_FILES['gambar']['type'];
        $gambarError = $_FILES['gambar']['error'];
        $gambarTmp = $_FILES['gambar']['tmp_name'];

        //ekstensi post
        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $tanggal = $_POST['tanggal'];
        $konten = $_POST['konten'];

        //ekstensi file lama
        $gambarLama = $_POST['gambarlama'];

        if($gambarError == 4){
            $gambarNamenew = $gambarLama;
        }else if($gambarType != "image/png" and $gambarType != "image/jpeg"){
            echo "<script>
                  alert('Yang anda upload bukan file gambar !'); window.location='../pages/table.halaman.php ';
                </script>";
            return false;
        // lolos pengecekan file gambar
        }else{
            //hapus gambar lama
            $gambar = glob('../img/halaman/*');
            foreach($gambar as $gam){
                if($gam == "../img/halaman/$gambarLama"){
                unlink($gam);
                }
            }
            //nama file unik gambar
            $gambarNamenew = uniqid();
            $gambarNamenew .= '.';
            $gambarNamenew .= $gambarName;

        }
        //upload gambar baru
        move_uploaded_file($gambarTmp,'../img/halaman/'.$gambarNamenew);
        $edit = mysqli_query($koneksi,"UPDATE HALAMAN SET gambar_halaman='$gambarNamenew', judul_halaman='$judul', tanggalpost_halaman='$tanggal', konten_halaman='$konten' WHERE id_halaman='$id'");
            if($edit){
              echo "<script>
                alert('Data berhasil terupdate !'); window.location='../pages/table.halaman.php ';
              </script>";
        }

    }else if(isset($_GET['delete'])){
        //ekstensi post
        $id = $_GET['id'];

        //ekstensi file lama
        $gambarLama = $_GET['gambarlama'];

        //file hapus gambar
        $gambar = glob('../img/halaman/*');
        foreach($gambar as $gam){
            if($gam == "../img/halaman/$gambarLama"){
               unlink($gam);
               //hapus database
               $hapus = mysqli_query($koneksi,"DELETE FROM HALAMAN WHERE id_halaman = '$id'");
               if($hapus){
                echo "<script>
                        alert('Data berhasil terhapus !'); window.location='../pages/table.halaman.php ';
                      </script>";
               }
            }
        }
    }

?>
