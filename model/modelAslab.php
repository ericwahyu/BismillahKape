<?php
    include "../koneksi.php";

    // if(isset($_GET['view'])){
    //     $data = mysqli_query($koneksi, "SELECT * FROM HALAMAN");

    //     header("location:pages/table.halaman.php?data=$data&admin=yes&table=yes");
    //     return false;
    if(isset($_POST['insert'])){
        //ekstensi file
        $gambarName = $_FILES['gambar']['name'];
        $gambarType = $_FILES['gambar']['type'];
        $gambarError = $_FILES['gambar']['error'];
        $gambarTmp = $_FILES['gambar']['tmp_name'];

        //ekstensi post
        $nama = $_POST['nama'];
        $tahun = $_POST['tahun'];
        $idkategori = $_POST['idkategori'];

        // pengecekan file
        if($gambarError == 4){
            //notif
            echo "<script>
                  alert('Silahkan pilih file gambar terlebih dahulu !'); window.location='../pages/form.aslab.php ';
                </script>";
            return false;
        }else if($gambarType != "image/png" and $gambarType != "image/jpeg"){
            //notif
            echo "<script>
                  alert('Yang anda upload bukan file gambar !'); window.location='../pages/form.aslab.php ';
                </script>";
            return false;
        // lolos pengecekan file gambar
        }else{
            //nama gambar unik
            $gambarNamenew = uniqid();
            $gambarNamenew .= '.';
            $gambarNamenew .= $gambarName;

            //upload gambar
            move_uploaded_file($gambarTmp,'../img/aslab/'.$gambarNamenew);
            $input = mysqli_query($koneksi,"INSERT INTO aslab VALUES ('', '$idkategori','$gambarNamenew','$nama', '$tahun')");
                if($input){
                    echo "<script>
                            alert('Data berhasil di tambah !'); window.location='../pages/table.aslab.php ';
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
        $nama = $_POST['nama'];
        $tahun = $_POST['tahun'];

        //ekstensi file lama
        $gambarLama = $_POST['gambarlama'];

        if($gambarError == 4){
            $gambarNamenew = $gambarLama;
        }else if($gambarType != "image/png" and $gambarType != "image/jpeg"){
            echo "<script>
                  alert('Yang anda upload bukan file gambar !'); window.location='../pages/table.aslab.php ';
                </script>";
            return false;
        // lolos pengecekan file gambar
        }else{
            //hapus gambar lama
            $gambar = glob('../img/aslab/*');
            foreach($gambar as $gam){
                if($gam == "../img/aslab/$gambarLama"){
                unlink($gam);
                }
            }
            //nama file unik gambar
            $gambarNamenew = uniqid();
            $gambarNamenew .= '.';
            $gambarNamenew .= $gambarName;

        }
        //upload gambar baru
        move_uploaded_file($gambarTmp,'../img/aslab/'.$gambarNamenew);
        $edit = mysqli_query($koneksi,"UPDATE aslab SET foto_aslab='$gambarNamenew', nama_aslab='$nama', tahun_angkatan='$tahun' WHERE id_aslab='$id'");
            if($edit){
              echo "<script>
                alert('Data berhasil terupdate !'); window.location='../pages/table.aslab.php ';
              </script>";
              return false;
        }

    }else if(isset($_GET['delete'])){
        //ekstensi post
        $id = $_GET['id'];

        //ekstensi file lama
        $gambarLama = $_GET['gambarlama'];

        //file hapus gambar
        $gambar = glob('../img/aslab/*');
        foreach($gambar as $gam){
            if($gam == "../img/aslab/$gambarLama"){
               unlink($gam);
               //hapus database
            }else{
                echo "<script>
                alert('Data gagal terhapus !'); window.location='../pages/table.aslab.php ';
                </script>";
                return false;
            }
        }
            $hapus = mysqli_query($koneksi,"DELETE FROM aslab WHERE id_aslab = '$id'");
            if($hapus){
                echo "<script>
                        alert('Data berhasil terhapus !'); window.location='../pages/table.aslab.php ';
                    </script>";
                    return false;
            }
    }

?>
