<?php
    include "../koneksi.php";

    if(isset($_POST['insert'])){
        //ekstensi file
        $gambarName = $_FILES['gambar']['name'];
        $gambarType = $_FILES['gambar']['type'];
        $gambarError = $_FILES['gambar']['error'];
        $gambarTmp = $_FILES['gambar']['tmp_name'];

        //ekstensi post
        $idkategori = $_POST['idkategori'];
        $caption = $_POST['caption'];
        $tanggal = $_POST['tanggal'];
        $deskripsi = $_POST['deskripsi'];

        // pengecekan file
        if($gambarError == 4){
            //notif
            echo "<script>
                  alert('Silahkan pilih file gambar terlebih dahulu !'); window.location='../pages/form.gallery.php ';
                </script>";
            return false;
        }else if($gambarType != "image/png" and $gambarType != "image/jpeg"){
            //notif
            echo "<script>
                  alert('Yang anda upload bukan file gambar !'); window.location='../pages/form.gallery.php ';
                </script>";
            return false;
        // lolos pengecekan file gambar
        }else{
            //nama gambar unik
            $gambarNamenew = uniqid();
            $gambarNamenew .= '.';
            $gambarNamenew .= $gambarName;

            //upload gambar
            move_uploaded_file($gambarTmp,'../img/gallery/'.$gambarNamenew);
            $input = mysqli_query($koneksi,"INSERT INTO GALLERY VALUES ('', '$idkategori', '$caption', '$gambarNamenew', '$tanggal', '$deskripsi')");
            if($input){
                echo "<script>
                        alert('Data berhasil di tambah !'); window.location='../pages/table.gallery.php ';
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
        $caption = $_POST['caption'];
        $tanggal = $_POST['tanggal'];
        $deskripsi = $_POST['deskripsi'];

        //ekstensi file lama
        $gambarLama = $_POST['gambarlama'];

        //pengecekkan file
        if($gambarError == 4){
            $gambarNamenew = $gambarLama;
        }else if($gambarType != "image/png" and $gambarType != "image/jpeg"){
            echo "<script>
                  alert('Yang anda upload bukan file gambar !'); window.location='../pages/table.gallery.php ';
                </script>";
            return false;
        // lolos pengecekan file gambar
        }else{
            //hapus gambar lama
            $gambar = glob('../img/gallery/*');
            foreach($gambar as $gam){
                if($gam == "../img/gallery/$gambarLama"){
                unlink($gam);
                }
            }
            //nama file unik gambar
            $gambarNamenew = uniqid();
            $gambarNamenew .= '.';
            $gambarNamenew .= $gambarName;

        }
        //upload gambar baru
        move_uploaded_file($gambarTmp,'../img/gallery/'.$gambarNamenew);
        $edit = mysqli_query($koneksi,"UPDATE GALLERY SET id_kategori_gallery='$idkategori', caption_gallery='$caption', gambar_gallery='$gambarNamenew', tanggal_gallery='$tanggal', deskripsi_gallery='$deskripsi' WHERE id_gallery='$id'");
        if($edit){
            echo "<script>
                    alert('Data berhasil terupdate !'); window.location='../pages/table.gallery.php ';
                  </script>";
        }

    }else if(isset($_GET['delete'])){
        //ekstensi post
        $id = $_GET['id'];

        //ekstensi file lama
        $gambarLama = $_GET['gambarlama'];

        //file hapus gambar
        $gambar = glob('../img/gallery/*');
        foreach($gambar as $gam){
            if($gam == "../img/gallery/$gambarLama"){
               unlink($gam);
               //hapus database
               $hapus = mysqli_query($koneksi,"DELETE FROM GALLERY WHERE id_gallery = '$id'");
               if($hapus){
                echo "<script>
                        alert('Data berhasil terhapus !'); window.location='../pages/table.gallery.php ';
                      </script>";
               }
            }
        }

    }

?>
