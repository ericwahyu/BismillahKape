<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin Laboratorium Rekayasa Perangkat Lunak</title>

  <link href="../assets/img/logo lap.jpg" rel="icon">

  <!-- General CSS Files -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->

  <link rel="stylesheet" href="../assets/css/bootstrap1.min.css">
  <link rel="stylesheet" href="../assets/css/bootstrap2.min.css">
  <link rel="stylesheet" href="../assets/fontawesome-free-5.15.3-web/css/all.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">

  <!-- ckeditor -->
  <script src="../assets/ckeditor/ckeditor.js"></script>
</head>
<?php
  session_start();
  if(!isset($_SESSION["username"])){
    echo "<script>
          alert('Silahkan login Dahulu !'); window.location='../pages/auth-login.php';
        </script>";
    return false;
  }else{
    $username=$_SESSION["username"];
    $name=$_SESSION["name"];
  }

?>
<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $name?> </div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <!-- <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a> -->
              <div class="dropdown-divider"></div>
              <a href="../model/modelLogin.php?logout" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="table.anggota.php">Admin Page</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="table.anggota.php">Lab</a>
          </div>
          <ul class="sidebar-menu">
            <!-- <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                  <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                </ul>
              </li> -->
              <li class="menu-header">Management</li>
              <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-table"></i> <span>Table</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="table.kategoriberita.php">Kategori Berita</a></li>
                  <li><a class="nav-link" href="table.kategorigallery.php">Kategori Gallery</a></li>
                  <li class="active"><a class="nav-link" href="table.anggota.php">Anggota</a></li>
                  <li><a class="nav-link" href="table.berita.php">Berita</a></li>
                  <li><a class="nav-link" href="table.gallery.php">Gallery</a></li>
                  <li><a class="nav-link" href="table.halaman.php">Halaman</a></li>
                </ul>
              </li>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Table Anggota Laboratorium</h1>
          </div>

          <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                <div class="card-header">
                <a href="form.anggota.php" class="btn btn-icon icon-left btn-primary"><i class="fas fa-folder-plus"></i>  Tambah</a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-md">
                      <tr>
                        <th>#</th>
                        <th>Nama Kategori Anggota</th>
                        <th>Foto Anggota</th>
                        <th>Nama Anggota</th>
                        <th>Jabatan Anggota</th>
                        <th>Tahun Angkatan Anggota</th>
                        <th>Pekerjaan Anggota</th>
                        <th>Pesan & Kesan Anggota</th>
                        <th>Aksi</th>
                      </tr>
                      <?php
                        include "../koneksi.php";
                        $view = mysqli_query($koneksi, "SELECT * FROM anggota JOIN kategori_anggota ON anggota.id_kategori_anggota = kategori_anggota.id_kategori_anggota ORDER BY id_anggota ASC");
                        $index=1;
                        while($a = mysqli_fetch_array($view)):
                      ?>
                      <tr>
                        <td><?php echo $index?></td>
                        <td><?php echo $a['nama_kategori_anggota'];?></td>
                        <td><img src="../img/anggota/<?php echo $a['foto_anggota'];?>" width="100"></td>
                        <td><?php echo $a['nama_anggota']?></td>
                        <td><?php echo $a['jabatan_anggota']?></td>
                        <td><?php echo $a['tahun_angkatan']?></td>
                        <td><?php echo $a['pekerjaan_anggota']?></td>
                        <td><?php echo $sub_kalimat = substr($a['pesankesan_anggota'],0,100)."...";?></td>
                        <td class="d-flex m-2">
                          <a href="#" class="badge badge-warning mr-2" style="text-decoration:none" data-toggle="modal" data-target="#modalupdate<?php echo $a['id_anggota'];?>"><i class="fas fa-edit"></i>  Ubah</a>
                          <a href="#" class="badge badge-danger mr-2" style="text-decoration:none" data-confirm="Realy?|Anda yakin ingin menghapus data ini !" data-confirm-yes="window.location=' ../model/modelAnggota.php?id=<?php echo $a['id_anggota'];?>&delete&gambarlama=<?php echo $a['foto_anggota'];?>'"><i class="fas fa-trash-alt"></i>  Hapus</a>
                          <a href="#" class="badge badge-success mr-2" style="text-decoration:none" data-toggle="modal" data-target="#modaldetail<?php echo $a['id_anggota'];?>"><i class="fas fa-info-circle"></i>  Detail</a>
                        </td>
                      </tr>
                      <?php $index++; endwhile;?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="section-body">
          </div>
        </section>
      </div>

      <?php
        $select= mysqli_query($koneksi, "SELECT * FROM anggota JOIN kategori_anggota ON anggota.id_kategori_anggota = kategori_anggota.id_kategori_anggota");
        while($b = mysqli_fetch_array($select)):
      ?>
      <div class="modal fade" id="modalupdate<?php echo $b['id_anggota'];?>" tabindex="-1">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Update Anggota Laboratorium</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="../model/modelAnggota.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $b['id_anggota']?>">
                <input type="hidden" name="gambarlama" value="<?php echo $b['foto_anggota'];?>">
                <div class="mb-3">
                  <label for="formFile">File Foto</label> <br>
                  <img src="../img/anggota/<?php echo $b['foto_anggota'];?>" width="200">
                  <input class="form-control" type="file" id="formFile" name="gambar">
                </div>
                <div class="mb-3">
                  <label>Kategori Anggota</label>
                  <select class="form-control" name="idkategori">
                    <option selected value="<?php echo $b['id_kategori_anggota'];?>"><?php echo $b['nama_kategori_anggota'];?></option required>
                    <?php
                      $idkategori= mysqli_query($koneksi, "SELECT * FROM kategori_anggota");
                      while($c = mysqli_fetch_array($idkategori)):
                    ?>
                    <option value="<?php echo $c['id_kategori_anggota'];?>"><?php echo $c['nama_kategori_anggota'];?></option>
                    <?php endwhile;?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Anggota</label>
                  <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $b['nama_anggota']?>">
                </div>
                <div class="mb-3">
                  <label for="jabatan" class="form-label">Jabatan Anggota</label>
                  <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $b['jabatan_anggota']?>">
                </div>
                <div class="mb-3">
                  <label for="tahun" class="form-label">Tahun Angkatan Anggota</label>
                  <input type="input" class="form-control" id="tahun" name="tahun" value="<?php echo $b['tahun_angkatan']?>">
                </div>
                <div class="mb-3">
                  <label for="pekerjaan" class="form-label">pekerjaan Anggota</label>
                  <input type="input" class="form-control" id="pekerjaan" name="pekerjaan" value="<?php echo $b['pekerjaan_anggota']?>">
                </div>
                <div class="mb-3">
                  <label for="pesan" class="form-label">Pesan & kesan Anggota</label>
                  <input type="input" class="form-control" id="pesan" name="pesan" value="<?php echo $b['pesankesan_anggota']?>">
                </div>
                <div class="mb-3">
                  <label for="instagram" class="form-label">Instagram Anggota</label>
                  <input type="input" class="form-control" id="instagram" name="instagram" value="<?php echo $b['name_instagram']?>">
                </div>
                <div class="mb-3">
                  <label for="facebook" class="form-label">Facebook Anggota</label>
                  <input type="input" class="form-control" id="facebook" name="facebook" value="<?php echo $b['name_facebook']?>">
                </div>
                <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="update">Save Changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile;?>

      <!-- Modal Detail -->
      <?php
        $detail = mysqli_query($koneksi, "SELECT * FROM anggota JOIN kategori_anggota ON anggota.id_kategori_anggota = kategori_anggota.id_kategori_anggota");
        while($c = mysqli_fetch_array($detail)):
      ?>
      <div class="modal fade " tabindex="-1" role="dialog" id="modaldetail<?php echo $c['id_anggota'];?>">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Detail Anggota</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="#" method="post" enctype="multipart/form-data">
                  <div class="card-body" align="middle" line-height="1.5px">
                  <img src="../img/anggota/<?php echo $c['foto_anggota'];?>" width="400"><br>
                  <table>
                    <tr>
                      <td><h6>Kategori Anggota</h6></td>
                      <td>:</td>
                      <td><?php echo $c['nama_kategori_anggota']?></td>
                    </tr>
                    <tr>
                      <td><h6>Nama Anggota</h6></td>
                      <td>:</td>
                      <td><?php echo $c['nama_anggota']?></td>
                    </tr>
                    <tr>
                      <td><h6>Jabatan Anggota</h6></td>
                      <td>:</td>
                      <td><?php echo $c['jabatan_anggota']?></td>
                    </tr>
                    <tr>
                      <td><h6>Tahun Angkatan</h6></td>
                      <td>:</td>
                      <td><?php echo $c['tahun_angkatan']?></td>
                    </tr>
                    <tr>
                      <td><h6>Pekerjann Anggota</h6></td>
                      <td>:</td>
                      <td><?php echo $c['pekerjaan_anggota']?></td>
                    </tr>
                    <tr>
                      <td><h6>Pesan & kesan Anggota</h6></td>
                      <td>:</td>
                      <td><?php echo $c['pesankesan_anggota']?></td>
                    </tr>
                    <tr>
                      <td><h6>Nama Instagram</h6></td>
                      <td>:</td>
                      <td><?php echo $c['name_instagram']?></td>
                    </tr>
                    <tr>
                      <td><h6>Nama Facebook</h6></td>
                      <td>:</td>
                      <td><?php echo $c['name_facebook']?></td>
                    </tr>
                  </table>

                  </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile;?>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="#">Laboratorium Rekayasa Perangkat Lunak</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script> -->

  <script src="../assets/js/jquery-3.6.0.min.js"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/jquery.nicescroll.min.js"></script>
  <script src="../assets/js/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>
  <script> CKEDITOR.replase('konten'); </script>

  <!-- Page Specific JS File -->
</body>
</html>
