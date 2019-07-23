<section class="content">
    <?php
    if(!empty($_SESSION['msg'])){
        echo $_SESSION['msg'];
    }
    ?>

    <div class="box">
        <form>
            <div class="box-header">
                <h3 class="box-title">Data Peminjaman Barang</h3>
            </div>
            <div class="box-body">
                <input type="hidden" name="page"  value= "data-barang2" class="form-control">

                <!-- <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>-->
                <div>
                    <label>Tipe Pencarian :</label>
                    <select name="macam" class="form-control">
                        <option value="">--Pilih--</option>
                        <option value="nip">NIP</option>
                        <option value="nama">Nama</option>
                        <option value="unit_kerja">Unit Kerja</option>
                        <option value="jabatan">Jabatan</option>
                        <option value="tipe">Tipe Barang</option>
                        <option value="kode_jenis">Kode Jenis</option>
                        <option value="jenis">Jenis Barang</option>
                        <option value="tanggal_pinjam">Tanggal Pinjam</option>
                        <option value="tanggal_kembali">Tanggal Kembali</option>
                        <option value="nup">NUP</option>
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
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Kode Jenis</th>
                    <th>Nama</th>
                    <th>Unit Kerja</th>
                    <th>Jabatan</th>
                    <th>Tipe Barang</th>
                    <th>Jenis Barang</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>NUP</th>
                    <th>Jumlah</th>
                    <th>Peruntukan</th>
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
                        $sql = $config->query('select * from pinjaman');
                    }else {
                        $sql = $config->query('select * FROM pinjaman where ' . $macam . ' LIKE "%' . $valueToSearch . '%"');
                    }
                }
                else{
                    $sql = $config->query('select * from pinjaman');
                }
                $i=0;
                while($row = $config->select($sql)){
                $i++;
                ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row['nip'] ?></td>
                    <td><?php echo $row['kode_jenis'] ?></td>
                    <td><?php echo $row['nama'] ?></td>
                    <td><?php echo $row['unit_kerja'] ?></td>
                    <td><?php echo $row['jabatan'] ?></td>
                    <td><?php echo $row['tipe_barang'] ?></td>
                    <td><?php echo $row['jenis_barang'] ?></td>
                    <td><?php echo $row['tanggal_pinjam'] ?></td>
                    <td><?php echo $row['tanggal_kembali'] ?></td>
                    <td><?php echo $row['nup'] ?></td>
                    <td><?php echo $row['jumlah'] ?></td>
                    <td><?php echo $row['peruntukan'] ?></td>
                    <td>

                   <!--     <a href="#" data-toggle="modal" data-target="#editBarang<?php echo $row['id_peminjam']; ?>"><i class="btn btn-warning fa fa-edit"></i></a>
                    -->    <button type="button">  <a href="<?php echo $config->site_url().'process.php?act=delete_data_pinjaman&id='.$row['id_peminjam']; ?>"><i onclick="return confirm('Anda ingin mengembalikan barang ?');">Kembalikan</i></a></button>
                    </td>
                </tr>
                <div id="editBarang<?php echo $row['id_peminjam']; ?>" class="modal modal-success fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Edit Data Barang </h4>
                            </div>
                            <div class="modal-body">
                                <form id="form-data-barang" action="<?php echo $config->site_url(); ?>process.php?act=update_data_pinjaman" method="post" onsubmit="confirm('yakin ingin edit data?');">
                                    <div class="input-group">
                                        <label class="form">Kode Jenis:</label>
                                        <input type="text" name="nup" class="form-control" value="<?php echo $row['nup']; ?>" required>
                                    </div>
                                    <div class="input-group">
                                        <label class="form">Tipe Barang:</label>
                                        <input type="text" name="tipe" class="form-control" value="<?php echo $row['tipe']; ?>" required>
                                    </div>
                                    <div class="input-group">
                                        <label class="form">Kode Jenis:</label>
                                        <input type="text" name="kode_jenis" class="form-control"value="<?php echo $row['kode_jenis']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Barang:</label>
                                        <select name="jenis" class="form-control">
                                            <option value="alat perekam suara"<?php echo $row['jenis'] == 'alat perekam suara' ? 'selected' : '' ?>>Alat Perekam Suara</option>
                                            <option value="camera digital" 	 <?php echo $row['jenis'] == 'camera digital' 	? 'selected' : '' ?>>Camera Digital</option>
                                            <option value="laser pointer" 	 <?php echo $row['jenis'] == 'laser pointer' 	? 'selected' : '' ?>>Laser Pointer</option>
                                            <option value="infocus"       	 <?php echo $row['jenis'] == 'infocus' 	? 'selected' : '' ?>>Infocus</option>
                                            <option value="notebook"       	 <?php echo $row['jenis'] == 'notebook' ? 'selected' : '' ?>>Notebook</option>
                                            <option value="p.c unit"       	 <?php echo $row['jenis'] == 'p.c unit' ? 'selected' : '' ?>>P.C Unit</option>
                                            <option value="scanner" 	         <?php echo $row['jenis'] == 'scanner' 	? 'selected' : '' ?>>Scanner</option>
                                            <option value="ultra mobile p.c" 	 <?php echo $row['jenis'] == 'ultra mobile p.c' 	? 'selected' : '' ?>>Ultra Mobile P.C</option>
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <label class="form">Tahun Barang:</label>
                                        <input type="text" name="tahun" class="form-control"value="<?php echo $row['tahun']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Kelompok Barang:</label>
                                        <select name="kelompok" class="form-control">
                                            <option value="khusus" 	<?php echo $row['kelompok'] == 'khusus' ? 'selected' : '' ?>>Khusus</option>
                                            <option value="umum" 	<?php echo $row['kelompok'] == 'umum' 	? 'selected' : '' ?>>Umum</option>
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <label class="form">Ketersediaan:</label>
                                        <input type="number" name="ketersediaan" class="form-control" min="0" value="<?php echo $row['ketersediaan']; ?>" required>
                                    </div>
                                    <div class="input-group">
                                        <label class="form">Peruntukan:</label>
                                        <input type="text" name="peruntukan" class="form-control"value="<?php echo $row['peruntukan']; ?>" required>
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
        </tbody>
        </table>
    </div>

    </div>
    <!-- /.box -->
<!--    <div class="box">
        <div class="box-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Kode Jenis</th>
                        <th>Nama</th>
                        <th>Unit Kerja</th>
                        <th>Jabatan</th>
                        <th>Tipe Barang</th>
                        <th>Jenis Barang</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>NUP</th>
                        <th>Jumlah</th>
                        <th>Peruntukan</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    //============================================Ini gunanya untuk membuka semua barang yang ada di database

                    if(isset($_GET['valueToSearch'])) {
                        $valueToSearch = $_GET['valueToSearch'];
                        $macam = $_GET['macam'];
                        if ($_GET['valueToSearch'] == "" || $_GET['valueToSearch']== null){
                            $sql = $config->query('select * from history');
                        }else {
                            $sql = $config->query('select * FROM history where ' . $macam . ' = "' . $valueToSearch . '"');
                        }
                    }
                    else{
                        $sql = $config->query('select * from pinjaman');
                    }
                    $i=0;
                    while($row = $config->select($sql)){
                    $i++;
                    ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $row['nip'] ?></td>
                        <td><?php echo $row['kode_jenis'] ?></td>
                        <td><?php echo $row['nama'] ?></td>
                        <td><?php echo $row['unit_kerja'] ?></td>
                        <td><?php echo $row['jabatan'] ?></td>
                        <td><?php echo $row['tipe_barang'] ?></td>
                        <td><?php echo $row['jenis_barang'] ?></td>
                        <td><?php echo $row['tanggal_pinjam'] ?></td>
                        <td><?php echo $row['tanggal_kembali'] ?></td>
                        <td><?php echo $row['nup'] ?></td>
                        <td><?php echo $row['jumlah'] ?></td>
                        <td><?php echo $row['peruntukan'] ?></td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editBarang<?php echo $row['id_peminjam']; ?>"><i class="btn btn-warning fa fa-edit"></i></a>
                            <a href="<?php echo $config->site_url().'process.php?act=delete_data_pinjaman&id='.$row['id_peminjam']; ?>"><i class="btn btn-danger fa fa-trash" onclick="return confirm('Yakin delete data ini?');"></i></a>
                        </td>
                    </tr>

            </div>


            <?php
            }
            ?>
            </tbody>
            </table>
        </div>

        <!-- /.box-body -->
    </div>
</section>