<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Buku</title>
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

<!------ Include the above in your HEAD tag ---------->
<!-- ======= Header ======= -->
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
<div class="container">
    <div class="row">

    </div>
    <div id="products" class="row view-group">
                <?php
                 include '../core/init.php';
                 $page = (isset($_GET['page'])) ? $_GET['page'] : 1;

                $limit = 6; // Jumlah data per halamanya

                // Buat query untuk menampilkan daa ke berapa yang akan ditampilkan pada tabel yang ada di database
                $limit_start = ($page - 1) * $limit;
                    $query = $koneksi->query("SELECT * FROM tbl_buku LIMIT ".$limit_start.",".$limit);
                    $no = $limit_start + 1; // Untuk penomoran tabel
                    while ($data = mysqli_fetch_object($query)) {
                ?>
                <div class="item col-xs-4 col-lg-4">
                    <div class="thumbnail card">
                        <div class="img-event">
                            <img class="text-center img-fluid img-thumbnail" src="../../assets/file/<?= $data->cover ?>" alt="<?= $data->cover ?>"/>
                        </div>
                        <div class="caption card-body">
                            <h4 class="group card-title inner list-group-item-heading">
                                <?= $data->judul; ?></h4>
                            <p class="group inner list-group-item-text">
                                <?php echo  substr($data->sinopsis,0,100) ?> .</p>
                            <div class="row">
                                <div class="col-xs-12 col-md-6 ">
                                    <a class="btn btn-success" href="detail_buku.php?id_buku=<?= $data->id_buku ?>">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                $no++; } ?>
            </div>
            <ul class="pagination">
            <!-- LINK FIRST AND PREV -->
            <?php
            if ($page == 1) { // Jika page adalah pake ke 1, maka disable link PREV
            ?>
                <li class="page-item disabled"><a class="page-link" href="#">First</a></li>
            <?php
            } else { // Jika buka page ke 1
                $link_prev = ($page > 1) ? $page - 1 : 1;
            ?>
                <li class="page-item"><a class="page-link" href="buku.php?page=1">First</a></li>
            <?php
            }
            ?>
            <!-- LINK NUMBER -->
            <?php
            // Buat query untuk menghitung semua jumlah data
            $sql2 = mysqli_query($koneksi,"SELECT COUNT(*) AS jumlah FROM tbl_buku");
            $get_jumlah = $sql2->fetch_assoc();

            $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamanya
            $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
            $start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1; // Untuk awal link member
            $end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number

            for ($i = $start_number; $i <= $end_number; $i++) {
                $link_active = ($page == $i) ? 'class="page-item active"' : '';
            ?>
                <li <?php echo $link_active; ?>><a class="page-link" href="buku.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php
            }
            ?>

            <!-- LINK NEXT AND LAST -->
            <?php
            // Jika page sama dengan jumlah page, maka disable link NEXT nya
            // Artinya page tersebut adalah page terakhir
            if ($page == $jumlah_page) { // Jika page terakhir
            ?>
                <li class="page-item disabled"><a class="page-link" href="#">Last</a></li>
            <?php
            } else { // Jika bukan page terakhir
                $link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page;
            ?>
                <!--  -->
                <li class="page-item"><a class="page-link" href="buku.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
            <?php
            }
            ?>
        </ul>
</div>
</body>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../../assets/vendors/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</html>