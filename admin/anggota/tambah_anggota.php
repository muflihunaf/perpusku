<!DOCTYPE html>
<html>
<head>
	<title>Tambah Anggota</title>
	<link rel="stylesheet" href="view/main.css"/>
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
<ul>
	<li><a href="index.php">Home</a></li>
	<li><a href="anggota.php">Anggota</a></li>
	<li><a href="buku.php">Buku</a></li>
	<li><a href="pinjam.php">Pinjam</a></li>
</ul>

<?php
require_once "../core/init.php";

if(isset($_POST['submit'])){
	$nim 	= $_POST['nim'];
	$nama 	= $_POST['nama'];
	$jk 	= $_POST['jenis_kelamin'];
	$tl 	= $_POST['tempat_lahir'];
	$tgl = $_POST['tanggal_lahir'];
	$prodi 	= $_POST['prodi'];
	$status = 0;

	if(anggota_kembar($nim)){
		if(daftar_anggota($nim,$nama,$jk,$tl,$tgl,$prodi,$status)){
			echo "Berhasil daftar";
		} else {
			echo "Gagal daftar";
		}
	} else {
		echo "Gagal daftar, NIM sudah terdaftar";
	}

} else {
?>

<form action="" method="POST">
	<table>
		<tr>
			<td>NIM</td>
			<td><input type="text" name="nim"></td>
		</tr>
		<tr>
			<td>Nama</td>
            <td><input type="text" name="nama"></td>
		</tr>

		<tr>
			<td>Jenis Kelamin</td>
			<td><input type="text" name="jenis_kelamin"></td>
		</tr>
		<tr>
			<td>Tempat Lahir</td>
			<td><input type="text" name="tempat_lahir"></td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td><input type="date" name="tanggal_lahir"></td>
		</tr>
		<tr>
			<td>Program Studi</td>
			<td><input type="text" name="prodi"></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit" value="Simpan"></td>
		</tr>
	</table>
</form>
<?php
}}
?>
</body>
</html>