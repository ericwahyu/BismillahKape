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
            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $name;?></div></a>
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
            <a href="form.anggota.php">Admin Page</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="form.anggota.php">Lab</a>
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
            <h1>Form Anggota</h1>
          </div>

          <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                <form action="../model/modelAnggota.php" method="post" enctype="multipart/form-data">
                  <div class="card-header">
                    <h4>Insert Anggota</h4>
                  </div>
                  <div class="card-body">
                  <div class="mb-3">
                      <label>Kategori Anggota</label>
                      <select class="form-control" name="idkategori">
                        <option selected>-- Pilih Kategori Anggota --</option required>
                        <?php
                          $view= mysqli_query($koneksi, "SELECT * FROM KATEGORI_Anggota");
                          while($a = mysqli_fetch_array($view)):
                        ?>
                        <option value="<?php echo $a['id_kategori_anggota']?>"><?php echo $a['nama_kategori_anggota']?></option>
                        <?php endwhile; ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="formFile">Pilih File Gambar</label>
                      <input class="form-control" type="file" id="formFile" name="gambar">
                    </div>
                    <div class="mb-3">
                      <label for="nama">Nama Anggota</label>
                      <input type="input" class="form-control" name="nama" placeholder="Masukkan Nama Anggota" id="nama" required>
                    </div>
                    <div class="mb-3">
                      <label for="pesan">Jabatan Anggota</label>
                      <input type="input" class="form-control" name="jabatan" placeholder="Masukkan Jabatan Anggota" id="jabatan" required>
                    </div>
                    <div class="mb-3">
                      <label for="tahun">Tahun Angkatan</label>
                      <input type="input" class="form-control" name="tahun" placeholder="Masukkan Tahun Angkatan Aslab" id="tahun" required>
                    </div>
                    <div class="mb-3">
                      <label for="kerja">Pekerjaan Anggota</label>
                      <input type="input" class="form-control" name="pekerjaan" placeholder="Masukkan pekerjaan Anggota" id="kerja">
                    </div>
                    <div class="mb-3">
                      <label for="pesan">Pesan & kesan Anggota</label>
                      <input type="input" class="form-control" name="pesan" placeholder="Masukkan Pesan Anggota" id="pesan">
                    </div>
                    <div class="mb-3">
                      <label for="instagram">Name Instagram</label>
                      <input type="input" class="form-control" name="instagram" placeholder="Masukkan Instagram Anggota" id="instagram">
                    </div>
                    <div class="mb-3">
                      <label for="facebook">Name Facebook</label>
                      <input type="input" class="form-control" name="facebook" placeholder="Masukkan facebook Anggota" id="instagram">
                    </div>
                  </div>
                  <div class="card-footer text-right bg-whitesmoke br">
                    <button class="btn btn-primary mr-1" type="submit" name="insert">Submit</button>
                    <button class="btn btn-secondary" type="reset"></a>Reset</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="section-body">
          </div>
        </section>
      </div>
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
