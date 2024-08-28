<?php
session_start();
include 'pages/koneksi.php';
$username = $_GET['user'];
$pwd = $_GET['pwd'];
$admin = mysqli_query($koneksi, "select * from tbl_admin where username='$username' and pwd='$pwd'");
$cek = mysqli_num_rows($admin);
if ($cek == 1) {
	$_SESSION['username'] = $username;
	$_SESSION['pwd'] = $pwd;
	header("location:pages/peramalan/dashboard.php");
} else {
	echo '<script>
   	window.onload = function(){
   	alert("Gagal Login");
   	location.href = "Index.html"
   	}
   	</script>';
}
?>