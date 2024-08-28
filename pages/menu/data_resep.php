<?php  session_start(); 
include '../atas.php' ?>
    <section class="content">
        <div class="container-fluid">
        <?php
		include '../koneksi.php';
        $id;
        @$_SESSION['id']; 
        if (!isset($_SESSION['id']))
        {
            $_SESSION['id']= $_GET['code'];
            @$id=$_SESSION['id'];
        }
        else
        {
            @$id=$_SESSION['id'];
        }
		$dmenu = mysqli_query($koneksi, "select * from tbl_menu where id_menu='$id'");
		$namamenu        = mysqli_fetch_array($dmenu);
        $id_menu=$namamenu['id_menu'] ;
		?>
            <!-- Basic Examples -->
            <!-- #END# Basic Examples -->
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                    <div class="body">
                    <h2 class="card-inside-title">Input Resep</h2>
                    <div class="header">
                        <!-- Form input menu -->
                            <form autocomplete="off" class="forms-sample" method="POST">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                        <label for="email_address">Nama Menu</label>
                                        <select name="bahan" class="form-control show-tick">
                                        <option disabled><--Pilihan Bahan--> </option>
                                            <?php include "../koneksi.php";
					                        $query  = mysqli_query($koneksi, "select * from tbl_bahan order by id_bahan ");
					                        $nomor=1;
					                        while($data=mysqli_fetch_array($query)){
                                                $id_bahan=$data['id_bahan'];
                                                $quericek  = mysqli_query($koneksi, "select * from tbl_resep where id_bahan='$id_bahan' && id_menu='$id_menu'");
                                                $cekbahan= mysqli_num_rows($quericek);
                                               if($cekbahan==0){
					                        ?>
                                            <option value="<?php echo $data['id_bahan']; ?>" ><?php echo $data['nama_bahan'];} ?> </option>
                                            <?php } ?>
                                        </select>
                                        <input type="hidden" name="id" value="<?php echo $id_menu; ?>" class="form-control" required />
                                        </div><br>
                                        <div class="form-line">
                                        <label for="email_address">Takaran</label>
                                            <input type="text" name="takar" class="form-control" placeholder="Nama Bahan" required />
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
                                $id_bahan=$_POST['bahan'];
                                $id_menu=$_POST['id'];
                                $takar=$_POST['takar'];
                                $sqll=mysqli_query($koneksi, "INSERT INTO tbl_resep values ('','$id_menu','$id_bahan','$takar');");
                                if($sqll)
                                {
                                    echo '<script>
                                    window.onload = function(){
                                    alert("Data Berhasil disimpan");
                                    location.href = "../menu/data_resep.php"
                                    }
                                    </script>';
                                }
                                else
                                {
                                    echo '<script>
                                    window.onload = function(){
                                    alert("Data Gagal disimpan");
                                    location.href = "../menu/data_resep.php"
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
                                Data Resep Menu <?php echo $namamenu['nama_menu']; ?>
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
                                        <th>Nama Bahan</th>
                                        <th>Satuan</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                <?php include "../koneksi.php";
								$query  = mysqli_query($koneksi, "select * from tbl_resep where id_menu='$id'");
								while($data=mysqli_fetch_array($query)){
                                    $id_bahan=$data['id_bahan'];
                                    $queribahan  = mysqli_query($koneksi, "select * from tbl_bahan where id_bahan='$id_bahan' ");
                                    $bahan=mysqli_fetch_array($queribahan);
                                    $queriakhir  = mysqli_query($koneksi, "select * from tbl_pemulusanakhir where id_bahan='$id_bahan' ");
                                    $bahanakhir=mysqli_fetch_array($queriakhir);
								?>
                                <tbody>
                                    <tr>
                                    <td><?php echo $nomor;?></td>
					                <td><?php echo $bahan['nama_bahan'];?></td>
                                    <td><?php echo $data['takaran'].$bahan['satuan'];?></td>
                                    <td><?php echo number_format($bahanakhir['hasilramal']*$data['takaran'], 0, '', '.');?></td>
                                    <td><div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><a onclick="return " href="../menu/hapusresep.php?code=<?php echo $data['id_resep']?>"> <i class="material-icons">delete_forever</i></a></div></td>
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