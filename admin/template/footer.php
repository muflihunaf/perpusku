<!DOCTYPE HTML>
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
                            <<th>Judul</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>ISBN</th>
            <th>Lokasi</th>
            <th>Jumlah</th>
            <th>Option</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                $query = mysqli_query($koneksi, "SELECT * FROM tbl_buku");
                while ($data = mysqli_fetch_object($query)) {?>
        <tr>
                <td><?= $data->judul ?></td>
                <td><?= $data->pengarang ?></td>
                <td><?= $data->penerbit ?></td>
                <td><?= $data->tahun ?></td>
                <td><?= $data->isbn ?></td>
                <td><?= $data->lokasi ?></td>
                <td><?= $data->jumlah ?></td>
                <td><a href="pinjam_buku.php?id_buku=<?=$data->id_buku ?>">Pinjam</a>
                <a href="edit_buku.php?id_buku=<?=$data->id_buku ?>">Edit</a>
                <a href="hapus_buku.php?id_buku=<?=$data->id_buku ?>">Hapus</a> </td>


        </tr>
                <?php } ?>
    </tbody>

    </table>

</body>
                <?php }?>

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

</html>