<?php include '../atas.php' ?>
    <section class="content">
        <div class="container-fluid">
            <?php
            include '../koneksi.php';
            @$id      = $_GET['code'];
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
                    <h2 class="card-inside-title">Edit Menu</h2>
                    <div class="header">
                        <!-- Form input menu -->
                            
                            <form autocomplete="off" class="forms-sample" method="POST">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                        <label for="email_address">Nama Menu</label>
                                            <input type="text" name="nama" value="<?php echo $namamenu['nama_menu']; ?>" class="form-control" placeholder="Nama Menu" required />
                                            <input type="hidden" name="id" value="<?php echo $namamenu['id_menu']; ?>" class="form-control" required />
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
                                $id=$_POST['id'];
                                $queri  = mysqli_query($koneksi, "select * from tbl_menu where nama_menu='$nama' ");
                                $ceknama= mysqli_num_rows($queri);
                                if($ceknama==0)
                                {
                                    $query="UPDATE tbl_menu SET nama_menu = '$nama' WHERE id_menu='$id'" ;
                                    $sql=mysqli_query($koneksi, $query);
                                    if($sql)
                                    {
                                        echo '<script>
                                        window.onload = function(){
                                        alert("Nama Menu berhasil dirubah");
                                        location.href = "../menu/data_menu.php"
                                        }
                                        </script>';
                                    }
                                    else
                                    {
                                        echo '<script>
                                        window.onload = function(){
                                        alert("Nama Menu Gagal dirubah");
                                        location.href = "../menu/data_menu.php"
                                        }
                                        </script>';
                                    }
                                }
                                else
                                {
                                    echo '<script>
                                    window.onload = function(){
                                    alert("Nama Menu Tidak Berubah");
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
        </div>
    </section>
    <?php include '../bawah.php';?>