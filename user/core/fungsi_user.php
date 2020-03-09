<?php
    function login_user($username,$pass){
        global $koneksi;
        $username = mysqli_real_escape_string($koneksi,$username);
        $pass			= mysqli_real_escape_string($koneksi,$pass);
        $sql = $koneksi->query("SELECT * FROM tbl_user WHERE username = '$username' ");
        if (mysqli_num_rows($sql) > 0 ) {
            $data = mysqli_fetch_assoc($sql);
            if (password_verify($pass, $data['password'])) {
                $_SESSION['username'] = $username;
                ?>
                    <script type="text/javascript"> alert("Selamat datang!"); window.location = '../index.php' </script>
                <?php
            }
        }
    }

    function cek_user($username){
        global $koneksi;
        $username = mysqli_real_escape_string($koneksi,$username);
        $query = "SELECT username FROM tbl_user WHERE username = '$username'";
        $hasil = mysqli_query($koneksi,$query);

        if(mysqli_num_rows($hasil) == 0){
            return false;
        } else {
            return true;
        }
    }
function detail_buku($id){
	global $koneksi;
	$query = mysqli_query($koneksi,"SELECT * FROM tbl_buku WHERE id_buku = '$id' ");
	$data = mysqli_fetch_object($query);
	return $data;
}