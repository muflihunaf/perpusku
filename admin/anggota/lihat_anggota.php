<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Anggota</title>
</head>
<body>

    <table border="1px solid">
    <thead>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Program Studi</th>
            <th colspan="2">Option</th>
        </tr>
    </thead>
    <tbody>
            <?php
                include '../core/init.php';
                $query = mysqli_query($koneksi, "SELECT * FROM tbl_anggota INNER JOIN tbl_user ON tbl_anggota.id_anggota = tbl_user.id_anggota");
                while ($data = mysqli_fetch_object($query)) {?>
        <tr>
                <td><?= $data->nim ?></td>
                <td><?= $data->nama ?></td>
                <td><?= $data->jenis_kelamin ?></td>
                <td><?= $data->tempat_lahir ?></td>
                <td><?= $data->tgl_lahir ?></td>
                <td><?= $data->prodi ?></td>
                <td><a href="edit_anggota.php?id_anggota=<?=$data->id_anggota ?>">Edit</a> </td>
                <td><a href="hapus_anggota.php?id_buku=<?=$data->id_anggota ?>">Hapus</a> </td>

        </tr>
                <?php } ?>
    </tbody>

    </table>

</body>
</html>