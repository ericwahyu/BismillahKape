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
        $idkategori = $_POST['idkategori'];
        $nama = $_POST['nama'];
        $jabatan = $_POST['jabatan'];
        $tahun = $_POST['tahun'];
        $pekerjaan = $_POST['pekerjaan'];
        $pesan = $_POST['pesan'];
        $instagram = $_POST['instagram'];

        // pengecekan file
        if($gambarError == 4){
            //notif
            echo "<script>
                  alert('Silahkan pilih file gambar terlebih dahulu !'); window.location='../pages/form.anggota.php ';
                </script>";
            return false;
        }else if($gambarType != "image/png" and $gambarType != "image/jpeg"){
            //notif
            echo "<script>
                  alert('Yang anda upload bukan file gambar !'); window.location='../pages/form.anggota.php ';
                </script>";
            return false;
        // lolos pengecekan file gambar
        }else{
            //nama gambar unik
            $gambarNamenew = uniqid();
            $gambarNamenew .= '.';
            $gambarNamenew .= $gambarName;

            //upload gambar
            move_uploaded_file($gambarTmp,'../img/anggota/'.$gambarNamenew);
            $input = mysqli_query($koneksi,"INSERT INTO anggota VALUES ('', '$idkategori','$gambarNamenew','$nama','$jabatan', '$tahun', '$pekerjaan', '$pesan', '$instagram')");
                if($input){
                    echo "<script>
                            alert('Data berhasil di tambah !'); window.location='../pages/table.anggota.php ';
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
        $idkategori = $_POST['idkategori'];
        $nama = $_POST['nama'];
        $jabatan = $_POST['jabatan'];
        $tahun = $_POST['tahun'];
        $pekerjaan = $_POST['pekerjaan'];
        $pesan = $_POST['pesan'];
        $instagram = $_POST['instagram'];

        //ekstensi file lama
        $gambarLama = $_POST['gambarlama'];

        if($gambarError == 4){
            $gambarNamenew = $gambarLama;
        }else if($gambarType != "image/png" and $gambarType != "image/jpeg"){
            echo "<script>
                  alert('Yang anda upload bukan file gambar !'); window.location='../pages/table.anggota.php ';
                </script>";
            return false;
        // lolos pengecekan file gambar
        }else{
            //hapus gambar lama
            $gambar = glob('../img/anggota/*');
            foreach($gambar as $gam){
                if($gam == "../img/anggota/$gambarLama"){
                unlink($gam);
                }
            }
            //nama file unik gambar
            $gambarNamenew = uniqid();
            $gambarNamenew .= '.';
            $gambarNamenew .= $gambarName;

        }
        //upload gambar baru
        move_uploaded_file($gambarTmp,'../img/anggota/'.$gambarNamenew);
        $edit = mysqli_query($koneksi,"UPDATE anggota SET foto_anggota='$gambarNamenew', id_kategori_anggota='$idkategori', nama_anggota='$nama', jabatan_anggota='$jabatan', tahun_angkatan='$tahun' , pekerjaan_anggota='$pekerjaan', pesankesan_anggota='$pesan', name_instagram='$instagram' WHERE id_anggota='$id'");
            if($edit){
              echo "<script>
                alert('Data berhasil terupdate !'); window.location='../pages/table.anggota.php ';
              </script>";
              return false;
        }

    }else if(isset($_GET['delete'])){
        //ekstensi post
        $id = $_GET['id'];

        //ekstensi file lama
        $gambarLama = $_GET['gambarlama'];

        // var_dump($id);
        // var_dump($gambarLama);
        // die;
        //file hapus gambar
        $gambar = glob('../img/anggota/*');
        foreach($gambar as $gam){
            if($gam == "../img/anggota/$gambarLama"){
               unlink($gam);
               //hapus database
               break;
            }
        }
            $hapus = mysqli_query($koneksi,"DELETE FROM anggota WHERE id_anggota = '$id'");
            if($hapus){
                echo "<script>
                        alert('Data berhasil terhapus !'); window.location='../pages/table.anggota.php ';
                    </script>";
                    return false;
            }
    }

?>
