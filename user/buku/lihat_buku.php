<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Buku</title>
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
            <th>Jumlah</th>
            <th colspan="2">Option</th>
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
                <td><?= $data->jumlah ?></td>

        </tr>
                <?php } ?>
    </tbody>

    </table>

</body>
</html>