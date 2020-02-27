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
    <title>Pinjam Buku </title>
</head>

<body>
    <form action="" method="post">
        <table>
            <input type="hidden" name="id" value="<?= $id ?>">
            <tr>
                <td><label for="">Judul</label></td>
                <td><input type="text" name="judul" value="<?= $data->judul; ?>" disabled></td>
            </tr>
            <tr>
                <td><label for="">Pengarang</label></td>
                <td><input type="text" name="pengarang" value="<?= $data->pengarang; ?>" disabled></td>
            </tr>
            <tr>
                <td><label>Penerbit</label></td>
                <td><input type="text" name="penerbit" value="<?= $data->penerbit; ?>" disabled></td>
            </tr>
            <tr>
                <td><label>tahun</label></td>
                <td><input type="number" name="tahun" value="<?= $data->tahun; ?>" disabled></td>
            </tr>
            <tr>
                <td><label>ISBN</label></td>
                <td><input type="number" name="isbn" value="<?= $data->isbn; ?>" disabled></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td><input type="text" onkeyup="isi_otomatis()" id="nim"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" id="nama"></td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td><input type="text" id="prodi"></td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td><input type="date" id="datenow" name="tglsekarang" value=""></td>
            </tr>
            <tr>
                <td>Tanggal Kembali</td>
                <td><input type="date" id="kembali" name="tglkembali"></td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td><input type="number" id="kembali" name="jumlah"></td>
            </tr>
            <input type="hidden" id="id_anggota" name="id_anggota">
            <tr>
                <td><input type="submit" name="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
    tglsekarang = document.getElementById('datenow').valueAsDate = new Date();
    Date.prototype.addDays = function (days) {
        var date = new Date(this.valueOf());
        date.setDate(date.getDate() + days);
        return date;
    }

    var date = new Date();
    tglsekarang = document.getElementById('kembali').valueAsDate = date.addDays(3);

    function addDays(date, days) {
        var result = new Date(date);
        result.setDate(result.getDate() + days);
        return result;
    }

    function isi_otomatis() {
        var nim = $("#nim").val();
        $.ajax({
            url: 'proses-ajax.php',
            data: "nim=" + nim,
        }).success(function (data) {
            var json = data,
                obj = JSON.parse(json);
            $('#nama').val(obj.nama);
            $('#prodi').val(obj.prodi);
            $('#id_anggota').val(obj.id_anggota);
        });
    }
</script>
<?php
    if (isset($_POST['submit'])) {
        $id_anggota = $_POST['id_anggota'];
        $id_buku = $id;
        $tglsekarang = $_POST['tglsekarang'];
        $tglkembali = $_POST['tglkembali'];
        $jumlah = $_POST['jumlah'];
        if(pinjam_buku($id_buku,$jumlah)){
            if(pinjam($id_buku,$tglsekarang,$tglkembali,$jumlah,$id_anggota)){
                echo "Berhasil";
            }else{
                echo "Berhasil";
            }
        }else{
            echo "Buku Tidak Ada";
        }

    }
?>

</html>