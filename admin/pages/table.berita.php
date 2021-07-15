<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin Laboratorium Rekayasa Perangkat Lunak</title>

  <link href="../assets/img/logo lap.jpg" rel="icon">

  <!-- General CSS Files -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->

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
  include "../labinfor_landingpage.php";
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
            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $name ?></div></a>
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
            <a href="table.berita.php">Admin Page</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="table.berita.php">Lab</a>
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
                  <li><a class="nav-link" href="table.anggota.php">Anggota</a></li>
                  <li class="active"><a class="nav-link" href="table.berita.php">Berita</a></li>
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
            <h1>Table Berita</h1>
          </div>

          <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                <div class="card-header">
                  <a href="form.berita.php" class="btn btn-icon icon-left btn-primary"><i class="fas fa-folder-plus"></i>  Tambah</a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-md">
                      <tr>
                        <th>#</th>
                        <th>Nama Kategori Berita</th>
                        <th>Judul Berita</th>
                        <th>Gambar Berita</th>
                        <th>Tanggal Post Berita</th>
                        <th>Konten Berita</th>
                        <th>Aksi</th>
                        <th></th>
                      </tr>
                      <?php
                        $view= mysqli_query($koneksi, "SELECT * FROM berita JOIN kategori_berita ON berita.id_kategori_berita = kategori_berita.id_kategori_berita ORDER BY id_berita ASC");
                        $index=1;
                        while($a = mysqli_fetch_array($view)):
                      ?>
                      <tr>
                        <td><?php echo $index;?></td>
                        <td><?php echo $sub_kalimat = substr($a['nama_kategori_berita'],0,20)."...";?></td>
                        <td><?php echo $sub_kalimat = substr($a['judul_berita'],0,25)."...";?></td>
                        <td><img src="../img/berita/<?php echo $a['gambar_berita'];?>" width="100"></td>
                        <td><?php echo $a['tanggalpost_berita'];?></td>
                        <td><?php echo $sub_kalimat = substr($a['konten_berita'],0,25)."...";?></td>
                        <td class="d-flex m-2">
                          <a href="#" class="badge badge-warning mr-2" style="text-decoration:none" data-toggle="modal" data-target="#modalupdate<?php echo $a['id_berita'];?>"><i class="fas fa-edit"></i>  Ubah</a>
                          <a href="#" class="badge badge-danger mr-2" style="text-decoration:none" data-confirm="Realy?|Anda yakin ingin menghapus data ini !" data-confirm-yes="window.location=' ../model/modelBerita.php?id=<?php echo $a['id_berita'];?>&delete&gambarlama=<?php echo $a['gambar_berita'];?>'"><i class="fas fa-trash-alt"></i>  Hapus</a>
                          <a href="#" class="badge badge-success mr-2" style="text-decoration:none" data-toggle="modal" data-target="#modaldetail<?php echo $a['id_berita'];?>"><i class="fas fa-info-circle"></i>  Detail</a>
                        </td>
                      </tr>
                      <?php $index++; endwhile; ?>
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
        $select= mysqli_query($koneksi, "SELECT * FROM berita JOIN kategori_berita ON berita.id_kategori_berita = kategori_berita.id_kategori_berita");
        while($b = mysqli_fetch_array($select)):
      ?>
      <div class="modal fade" id="modalupdate<?php echo $b['id_berita'];?>" tabindex="-1">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Update Berita</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="../model/modelBerita.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $b['id_berita']?>">
                <input type="hidden" name="gambarlama" value="<?php echo $b['gambar_berita'];?>">
                <div class="mb-3">
                  <label for="formFile">File Gambar</label> <br>
                  <img src="../img/berita/<?php echo $b['gambar_berita'];?>" width="200">
                  <input class="form-control" type="file" id="formFile" name="gambar">
                </div>
                <div class="mb-3">
                  <label>Nama Kategori Berita</label>
                  <select class="form-control" name="idkategori">
                    <option selected value="<?php echo $b['id_kategori_berita'];?>"><?php echo $b['nama_kategori_berita'];?></option required>
                    <?php
                      $idkategori= mysqli_query($koneksi, "SELECT * FROM KATEGORI_BERITA");
                      while($c = mysqli_fetch_array($idkategori)):
                    ?>
                    <option value="<?php echo $c['id_kategori_berita'];?>"><?php echo $c['nama_kategori_berita'];?></option>
                    <?php endwhile;?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="judul" class="form-label">Judul Berita</label>
                  <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $b['judul_berita']?>">
                </div>
                <div class="mb-3">
                  <label for="tanggal" class="form-label">Tanggal Post Berita</label>
                  <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $b['tanggalpost_berita']?>">
                </div>
                <div class="mb-3">
                  <label for="konten" class="form-label">Konten Berita</label>
                  <textarea class="form-control ckeditor" id="konten" name="konten" required><?php echo $b['konten_berita']?></textarea>
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
        $detail = mysqli_query($koneksi, "SELECT * FROM berita JOIN kategori_berita ON berita.id_kategori_berita = kategori_berita.id_kategori_berita");
        while($c = mysqli_fetch_array($detail)):
      ?>
      <div class="modal fade " tabindex="-1" role="dialog" id="modaldetail<?php echo $c['id_berita'];?>">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Detail Berita</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="#" method="post" enctype="multipart/form-data">
                  <div class="card-body" align="middle" line-height="1.5px">
                    <img src="../img/berita/<?php echo $c['gambar_berita'];?>" width="400"><br>
                    <table>
                      <tr>
                        <td><h6>Nama Kategori Berita</h6></td>
                        <td>:</td>
                        <td><?php echo $c['nama_kategori_berita']?></td>
                      </tr>
                      <tr>
                        <td><h6>Judul Berita</h6></td>
                        <td>:</td>
                        <td><?php echo $c['judul_berita']?></td>
                      </tr>
                      <tr>
                        <td><h6>Tanggal Post Berita</h6></td>
                        <td>:</td>
                        <td><?php echo $c['tanggalpost_berita']?></td>
                      </tr>
                      <tr>
                        <td><h6>Konten Berita</h6></td>
                        <td>:</td>
                        <td><?php echo $c['konten_berita']?></td>
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
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
  <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> -->

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
