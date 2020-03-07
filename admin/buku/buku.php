<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Buku</title>
</head>
<body>
<link href="../../assets/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../../assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">

    </div>
    <div id="products" class="row view-group">
                <?php include '../core/init.php';
                    $query = $koneksi->query("SELECT * FROM tbl_buku LIMIT 6");
                    while ($data = mysqli_fetch_object($query)) {
                ?>
                <div class="item col-xs-4 col-lg-4">
                    <div class="thumbnail card">
                        <div class="img-event">
                            <img class="group list-group-image img-fluid" src="http://placehold.it/400x250/000/fff" alt="" />
                        </div>
                        <div class="caption card-body">
                            <h4 class="group card-title inner list-group-item-heading">
                                <?= $data->judul; ?></h4>
                            <p class="group inner list-group-item-text">
                                <?php echo  substr($data->sinopsis,0,100) ?> .</p>
                            <div class="row">
                                <div class="col-xs-12 col-md-6 ">
                                    <a class="btn btn-success" href="http://www.jquery2dotnet.com">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
</div>
</body>
</html>