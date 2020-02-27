<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Peminjaman</title>
</head>
<body>

    <table border="1px solid">
    <thead>
        <tr>
            <th>Judul</th>
            <th>ISBN</th>
            <th>Penerbit</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Nama Peminjam</th>
            <th>NIM</th>
            <th>Prodi</th>
            <th>Jumlah</th>
            <th colspan="2">Option</th>
        </tr>
    </thead>
    <tbody>
            <?php
                include '../core/init.php';
                $query = mysqli_query($koneksi, "SELECT * FROM tbl_buku INNER JOIN tbl_peminjaman ON tbl_buku.id_buku = tbl_peminjaman.id_buku INNER JOIN tbl_anggota ON tbl_anggota.id_anggota = tbl_peminjaman.id_user ");
                while ($data = mysqli_fetch_object($query)) {?>
        <tr>
                <td><?= $data->judul ?></td>
                <td><?= $data->isbn ?></td>
                <td><?= $data->penerbit ?></td>
                <td><?= $data->tgl_peminjaman ?></td>
                <td><?= $data->tgl_pengembalian ?></td>
                <td><?= $data->nama ?></td>
                <td><?= $data->nim ?></td>
                <td><?= $data->prodi ?></td>
                <td><?= $data->jumlah ?></td>
                <td><a href="edit_buku.php?id_buku=<?=$data->id_buku ?>">Edit</a> </td>
                <td><a href="hapus_buku.php?id_buku=<?=$data->id_buku ?>">Hapus</a> </td>

        </tr>
                <?php } ?>
    </tbody>

    </table>

</body>
</html>