<?php include '../atas.php' ?>
    <section class="content">
        <div class="container-fluid">
            <?php
            include '../koneksi.php';
            @$id      = $_GET['code'];
            $dmenu = mysqli_query($koneksi, "select * from tbl_bahan where id_bahan='$id'");
            $dbahan        = mysqli_fetch_array($dmenu);
            $id_bahan=$dbahan['id_bahan'] ;
            ?>
            <!-- Basic Examples -->
            <!-- #END# Basic Examples -->
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                    <div class="body">
                    <h2 class="card-inside-title">Edit Bahan</h2>
                    <div class="header">
                        <!-- Form input menu -->
                            
                            <form autocomplete="off" method="POST" class="forms-sample" >
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                        <label for="email_address">Nama Bahan</label>
                                            <input type="text" value="<?php echo $dbahan['nama_bahan']; ?>" name="nama" class="form-control" placeholder="Nama Bahan" required />
                                            <input type="hidden" name="id" value="<?php echo $dbahan['id_bahan']; ?>" class="form-control" placeholder="Nama Bahan" required />
                                        </div>
                                        <div class="form-line">
                                        <label for="email_address">Satuan</label>
                                        <select name="satuan" class="form-control show-tick">
                                            <option disabled><--Pilihan Satuan--> </option>
                                            <option value="Liter" >liter</option>
                                            <option value="Butir" >Butir</option>
                                            <option value="ml" >ml</option>
                                            <option value="kg" >kg</option>
                                        </select>
                                        </div>
                                        <button type="submit" name="simpan" class="btn btn-primary m-t-15 waves-effect">Simpan</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <?php
                            if(isset($_POST['simpan']))
                            {
                                include "../koneksi.php";
                                $nama=$_POST['nama'];
                                $satuan=$_POST['satuan'];
                                $id=$_POST['id'];
                                $query  = mysqli_query($koneksi, "select * from tbl_bahan where nama_bahan='$nama' ");
                                $cekbahan=mysqli_num_rows($query);
                                if($cekbahan==0)
                                {
                                    $queri="UPDATE tbl_bahan SET nama_bahan = '$nama', satuan = '$satuan' WHERE id_bahan='$id'" ;
                                    $sql=mysqli_query($koneksi, $queri);
                                    if($sql)
                                    {
                                        echo '<script>
                                        window.onload = function(){
                                        alert("Data Berhasil Dirubah");
                                        location.href = "../menu/data_bahan.php"
                                        }
                                        </script>';
                                    }
                                    else
                                    {
                                        echo '<script>
                                        window.onload = function(){
                                        alert("Data Gagal dirubah");
                                        location.href = "../menu/data_bahan.php"
                                        }
                                        </script>';
                                    }
                                }
                                else
                                {
                                    echo '<script>
                                        window.onload = function(){
                                        alert("Data Tidak Berubah");
                                        location.href = "../menu/data_bahan.php"
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