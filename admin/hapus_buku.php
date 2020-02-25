<?php
    include '../core/init.php';
    $id = $_GET['id_buku'];
    if(hapus_buku($id)){
        header('location:lihat_buku.php');
    }
?>