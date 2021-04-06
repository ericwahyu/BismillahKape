<?php
    include "koneksi.php";

    if(isset($_POST['insert'])){
        $nama = $_POST['nama'];

        $input = mysqli_query($koneksi,"INSERT INTO KATEGORI_BERITA VALUES ('', '$nama')");
        if($input){
            echo "<script>
                    alert('Data berhasil di tambah !'); window.location='../pages/table.kategoriberita.php ';
                  </script>";
        }
    }else if(isset($_POST['update'])){
        $id = $_POST['id'];
        $nama = $_POST['nama'];

        $edit = mysqli_query($koneksi,"UPDATE KATEGORI_BERITA SET nama_kategori_berita='$nama' WHERE id_kategori_berita='$id'");
        if($edit){
            echo "<script>
                    alert('Data berhasil terupdate !'); window.location='../pages/table.kategoriberita.php ';
                </script>";
        }

    }else if(isset($_GET['delete'])){
        $id = $_GET['id'];

        $hapus = mysqli_query($koneksi,"DELETE FROM KATEGORI_BERITA WHERE id_kategori_berita = '$id'");
        if($hapus){
            echo "<script>
                    alert('Data berhasil terhapus !'); window.location='../pages/table.kategoriberita.php ';
                </script>";
        }

    }

?>
