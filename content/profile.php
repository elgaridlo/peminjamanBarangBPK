<?php /* Created by ELGA RIDLO SINATRIYA
         18-Oktober-2018
         email address elgaridlosinatriya@gmail.com
  */ ?>
<?php
   $user = $_SESSION['session_login']; $prev = $_SESSION['level'];
   $result = $config->query('select * from '.$prev.' where nip="'.$user.'"');
   $row = $config->select($result);
                  
?>
<div class="box-body box-profile">
              <h3 class="profile-username text-center"><?php echo $row['nama'];?></h3>
              <ul class="list-group list-group-unbordered">
                <prev>
                <li class="list-group-item">
                <label class="form">NIP   :</label>
                <b><?php echo $row['nip'];?></b>
                </li>
				<li class="list-group-item">
                <label class="form">Password        :</label>
                <b><?php echo $row['password'];?></b>
                </li>
                <li class="list-group-item">
                <label class="form">Unit Kerja      :</label>
                <b><?php echo $row['unit_kerja'];?></b>
                </li>
                <li class="list-group-item">
                <label class="form">Jabatan         :</label>
                <b><?php echo $row['jabatan'];?></b>
                </li>
                <li class="list-group-item">
                <label class="form">Telepon         :</label>
                <b><?php echo $row['telpon'];?></b>
                </li>
                </prev>
              </ul>
    <?php
    if($prev=="admin"){
    ?>
    <a href="#" data-toggle="modal" data-target="#editBarang<?php echo $row['id_admin']; ?>"><i class="btn btn-warning fa fa-edit"></i></a>
    <div id="editBarang<?php echo $row['id_admin']; ?>" class="modal modal-success fade" role="dialog">
        <?php
        } else {
        ?>
        <a href="#" data-toggle="modal" data-target="#editBarang<?php echo $row['id_data']; ?>"><i class="btn btn-warning fa fa-edit"></i></a>
        <div id="editBarang<?php echo $row['id_data']; ?>" class="modal modal-success fade" role="dialog">
<?php }?>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Data Barang </h4>
                </div>
                <div class="modal-body">
                    <?php
                    if($prev=="admin"){
                        ?>
                    <form id="form-data-barang" action="<?php echo $config->site_url(); ?>process.php?act=update_data_admin" method="post" onsubmit="confirm('yakin ingin edit data?');">
                    <?php
                    } else {
                    ?>
                    <form id="form-data-barang" action="<?php echo $config->site_url(); ?>process.php?act=update_data_petugas" method="post" onsubmit="confirm('yakin ingin edit data?');">
                    <?php }?>
                        <div class="input-group">
                            <label class="form">NIP:</label>
                            <input type="text" name="nip" class="form-control" value="<?php echo $row['nip']; ?>" required minlength="9">
                        </div>
                        <div class="input-group">
                            <label class="form">Nama Lengkap:</label>
                            <input type="text" name="nama" class="form-control"value="<?php echo $row['nama']; ?>" required>
                        </div>
                      <!--  <div class="form-group">
                            <label>Jabatan:</label>
                            <select name="jabatan" class="form-control">
                                <option value="Kasetlan" <?php echo $row['jabatan'] == 'Kasetlan' ? 'selected' : '' ?>>Kasetlan</option>
                                <option value="Kasubbag"<?php echo $row['jabatan'] == 'Kasubbag' ? 'selected' : '' ?>>Kasubbag</option>
                                <option value="Kasubaud" <?php echo $row['jabatan'] == 'Kasubaud' ? 'selected' : '' ?>>Kasubaud</option>
                                <option value="Kepala Perwakilan"<?php echo $row['jabatan'] == 'Kepala Perwakilan' ? 'selected' : '' ?>>Kepala Perwakilan</option>
                                <option value="Jabatan Tertentu"<?php echo $row['jabatan'] == 'Jabatan Tertentu' ? 'selected' : '' ?>>Jabatan Tertentu</option>
                            </select>
                        </div> -->
                        <div class="input-group">
                            <label class="form">Email:</label>
                            <input type="text" name="email" class="form-control"value="<?php echo $row['email']; ?>" required>
                        </div>
                        <div class="input-group">
                            <label class="form">Telpon:</label>
                            <input type="text" name="telpon" class="form-control"value="<?php echo $row['telpon']; ?>" required>
                        </div> <!--
                        <div class="form-group">
                            <label>Unit Kerja:</label>
                            <select name="unit_kerja" class="form-control">
                                <option value="Pimpinan Perwakilan" <?php echo $row['unit_kerja'] == 'Pimpinan Perwakilan' ? 'selected' : '' ?>>Pimpinan Perwakilan</option>
                                <option value="Sekretariat Perwakilan" <?php echo $row['unit_kerja'] == 'Sekretariat Perwakilan' ? 'selected' : '' ?>>Sekretariat Perwakilan</option>
                                <option value="Subaud Jateng I"<?php echo $row['unit_kerja'] == 'Subaud Jateng I' ? 'selected' : '' ?>>Subaud Jateng I</option>
                                <option value="Subaud Jateng II"<?php echo $row['unit_kerja'] == 'Subaud Jateng II' ? 'selected' : '' ?>>Subaud Jateng II</option>
                                <option value="Subaud Jateng III"<?php echo $row['unit_kerja'] == 'Subaud Jateng III' ? 'selected' : '' ?>>Subaud Jateng III</option>
                                <option value="Subaud Jateng IV"<?php echo $row['unit_kerja'] == 'Subaud Jateng IV' ? 'selected' : '' ?>>Subaud Jateng IV</option>
                                <option value="Subbag TU Kalan" <?php echo $row['unit_kerja'] == 'Subbag TU Kalan' ? 'selected' : '' ?>>Subbag TU Kalan</option>
                                <option value="Subbag Umum dan TI"<?php echo $row['unit_kerja'] == 'Subbag Umum dan TI' ? 'selected' : '' ?>>Subbag Umum dan TI</option>
                                <option value="Subbag SDM"<?php echo $row['unit_kerja'] == 'Subbag SDM' ? 'selected' : '' ?>>Subbag SDM</option>
                                <option value="Subbag Keuangan"<?php echo $row['unit_kerja'] == 'Subbag Keuangan' ? 'selected' : '' ?>>Subbag Keuangan</option>
                                <option value="Subbag Humas"<?php echo $row['unit_kerja'] == 'Subbag Humas' ? 'selected' : '' ?>>Subbag Humas</option>
                                <option value="Subbag Hukum"<?php echo $row['unit_kerja'] == 'Subbag Hukum' ? 'selected' : '' ?>>Subbag Hukum</option>
                            </select>
                        </div> -->
                        <div class="input-group">
                            <label class="form">Username:</label>
                            <input type="text" name="username" class="form-control"value="<?php echo $row['username']; ?>" required>
                        </div>
                        <div class="input-group">
                            <label class="form">Password:</label>
                            <input type="text" name="password" class="form-control"value="<?php echo $row['password']; ?>" required minlength="6">
                        </div>
                        <div class="input-group group-tongle">
                            <?php
                            if($prev=="admin"){
                            ?>
                            <input type="hidden" name="id" value="<?php echo $row['id_admin']; ?>"></input>
                            <?php } else {
                             ?>
                            <input type="hidden" name="id" value="<?php echo $row['id_data']; ?>"></input>
                            <?php }?>
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