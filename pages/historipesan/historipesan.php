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
                                        <th>tanggal</th>
                                        <th>paket</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>No</th>
                                        <th>Nama Menu</th>
                                        <th>tanggal</th>
                                        <th>paket</th>
                                        <th>Harga</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <?php include "../koneksi.php";
					            $query  = mysqli_query($koneksi, "select * from tbl_historipesan order by id_histori ");
					            $nomor=1;
					            while($data=mysqli_fetch_array($query)){
					            ?>
                                
                                    <tr>
                                        <td><?php echo $nomor;?></td>
                                        <td><a onclick="return " href="../menu/data_resep.php?code=<?php echo $data['id_menu']?>" ><?php echo $data['nama_menu'];?></a></td>
                                        <td><?php echo $data['tanggal'];?></td>
                                        <td><?php echo $data['paket'];?></td>
                                        <td><?php echo $data['harga'];?></td>
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

    <?php include '../bawah.php';?>d