<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin Laboratorium Rekayasa Perangkat Lunak</title>

  <!-- General CSS Files -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->

  <link rel="stylesheet" href="../assets/css/bootsrap.min.css">
  <link rel="stylesheet" href="../assets/fontawesome-free-5.15.3-web/css/all.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/prismjs/themes/prism.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">

  <!-- ckeditor -->
  <script src="../assets/ckeditor/ckeditor.js"></script>
</head>

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
            <div class="d-sm-none d-lg-inline-block">Hi,Eric WA</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Admin Page</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Lab</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                  <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                </ul>
              </li>
              <li class="menu-header">Management</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-file-alt"></i> <span>Form</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="form.kategoriberita.php">Form Kategori Berita</a></li>
                  <li><a class="nav-link" href="form.kategorigallery.php">Form Kategori Gallery</a></li>
                  <li><a class="nav-link" href="form.berita.php">Form Berita</a></li>
                  <li><a class="nav-link" href="form.gallery.php">Form Gallery</a></li>
                  <li><a class="nav-link" href="form.halaman.php">Form Halaman</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-table"></i> <span>Table</span></a>
                <ul class="dropdown-menu">
                  <li class="active"><a class="nav-link" href="table.kategoriberita.php">Table Kategori Berita</a></li>
                  <li><a class="nav-link" href="table.kategorigallery.php">Table Kategori Gallery</a></li>
                  <li><a class="nav-link" href="table.berita.php">Table Berita</a></li>
                  <li><a class="nav-link" href="table.gallery.php">Table Gallery</a></li>
                  <li><a class="nav-link" href="table.halaman.php">Table Halaman</a></li>
                </ul>
              </li>
              <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Table Kategori Berita</h1>
          </div>

          <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Data Kategori Berita</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-md">
                      <tr>
                        <th>#</th>
                        <th>Nama Kategori Berita</th>
                        <th>Action</th>
                      </tr>
                      <?php
                        include "../modal/koneksi.php";

                        $view= mysqli_query($koneksi, "SELECT * FROM KATEGORI_BERITA");
                        $index=1;
                        while($a = mysqli_fetch_array($view)):
                      ?>
                      <tr>
                        <td><?php echo $index;?></td>
                        <td><?php echo $a['nama_kategori_berita'];?></td>
                        <td><a href="#" class="badge badge-warning" data-toggle="modal" data-target="#modalupdate<?php echo $a['id_kategori_berita'];?>">Update</a>   <a href="../modal/modalKategoriBerita.php?id=<?php echo $a['id_kategori_berita'];?>&delete" class="badge badge-danger">Delete</a></td>
                      </tr>
                      <?php $index++; endwhile; ?>
                    </table>
                  </div>
                </div>
                <!-- <div class="card-footer text-right">
                  <nav class="d-inline-block">
                    <ul class="pagination mb-0">
                      <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                      </li>
                      <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                      <li class="page-item">
                        <a class="page-link" href="#">2</a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                      </li>
                    </ul>
                  </nav>
                </div> -->
              </div>
            </div>
          </div>

          <div class="section-body">
          </div>
        </section>
      </div>

      <?php
        $select= mysqli_query($koneksi, "SELECT * FROM KATEGORI_BERITA");
        while($b = mysqli_fetch_array($select)):
      ?>
      <div class="modal fade" id="modalupdate<?php echo $b['id_kategori_berita'];?>" tabindex="-1">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Update Kategori Berita</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="../modal/modalKategoriBerita.php" method="post">
                <div class="mb-3">
                  <input type="hidden" name="id" value="<?php echo $b['id_kategori_berita']?>">
                  <label for="nama" class="form-label">Nama Kategori Berita</label>
                  <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $b['nama_kategori_berita']?>">
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
      <?php endwhile; ?>

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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> -->


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
