<!DOCTYPE html>
<html lang="en">
<?php
        include '../core/init.php';
        session_start();
        $id = $_GET['id_buku'];
        $data = detail_buku($id);
            ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku</title>
    <link href="../../assets/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../../assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
<link href="../../assets/css/style.css" rel="stylesheet">
</head>
<body>
<header id="header">
    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a href="index.html"><span>Perpustakaan</span></a></h1>
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="../../index.php">Home</a></li>
          <li class="drop-down"><a href="">User</a>
            <ul>
              <?php
                if (empty($_SESSION['username'])) { ?>
              <li><a href="user/login.php">Login</a></li>
                <?php } else{ ?>
              <li> <a href=""><?= $_SESSION['username']; ?> </a></li>
              <?php
                  $query = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username = $_SESSION[username] ");
                  $cek = mysqli_fetch_object($query);
                  if($cek->level == 1){?>
                  <li> <a href="admin/index.php">Dashboard</a></li>
                  <li> <a href="admin/anggota/lihat_anggota.php">Lihat Anggota</a></li>
                  <li> <a href="admin/anggota/tambah_anggota.php">Tambah Anggota</a></li>
                  <li> <a href="admin/buku/lihat_buku.php">Lihat Buku</a></li>
                  <li> <a href="admin/buku/lihat_buku.php">Tambah Buku</a></li>
                  <?php }else{ ?>
                    <li> <a href="user/buku/lihat_buku.php">Lihat Buku</a></li>
              <?php }
              ?>
              <li> <a href="user/logout.php">Logout</a></li>
                <?php } ?>
            </ul>
          </li>
        </ul>
      </nav>

    </div>
  </header><!-- End Header -->



<!-- Page Content -->
<div class="container">

  <!-- Portfolio Item Heading -->
  <h1 class="my-4"><?= $data->judul; ?>
    <small><?= $data->pengarang ?></small>
  </h1>

  <!-- Portfolio Item Row -->
  <div class="row">

    <div class="col-md-8">
      <img class="img-fluid" src="../../assets/file/<?= $data->cover ?>" alt="">
    </div>

    <div class="col-md-4">
      <h3 class="my-3">Sinopsis</h3>
      <p><?= $data->sinopsis?></p>
      <h3 class="my-3">Detail Buku</h3>
      <ul>
        <li>Pengarang: <?= $data->pengarang ?></li>
        <li>Penerbit: <?= $data->penerbit ?></li>
        <li>ISBN: <?= $data->isbn ?></li>
        <li>Tahun Terbit: <?= $data->tahun ?></li>
      </ul>
    </div>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->
</body>
</html>