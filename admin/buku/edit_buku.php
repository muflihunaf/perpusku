<?php
    include '../core/init.php';
    $id = $_GET['id_buku'];
    $data = detail_buku($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <?php
        session_start();
        if (empty($_SESSION['username'])){
            ?>
            <script> alert("Anda Harus Login Terlebih Dahulu") </script>
            <script> window.location="../../user/login.php" </script>
            <?php
        }else{?>
</head>
<body>
    <form action="" method="post">
    <table>
            <input type="hidden" name="id" value="<?= $id ?>">
            <tr>
                <td><label for="">Judul</label></td>
                <td><input type="text" name="judul" value="<?= $data->judul; ?>"></td>
            </tr>
            <tr>
                <td><label for="">Pengarang</label></td>
                <td><input type="text" name="pengarang" value="<?= $data->pengarang; ?>"></td>
            </tr>
            <tr>
                <td><label>Penerbit</label></td>
                <td><input type="text" name="penerbit" value="<?= $data->penerbit; ?>"></td>
            </tr>
            <tr>
                <td><label>tahun</label></td>
                <td><input type="number" name="tahun" value="<?= $data->tahun; ?>"></td>
            </tr>
            <tr>
                <td><label>ISBN</label></td>
                <td><input type="number" name="isbn" value="<?= $data->isbn; ?>"></td>
            </tr>
            <tr>
                <td><label>Jumlah</label></td>
                <td><input type="number" name="jumlah" value="<?= $data->jumlah; ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>
</body>

<?php
    if(isset($_POST['submit'])){
        $id_buku = $_POST['id'];
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $tahun = $_POST['tahun'];
        $isbn = $_POST['isbn'];
        $jumlah = $_POST['jumlah'];
        $exe = update_buku($id,$judul,$pengarang,$penerbit,$tahun,$isbn,$jumlah);
        if($exe){ ?>
        <script type="text/javascript"> window.location = "lihat_buku.php" </script>
        <?php
        }
    }
}
?>
</html>




