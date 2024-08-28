<?php include '../atas.php' ?>
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
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Menu</th>
                                        <th>Satuan</th>
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
                                    <td>
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><a onclick="return " href="../peramalan/detailbahan.php?code=<?php echo $data['id_bahan']?>">  <i class="material-icons">visibility</i> <span class="icon-name"></span> </a></div>
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