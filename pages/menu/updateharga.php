<?php 
include '../koneksi.php';
$id=$_GET['code'];
$hbaru=0;
$dresep = mysqli_query($koneksi, "select * from tbl_resep where id_menu='$id'");
while($data=mysqli_fetch_array($dresep))
{
    $id_bahan=$data['id_bahan'];
    $qbahan = mysqli_query($koneksi, "select * from tbl_pemulusanakhir where id_bahan='$id_bahan'");
    $dbahan=mysqli_fetch_array($qbahan);
    $hbahan=$data['takaran']*$dbahan['hasilramal'];
    $hbaru=$hbaru+$hbahan;
}
$hpersen=(30/100)*$hbaru;
$akhir=$hpersen+$hbaru;
echo $hbaru;
$query="UPDATE tbl_menu SET harga = '$akhir' WHERE id_menu='$id'" ;
$sql=mysqli_query($koneksi, $query);
echo '<script>
window.onload = function(){
alert("Harga berhasil dirubah");
location.href = "../menu/data_menu.php"
}
</script>';
?>
