<?php session_start(); include '../atas.php'; 
unset($_SESSION['id']);
?>
    <section class="content">
        <div class="container-fluid">
            
            <!-- Basic Examples -->
            <!-- #END# Basic Examples -->
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                    <div class="body">
                    <h2 class="card-inside-title">Input Menu</h2>
                    <div class="header">
                        <!-- Form input menu -->                            
                            <form autocomplete="off" class="forms-sample" method="POST">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                        <label for="email_address">Nama Menu</label>
                                            <input type="text" name="nama" class="form-control" placeholder="Nama Menu" required />
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
                                $query  = mysqli_query($koneksi, "select * from tbl_menu where nama_menu='$nama' ");
                                $ceknama= mysqli_num_rows($query);
                                if($ceknama==0)
                                {
                                    $sqll=mysqli_query($koneksi, "INSERT INTO tbl_menu values ('','$nama','');");
                                    if($sqll)
                                    {
                                        echo '<script>
                                        window.onload = function(){
                                        alert("Data berhasil disimpan");
                                        location.href = "../menu/data_menu.php"
                                        }
                                        </script>';
                                    }
                                    else
                                    {
                                        echo '<script>
                                        window.onload = function(){
                                        alert("Data Gagal disimpan");
                                        location.href = "../menu/data_menu.php"
                                        }
                                        </script>';
                                    }
                                }
                                else
                                {
                                    echo '<script>
                                    window.onload = function(){
                                    alert("Menu Sudah ada");
                                    location.href = "../menu/data_menu.php"
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
                                Data Menu
                            </h2>
                        </div>
                        <div class="body">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Menu</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Menu</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <?php include "../koneksi.php";
					            $query  = mysqli_query($koneksi, "select * from tbl_menu order by id_menu ");
					            $nomor=1;
					            while($data=mysqli_fetch_array($query)){
					            ?>
                                
                                    <tr>
                                        <td><?php echo $nomor;?></td>
                                        <td><a onclick="return " href="../menu/data_resep.php?code=<?php echo $data['id_menu']?>" ><?php echo $data['nama_menu'];?></a></td>
                                        <td><?php echo number_format($data['harga'], 0, '', '.');?></td>
                                        <td>
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"> <a onclick="return " href="../menu/editmenu.php?code=<?php echo $data['id_menu']?>"> <i class="material-icons">create</i> <span class="icon-name"></span> </a></div>
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><a onclick="return " href="../menu/hapusmenu.php?code=<?php echo $data['id_menu']?>"> <i class="material-icons">delete_forever</i></a></div>
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><a onclick="return " href="updateharga.php?code=<?php echo $data['id_menu']?>"> <i class="material-icons">update</i></a></div>
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

    <?php include '../bawah.php';?>