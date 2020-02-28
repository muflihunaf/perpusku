<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Buku</title>
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

    <table border="1px solid">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>ISBN</th>
            <th>Lokasi</th>
            <th>Jumlah</th>
            <th colspan="3">Option</th>
        </tr>
    </thead>
    <tbody>
            <?php
                include '../core/init.php';
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
                <td><a href="pinjam_buku.php?id_buku=<?=$data->id_buku ?>">Pinjam</a> </td>
                <td><a href="edit_buku.php?id_buku=<?=$data->id_buku ?>">Edit</a> </td>
                <td><a href="hapus_buku.php?id_buku=<?=$data->id_buku ?>">Hapus</a> </td>


        </tr>
                <?php } ?>
    </tbody>

    </table>

</body>
                <?php }?>
</html>