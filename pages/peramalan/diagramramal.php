<html>

<head>
    <title>Tutorial Cara Membuat Grafik Chart JS dengan PHP MySQL</title>
    <script type="text/javascript" src="chartjs/Chart.js"></script>
    <style type="text/css">
        body {
            font-family: roboto;
        }

        table {
            margin: 0px auto;
        }
    </style>
</head>

<body>
    <h2 align="center">Cara Membuat Grafik Chart JS dengan PHP MySQL<br />Raja Putra Media</h2>
    <?php
    include "../koneksi.php";
    ?>
    <div style="width: 800px;margin: 0px auto;">
        <canvas id="myChart"></canvas>
    </div><br /><br />
    <table border="1" cellpadding="4">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            $data = mysqli_query($koneksi, "select * from tb_pemulusanakhir");
            while ($d = mysqli_fetch_array($data)) {
                $no++
                    ?>
                <tr>
                    <td>
                        <?php echo $no; ?>
                    </td>
                    <td>
                        <?php echo $d['harga_asli']; ?>
                    </td>
                    <td>
                        <?php echo $d['hasilramal']; ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Teknik Elektro", "Teknik Mesin", "Teknik Komputer", "Akuntansi"],
                datasets: [{
                    label: '',
                    data: [
                        <?php
                        $jumlah_elektro = mysqli_query($koneksi, "select * from tb_siswa where jurusan='Teknik Elektro'");
                        echo mysqli_num_rows($jumlah_elektro);
                        ?>,
                        <?php
                        $jumlah_mesin = mysqli_query($koneksi, "select * from tb_siswa where jurusan='Teknik Mesin'");
                        echo mysqli_num_rows($jumlah_mesin);
                        ?>,
                        <?php
                        $jumlah_komputer = mysqli_query($koneksi, "select * from tb_siswa where jurusan='Teknik Komputer'");
                        echo mysqli_num_rows($jumlah_komputer);
                        ?>,
                        <?php
                        $jumlah_akuntansi = mysqli_query($koneksi, "select * from tb_siswa where jurusan='Akuntansi'");
                        echo mysqli_num_rows($jumlah_akuntansi);
                        ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>

</html>