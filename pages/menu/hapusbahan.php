<?php 
include '../koneksi.php';
$id = $_GET["code"];
$sql=mysqli_query($koneksi, "delete from tbl_bahan where id_bahan='$id'");
if($sql)
{
    $sql=mysqli_query($koneksi, "delete from tbl_resep where id_bahan='$id'");
	echo '<script>
   	window.onload = function(){
   	alert("Data Berhasil Dihapus");
   	location.href = "data_bahan.php"
   	}
   	</script>';
}
else
{
	echo '<script>
   	window.onload = function(){
   	alert("Data Gagal Dihapus");
   	location.href = "data_bahan.php"
   	}
  	</script>'.mysqli_error($koneksi);
}
?>