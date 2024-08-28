<?php 
include '../koneksi.php';
$id = $_GET["code"];
$sql=mysqli_query($koneksi, "delete from tbl_menu where id_menu='$id'");
if($sql)
{
	echo '<script>
   	window.onload = function(){
   	alert("Data Berhasil Dihapus");
   	location.href = "data_menu.php"
   	}
   	</script>';
}
else
{
	echo '<script>
   	window.onload = function(){
   	alert("Data Gagal Dihapus");
   	location.href = "data_menu.php"
   	}
  	</script>'.mysqli_error($koneksi);
}
?>