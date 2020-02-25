<?php
function simpan_buku($judul,$pengarang,$penerbit,$tahun,$isbn,$jumlah){
	global $koneksi;
	$judul		= mysqli_real_escape_string($koneksi, $judul);
    $pengarang	= mysqli_real_escape_string($koneksi, $pengarang);
    $penerbit	= mysqli_real_escape_string($koneksi, $penerbit);
	$tahun		= mysqli_real_escape_string($koneksi, $tahun);
    $isbn		= mysqli_real_escape_string($koneksi, $isbn);
    echo $jumlah;

	$query = "INSERT INTO tbl_buku (judul,pengarang,penerbit,tahun,isbn,jumlah) VALUES ('$judul', '$pengarang', '$penerbit', '$tahun', $isbn, '$jumlah')";
	if(mysqli_query($koneksi, $query)){
        return true;
	} else {
		return false;
	}
}