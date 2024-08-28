<?php  
include '../atas.php' ?>
    <section class="content">
        <div class="container-fluid">
        <?php
		include '../koneksi.php';
        $id= $_GET['code'];
		$dmenu = mysqli_query($koneksi, "select * from tbl_bahan where id_bahan='$id'");
		$namamenu        = mysqli_fetch_array($dmenu);
        $id_menu=$namamenu['id_bahan'] ;
		?>
            <!-- Basic Examples -->
            <!-- #END# Basic Examples -->
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Bahan <?php echo $namamenu['nama_bahan']; ?><div> <button type="submit" name="simpan" class="btn btn-primary m-t-15 waves-effect">Ramal</button></div>
                            </h2>
                        </div>
                        <div class="body">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun</th>
                                        <th>Bulan</th>
                                        <th>Harga</th>
                                        <th>Level</th>
                                        <th>Trend</th>
                                        <th>Seasonal</th>
                                        <th>Harga Ramal</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun</th>
                                        <th>Bulan</th>
                                        <th>Harga</th>
                                        <th>Level</th>
                                        <th>Trend</th>
                                        <th>Seasonal</th>
                                        <th>Harga Ramal</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <?php include "../koneksi.php";
                                $nomor=1;
								$query  = mysqli_query($koneksi, "select * from tbl_pemulusanakhir where id_bahan='$id'");
								while($data=mysqli_fetch_array($query)){
                                    $id_bahan=$data['id_bahan'];
								?>
                                <tr>
                                    <td><?php echo $nomor;?></td>
                                    <td><?php echo $data['tahun'];?></td>
					                <td><?php echo $data['bulan'];?></td>
                                    <td><?php echo $data['harga_asli'];?></td>
                                    <td><?php echo $data['lefel'];?></td>
                                    <td><?php echo $data['trend'];?></td>
                                    <td><?php echo $data['seasonal'];?></td>
                                    <td><?php echo $data['hasilramal'];?></td>
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