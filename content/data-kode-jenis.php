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


        <!-- /.box-header -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Kode dan Jenis</h3>
        </div>
        <div class="box-body">
            <input type="hidden" name="page"  value= "data-kode-jenis" class="form-control">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <button style="margin-bottom: 12px;" type="button" class="btn btn-success btn-add" data-toggle="modal" data-target="#addBarang"><i class="fa fa-plus"></i> Tambah Data Barang</button>
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Jenis Barang</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
<?php
//============================================Ini gunanya untuk membuka semua barang yang ada di database

  $sql = $config->query('select * from barang2');
  $i=0;
  while($row = $config->select($sql)){
  $i++;
?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $row['kode_barang'] ?></td>
                  <td><?php echo $row['jenis_barang'] ?></td>
                  <td>
                    <a href="#" data-toggle="modal" data-target="#editBarang<?php echo $row['id_kode']; ?>"><i class="btn btn-warning fa fa-edit"></i></a>
                    <a href="<?php echo $config->site_url().'process.php?act=delete_data_barang2&id='.$row['id_kode']; ?>"><i class="btn btn-danger fa fa-trash" onclick="return confirm('Menghapus data ini menyebabkan kehilangan data lain yang berhubungan, Apakah Anda yakin menghapusnya ?');"></i></a>
                  </td>
                </tr>
         <!--        <div id="editBarang<?php echo $row['id_kode']; ?>" class="modal modal-success fade" role="dialog">
                      <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Data Kode dan Jenis </h4>
                        </div>
                        <div class="modal-body">
                        <form id="form-data-barang" action="<?php echo $config->site_url(); ?>process.php?act=update_data_barang2" method="post" onsubmit="confirm('Mengedit akan menghilangkan data yang menggunakan data ini. Apakah Anda yakin mengubahnya ?');">
                          <div class="input-group">
                            <label class="form">Kode Barang:</label>
                            <input type="text" name="kode_barang" class="form-control" value="<?php echo $row['kode_barang']; ?>" required>
                          </div>
                          <div class="input-group">
                            <label class="form">Jenis Barang:</label>
                            <input type="text" name="jenis_barang" class="form-control" value="<?php echo $row['jenis_barang']; ?>" required>
                          </div>
                          <div class="input-group group-tongle">
                            <input type="hidden" name="id" value="<?php echo $row['id_kode']; ?>"></input>
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
      -->      </div>
<?php
  }
?>
            </tbody>
            </table>
          </div>
    </div>

</section>

                 <div id="addBarang" class="modal modal-success fade" role="dialog">
                      <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Tambah Data Barang</h4>
                        </div>
                        <div class="modal-body">
                        <form id="form-data-barang" action="<?php echo $config->site_url(); ?>process.php?act=add_data_barang2" method="post">

                          <div class="input-group">
                            <label class="form">Kode Barang:</label>
                            <input type="text" name="kode_barang" class="form-control" required>
                          </div>
                          <div class="input-group">
                            <label class="form">Jenis Barang:</label>
                            <input type="text" name="jenis_barang" class="form-control" required>
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