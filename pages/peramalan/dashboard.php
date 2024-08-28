<?php include '../koneksi.php';
$peramalan = mysqli_query($koneksi, "SELECT * FROM tbl_pemulusanakhir");
?>
<?php include '../atas.php'; ?>
<script src="Chart.js"></script>
<script src="apexcharts.js"></script>

<section class="content">
    <div class="container-fluid">

        <!-- Basic Examples -->
        <!-- #END# Basic Examples -->
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="row">
                        <div class="header col-md-12" style="display: flex; justify-content: space-between; flex-wrap: wrap;">
                            <?php
                            date_default_timezone_set('Asia/Jakarta');
                            $tahunNow = date('Y', strtotime('now'));
                            $selectbarangDefault = mysqli_query($koneksi, "SELECT * FROM tbl_bahan WHERE id_bahan = '10'") or die(mysqli_error($koneksi));

                            if ($selectbarangDefault->num_rows > 0) {
                                while ($row = mysqli_fetch_array($selectbarangDefault)) {
                                    $beras = $row['nama_bahan'];
                                }
                            }
                            ?>
                            <h2 class="col-md-6">Grafik Perbandingan Harga Asli dan Hasil Peramalan <span id="headerBarang"><?= $beras; ?></span> Tahun <span id="headerTahun"><?= $tahunNow; ?></span></h2>
                            <form action="" method="POST" class="col-md-4" style="display: flex;">
                                <select class="form-control form-select select2" name="barangku" name="selectbarang" aria-label="Default select example" id="brg" width="100px" required>
                                    <option value="" selected disabled> -- Pilih Bahan -- </option>
                                    <?php
                                    $selectbarang = mysqli_query($koneksi, "SELECT * FROM tbl_bahan") or die(mysqli_error($koneksi));

                                    if ($selectbarang) {

                                        while ($row = mysqli_fetch_array($selectbarang)) {
                                            $idb = $row["id_bahan"];
                                            $namab = $row["nama_bahan"];
                                    ?>
                                            <option value="<?= $idb; ?>"><?= $namab; ?></option>

                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <input class="form-control" style="width: 100px;" type="search" placeholder="Tahun" aria-label="Search" name="tahun" required>
                                <button type="submit" name="btnFilter" class="btn btn-success" style="margin-left: 10px;">Filter</button>
                            </form>
                        </div>
                    </div>

                    <div class="body">
                        <?php
                        date_default_timezone_set('Asia/Jakarta');
                        $tahunNow = date('Y', strtotime('now'));

                        $filterbarang = 'default';
                        $filterTahun = '';

                        if ($filterTahun == '' && $filterbarang == 'default') {
                            $sum1 = mysqli_query($koneksi, "SELECT  SUM(harga_asli) as haNow1, SUM(hasilramal) as hrNow1 FROM tbl_pemulusanakhir WHERE id_bahan = '10' AND bulan = '1' AND tahun = '$tahunNow'") or die(mysqli_error($koneksi));

                            if ($sum1) {
                                while ($row = mysqli_fetch_array($sum1)) {
                                    $haNow1 = $row['haNow1'];
                                    $hrNow1 = $row['hrNow1'];
                                    if ($haNow1 == '') {
                                        $haNow1 = "0";
                                    }
                                    if ($hrNow1 == '') {
                                        $hrNow1 = "0";
                                    }
                                }
                            }

                            $sum2 = mysqli_query($koneksi, "SELECT  SUM(harga_asli) as haNow2, SUM(hasilramal) as hrNow2 FROM tbl_pemulusanakhir WHERE id_bahan = '10' AND bulan = '2' AND tahun = '$tahunNow'") or die(mysqli_error($koneksi));
                            if ($sum2) {
                                while ($row = mysqli_fetch_array($sum2)) {
                                    $haNow2 = $row['haNow2'];
                                    $hrNow2 = $row['hrNow2'];
                                    if ($haNow2 == '') {
                                        $haNow2 = "0";
                                    }
                                    if ($hrNow2 == '') {
                                        $hrNow2 = "0";
                                    }
                                }
                            }

                            $sum3 = mysqli_query($koneksi, "SELECT  SUM(harga_asli) as haNow3, SUM(hasilramal) as hrNow3 FROM tbl_pemulusanakhir WHERE id_bahan = '10' AND bulan = '3' AND tahun = '$tahunNow'") or die(mysqli_error($koneksi));
                            if ($sum3) {
                                while ($row = mysqli_fetch_array($sum3)) {
                                    $haNow3 = $row['haNow3'];
                                    $hrNow3 = $row['hrNow3'];
                                    if ($haNow3 == '') {
                                        $haNow3 = "0";
                                    }
                                    if ($hrNow3 == '') {
                                        $hrNow3 = "0";
                                    }
                                }
                            }

                            $sum4 = mysqli_query($koneksi, "SELECT  SUM(harga_asli) as haNow4, SUM(hasilramal) as hrNow4 FROM tbl_pemulusanakhir WHERE id_bahan = '10' AND bulan = '4' AND tahun = '$tahunNow'") or die(mysqli_error($koneksi));
                            if ($sum4) {
                                while ($row = mysqli_fetch_array($sum4)) {
                                    $haNow4 = $row['haNow4'];
                                    $hrNow4 = $row['hrNow4'];
                                    if ($haNow4 == '') {
                                        $haNow4 = "0";
                                    }
                                    if ($hrNow4 == '') {
                                        $hrNow4 = "0";
                                    }
                                }
                            }

                            $sum5 = mysqli_query($koneksi, "SELECT  SUM(harga_asli) as haNow5, SUM(hasilramal) as hrNow5 FROM tbl_pemulusanakhir WHERE id_bahan = '10' AND bulan = '5' AND tahun = '$tahunNow'") or die(mysqli_error($koneksi));
                            if ($sum5) {
                                while ($row = mysqli_fetch_array($sum5)) {
                                    $haNow5 = $row['haNow5'];
                                    $hrNow5 = $row['hrNow5'];
                                    if ($haNow5 == '') {
                                        $haNow5 = "0";
                                    }
                                    if ($hrNow5 == '') {
                                        $hrNow5 = "0";
                                    }
                                }
                            }

                            $sum6 = mysqli_query($koneksi, "SELECT  SUM(harga_asli) as haNow6, SUM(hasilramal) as hrNow6 FROM tbl_pemulusanakhir WHERE id_bahan = '10' AND bulan = '6' AND tahun = '$tahunNow'") or die(mysqli_error($koneksi));
                            if ($sum6) {
                                while ($row = mysqli_fetch_array($sum6)) {
                                    $haNow6 = $row['haNow6'];
                                    $hrNow6 = $row['hrNow6'];
                                    if ($haNow6 == '') {
                                        $haNow6 = "0";
                                    }
                                    if ($hrNow6 == '') {
                                        $hrNow6 = "0";
                                    }
                                }
                            }

                            $sum7 = mysqli_query($koneksi, "SELECT  SUM(harga_asli) as haNow7, SUM(hasilramal) as hrNow7 FROM tbl_pemulusanakhir WHERE id_bahan = '10' AND bulan = '7' AND tahun = '$tahunNow'") or die(mysqli_error($koneksi));
                            if ($sum7) {
                                while ($row = mysqli_fetch_array($sum7)) {
                                    $haNow7 = $row['haNow7'];
                                    $hrNow7 = $row['hrNow7'];
                                    if ($haNow7 == '') {
                                        $haNow7 = "0";
                                    }
                                    if ($hrNow7 == '') {
                                        $hrNow7 = "0";
                                    }
                                }
                            }

                            $sum8 = mysqli_query($koneksi, "SELECT  SUM(harga_asli) as haNow8, SUM(hasilramal) as hrNow8 FROM tbl_pemulusanakhir WHERE id_bahan = '10' AND bulan = '8' AND tahun = '$tahunNow'") or die(mysqli_error($koneksi));
                            if ($sum8) {
                                while ($row = mysqli_fetch_array($sum8)) {
                                    $haNow8 = $row['haNow8'];
                                    $hrNow8 = $row['hrNow8'];
                                    if ($haNow8 == '') {
                                        $haNow8 = "0";
                                    }
                                    if ($hrNow8 == '') {
                                        $hrNow8 = "0";
                                    }
                                }
                            }

                            $sum9 = mysqli_query($koneksi, "SELECT  SUM(harga_asli) as haNow9, SUM(hasilramal) as hrNow9 FROM tbl_pemulusanakhir WHERE id_bahan = '10' AND bulan = '9' AND tahun = '$tahunNow'") or die(mysqli_error($koneksi));
                            if ($sum9) {
                                while ($row = mysqli_fetch_array($sum9)) {
                                    $haNow9 = $row['haNow9'];
                                    $hrNow9 = $row['hrNow9'];
                                    if ($haNow9 == '') {
                                        $haNow9 = "0";
                                    }
                                    if ($hrNow9 == '') {
                                        $hrNow9 = "0";
                                    }
                                }
                            }

                            $sum10 = mysqli_query($koneksi, "SELECT  SUM(harga_asli) as haNow10, SUM(hasilramal) as hrNow10 FROM tbl_pemulusanakhir WHERE id_bahan = '10' AND bulan = '10' AND tahun = '$tahunNow'") or die(mysqli_error($koneksi));
                            if ($sum10) {
                                while ($row = mysqli_fetch_array($sum10)) {
                                    $haNow10 = $row['haNow10'];
                                    $hrNow10 = $row['hrNow10'];
                                    if ($haNow10 == '') {
                                        $haNow10 = "0";
                                    }
                                    if ($hrNow10 == '') {
                                        $hrNow10 = "0";
                                    }
                                }
                            }

                            $sum11 = mysqli_query($koneksi, "SELECT  SUM(harga_asli) as haNow11, SUM(hasilramal) as hrNow11 FROM tbl_pemulusanakhir WHERE id_bahan = '10' AND bulan = '11' AND tahun = '$tahunNow'") or die(mysqli_error($koneksi));
                            if ($sum11) {
                                while ($row = mysqli_fetch_array($sum11)) {
                                    $haNow11 = $row['haNow11'];
                                    $hrNow11 = $row['hrNow11'];
                                    if ($haNow11 == '') {
                                        $haNow11 = "0";
                                    }
                                    if ($hrNow11 == '') {
                                        $hrNow11 = "0";
                                    }
                                }
                            }

                            $sum12 = mysqli_query($koneksi, "SELECT  SUM(harga_asli) as haNow12, SUM(hasilramal) as hrNow12 FROM tbl_pemulusanakhir WHERE id_bahan = '10' AND bulan = '12' AND tahun = '$tahunNow'") or die(mysqli_error($koneksi));
                            if ($sum12) {
                                while ($row = mysqli_fetch_array($sum12)) {
                                    $haNow12 = $row['haNow12'];
                                    $hrNow12 = $row['hrNow12'];
                                    if ($haNow12 == '') {
                                        $haNow12 = "0";
                                    }
                                    if ($hrNow12 == '') {
                                        $hrNow12 = "0";
                                    }
                                }
                            } ?>

                            <!-- Column Chart -->
                            <div id="columnChartDefault"></div>

                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new ApexCharts(document.querySelector("#columnChartDefault"), {
                                        series: [{
                                            name: 'Harga Asli',
                                            data: [<?php echo $haNow1; ?>, <?php echo $haNow2; ?>, <?php echo $haNow3; ?>, <?php echo $haNow4; ?>, <?php echo $haNow5; ?>, <?php echo $haNow6; ?>, <?php echo $haNow7; ?>, <?php echo $haNow8; ?>, <?php echo $haNow9; ?>, <?php echo $haNow10; ?>, <?php echo $haNow11; ?>, <?php echo $haNow12; ?>]
                                        }, {
                                            name: 'Harga Ramal',
                                            data: [<?php echo $hrNow1; ?>, <?php echo $hrNow2; ?>, <?php echo $hrNow3; ?>, <?php echo $hrNow4; ?>, <?php echo $hrNow5; ?>, <?php echo $hrNow6; ?>, <?php echo $hrNow7; ?>, <?php echo $hrNow8; ?>, <?php echo $hrNow9; ?>, <?php echo $hrNow10; ?>, <?php echo $hrNow11; ?>, <?php echo $hrNow12; ?>]
                                        }],
                                        chart: {
                                            type: 'bar',
                                            height: 450
                                        },
                                        plotOptions: {
                                            bar: {
                                                horizontal: false,
                                                columnWidth: '55%',
                                                endingShape: 'rounded'
                                            },
                                        },
                                        dataLabels: {
                                            enabled: false
                                        },
                                        stroke: {
                                            show: true,
                                            width: 2,
                                            colors: ['transparent']
                                        },
                                        xaxis: {
                                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
                                        },
                                        yaxis: {
                                            title: {
                                                text: 'Rp (Rupiah)'
                                            }
                                        },
                                        fill: {
                                            opacity: 1
                                        },
                                        tooltip: {
                                            y: {
                                                formatter: function(val) {
                                                    return "Rp. " + val
                                                }
                                            }
                                        }
                                    }).render();
                                });
                            </script>
                            <!-- End Column Chart -->

                        <?php
                        } ?>

                        <?php
                        if (isset($_POST['btnFilter'])) {
                            $filterbarang = $_POST['barangku'];
                            $filterTahun = $_POST['tahun'];

                            $sum1 = mysqli_query($koneksi, "SELECT  SUM(harga_asli) as haNow1, SUM(hasilramal) as hrNow1 FROM tbl_pemulusanakhir WHERE id_bahan = '$filterbarang' AND bulan = '1' AND tahun = '$filterTahun'") or die(mysqli_error($koneksi));

                            if ($sum1) {
                                while ($row = mysqli_fetch_array($sum1)) {
                                    $haNow1 = $row['haNow1'];
                                    $hrNow1 = $row['hrNow1'];
                                    if ($haNow1 == '') {
                                        $haNow1 = "0";
                                    }
                                    if ($hrNow1 == '') {
                                        $hrNow1 = "0";
                                    }
                                }
                            }

                            $sum2 = mysqli_query($koneksi, "SELECT  SUM(harga_asli) as haNow2, SUM(hasilramal) as hrNow2 FROM tbl_pemulusanakhir WHERE id_bahan = '$filterbarang' AND bulan = '2' AND tahun = '$filterTahun'") or die(mysqli_error($koneksi));
                            if ($sum2) {
                                while ($row = mysqli_fetch_array($sum2)) {
                                    $haNow2 = $row['haNow2'];
                                    $hrNow2 = $row['hrNow2'];
                                    if ($haNow2 == '') {
                                        $haNow2 = "0";
                                    }
                                    if ($hrNow2 == '') {
                                        $hrNow2 = "0";
                                    }
                                }
                            }

                            $sum3 = mysqli_query($koneksi, "SELECT  SUM(harga_asli) as haNow3, SUM(hasilramal) as hrNow3 FROM tbl_pemulusanakhir WHERE id_bahan = '$filterbarang' AND bulan = '3' AND tahun = '$filterTahun'") or die(mysqli_error($koneksi));
                            if ($sum3) {
                                while ($row = mysqli_fetch_array($sum3)) {
                                    $haNow3 = $row['haNow3'];
                                    $hrNow3 = $row['hrNow3'];
                                    if ($haNow3 == '') {
                                        $haNow3 = "0";
                                    }
                                    if ($hrNow3 == '') {
                                        $hrNow3 = "0";
                                    }
                                }
                            }

                            $sum4 = mysqli_query($koneksi, "SELECT  SUM(harga_asli) as haNow4, SUM(hasilramal) as hrNow4 FROM tbl_pemulusanakhir WHERE id_bahan = '$filterbarang' AND bulan = '4' AND tahun = '$filterTahun'") or die(mysqli_error($koneksi));
                            if ($sum4) {
                                while ($row = mysqli_fetch_array($sum4)) {
                                    $haNow4 = $row['haNow4'];
                                    $hrNow4 = $row['hrNow4'];
                                    if ($haNow4 == '') {
                                        $haNow4 = "0";
                                    }
                                    if ($hrNow4 == '') {
                                        $hrNow4 = "0";
                                    }
                                }
                            }

                            $sum5 = mysqli_query($koneksi, "SELECT  SUM(harga_asli) as haNow5, SUM(hasilramal) as hrNow5 FROM tbl_pemulusanakhir WHERE id_bahan = '$filterbarang' AND bulan = '5' AND tahun = '$filterTahun'") or die(mysqli_error($koneksi));
                            if ($sum5) {
                                while ($row = mysqli_fetch_array($sum5)) {
                                    $haNow5 = $row['haNow5'];
                                    $hrNow5 = $row['hrNow5'];
                                    if ($haNow5 == '') {
                                        $haNow5 = "0";
                                    }
                                    if ($hrNow5 == '') {
                                        $hrNow5 = "0";
                                    }
                                }
                            }

                            $sum6 = mysqli_query($koneksi, "SELECT  SUM(harga_asli) as haNow6, SUM(hasilramal) as hrNow6 FROM tbl_pemulusanakhir WHERE id_bahan = '$filterbarang' AND bulan = '6' AND tahun = '$filterTahun'") or die(mysqli_error($koneksi));
                            if ($sum6) {
                                while ($row = mysqli_fetch_array($sum6)) {
                                    $haNow6 = $row['haNow6'];
                                    $hrNow6 = $row['hrNow6'];
                                    if ($haNow6 == '') {
                                        $haNow6 = "0";
                                    }
                                    if ($hrNow6 == '') {
                                        $hrNow6 = "0";
                                    }
                                }
                            }

                            $sum7 = mysqli_query($koneksi, "SELECT  SUM(harga_asli) as haNow7, SUM(hasilramal) as hrNow7 FROM tbl_pemulusanakhir WHERE id_bahan = '$filterbarang' AND bulan = '7' AND tahun = '$filterTahun'") or die(mysqli_error($koneksi));
                            if ($sum7) {
                                while ($row = mysqli_fetch_array($sum7)) {
                                    $haNow7 = $row['haNow7'];
                                    $hrNow7 = $row['hrNow7'];
                                    if ($haNow7 == '') {
                                        $haNow7 = "0";
                                    }
                                    if ($hrNow7 == '') {
                                        $hrNow7 = "0";
                                    }
                                }
                            }

                            $sum8 = mysqli_query($koneksi, "SELECT  SUM(harga_asli) as haNow8, SUM(hasilramal) as hrNow8 FROM tbl_pemulusanakhir WHERE id_bahan = '$filterbarang' AND bulan = '8' AND tahun = '$filterTahun'") or die(mysqli_error($koneksi));
                            if ($sum8) {
                                while ($row = mysqli_fetch_array($sum8)) {
                                    $haNow8 = $row['haNow8'];
                                    $hrNow8 = $row['hrNow8'];
                                    if ($haNow8 == '') {
                                        $haNow8 = "0";
                                    }
                                    if ($hrNow8 == '') {
                                        $hrNow8 = "0";
                                    }
                                }
                            }

                            $sum9 = mysqli_query($koneksi, "SELECT  SUM(harga_asli) as haNow9, SUM(hasilramal) as hrNow9 FROM tbl_pemulusanakhir WHERE id_bahan = '$filterbarang' AND bulan = '9' AND tahun = '$filterTahun'") or die(mysqli_error($koneksi));
                            if ($sum9) {
                                while ($row = mysqli_fetch_array($sum9)) {
                                    $haNow9 = $row['haNow9'];
                                    $hrNow9 = $row['hrNow9'];
                                    if ($haNow9 == '') {
                                        $haNow9 = "0";
                                    }
                                    if ($hrNow9 == '') {
                                        $hrNow9 = "0";
                                    }
                                }
                            }

                            $sum10 = mysqli_query($koneksi, "SELECT  SUM(harga_asli) as haNow10, SUM(hasilramal) as hrNow10 FROM tbl_pemulusanakhir WHERE id_bahan = '$filterbarang' AND bulan = '10' AND tahun = '$filterTahun'") or die(mysqli_error($koneksi));
                            if ($sum10) {
                                while ($row = mysqli_fetch_array($sum10)) {
                                    $haNow10 = $row['haNow10'];
                                    $hrNow10 = $row['hrNow10'];
                                    if ($haNow10 == '') {
                                        $haNow10 = "0";
                                    }
                                    if ($hrNow10 == '') {
                                        $hrNow10 = "0";
                                    }
                                }
                            }

                            $sum11 = mysqli_query($koneksi, "SELECT  SUM(harga_asli) as haNow11, SUM(hasilramal) as hrNow11 FROM tbl_pemulusanakhir WHERE id_bahan = '$filterbarang' AND bulan = '11' AND tahun = '$filterTahun'") or die(mysqli_error($koneksi));
                            if ($sum11) {
                                while ($row = mysqli_fetch_array($sum11)) {
                                    $haNow11 = $row['haNow11'];
                                    $hrNow11 = $row['hrNow11'];
                                    if ($haNow11 == '') {
                                        $haNow11 = "0";
                                    }
                                    if ($hrNow11 == '') {
                                        $hrNow11 = "0";
                                    }
                                }
                            }

                            $sum12 = mysqli_query($koneksi, "SELECT  SUM(harga_asli) as haNow12, SUM(hasilramal) as hrNow12 FROM tbl_pemulusanakhir WHERE id_bahan = '$filterbarang' AND bulan = '12' AND tahun = '$filterTahun'") or die(mysqli_error($koneksi));
                            if ($sum12) {
                                while ($row = mysqli_fetch_array($sum12)) {
                                    $haNow12 = $row['haNow12'];
                                    $hrNow12 = $row['hrNow12'];
                                    if ($haNow12 == '') {
                                        $haNow12 = "0";
                                    }
                                    if ($hrNow12 == '') {
                                        $hrNow12 = "0";
                                    }
                                }
                            }

                            $selectbrg = mysqli_query($koneksi, "SELECT * FROM tbl_bahan WHERE id_bahan = '$filterbarang'") or die(mysqli_error($koneksi));

                            if ($selectbrg) {
                                while ($brg = mysqli_fetch_array($selectbrg)) {
                                    $nmb = $brg["nama_bahan"];
                                }
                            }
                        ?>

                            <!-- Column Chart -->
                            <div id="columnChart"></div>

                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new ApexCharts(document.querySelector("#columnChart"), {
                                        series: [{
                                            name: 'Harga Asli',
                                            data: [<?php echo $haNow1; ?>, <?php echo $haNow2; ?>, <?php echo $haNow3; ?>, <?php echo $haNow4; ?>, <?php echo $haNow5; ?>, <?php echo $haNow6; ?>, <?php echo $haNow7; ?>, <?php echo $haNow8; ?>, <?php echo $haNow9; ?>, <?php echo $haNow10; ?>, <?php echo $haNow11; ?>, <?php echo $haNow12; ?>]
                                        }, {
                                            name: 'Harga Ramal',
                                            data: [<?php echo $hrNow1; ?>, <?php echo $hrNow2; ?>, <?php echo $hrNow3; ?>, <?php echo $hrNow4; ?>, <?php echo $hrNow5; ?>, <?php echo $hrNow6; ?>, <?php echo $hrNow7; ?>, <?php echo $hrNow8; ?>, <?php echo $hrNow9; ?>, <?php echo $hrNow10; ?>, <?php echo $hrNow11; ?>, <?php echo $hrNow12; ?>]
                                        }],
                                        chart: {
                                            type: 'bar',
                                            height: 450
                                        },
                                        plotOptions: {
                                            bar: {
                                                horizontal: false,
                                                columnWidth: '55%',
                                                endingShape: 'rounded'
                                            },
                                        },
                                        dataLabels: {
                                            enabled: false
                                        },
                                        stroke: {
                                            show: true,
                                            width: 2,
                                            colors: ['transparent']
                                        },
                                        xaxis: {
                                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
                                        },
                                        yaxis: {
                                            title: {
                                                text: 'Rp (Rupiah)'
                                            }
                                        },
                                        fill: {
                                            opacity: 1
                                        },
                                        tooltip: {
                                            y: {
                                                formatter: function(val) {
                                                    return "Rp. " + val
                                                }
                                            }
                                        }
                                    }).render();
                                });
                            </script>
                            <!-- End Column Chart -->

                            <script type="text/javascript">
                                document.querySelector("#columnChartDefault").style.display = "none";
                                document.querySelector("#headerBarang").innerHTML = "<?= $nmb; ?>";
                                document.querySelector("#headerTahun").innerHTML = "<?= $filterTahun; ?>";
                            </script>

                        <?php
                        }
                        ?>


                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Bar Chart -->
    </div>
    <!-- #END# Exportable Table -->
    </div>
</section>

<?php include '../bawah.php'; ?>