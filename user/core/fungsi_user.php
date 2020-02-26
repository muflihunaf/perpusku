<?php
    function login($username,$password){
        global $koneksi;
        $username = mysqli_real_escape_string($koneksi,$username);
        $password	= mysqli_real_escape_string($koneksi,$password);
        $sql = $koneksi->query("SELECT * FROM tbl_user WHERE username = '$username' ");
        if (mysqli_num_rows($sql) > 0 ) {
            $data = mysqli_fetch_assoc($sql);
            if (password_verify($password, $data['password'])) {
                $_SESSION['email'] = $username;
                ?>
                    <script type="text/javascript"> alert("Selamat datang!"); window.location = '../index.php' </script>
                <?php
            }
    }
}