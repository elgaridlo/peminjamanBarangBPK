<section class="content">
    <?php
    if(!empty($_SESSION['msg'])){
        echo $_SESSION['msg'];
    }
    ?>

    <div class="box">
        <form >
            <div class="box-body">
                <input type="hidden" name="page"  value= "data-pinjam-user" class="form-control">
                <div>
                    <label class="form">Nama Pencarian:</label>
                    <input type="text" name="valueToSearch" class="form-control" placeholder="Nama Barang">
                </div>
                <!-- <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>-->
                <div>
                    <label>Cari dari:</label>
                    <select name="macam" class="form-control">
                        <option value="">--Pilih--</option>
                        <option value="nip">NIP</option>
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
                <div class="input-group group-tongle">
                    <input type="submit" style="margin-top: 10px;" class="btn btn-default form-control" value="cari">
                </div>
            </div>
        </form>
    </div>
    <!-- /.box-header -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Barang Dipinjam</h3>
        </div>
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
                $nip=$_SESSION['session_login'];
                $sql2 = $config->query('select * from datapegawai where nip="'.$nip.'"');
                $row2 = $config->select($sql2);
                $jabatan = $row2['jabatan'];
                $unit    = $row2['unit_kerja'];

                $sql = $config->query('select * from pinjaman where unit_kerja="'.$unit.'"');

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
    <!-- /.box -->

</section>