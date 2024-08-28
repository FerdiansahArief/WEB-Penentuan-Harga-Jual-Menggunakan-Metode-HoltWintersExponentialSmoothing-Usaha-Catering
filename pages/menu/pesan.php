<?php include '../atas.php' ?>
    <section class="content">
        <div class="container-fluid">
            
            <!-- Basic Examples -->
            <!-- #END# Basic Examples -->
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                    <div class="body">
                    <h2 class="card-inside-title">Halaman Pemesanan--- Pemesanan Kelipatan 10 atau 1 paket</h2>
                    <div class="header">
                        <!-- Form input menu -->
                            <form autocomplete="off" method="POST" class="forms-sample" >
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                        <label for="email_address">Pilih Menu</label>
                                            <input type="text" name="nama" class="form-control" id="nama" required />
                                        </div>
                                        <div class="form-line">
                                        <label for="email_address">jumlah</label>
                                        <input type="number" name="jumlah" class="form-control" required />
                                        </div>
                                        <button type="submit" name="simpan" class="btn btn-primary m-t-15 waves-effect">Simpan</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <?php include  "autocomplete.php" ;?>
                            <?php
                            if(isset($_POST['simpan']))
                            {
                                include "../koneksi.php";
                                $nama=$_POST['nama'];
                                $jumlah=$_POST['jumlah'];
                                $tgl= date('d M Y');
                                $query  = mysqli_query($koneksi, "select * from tbl_menu where nama_menu='$nama' ");
                                $dmenu=mysqli_fetch_array($query);
                                $id=$dmenu['id_menu'];
                                $harga=$dmenu['harga'];
                                $hhasil=$harga*$jumlah;
                                    $sqll=mysqli_query($koneksi, "INSERT INTO tbl_historipesan values ('','$nama','$tgl','$jumlah','$hhasil');");
                                    if($sqll)
                                    {
                                        echo '<script>
                                        window.onload = function(){
                                        alert("Data berhasil disimpan");
                                        location.href = "../historipesan/historipesan.php"
                                        }
                                        </script>';
                                    }
                                    else
                                    {
                                        echo '<script>
                                        window.onload = function(){
                                        alert("Data Gagal disimpan");
                                        location.href = "../menu/pesan.php"
                                        }
                                        </script>';
                                    }
                            }							
                            ?>
                            <!-- akhir input menu -->
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>
<?php include '../bawah.php';?>