<?php
include "../koneksi.php";
//pencarian level awal
$no=1;
$hasil=0;
$jhasil=0;
$idbahan= $_GET['code'];
$query  = mysqli_query($koneksi, "select * from tbl_pemulusan  WHERE id_bahan='$idbahan'");
while($data=mysqli_fetch_array($query))
{
    $hasil=$hasil+$data['harga_asli'];
    $id=$data['id_pemulusan'];
    if($no==12)
    {
        $jhasil=$hasil/12;
        $queri="UPDATE tbl_pemulusan SET lefel = '$jhasil' WHERE id_pemulusan='$id'" ;
        $sql=mysqli_query($koneksi, $queri);
    }
    $no++;
}
//pencarian trend awal
$idbahan= $_GET['code'];
$query1  = mysqli_query($koneksi, "select * from tbl_pemulusan WHERE id_bahan='$idbahan'");
$data1=mysqli_fetch_array($query1);
$y1=$data1['harga_asli'];
$no=1;
$hasil=0;
$query  = mysqli_query($koneksi, "select * from tbl_pemulusan WHERE id_bahan='$idbahan'");
while($data=mysqli_fetch_array($query))
{
    $hasil=($data['harga_asli']+1-$y1)/12;
    $id=$data['id_pemulusan'];
    if($no==12)
    {   $seasonalawal=$data['harga_asli']-$jhasil;
        $queri="UPDATE tbl_pemulusan SET trend = '$hasil',seasonal = '$seasonalawal' WHERE id_pemulusan='$id'" ;
        $sql=mysqli_query($koneksi, $queri);
    }
    if($no<12)
    {   
        $seasonalawal=$data['harga_asli']-$jhasil;
        $querii="UPDATE tbl_pemulusan SET seasonal = '$seasonalawal' WHERE id_pemulusan='$id'" ;
        $sqll=mysqli_query($koneksi, $querii);
    }
    $no++;
}
//leve akhir
$no=1;
$query  = mysqli_query($koneksi, "select * from tbl_pemulusanakhir WHERE id_bahan='$idbahan'");
while($data=mysqli_fetch_array($query))
{
    $id=$data['id_pemulusanakhir'];
    $bulan=$data['bulan'];
    $h_asli=$data['harga_asli'];
    $qbulan  = mysqli_query($koneksi, "select * from tbl_pemulusan where bulan='$bulan' and id_bahan='$idbahan' ");
    $dbulan=mysqli_fetch_array($qbulan);
    if($h_asli=='')
    {
        echo '<script>
        window.onload = function(){
        alert("Data Sudah Terbaru, Isi Harga Asli Untuk Peramalan Bulan Selanjutnya");
        location.href = "../peramalan/data_peramalan.php"
        }
        </script>';
    }
    else
    { if($no==1)
    {
        $level = 0.9*($data['harga_asli']-$dbulan['seasonal'])+(1-0.9)*($jhasil+$hasil);
        $trend = 0.1*($level-$jhasil)+(1-0.1)*$hasil;
        $seasonalakhir= 0.9*($data['harga_asli']-$level)+(1-0.9)*$dbulan['seasonal'];
        $hperamalan=$level+$trend+$dbulan['seasonal'];
        //echo $level."|".$trend."||".$seasonalakhir."|||".$hperamalan"";
        $querii="UPDATE tbl_pemulusanakhir SET lefel = '$level',trend = '$trend',seasonal = '$seasonalakhir',hasilramal = '$hperamalan' WHERE id_pemulusanakhir='$id'" ;
        $sql=mysqli_query($koneksi, $querii);
    }
    else
    {
        $level1 = 0.9*($data['harga_asli']-$dbulan['seasonal'])+(1-0.9)*($level+$trend);
        //echo $hasil."|";
        $trend = 0.1*($level1-$level)+(1-0.1)*$trend;
        $seasonalakhir= 0.9*($data['harga_asli']-$level1)+(1-0.9)*$dbulan['seasonal'];
        $hperamalan=$level1+$trend+$dbulan['seasonal'];
        //echo $hperamalan."||";
        $querii="UPDATE tbl_pemulusanakhir SET lefel = '$level1',trend = '$trend',seasonal = '$seasonalakhir',hasilramal = '$hperamalan' WHERE id_pemulusanakhir='$id'" ;
        $sql=mysqli_query($koneksi, $querii);
        $level=$level1;
    }
    }
    $no++;

}
$query  = mysqli_query($koneksi, "select * from tbl_pemulusanakhir WHERE id_bahan='$idbahan'");
$dataa=mysqli_fetch_array($query);
$seasonal= $dataa['seasonal'];
$query  = mysqli_query($koneksi, "select * from tbl_pemulusanakhir WHERE id_bahan='$idbahan'");
while($data=mysqli_fetch_array($query))
{
    $lefel=$data['lefel'];
    $trend=$data['trend'];
    $bulan= $data['bulan'];
    $tahun= $data['tahun'];
    $hargaasli= $data['harga_asli'];
}
if($bulan==12)
{
    $hakhir=($lefel+(1*$trend))+$seasonal;
}
else 
{
    @$hakhir=($lefel+(($bulan+1)*$trend))+$seasonal;
}
//echo $hakhir;
if($bulan==12)
{
    $hbulan=1;
    $htahun=$tahun+1;
}
else
{
    $hbulan=$bulan+1;
    $htahun=$tahun;
}
if($hargaasli=='')
{
    //$querii="UPDATE tbl_pemulusanakhir SET hasilramal = '$hakhir' WHERE id_pemulusanakhir='$id'" ;   
}
else
{
    $sqll=mysqli_query($koneksi, "INSERT INTO tbl_pemulusanakhir values ('','$htahun','$hbulan','$idbahan','','','','','$hakhir');");
}
?>