<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <td><label for="">Judul</label></td>
                <td><input type="text" name="judul"></td>
            </tr>
            <tr>
                <td><label for="">Pengarang</label></td>
                <td><input type="text" name="pengarang"></td>
            </tr>
            <tr>
                <td><label>Penerbit</label></td>
                <td><input type="text" name="penerbit"></td>
            </tr>
            <tr>
                <td><label>tahun</label></td>
                <td><input type="number" name="tahun"></td>
            </tr>
            <tr>
                <td><label>ISBN</label></td>
                <td><input type="number" name="isbn" id=""></td>
            </tr>
            <tr>
                <td><label>Jumlah</label></td>
                <td><input type="number" name="jumlah"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>
</body>
    <?php
        include  '../core/init.php';
        if(isset($_POST['submit'])){
            $judul = $_POST['judul'];
            $pengarang = $_POST['pengarang'];
            $penerbit = $_POST['penerbit'];
            $tahun = $_POST['tahun'];
            $isbn = $_POST['isbn'];
            $jumlah = $_POST['jumlah'];
            if(simpan_buku($judul,$pengarang,$penerbit,$tahun,$isbn,$jumlah)){
                header('location:lihat_buku.php');
            }
        }

    ?>
</html>
