<?php /* Created by ELGA RIDLO SINATRIYA
         18-Oktober-2018
         email address elgaridlosinatriya@gmail.com
  */ ?>


<section class="content">
<?php
  if(!empty($_SESSION['msg'])){
    echo $_SESSION['msg'];
  }
?>

    <div class="box">
        <form >
        <div class="box-header">
            <h3 class="box-title">Data Barang</h3>
        </div>
        <div class="box-body">
                <input type="hidden" name="page"  value= "data-barang" class="form-control">
            <div>
                <label>Tipe Pencarian :</label>
                <select name="macam" class="form-control">
                    <option value="">--Pilih--</option>
                    <option value="nup">NUP</option>
                    <option value="tipe">Tipe Barang</option>
                    <option value="kode_jenis">Kode Barang</option>
                    <option value="jenis">Jenis Barang</option>
                    <option value="tahun">Tahun Barang</option>
                    <option value="kelompok">Kelompok</option>
                </select>
                <?php
                /*                $sql = $config->query('select nib from barang');
                                echo "<select name='nib'>";

                                while ($row = mysqli_fetch_array($sql)){
                                    echo "<option value='". $row['nib'] ."'>" .  $row['nib'] . "</option>";
                                }
                                echo "</select>";
                  */              ?>
            </div>
                <!-- <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>-->
            <div>

                <label class="form">Nama Pencarian:</label>
                <input type="text" name="valueToSearch" class="form-control" placeholder="Nama Barang">

            </div>
            <div class="input-group group-tongle">
                <input type="submit" style="margin-top: 10px;" class="btn btn-default form-control" value="cari">
            </div>
        </div>
        </form>
        </div>
        <!-- /.box-header -->
    <div class="box">
        <div class="box-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <button style="margin-bottom: 12px;" type="button" class="btn btn-success btn-add" data-toggle="modal" data-target="#addBarang"><i class="fa fa-plus"></i> Tambah Data Barang</button>
                    <tr>
                        <th>No</th>
                        <th>NUP</th>
                        <th>Tipe Barang</th>
                        <th>Kode Barang</th>
                        <th>Jenis Barang</th>
                        <th>Tahun Barang</th>
                        <th>Kelompok Barang</th>
                        <th>Ketersediaan</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
<?php
//============================================Ini gunanya untuk membuka semua barang yang ada di database

if(isset($_GET['valueToSearch'])) {
    $valueToSearch = $_GET['valueToSearch'];
    $macam = $_GET['macam'];
    if ($_GET['valueToSearch'] == "" || $_GET['valueToSearch']== null){
        $sql = $config->query('select * from barang');
    }else {
        $sql = $config->query('select * FROM barang where ' . $macam . ' LIKE "%' . $valueToSearch . '%"');
        }
    }
else{
        $sql = $config->query('select * from barang');
    }
  $i=0;
  while($row = $config->select($sql)){
  $i++;
?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $row['nup'] ?></td>
                  <td><?php echo $row['tipe'] ?></td>
                  <td><?php echo $row['kode_jenis'] ?></td>
                  <td><?php echo $row['jenis'] ?></td>
                  <td><?php echo $row['tahun'] ?></td>
                  <td><?php echo $row['kelompok'] ?></td>
                  <td><?php echo $row['ketersediaan'] ?></td>
                  <td>

                    <a href="#" data-toggle="modal" data-target="#editBarang<?php echo $row['id_barang']; ?>"><i class="btn btn-warning fa fa-edit"></i></a>
                    <a href="<?php echo $config->site_url().'process.php?act=delete_data_barang&id='.$row['id_barang']; ?>"><i class="btn btn-danger fa fa-trash" onclick="return confirm('Yakin delete data ini?');"></i></a>
                    </td>
                </tr>
                 <div id="editBarang<?php echo $row['id_barang']; ?>" class="modal modal-success fade" role="dialog">
                      <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Data Barang </h4>
                        </div>
                        <div class="modal-body">
                        <form id="form-data-barang" action="<?php echo $config->site_url(); ?>process.php?act=update_data_barang" method="post" onsubmit="confirm('yakin ingin edit data?');">
                          <div class="input-group">
                            <label class="form">NUP:</label>
                            <input type="text" name="nup" class="form-control" value="<?php echo $row['nup']; ?>" required>
                          </div>
                          <div class="input-group">
                            <label class="form">Tipe Barang:</label>
                            <input type="text" name="tipe" class="form-control" value="<?php echo $row['tipe']; ?>" required>
                          </div>
                          <div class="input-group">
                            <label class="form">Kode Barang:</label>
                            <input list="kode" name="kode_jenis" class="form-control" required>
                                <?php
                                $sql2 = $config->query('select * from barang2');
                                echo "<datalist id='kode'> ";

                                while ($row2 = mysqli_fetch_array($sql2)){
                                    echo "<option value='". $row2['kode_barang'] ."'>" .  $row2['kode_barang'] . "(" .  $row2['jenis_barang'] .")</option>";
                                }
                                echo "</datalist>";
                                ?>
                          </div>
                            <div class="input-group">
                                <label class="form">Jenis Barang:</label>
                                <input list="jenis" name="jenis" class="form-control" required>
                                <?php
                                $sql2 = $config->query('select * from barang2');
                                echo "<datalist id='jenis'> ";

                                while ($row2 = mysqli_fetch_array($sql2)){
                                    echo "<option value='". $row2['jenis_barang'] ."'>" .  $row2['jenis_barang'] . "</option>";
                                }
                                echo "</datalist>";
                                ?>
                            </div>
                            <!--
                          <div class="form-group">
                            <label>Jenis Barang:</label>
                            <select name="jenis" class="form-control">
                              <option value="Alat Perekam Suara"<?php echo $row['jenis'] == 'Alat Perekam Suara' ? 'selected' : '' ?>>Alat Perekam Suara</option>
                              <option value="Camera Digital" 	 <?php echo $row['jenis'] == 'Camera Digital' 	? 'selected' : '' ?>>Camera Digital</option>
                              <option value="External"       	 <?php echo $row['jenis'] == 'External' 	? 'selected' : '' ?>>External</option>
                              <option value="Laser Pointer" 	 <?php echo $row['jenis'] == 'Laser Pointer' 	? 'selected' : '' ?>>Laser Pointer</option>
                              <option value="Infocus"       	 <?php echo $row['jenis'] == 'Infocus' 	? 'selected' : '' ?>>Infocus</option>
                              <option value="Notebook"       	 <?php echo $row['jenis'] == 'Notebook' ? 'selected' : '' ?>>Notebook</option>
                              <option value="P.C Unit"       	 <?php echo $row['jenis'] == 'P.C Unit' ? 'selected' : '' ?>>P.C Unit</option>
                              <option value="Scanner" 	         <?php echo $row['jenis'] == 'Scanner' 	? 'selected' : '' ?>>Scanner</option>
                              <option value="Ultra Mobile P.C" 	 <?php echo $row['jenis'] == 'Ultra Mobile P.C' 	? 'selected' : '' ?>>Ultra Mobile P.C</option>
                            </select>
                            </div> -->
						  <div class="input-group">
                            <label class="form">Tahun Barang:</label>
                            <input type="text" name="tahun" class="form-control"value="<?php echo $row['tahun']; ?>" required>
                          </div>
                          <div class="form-group">
                            <label>Kelompok Barang:</label>
                            <select name="kelompok" class="form-control">
                            <option value="Khusus" 	<?php echo $row['kelompok'] == 'Khusus' ? 'selected' : '' ?>>Khusus</option>
                            <option value="Umum" 	<?php echo $row['kelompok'] == 'Umum' 	? 'selected' : '' ?>>Umum</option>
                            </select>
                          </div>
                          <div class="input-group">
                            <label class="form">Ketersediaan:</label>
                            <input type="number" name="ketersediaan" class="form-control" min="0" max="1" value="<?php echo $row['ketersediaan']; ?>" required>
                          </div>
                          <div class="input-group group-tongle">
                            <input type="hidden" name="id" value="<?php echo $row['id_barang']; ?>"></input>
                            <input type="submit" style="margin-top: 10px;" class="btn btn-default form-control" value="Edit">
                          </div>
                        </form>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      </div>
                </div>
            </div>


<?php
  }
?>

            </tbody> </table>
          </div>
    </div>
         <!-- /.box-body -->

          <!-- /.box -->

</section>

                 <div id="addBarang" class="modal modal-success fade" role="dialog">
                      <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Tambah Data Barang</h4>
                        </div>
                        <div class="modal-body">
                        <form id="form-data-barang" action="<?php echo $config->site_url(); ?>process.php?act=add_data_barang" method="post">

                          <div class="input-group">
                            <label class="form">NUP:</label>
                            <input type="text" name="nup" class="form-control" required>
                          </div>
                          <div class="input-group">
                            <label class="form">Tipe Barang:</label>
                            <input type="text" name="tipe" class="form-control" required>
                          </div>
                          <!--<div class="input-group">
                            <label class="form">Kode Barang:</label>
                            <input type="text" name="kode_jenis" class="form-control" required>
                          </div>
                       -->  <div class="input-group">
                                <label class="form">Kode Barang:</label>
                                <input list="kode" name="kode_jenis" class="form-control" required>
                                <?php
                                $sql2 = $config->query('select * from barang2');
                                echo "<datalist id='kode'> ";

                                while ($row2 = mysqli_fetch_array($sql2)){
                                    echo "<option value='". $row2['kode_barang'] ."'>" .  $row2['kode_barang'] . "</option>";
                                }
                                echo "</datalist>";
                                ?>
                            </div>
                            <div class="input-group">
                                <label class="form">Jenis Barang:</label>
                                <input list="jenis" name="jenis" class="form-control" required>
                                <?php
                                $sql2 = $config->query('select * from barang2');
                                echo "<datalist id='jenis'> ";

                                while ($row2 = mysqli_fetch_array($sql2)){
                                    echo "<option value='". $row2['jenis_barang'] ."'>" .  $row2['jenis_barang'] . "</option>";
                                }
                                echo "</datalist>";
                                ?>
                            </div>

                        <!--  <div class="form-group">
                            <label>Jenis Barang:</label>
                            <select name="jenis" class="form-control">
                            <option value=""></option>
                            <option value="Alat Perekam Suara">Alat Perekam Suara </option>
                            <option value="Camera Digital">Camera Digital</option>
                            <option value="External">External</option>
                            <option value="Laser Pointer">Laser Pointer</option>
                            <option value="Infocus">Infocus</option>
                            <option value="Notebook">Notebook</option>
                            <option value="P.C Unit">P.C Unit</option>
                            <option value="Scanner">Scanner</option>
                            <option value="Ultra Mobile P.C">Ultra Mobile P.C</option>
                            </select>
                          </div> -->
						  <div class="input-group">
                            <label class="form">Tahun Barang:</label>
                            <input type="text" name="tahun" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label>Kelompok Barang:</label>
                            <select name="kelompok" class="form-control">
                            <option value=""></option>
                            <option value="Khusus">Khusus</option>
                            <option value="Umum">Umum</option>
                            </select>
                          </div>
                          <div class="input-group">
                             <label class="form">Jumlah Barang:</label>
                             <input type="number" name="ketersediaan" min="0" class="form-control" required>
                          </div>
                          <div class="input-group group-tongle">
                            <input type="submit" style="margin-top: 10px;" class="btn btn-default form-control" value="Tambahkan">
                          </div>
                        </form>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      </div>
                </div>