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
                    <h2 class="card-inside-title">Input Bahan</h2>
                    <div class="header">
                        <!-- Form input menu -->
                            
                            <form autocomplete="off" method="POST" class="forms-sample" >
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                        <label for="email_address">Nama Bahan</label>
                                            <input type="text" name="nama" class="form-control" placeholder="Nama Bahan" required />
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
                                $query  = mysqli_query($koneksi, "select * from tbl_bahan where nama_bahan='$nama' ");
                                $cekbahan=mysqli_num_rows($query);
                                if($cekbahan==0)
                                {
                                    $sqll=mysqli_query($koneksi, "INSERT INTO tbl_bahan values ('','$nama','$satuan','');");
                                    if($sqll)
                                    {
                                        echo '<script>
                                        window.onload = function(){
                                        alert("Data berhasil disimpan");
                                        location.href = "../menu/data_bahan.php"
                                        }
                                        </script>';
                                    }
                                    else
                                    {
                                        echo '<script>
                                        window.onload = function(){
                                        alert("Data Gagal disimpan");
                                        location.href = "../menu/data_bahan.php"
                                        }
                                        </script>';
                                    }
                                }
                                else
                                {
                                    echo '<script>
                                        window.onload = function(){
                                        alert("Bahan Sudah Ada");
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
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Bahan
                            </h2>
                        </div>
                        <div class="body">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Bahan</th>
                                        <th>Satuan</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Menu</th>
                                        <th>Satuan</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <?php include "../koneksi.php";
					            $query  = mysqli_query($koneksi, "select * from tbl_bahan order by id_bahan ");
					            $nomor=1;
					            while($data=mysqli_fetch_array($query)){
					            ?>
                                <tbody>
                                    <tr>
                                    <td><?php echo $nomor;?></td>
					                <td><?php echo $data['nama_bahan'];?></td>
                                    <td><?php echo $data['satuan'];?></td>
                                    <td><?php echo $data['harga'];?></td>
                                    <td><div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><a onclick="return " href="../menu/editbahan.php?code=<?php echo $data['id_bahan']?>"> <i class="material-icons">create</i> <span class="icon-name"></span> </a></div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><a onclick="return " href="../menu/hapusbahan.php?code=<?php echo $data['id_bahan']?>"> <i class="material-icons">delete_forever</i></a></div>
                                    </td>
                                    </tr>
                                </tbody>
                                <?php
					            $nomor++;
					            } 
					            ?>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

    <?php include '../bawah.php';?>