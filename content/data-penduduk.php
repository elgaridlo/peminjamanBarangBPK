<section class="content">
<?php 
  if(!empty($_SESSION['msg'])){
    echo $_SESSION['msg'];
  }
?>
<section class="content">
<?php 
  if(!empty($msg)){
    echo $msg;
    echo '<script>
      setTimeout(function(){ window.location.href="'.$config->site_url().'index.php?page=data-peduduk"; }, 3000);
    </script>';
  }
?>
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Penduduk | Untuk Menambahkan Data Penduduk Silahkan Pilih Menu Data Dusun</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                
                <tr>
                <th>No</th>
                 <th>No KK</th>
                    <th>Nik</th>
                    <th>Nama Kepala Keluarga</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Agama</th>
                    <th>Hubungan Dalam Keluarga</th>
                    <th>Golongan Darah</th>
                    <th>Pendidikan</th>
                    <th>Alamat</th>
                    <th>Pekerjaan</th>
                    <th>Penghasilan</th>
                    <th>Status Perkawinan</th>
                    <th>Status</th>
                    <th>Pilihan</th>
                </tr>
                 </thead>
                <tbody> 
<?php 
   $sql = $config->query('select * from biodata b inner join utama u on b.id_kk=u.id_kk');
   $i=0;
  while($row = $config->select($sql)){
    $i++;
?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td> <?php echo $row['no_kk']; ?></td>
                    <td> <?php echo $row['nik']; ?></td>
                    <td> <?php echo $row['nama_kpl']; ?></td>
                    <td> <?php echo $row['nama']; ?></td>
                    <td> <?php echo $row['jenis_kelamin']; ?></td>
                    <td> <?php echo $row['tempat_lahir']; ?></td>
                    <td> <?php echo $row['tanggal_lahir']; ?></td>
                    <td> <?php echo $row['agama']; ?></td>
                    <td> <?php echo $row['hubungan']; ?></td>
                    <td> <?php echo $row['golongan_darah']; ?></td>
                    <td> <?php echo $row['pendidikan']; ?></td>
                    <td> <?php echo $row['alamat_penduduk']; ?></td>
                    <td> <?php echo $row['pekerjaan']; ?></td>
                    <td> <?php echo $row['penghasilan']; ?></td>
                    <td> <?php echo $row['status_perkawinan']; ?></td>
                    <td> <?php echo $row['status']; ?></td>
                    <td>
                    <a href="#" data-toggle="modal" data-target="#editPenduduk<?php echo $row['id_biodata']; ?>"><i class="btn btn-warning fa fa-pencil"></i></a>
                    <a href="<?php echo $config->site_url().'process.php?act=delete_data_penduduk1&id='.$row['id_biodata']; ?>"><i class="btn btn-danger fa fa-trash" onclick="return confirm('Yakin delete data ini?');"></i></a>
                  </td>
                    </td>
                  </tr> 
                <div id="editPenduduk<?php echo $row['id_biodata']; ?>" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Data Penduduk</h4>
                        </div>
                        <div class="modal-body">
                        <form id="form-data-penduduk" action="<?php echo $config->site_url(); ?>process.php?act=update_data_penduduk1" method="post">
                        
                          <div class="input-group">
                            <label class="form">Nik:</label>
                            <input type="text" name="nik" class="form-control" value="<?php echo $row['nik']; ?>" required>
                          </div>
                          <div class="input-group">
                            <label class="form">Nama:</label>
                            <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>" required>
                          </div>
                          <div class="input-group">
                          <label class="form">Jenis Kelamin:</label>
                            <div class="radio">
                            <label><input type="radio" name="jenis_kelamin" value="Laki-Laki" <?php echo $row['jenis_kelamin'] == 'Laki-Laki' ? 'checked' : '' ?>>Laki-Laki</label>
                            </div>
                            <div class="radio">
                            <label><input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo $row['jenis_kelamin'] == 'Perempuan' ? 'checked' : '' ?>>Perempuan</label>
                            </div>
                          </div>
                          <div class="input-group">
                            <label class="form">Tempat Lahir:</label>
                            <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $row['tempat_lahir']; ?>" required>
                          </div>
                          <div class="input-group">
                            <label class="form"><i class="fa fa-calendar"></i>Tanggal Lahir:</label>
                            <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $row['tanggal_lahir']; ?>" required>
                          </div>
                          <div class="form-group">
                            <label>Agama:</label>
                            <select name="agama" class="form-control">
                            <option value="Islam" <?php echo $row['agama'] == 'Islam' ? 'selected' : '' ?>>Islam</option>
                            <option value="Katolik"<?php echo $row['agama'] == 'Katolik' ? 'selected' : '' ?>>Katolik</option>
                            <option value="Protestan"<?php echo $row['agama'] == 'Protestan' ? 'selected' : '' ?>>Protestan</option>
                            <option value="Hindu"<?php echo $row['agama'] == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                            <option value="Budha"<?php echo $row['agama'] == 'Budha' ? 'selected' : '' ?>>Budha</option>
                            </select>
                          </div>
                          <div class="input-group">
                            <label>Hubungan Dalam Keluarga:</label>
                            <select name="hubungan" class="form-control">
                            <option value="Kepala Rumah Tangga" <?php echo $row['hubungan'] == 'Kepala Rumah Tangga' ? 'selected' : '' ?>>Kepala Rumah Tangga</option>
                            <option value="Istri" <?php echo $row['hubungan'] == 'Istri' ? 'selected' : '' ?>>Istri</option>
                            <option value="Anak" <?php echo $row['hubungan'] == 'Anak' ? 'selected' : '' ?>>Anak</option>
                            <option value="Saudara" <?php echo $row['hubungan'] == 'Saudara' ? 'selected' : '' ?>>Saudara</option>
                            </select>
                          </div>  
                          <div class="form-group">
                            <label>Golongan Darah:</label>
                            <select name="golongan_darah" class="form-control">
                            <option value="A" <?php echo $row['golongan_darah'] == 'A' ? 'selected' : '' ?>>A</option>
                            <option value="B" <?php echo $row['golongan_darah'] == 'B' ? 'selected' : '' ?>>B</option>
                            <option value="O" <?php echo $row['golongan_darah'] == 'O' ? 'selected' : '' ?>>O</option>
                            <option value="AB" <?php echo $row['golongan_darah'] == 'AB' ? 'selected' : '' ?>>AB</option>
                            </select>
                          </div>    
                          <div class="input-group">
                            <label>Pendidikan:</label>
                            <select name="pendidikan" class="form-control">
                            <option value="SD" <?php echo $row['pendidikan'] == 'SD' ? 'selected' : '' ?>>SD</option>
                            <option value="SMP" <?php echo $row['pendidikan'] == 'SMP' ? 'selected' : '' ?>>SMP</option>
                            <option value="SMA" <?php echo $row['pendidikan'] == 'SMA' ? 'selected' : '' ?>>SMA</option>
                            <option value="D1" <?php echo $row['pendidikan'] == 'D1' ? 'selected' : '' ?>>D1</option>
                            <option value="D3" <?php echo $row['pendidikan'] == 'D3' ? 'selected' : '' ?>>D3</option>
                            <option value="S1" <?php echo $row['pendidikan'] == 'S1' ? 'selected' : '' ?>>S1</option>
                            <option value="S2" <?php echo $row['pendidikan'] == 'S2' ? 'selected' : '' ?>>S2</option>
                            <option value="S3" <?php echo $row['pendidikan'] == 'S3' ? 'selected' : '' ?>>S3</option>
                            </select>
                          </div>  
                          <div class="input-group">
                            <label class="form">Alamat:</label>
                            <input type="text" name="alamat_penduduk" class="form-control" value="<?php echo $row['alamat_penduduk']; ?>" required>
                          </div>
                          <div class="form-group">
                            <label>Pekerjaan:</label>
                            <select name="pekerjaan" class="form-control">
                            <option value="Pegawai Negeri" <?php echo $row['pekerjaan'] == 'Pegawai Negeri' ? 'selected' : '' ?>>Pegawai Negeri</option>
                            <option value="Swasta" <?php echo $row['pekerjaan'] == 'Swasta' ? 'selected' : '' ?>>Swasta</option>
                            <option value="Ibu Rumah Tangga" <?php echo $row['pekerjaan'] == 'Ibu Rumah Tangga' ? 'selected' : '' ?>>Ibu Rumah Tangga</option>
                            <option value="Angkatan" <?php echo $row['pekerjaan'] == 'Angkatan' ? 'selected' : '' ?>>Angkatan</option>
                            <option value="Pelajar" <?php echo $row['pekerjaan'] == 'Pelajar' ? 'selected' : '' ?>>Pelajar</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Penghasilan:</label>
                            <select name="penghasilan" class="form-control">
                            <option value="Rp 0 > Rp 1.000.000" <?php echo $row['penghasilan'] == 'Rp 0 > Rp 1.000.000' ? 'selected' : '' ?>>Rp 0 > Rp 1.000.000</option>
                            <option value="Rp 1000.000 > Rp 10.000.000" <?php echo $row['penghasilan'] == 'Rp 1000.000 > Rp 10.000.000' ? 'selected' : '' ?>>Rp 1000.000 > Rp 10.000.000</option>
                            <option value="Rp 10.000.000 > Rp 100.000.000" <?php echo $row['penghasilan'] == 'Rp 10.000.000 > Rp 100.000.000' ? 'selected' : '' ?>>Rp 10.000.000 > Rp 100.000.000</option>
                            <option value="Rp 100.000.000 < - " <?php echo $row['penghasilan'] == 'Rp 100.000.000 < - ' ? 'selected' : '' ?>>Rp 100.000.000 < - </option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Status Perkawinan:</label>
                            <select name="status_perkawinan" class="form-control">
                            <option value=""></option>
                            <option value="Sudah Menikah" <?php echo $row['status_perkawinan'] == 'Sudah Menikah' ? 'selected' : '' ?>>Sudah Menikah</option>
                            <option value="Belum Menikah" <?php echo $row['status_perkawinan'] == 'Belum Menikah' ? 'selected' : '' ?>>Belum Menikah</option>
                            <option value="Duda" <?php echo $row['status_perkawinan'] == 'Duda' ? 'selected' : '' ?>>Duda</option>
                            <option value="Janda" <?php echo $row['status_perkawinan'] == 'Janda' ? 'selected' : '' ?>>Janda</option>
                            </select>
                          </div>  
                          <div class="form-group">
                            <label>Status:</label>
                            <select name="status" class="form-control">
                            <option value=""></option>
                            <option value="Hidup" <?php echo $row['status'] == 'Hidup' ? 'selected' : '' ?>>Hidup</option>
                            <option value="Wafat" <?php echo $row['status'] == 'Wafat' ? 'selected' : '' ?>>Wafat</option>
                            </select>
                          </div>                      
                          <div class="input-group group-tongle">
                             <input type="hidden" name="id" value="<?php echo $row['id_biodata']; ?>"></input>
                            <input type="submit" class="btn btn-success form-control" value="Edit">
                          </div>              
                        </form>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      </div>
                    </div>
<?php
  }
?>
</tbody>
</table>
</div>
</div>
</div>