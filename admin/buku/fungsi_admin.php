<?php
function simpan_buku($judul,$pengarang,$penerbit,$tahun,$isbn,$lokasi,$jumlah){
	global $koneksi;
	$judul		= mysqli_real_escape_string($koneksi, $judul);
    $pengarang	= mysqli_real_escape_string($koneksi, $pengarang);
    $penerbit	= mysqli_real_escape_string($koneksi, $penerbit);
	$tahun		= mysqli_real_escape_string($koneksi, $tahun);
    $isbn		= mysqli_real_escape_string($koneksi, $isbn);
    $lokasi		= mysqli_real_escape_string($koneksi, $lokasi);

	$query = "INSERT INTO tbl_buku (judul,pengarang,penerbit,tahun,isbn,lokasi,jumlah) VALUES ('$judul', '$pengarang', '$penerbit', '$tahun', $isbn,'$lokasi' ,'$jumlah')";
	if(mysqli_query($koneksi, $query)){
        return true;
	} else {
		return false;
	}
}

function detail_buku($id)
{
	global $koneksi;
	$query = mysqli_query($koneksi,"SELECT * FROM tbl_buku WHERE id_buku = '$id' ");
	$data = mysqli_fetch_object($query);
	return $data;
}

function hapus_buku($id){
	global $koneksi;
	$id = mysqli_real_escape_string($koneksi, $id);
	$query = "DELETE FROM tbl_buku WHERE id_buku = '$id'";

	if(mysqli_query($koneksi, $query)){
		return true;
	} else {
		return false;
	}
}
function update_buku($id,$judul,$pengarang,$penerbit,$tahun,$isbn,$jumlah){
	global $koneksi;
	$id		= mysqli_real_escape_string($koneksi, $id);
	$judul		= mysqli_real_escape_string($koneksi, $judul);
    $pengarang	= mysqli_real_escape_string($koneksi, $pengarang);
    $penerbit	= mysqli_real_escape_string($koneksi, $penerbit);
	$tahun		= mysqli_real_escape_string($koneksi, $tahun);
    $isbn		= mysqli_real_escape_string($koneksi, $isbn);

	$query = "UPDATE tbl_buku SET judul = '$judul', pengarang = '$pengarang', penerbit = '$penerbit', tahun = '$tahun', isbn = '$isbn', jumlah = '$jumlah' WHERE id_buku = '$id'";
	if(mysqli_query($koneksi, $query)){
		return true;
	} else {
		return false;

	}
}
function anggota_kembar($nim){
	global $koneksi;
	$nim = mysqli_real_escape_string($koneksi, $nim);

	$query = "SELECT nim FROM tbl_anggota WHERE nim = '$nim'";
	$hasil = mysqli_query($koneksi, $query);

	if($row = mysqli_num_rows($hasil) == 0){
		return true;
	} else {
		return false;
	}
}
function daftar_anggota($nim,$nama,$jk,$tl,$tgl,$prodi,$status){
	global $koneksi;
	$nama	= mysqli_real_escape_string($koneksi, $nama);
	$jk = mysqli_real_escape_string($koneksi, $jk);
	$tl = mysqli_real_escape_string($koneksi, $tl);
	$tgl = mysqli_real_escape_string($koneksi, $tgl);
	$prodi = mysqli_real_escape_string($koneksi, $prodi);
	$nim	= mysqli_real_escape_string($koneksi, $nim);
	$status = mysqli_real_escape_string($koneksi, $status);
	$password = password_hash($nim, PASSWORD_DEFAULT);

	$query	= "INSERT INTO tbl_anggota (nim, nama, jenis_kelamin, tempat_lahir, tgl_lahir,prodi) VALUES ('$nim', '$nama', '$jk', '$tl', '$tgl' , '$prodi' )";

	if(mysqli_query($koneksi,$query)){
		$id = mysqli_query($koneksi, "SELECT id_anggota FROM tbl_anggota ORDER BY id_anggota DESC LIMIT 1");
		$fetch = mysqli_fetch_object($id);
		$id_anggota = $fetch->id_anggota;
		$user	= "INSERT INTO tbl_user (username, password, level, id_anggota) VALUES ('$nim','$password',$status, $id_anggota )";
		if (mysqli_query($koneksi,$user)) {
			return true;
		}

	} else {
		return false;
	}
}