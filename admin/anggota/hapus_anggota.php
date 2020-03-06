<?php
    include '../core/init.php';
    $id = $_GET['id_anggota'];
    if(hapus_anggota($id)){
        ?>
        <script>
            window.location = "lihat_anggota.php";
        </script>
        <?php
    }
?>