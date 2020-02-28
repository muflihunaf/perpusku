<!DOCTYPE HTML>
<html>
<?php
        include '../db/db.php';
        session_start();
        if (empty($_SESSION['username'])){
            ?>
<script>
    alert("Anda Harus Login Terlebih Dahulu")
</script>
<script>
    window.location = "../../user/login.php"
</script>
<?php
        }else{?>

<head>
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/web/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="../assets/web/css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="../assets/web/css/morris.css" type="text/css" />
    <!-- Graph CSS -->
    <link href="../assets/web/css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="../assets/web/js/jquery-2.1.4.min.js"></script>
    <!-- //jQuery -->
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet'
        type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- lined-icons -->
    <link rel="stylesheet" href="../assets/web/css/icon-font.min.css" type='text/css' />
    <!-- //lined-icons -->
</head>

<body>
    <div class="container-fluid">
        <!--/content-inner-->
        <div class="left-content">
            <div class="mother-grid-inner">
                <!--header start here-->
                <div class="header-main">
                    <div class="logo-w3-agile">
                        <h1><a href="index.php">Perpusku</a></h1>
                    </div>


                    <div class="col-md-offset-6 profile_details w3l">
                        <ul>
                            <li class="dropdown profile_details_drop">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <div class="profile_img">
                                        <span class="prfil-img"><img src="../assets/web/images/in4.jpg" alt=""> </span>
                                        <div class="user-name">
                                            <p><?= $_SESSION['username'] ?> </p>
                                            <span>Administrator</span>
                                        </div>
                                        <i class="fa fa-angle-down"></i>
                                        <i class="fa fa-angle-up"></i>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu drp-mnu">
                                    <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li>
                                    <li> <a href="#"><i class="fa fa-sign-out"></i> Logout</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="clearfix"> </div>
                </div>
                <!--heder end here-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a> <i class="fa fa-angle-right"></i></li>
                </ol>
                <!--four-grids here-->
                <div class="four-grids">
                    <div class="col-md-4 four-grid">
                        <div class="four-agileits">
                            <div class="icon">
                                <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                            </div>
                            <div class="four-text">
                                <h3>User</h3>
                                <?php
                                    $cekanggota = mysqli_query($koneksi,"SELECT * FROM tbl_user");
                                    $count = mysqli_fetch_assoc($cekanggota);
                                    $hitung = count($count);
                                ?>
                                <h4> <?= $hitung ?> </h4>

                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 four-grid">
                        <div class="four-agileinfo">
                            <div class="icon">
                                <i class="glyphicon glyphicon-book" aria-hidden="true"></i>
                            </div>
                            <div class="four-text">
                                <h3>Buku</h3>
                                <?php
                                    $cekanggota = mysqli_query($koneksi,"SELECT * FROM tbl_buku");
                                    $count = mysqli_fetch_assoc($cekanggota);
                                    $hitung = count($count);
                                ?>
                                <h4><?= $hitung; ?></h4>

                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 four-grid">
                        <div class="four-w3ls">
                            <div class="icon">
                                <i class="glyphicon glyphicon-transfer" aria-hidden="true"></i>
                            </div>
                            <div class="four-text">
                                <h3>Peminjaman</h3>
                                <?php
                                    $cekanggota = mysqli_query($koneksi,"SELECT * FROM tbl_peminjaman");
                                    $count = mysqli_fetch_assoc($cekanggota);
                                    $hitung = count($count);
                                ?>
                                <h4><?= $hitung ?></h4>

                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!--//four-grids here-->
                <!--agileinfo-grap-->
                <!-- <div class="agileinfo-grap">
                    <div class="agileits-box">
                        <header class="agileits-box-header clearfix">
                            <h3>Statistics</h3>
                            <div class="toolbar">
                                <div class="pull-left">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-default btn-xs">Daily</a>
                                        <a href="#" class="btn btn-default btn-xs active">Monthly</a>
                                        <a href="#" class="btn btn-default btn-xs">Yearly</a>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <a aria-expanded="false" class="btn btn-default btn-xs dropdown-toggle"
                                            data-toggle="dropdown">
                                            Export <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li><a href="#">Export as PDF</a></li>
                                            <li><a href="#">Export as CSV</a></li>
                                            <li><a href="#">Export as PNG</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                        </ul>
                                    </div>
                                    <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-cog"></i></a>
                                </div>
                            </div>
                        </header>
                        <div class="agileits-box-body clearfix">
                            <div id="hero-area"></div>
                        </div>
                    </div>
                </div> -->
                <!--//agileinfo-grap-->
                <!-- script-for sticky-nav -->
                <script>
                    $(document).ready(function () {
                        var navoffeset = $(".header-main").offset().top;
                        $(window).scroll(function () {
                            var scrollpos = $(window).scrollTop();
                            if (scrollpos >= navoffeset) {
                                $(".header-main").addClass("fixed");
                            } else {
                                $(".header-main").removeClass("fixed");
                            }
                        });

                    });
                </script>
                <!-- /script-for sticky-nav -->
            </div>
        </div>
        <!--//content-inner-->
        <!--/sidebar-menu-->
        <div class="sidebar-menu">
            <header class="logo1">
                <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>
            </header>
            <div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
            <div class="menu">
                <ul id="menu">
                    <li><a href="../index.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span>
                            <div class="clearfix"></div>
                        </a></li>


                    <li id="menu-academico"><a href="anggota/lihat_anggota.php"><i
                                class="fa fa-users nav_icon"></i><span>Anggota</span>
                            <div class="clearfix"></div>
                        </a></li>
                    <li><a href="buku/lihat_buku.php"><i class="fa fa-book" aria-hidden="true"></i><span>Lihat Buku</span>
                            <div class="clearfix"></div>
                        </a></li>
                    <li id="menu-academico"><a href="buku/lihat_peminjaman.php"><i class="fa fa-exchange"></i><span>Lihat Peminjaman</span>
                            <div class="clearfix"></div>
                        </a></li>
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>
    </div><!DOCTYPE HTML>
<html>
<?php
        include '../core/init.php';
        session_start();
        if (empty($_SESSION['username'])){
            ?>
<script>
    alert("Anda Harus Login Terlebih Dahulu")
</script>
<script>
    window.location = "../../user/login.php"
</script>
<?php
        }else{?>

<head>
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Bootstrap Core CSS -->
    <link href="../../assets/web/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="../../assets/web/css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="../../assets/web/css/morris.css" type="text/css" />
    <!-- Graph CSS -->
    <link href="../../assets/web/css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="../../assets/web/js/jquery.min.js"></script>
    <!-- //jQuery -->
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet'
        type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- lined-icons -->
    <link rel="stylesheet" href="../../assets/web/css/icon-font.min.css" type='text/css' />
    <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap.min.css ">
    <!-- //lined-icons -->
</head>

<body>
    <div class="container-fluid">
        <!--/content-inner-->
        <div class="left-content">
            <div class="mother-grid-inner">
                <!--header start here-->
                <div class="header-main">
                    <div class="logo-w3-agile">
                        <h1><a href="index.php">Perpusku</a></h1>
                    </div>


                    <div class="col-md-offset-6 profile_details w3l">
                        <ul>
                            <li class="dropdown profile_details_drop">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <div class="profile_img">
                                        <span class="prfil-img"><img src="../assets/web/images/in4.jpg" alt=""> </span>
                                        <div class="user-name">
                                            <p><?= $_SESSION['username'] ?> </p>
                                            <span>Administrator</span>
                                        </div>
                                        <i class="fa fa-angle-down"></i>
                                        <i class="fa fa-angle-up"></i>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu drp-mnu">
                                    <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li>
                                    <li> <a href="#"><i class="fa fa-sign-out"></i> Logout</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="clearfix"> </div>
                </div>
                <!--heder end here-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a> <i class="fa fa-angle-right"></i></li>
                </ol>
                <a type="button" class="btn btn-primary"  href="tambah_anggota.php"> Tambah Anggota </a>
                <table border="1px solid" class="table table-bordered" id="anggota">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Program Studi</th>
                            <th>Option</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                $query = mysqli_query($koneksi, "SELECT * FROM tbl_anggota INNER JOIN tbl_user ON tbl_anggota.id_anggota = tbl_user.id_anggota");
                while ($data = mysqli_fetch_object($query)) {?>
                        <tr>
                            <td><?= $data->nim ?></td>
                            <td><?= $data->nama ?></td>
                            <td><?= $data->jenis_kelamin ?></td>
                            <td><?= $data->tempat_lahir ?></td>
                            <td><?= $data->tgl_lahir ?></td>
                            <td><?= $data->prodi ?></td>
                            <td><a class="btn btn-primary" href="edit_anggota.php?id_anggota=<?=$data->id_anggota ?>">Edit</a>
                            <a class="bg-danger btn btn-primary" href="hapus_anggota.php?id_buku=<?=$data->id_anggota ?>">Hapus</a> </td>

                        </tr>
                        <?php } ?>
                    </tbody>

                </table>

                <script>
                    $(document).ready(function () {
                        var navoffeset = $(".header-main").offset().top;
                        $(window).scroll(function () {
                            var scrollpos = $(window).scrollTop();
                            if (scrollpos >= navoffeset) {
                                $(".header-main").addClass("fixed");
                            } else {
                                $(".header-main").removeClass("fixed");
                            }
                        });

                    });
                </script>
                <!-- /script-for sticky-nav -->
            </div>
        </div>
        <!--//content-inner-->
        <!--/sidebar-menu-->
        <div class="sidebar-menu">
            <header class="logo1">
                <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>
            </header>
            <div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
            <div class="menu">
                <ul id="menu">
                    <li><a href="../index.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span>
                            <div class="clearfix"></div>
                        </a></li>


                    <li id="menu-academico"><a href="anggota/lihat_anggota.php"><i
                                class="fa fa-users nav_icon"></i><span>Anggota</span>
                            <div class="clearfix"></div>
                        </a></li>
                    <li><a href="buku/lihat_buku.php"><i class="fa fa-book" aria-hidden="true"></i><span>Lihat
                                Buku</span>
                            <div class="clearfix"></div>
                        </a></li>
                    <li id="menu-academico"><a href="buku/lihat_peminjaman.php"><i
                                class="fa fa-exchange"></i><span>Lihat Peminjaman</span>
                            <div class="clearfix"></div>
                        </a></li>
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>


    <script>
        var toggle = true;

        $(".sidebar-icon").click(function () {
            if (toggle) {
                $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                $("#menu span").css({
                    "position": "absolute"
                });
            } else {
                $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                setTimeout(function () {
                    $("#menu span").css({
                        "position": "relative"
                    });
                }, 400);
            }

            toggle = !toggle;
        });
    </script>
    <!--js -->
    <script src="../../assets/web/js/jquery.nicescroll.js"></script>
    <script src="../../assets/web/js/scripts.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../../assets/web/js/bootstrap.min.js"></script>
    <!-- /Bootstrap Core JavaScript -->
    <!-- morris JavaScript -->
    <script src="../../assets/web/js/raphael-min.js"></script>
    <script src="../../assets/web/js/morris.js"></script>

    <div class="clearfix"> </div><br><br><br><br><br><br><br>
    <footer class="copyrights">
        <p>© 2016 Pooled. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a>
        </p>
    </footer>
    </div>
</body>
<script src="../../assets/js/jquery.dataTables.min.js"></script>
<script src="../../assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('#anggota').DataTable();
    })
</script>
<?php  } ?>

</html>