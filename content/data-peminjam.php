<section class="content">
<?php 
  if(!empty($_SESSION['msg'])){
    echo $_SESSION['msg'];
  }
?>


    <?php
    $tgl=date('Y-m-d');
    ?>
          <div class="box">
            <form>
            <input type="hidden" name="page"  value= "data-peminjam" class="form-control">
            <div class="box-header">
              <h3 class="box-title">Transaksi Peminjaman Barang </h3>
            </div>
            <div class="box-body">
                <div>
                <label class="form">Nomor Induk Pegawai:</label>
                <input list="nip" name="valueToSearch" class="form-control" placeholder="Masukkan Nomor Induk Pegawai" required>
                <?php
                   $sql3 = $config->query('select nip from datapegawai');
                   echo "<datalist id='nip'> ";
                   while ($row3 = mysqli_fetch_array($sql3)){
                   echo "<option value='". $row3['nip'] ."'>" .  $row3['nip'] . "</option>";
                   }
                   echo "</datalist>";
                   ?>
                <label class="form">Kode Barang:</label>
                <input list="kode" name="valueToSearch3" class="form-control" placeholder="Masukkan Kode Barang" required>
                <?php
                   $sql4 = $config->query('select kode_barang, jenis_barang from barang2');
                   echo "<datalist id='kode'> ";
                   while ($row4 = mysqli_fetch_array($sql4)){
                   echo "<option value='". $row4['kode_barang'] ."'>" .  $row4['kode_barang'] . "(".$row4['jenis_barang'] .")</option>";
                   }
                   echo "</datalist>";
                   ?>
                    <label class="form">NUP:</label>
                    <input type="text" name="valueToSearch2" class="form-control" placeholder="Masukkan Nomor NUP" required>
                <input type="submit" style="margin-top: 10px;" class="btn btn-default form-control" value="Cari">
                </div>
              </form>
            <?php
            //============================================Ini gunanya untuk membuka semua barang yang ada di database
            $nama="";
            $unitkerja ="";
            $jabatan="";
            $tipe="";
            $tersedia="";

            if(isset($_GET['valueToSearch'])) {
                  $valueToSearch = $_GET['valueToSearch'];
                  $valueToSearch2= $_GET['valueToSearch2'];
                  $valueToSearch3= $_GET['valueToSearch3'];
                  $sql = $config->query('select * FROM datapegawai where nip = "' . $valueToSearch . '"');
                  $sql2 = $config->query('select * FROM barang where nup = "' . $valueToSearch2 . '"and kode_jenis ="'.$valueToSearch3.'"');
                  $row = $config->select($sql);
                  $row2 = $config->select($sql2);

                  $nama=$row['nama'];
                  $unitkerja =$row['unit_kerja'];
                  $jabatan =$row['jabatan'];
                  $tipe = $row2['tipe'];
                  $kode = $row2['kode_jenis'];
                  $jenis= $row2 ['jenis'];
                  (int)$tersedia = $row2 ['ketersediaan'];
            }
            else{
                  $nama="";
                  $unitkerja ="";
                  $jabatan="";
                  $tipe="";
                  $jenis="";
                  $jumlah="";
            }
            if((int)$tersedia==0 && isset($_GET['valueToSearch'])){
                echo '<div class="alert alert-error">Stock habis atau barang yang dicari tidak ditemukan. 
                        <b> Tolong periksa data yang diisi.</b> </div>';
                echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-peminjam</script>';

            }
            elseif ((int)$tersedia>0) {


                ?>
                <form id="form-data-barang" action="<?php echo $config->site_url(); ?>process.php?act=add_data_pinjaman"
                      method="post">
                    <input type="hidden" value="<?php echo $valueToSearch ?>" name="nip">
                    <input type="hidden" value="<?php echo $valueToSearch2 ?>" name="nup">
                    <input type="hidden" value="<?php echo $nama ?>" name="nama">
                    <input type="hidden" value="<?php echo $kode ?>" name="kode_jenis">
                    <input type="hidden" value="<?php echo $unitkerja ?>" name="unit_kerja">
                    <input type="hidden" value="<?php echo $jabatan ?>" name="jabatan">
                    <input type="hidden" value="<?php echo $tipe ?>" name="tipe_barang">
                    <input type="hidden" value="<?php echo $jenis ?>" name="jenis_barang">

                    <?php

                    ?>

                    <div>
                        <label class="form">Nama :</label>
                        <input type="text" value="<?php echo $nama ?>" name="nama" class="form-control"
                               placeholder="<?php echo $nama ?>" disabled>
                    </div>
                    <div>
                        <label class="form">Unit Kerja :</label>
                        <input type="text" value="<?php echo $unitkerja ?>" name="unit_kerja" class="form-control"
                               placeholder="<?php echo $unitkerja ?>" disabled>
                    </div>
                    <div>
                        <label class="form">Jabatan:</label>
                        <input type="text" value="<?php echo $jabatan ?>" name="jabatan" class="form-control"
                               placeholder="<?php echo $jabatan ?>" disabled>
                    </div>
                    <div>
                        <label class="form">Tipe Barang :</label>
                        <input type="text" value="<?php echo $tipe ?>" name="tipe_barang" class="form-control"
                               placeholder="<?php echo $tipe ?>" disabled>
                    </div>
                    <div>
                        <label class="form">Jenis Barang:</label>
                        <input type="text" value="<?php echo $jenis ?>" name="jenis_barang" class="form-control"
                               placeholder="<?php echo $jenis ?>" disabled>
                    </div>
                    <div>
                        <label class="form">Peruntukan:</label>
                        <input type="text" name="peruntukan" class="form-control" required>
                    </div>
                    <div class="input-group">
                        <label class="form"><i class="fa fa-calendar"></i>Tanggal Peminjaman :</label>
                        <input type="date" value="<?php echo $tgl ?>" name="tanggal_pinjam" class="form-control"
                               required>
                    </div>
                    <div class="input-group">
                        <label class="form"><i class="fa fa-calendar"></i>Tanggal Pengembalian:</label>
                        <input type="date" name="tanggal_kembali" class="form-control" required>
                    </div>
                    <div class="input-group">
                        <label class="form">Jumlah Barang:</label>
                        <input type="number" class="form-control" name="jumlah" min="1" max="1">
                    </div>


                    <div class="input-group group-tongle">
                        <tr>
                            <input type="submit" style="margin-top: 10px;" class="btn btn-default form-control"
                                   value="PROSES">
                        </tr>
                        <tr>
                            <input type="submit" style="margin-top: 10px;" class="btn btn-default form-control"
                                   onclick="http://localhost/BPK/index.php?page=data-peminjam" value="BATAL">
                        </tr>
                    </div>
                    <div class="input-group group-tongle">

                    </div>
                </form>

                <?php
            }
              ?>
          </div>
            <!-- /.box-header -->


            <!-- /.box-body -->

          </div>
          <!-- /.box -->
</section>