<?php
session_start();
if(isset($_SESSION['username'])){
	?>
	<script> window.location = "../index.php" </script>
	<?php
} else {
	require_once "../db/db.php";
	require_once "core/fungsi_user.php";
	//require_once yang seharusnya memanggil core/init.php tetapi diganti
	//dengan 2 file diatas agar SESSION tidak konflik
	//karena pada core/init.php menuju ke halaman admin/login.php
?>
<!DOCTYPE html>
<html>
<head>
	<title>Administrator</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../assets/tampilan/css/style.css"/>

	<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
</head>
<body>

<div class="container">
	<div class="box">
		<form action="login.php" method="POST">
		<div class="input-box">
				<input type="text" name="username" required>
				<label>Username</label>
			</div>
			<div class="input-box">
				<input type="password" name="pass" required>
				<label>Password</label>
			</div>
			<input type="submit" class="btn btn-lg btn-primary btn-block" name="login-adm" value="LOGIN">
		</form>
		<div class="warning">
			<?php
			if(isset($_POST['login-adm'])){
				$username = $_POST['username'];
				$pass 		= $_POST['pass'];

				if(!empty($_POST)){
					if($_POST['username']){
						if($_POST['pass']){
							if(cek_user($username)){
								login_user($username,$pass);
							} else echo "Username $username tidak terdaftar.";
						} else echo "Password tidak boleh kosong.";
					} else echo "Username tidak boleh kosong.";
				} else echo "Harap isi semua data.";
			}
			?>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	$("#formulir").hide().fadeIn(2000);
});
</script>

</body>
</html>
<?php
} // akhir dari if(isset($_SESSION['login-adm']))
?>