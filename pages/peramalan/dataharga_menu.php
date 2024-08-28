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
                                        <th>Harga</th>
                                        <th>Update Harga</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Menu</th>
                                        <th>Harga</th>
                                        <th>Update Harga</th>
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
                                        <td><?php echo $data['harga'];?></td>
                                        <td>
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

    <?php include '../bawah.php';?>d