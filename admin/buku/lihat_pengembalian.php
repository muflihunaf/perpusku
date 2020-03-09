<!DOCTYPE html>
<html lang="en">
<?php
        include '../core/init.php';
        session_start();
        if (empty($_SESSION['username'])){
            ?>
<script>
    alert("Anda Harus Login Terlebih Dahulu")
</script>
<script>
    window.location = "../user/login.php"
</script>
<?php
        }else{?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Lihat Pengembalian </title>

    <!-- Bootstrap -->
    <link href="../../assets/css/jquery.dataTables.min.css">
    <link href="../../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->

    <link href="../../assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../assets/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>Perpustakaan Ku</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?= $_SESSION['username'] ?></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>Menu</h3>
                            <ul class="nav side-menu">
                                <li><a href="../index.php"><i class="fa fa-home"></i> Home </a>
                                </li>
                                <li><a href="../anggota/lihat_anggota.php"><i class="fa fa-users"></i> Anggota </a>
                                </li>
                                <li><a href="lihat_buku.php"><i class="fa fa-book"></i> Lihat Buku </a></li>
                                <li><a href="lihat_peminjaman.php"><i class="fa fa-exchange"></i> Lihat Peminjaman</a>
                                </li>
                                <li><a href="lihat_pengembalian.php"><i class="fa fa-exchange"></i> Lihat
                                        Pengembalian</a>
                                </li>
                            </ul>
                        </div>


                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="images/img.jpg" alt=""><?= $_SESSION['username'] ?>
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="javascript:;"> Profile</a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">Help</a>
                                    <a class="dropdown-item" href="login.html"><i class="fa fa-sign-out pull-right"></i>
                                        Log Out</a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Lihat Users <small>Users</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Settings 1</a>
                                                <a class="dropdown-item" href="#">Settings 2</a>
                                            </div>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box table-responsive">
                                            <table border="1px solid" class="table table-striped table-bordered"
                                                    id="datatable-ku" style="width:100%">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>ISBN</th>
                            <th>Tanggal Harus Dikembalikan</th>
                            <th>Tanggal Kembali</th>
                            <th>Nama Peminjam</th>
                            <th>NIM</th>
                            <th>Denda</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                $query = mysqli_query($koneksi, "SELECT * FROM tbl_pengembalian INNER JOIN tbl_peminjaman ON tbl_pengembalian.id_peminjaman = tbl_peminjaman.id_peminjaman INNER JOIN tbl_buku ON tbl_peminjaman.id_buku = tbl_buku.id_buku INNER JOIN tbl_anggota ON tbl_anggota.id_anggota = tbl_peminjaman.id_user WHERE tbl_peminjaman.status = 'kembali' ORDER BY id_pengembalian DESC");
                while ($data = mysqli_fetch_object($query)) {
                    $tgl = terlambat($data->tgl_pengembalian,$data->tgl_kembali);
                    ?>

                        <tr>
                        <td><?= $data->judul ?></td>
                <td><?= $data->isbn ?></td>
                <td><?= $data->tgl_pengembalian ?></td>
                <td><?= $data->tgl_kembali ?></td>
                <td><?= $data->nama ?></td>
                <td><?= $data->nim ?></td>
                <td>Rp.<?= $tgl * 500 ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>

                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <!-- NProgress -->
    <!-- iCheck -->
    <!-- Bootstrap -->
    <!-- FastClick -->
    <script src="../../assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendors/fastclick/lib/fastclick.js"></script>
    <script src="../../assets/vendors/nprogress/nprogress.js"></script>
    <script src="../../assets/vendors/iCheck/icheck.min.js"></script>
    <script src="../../assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../../assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../../assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../../assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../../assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../../assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../../assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../../assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../../assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../../assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="../../assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../../assets/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="../../assets/build/js/custom.js"></script>


</body>
<?php } ?>

</html>