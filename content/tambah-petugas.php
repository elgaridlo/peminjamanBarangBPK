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
  <div class="table-responsive">
  <div class="container-fluid">
    <div class="col-md-2">
      <form id="form-tambah-petugas" action="<?php echo $config->site_url(); ?>process.php?act=add_petugas" method="post">
        <div class="input-group">
          <label class="form"><br></br><br></br> </label>
		</div>
		<div class="input-group">
          <label class="form">NIP:</label>
          <input type="text" name="nip" class="form-control" required
           minlength="9" >
        </div>
		<div class="input-group">
          <label class="form">Nama Lengkap:</label>
          <input type="text" name="nama" class="form-control" required>
        </div>
		<div class="input-group">
			<label>Jabatan:</label>
			<select name="jabatan" class="form-control">
				<option value=""></option>
				<option value="Kasetlan">Kasetlan</option>
				<option value="Kasubbag">Kasubbag</option>
				<option value="Kasubaud">Kasubaud</option>
				<option value="Kepala Perwakilan">Kepala Perwakilan</option>
				<option value="Jabatan Tertentu">Jabatan Tertentu</option>
		  </select>
        </div>
		<div class="input-group">
          <label class="form">Email:</label>
          <input type="text" name="email" class="form-control" required>
        </div>
		<div class="input-group">
          <label class="form">Telepon:</label>
          <input type="text" name="telpon" class="form-control" required>
        </div>
		<div class="input-group">
			<label>Unit Kerja:</label>
			<select name="unit_kerja" class="form-control">
				<option value=""></option>
				<option value="Pimpinan Perwakilan">Pimpinan Perwakilan</option>
				<option value="Sekretariat Perwakilan">Sekretariat Perwakilan</option>
				<option value="Subaud Jateng I">Subaud Jateng I</option>
				<option value="Subaud Jateng II">Subaud Jateng II</option>
				<option value="Subaud Jateng III">Subaud Jateng III</option>
				<option value="Subaud Jateng IV">Subaud Jateng IV</option>
				<option value="Subbag TU Kalan">Subbag TU Kalan</option>
				<option value="Subbag Umum dan TI">Subbag Umum dan TI</option>
				<option value="Subbag SDM">Subbag SDM</option>
				<option value="Subbag Keuangan">Subbag Keuangan</option>
				<option value="Subbag Humas">Subbag Humas</option>
				<option value="Subbag Hukum">Subbag Hukum</option>

          </select>
        </div>
        <div class="input-group">
          <label class="form">Password:</label>
          <input type="password" name="password" class="form-control" required minlength="6" maxlength="20">
        </div>
		<div class="input-group">
          <label class="form"><br></br></label>
		</div>
        <div class="input-group group-tongle">
          <input type="submit" class="btn btn-success" value="Tambahkan"/>
        </div>
      </form>
    </div>

    <div class="box-body">
    <div class="col-md-10">
      <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">

         <h1>Data Peminjam Terdaftar </h1>
        <thead>
          <tr>
            <th>No</th>
            <th>NIP</th>
			<th>Nama Lengkap</th>
			<th>Jabatan</th>
			<th>Email</th>
			<th>Telepon</th>
			<th>Unit Kerja</th>
            <th>Password</th>
            <th>Action</th>
          </tr>
        </thead>
            <tbody>
          <?php
          $i=0;
          $sql = $config->query('select * from datapegawai');
          while($row = $config->select($sql)){
            $i++;?>
            <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $row['nip'];?></td>
			  <td><?php echo $row['nama'];?></td>
			  <td><?php echo $row['jabatan'];?></td>
			  <td><?php echo $row['email'];?></td>
			  <td><?php echo $row['telpon'];?></td>
			  <td><?php echo $row['unit_kerja'];?></td>
              <td><?php echo $row['password'];?></td>
              <td>
                <a href="#" data-toggle="modal" data-target="#editPetugas<?php echo $row['id_data']; ?>"><i class="btn btn-warning fa fa-pencil"></i></a>
                <a href="<?php echo $config->site_url().'process.php?act=delete_data_petugas&id='.$row['id_data']; ?>"><i class="btn btn-danger fa fa-trash" onclick="return confirm('Yakin delete data ini?');"></i></a></td>
              </tr>
          <div id="editPetugas<?php echo $row['id_data']; ?>" class="modal modal-success fade" role="dialog">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Data </h4>
                      </div>
                      <div class="modal-body">
                          <form id="form-tambah-petugas" action="<?php echo $config->site_url(); ?>process.php?act=update_data_petugas" method="post" onsubmit="confirm('yakin ingin edit data?');">
                              <div class="input-group">
                                  <label class="form">NIP:</label>
                                  <input type="text" name="nip" class="form-control" value="<?php echo $row['nip']; ?>" required>
                              </div>
                              <div class="input-group">
                                  <label class="form">Nama Lengkap:</label>
                                  <input type="text" name="nama" class="form-control"value="<?php echo $row['nama']; ?>" required>
                              </div>
                              <div class="form-group">
                                  <label>Jabatan:</label>
                                  <select name="jabatan" class="form-control">
                                      <option value="Kasetlan" <?php echo $row['jabatan'] == 'Kasetlan' ? 'selected' : '' ?>>Kasetlan</option>
                                      <option value="Kasubbag"<?php echo $row['jabatan'] == 'Kasubbag' ? 'selected' : '' ?>>Kasubbag</option>
                                      <option value="Kasubaud" <?php echo $row['jabatan'] == 'Kasubaud' ? 'selected' : '' ?>>Kasubaud</option>
                                      <option value="Kepala Perwakilan"<?php echo $row['jabatan'] == 'Kepala Perwakilan' ? 'selected' : '' ?>>Kepala Perwakilan</option>
                                      <option value="Jabatan Tertentu"<?php echo $row['jabatan'] == 'Jabatan Tertentu' ? 'selected' : '' ?>>Jabatan Tertentu</option>
                                  </select>
                              </div>
                              <div class="input-group">
                                  <label class="form">Email:</label>
                                  <input type="text" name="email" class="form-control"value="<?php echo $row['email']; ?>" required>
                              </div>
                              <div class="input-group">
                                  <label class="form">Telepon:</label>
                                  <input type="text" name="telpon" class="form-control"value="<?php echo $row['telpon']; ?>" required>
                              </div>
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
                              </div>
                              <!--<div class="input-group">
                          <label class="form">Username:</label>
                          <input type="text" name="username" class="form-control"value="<?php echo $row['username']; ?>" required>
                        </div>-->
                              <div class="input-group">
                                  <label class="form">Password:</label>
                                  <input type="text" name="password" class="form-control"value="<?php echo $row['password']; ?>" required>
                              </div>
                              <div class="input-group group-tongle">
                                  <input type="hidden" name="id" value="<?php echo $row['id_data']; ?>"></input>
                                  <input type="submit" style="margin-top: 10px;" class="btn btn-default form-control" value="Edit">
                              </div>

                              <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                      </div>
                  </div> </form>
              </div>

                      <?php
                    }
                    ?>
            </tbody>
                  </table>
                </div>
              </div>
    </div>
 </div></div>
            </section>


