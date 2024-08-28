<?php
include '../atas.php';
function  getBulan($bln)
{
    switch ($bln) {
        case  1:
            return  "Januari";
            break;
        case  2:
            return  "Februari";
            break;
        case  3:
            return  "Maret";
            break;
        case  4:
            return  "April";
            break;
        case  5:
            return  "Mei";
            break;
        case  6:
            return  "Juni";
            break;
        case  7:
            return  "Juli";
            break;
        case  8:
            return  "Agustus";
            break;
        case  9:
            return  "September";
            break;
        case  10:
            return  "Oktober";
            break;
        case  11:
            return  "November";
            break;
        case  12:
            return  "Desember";
            break;
    }
} ?>
<section class="content">
    <div class="container-fluid">
        <?php
        include '../koneksi.php';
        $id = $_GET['code'];
        $dmenu = mysqli_query($koneksi, "select * from tbl_bahan where id_bahan='$id'");
        $namamenu        = mysqli_fetch_array($dmenu);
        $id_menu = $namamenu['id_bahan'];
        ?>
        <!-- Basic Examples -->
        <!-- #END# Basic Examples -->
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Bahan <?php echo $namamenu['nama_bahan']; ?><div> <a href="prosesramal.php?code=<?php echo $namamenu['id_bahan'] ?>" button type="submit" name="simpan" class="btn btn-primary m-t-15 waves-effect">Ramal</button> </a></div>
                        </h2>
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bulan</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>lefel</th>
                                    <th>trend</th>
                                    <th>seasonal</th>
                                    <th>Harga Ramal </th>
                                    <th>Akurasi </th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Bulan</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>lefel</th>
                                    <th>trend</th>
                                    <th>seasonal</th>
                                    <th>Harga Ramal </th>
                                    <th>Akurasi </th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                if (isset($_POST['simpan'])) {
                                    include "../koneksi.php";
                                    $harga = $_POST['harga'];
                                    $tahun = date('Y');
                                    $bulan = date('m');
                                    $query  = mysqli_query($koneksi, "select * from tbl_pemulusan where id_bahan='$id' ");
                                    $cekbahan = mysqli_num_rows($query);
                                    if ($cekbahan > 12) {
                                        $sqll = mysqli_query($koneksi, "INSERT INTO tbl_pemulusanakhir ('','$tahun','$bulan','$id','$harga','','','');");
                                        if ($sqll) {
                                            echo '<script>
                                        window.onload = function(){
                                        alert("Data berhasil disimpan");
                                        location.href = "../peramalan/data_peramalan.php"
                                        }
                                        </script>';
                                        } else {
                                            echo '<script>
                                        window.onload = function(){
                                        alert("Data Gagal disimpan");
                                        location.href = "../peramalan/data_peramalan.php"
                                        }
                                        </script>';
                                        }
                                    } else {
                                        $sqll = mysqli_query($koneksi, "INSERT INTO tbl_pemulusan values ('','$tahun','$bulan','$id','$harga','','','');");
                                        if ($sqll) {
                                            echo '<script>
                                        window.onload = function(){
                                        alert("Data berhasil disimpan");
                                        location.href = "../peramalan/data_peramalan.php"
                                        }
                                        </script>';
                                        } else {
                                            echo '<script>
                                        window.onload = function(){
                                        alert("Data Gagal disimpan");
                                        location.href = "../peramalan/data_peramalan.php"
                                        }
                                        </script>';
                                        }
                                    }
                                }
                                ?>
                                <?php
                                include "../koneksi.php";
                                ?>
                                <?php include "../koneksi.php";
                                $nomor = 1;
                                $query  = mysqli_query($koneksi, "select * from tbl_pemulusanakhir where id_bahan='$id' order by id_pemulusanakhir desc");
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_bahan = $data['id_bahan'];
                                    $queribahan  = mysqli_query($koneksi, "select * from tbl_bahan where id_bahan='$id_bahan' ");
                                    $bahan = mysqli_fetch_array($queribahan);
                                    $nbulan = $data['bulan'];
                                    $bulan = getBulan($nbulan);
                                ?>
                                    <tr>
                                        <?php
                                        $akurasi = 1;
                                        $hasli = $data['harga_asli'];
                                        $hramal = $data['hasilramal'];
                                        @$akurasi = (($hramal - $hasli) / $hasli) * 100;
                                        ?>
                                        <td><?php echo $nomor; ?></td>
                                        <td><?php echo $bulan . "-" . $data['tahun']; ?></td>
                                        <td><?php echo $bahan['satuan']; ?></td>
                                        <?php if (!isset($data['harga_asli'])) { ?>
                                            <td><input type="text" name="nama" class="form-control" placeholder="Nama Menu" required /><?php } else { ?></td>
                                            <td><?php if ($data['harga_asli'] != '') {
                                                                                                                                            echo "Rp " . number_format($data['harga_asli'], 0, '', '.');
                                                                                                                                        } else { ?><input type="text" name="harga" class="form-control" placeholder="Harga Asli" required /> <?php } ?>
                                            </td>
                                            <td><?php echo $data['lefel']; ?></td>
                                            <td><?php echo $data['trend']; ?></td>
                                            <td><?php echo $data['seasonal']; ?></td>
                                            <td><?php echo "Rp " . number_format($data['hasilramal'], 0, '', '.'); ?></td>
                                            <td><?php echo number_format($akurasi, 2) . "%";
                                                                                                                                    } ?></td>
                                        <?php
                                        $nomor++;
                                    }
                                        ?>
                                    </tr>
                                    <tr>
                                        <?php
                                        $query  = mysqli_query($koneksi, "select * from tbl_pemulusan where id_bahan='$id' order by id_pemulusan desc");
                                        while ($data = mysqli_fetch_array($query)) {
                                            $id_bahan = $data['id_bahan'];
                                            $queribahan  = mysqli_query($koneksi, "select * from tbl_bahan where id_bahan='$id_bahan' ");
                                            $bahan = mysqli_fetch_array($queribahan);

                                            $nbulan = $data['bulan'];
                                            $bulan = getBulan($nbulan);
                                        ?>
                                            <td><?php echo $nomor; ?></td>
                                            <td><?php echo $bulan . "-" . $data['tahun']; ?></td>
                                            <td><?php echo $bahan['satuan']; ?></td>
                                            <?php if (!isset($data['harga_asli'])) { ?>
                                                <td><input type="text" name="nama" class="form-control" placeholder="Nama Menu" required /><?php } else { ?></td>

                                                <td><?php echo "Rp " . number_format($data['harga_asli'], 0, '', '.');
                                                                                                                                        } ?>
                                                <td><?php echo $data['lefel']; ?></td>
                                                <td><?php echo $data['trend']; ?></td>
                                                <td><?php echo $data['seasonal']; ?></td>
                                                </td>
                                    </tr>

                                <?php
                                            $nomor++;
                                        }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
</section>
<?php include '../bawah.php'; ?>