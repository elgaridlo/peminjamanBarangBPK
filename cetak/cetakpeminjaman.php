<?php
  session_start();
  include('../config/config.php');
  $config = new config();
?>
<script type="text/javascript">
<!--
window.print();
//-->
</script>

<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<div class="container-fluid">
  <div class="box">
    <div class="box-header">
    </div>
    <!-- /.box-header -->

      <div>
          <table width="100%">
          <tr>
              <td width="10%">
              <img style="border: 1px solid #000000; height: 70px;" src="../img/logo2.png" alt="">
              </td>
                  <!--<div class="col-md-2">
-->         <td width="90%" align="center">
            <h4 style="text-align: center;">BADAN PEMERIKSA KEUANGAN</h4>
            <h4 style="text-align: center;">PERWAKILAN PROVINSI JAWA TENGAH</h4>
              </td>

          </tr>
          </table>
        <!--<hr style="border: 2px solid #000000;"> -->
        <hr style="border: 1px solid #000000;">
<?php
$nip = $_GET['nip'];
$end = $_GET['end'];
$i = 0;
$sql = $config->query("SELECT b.nama,b.telpon,b.nip,b.unit_kerja, a.tanggal_pinjam, a.tanggal_kembali, a.peruntukan,
a.kode_jenis,a.jenis_barang,a.nup,a.tipe_barang,a.jumlah
 from pinjaman a join datapegawai b on a.nip = b.nip where a.tanggal_pinjam = '$end' and b.nip = '$nip' ");
$row = $config->select($sql);
$peruntukan=$row['peruntukan'];
$nama =$row['nama'];
$telp=$row['telpon'];
$nip=$row['nip'];
$unit=$row['unit_kerja'];
$tp=$row['tanggal_pinjam'];
$tk=$row['tanggal_kembali'];
?>
          <h5 style="text-align: left;"><u>FORM PEMINJAMAN BARANG</u></h5>
          <!--<hr style="border: 1px solid #000000;">
-->
          <div style="text-align: justify;">
              <?php while($row = $config->select($sql)){

                  if($row['peruntukan'] != $peruntukan){
                      msg("failed","Failed!","Gagal mencetak , terdapat peruntukan yang berbeda");
                      echo '<script>window.location.href="'.$config->site_url().'index.php?page=cetak-peminjaman"</script>';                  }
                  $peruntukan=$row['peruntukan'];
              } $row = $config->select($sql);?>

<pre>
    Data Peminjam
Nama                : <?php echo $nama?>

No. Telpon          : <?php echo $telp ?>

NIP                 : <?php echo $nip ?>

Unit Kerja          : <?php echo $unit ?>

Tanggal Peminjaman  : <?php echo $tp ?> s/d <?php echo $tk ?>

Peruntukan          : <?php echo $peruntukan ?>

</pre></div>

        <h5 style="text-align: left;">DATA BARANG YANG DIPINJAM</h5>
        <table id="example1" class="table table-bordered table-striped" width="100%">
          <thead align="center">
            <tr>
              <th>No</th>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>NUP</th>
              <th>Merk/Type</th>
              <th>Jumlah Barang</th>
              <th  width="30%">Keterangan</th>
              </tr>
          </thead>
          <tbody>
            <?php
            $end = $_GET['end'];
            $i = 0;
            $sql2 = $config->query("SELECT * from pinjaman where tanggal_pinjam = '$end'");
            while($row2 = $config->select($sql2)){
             $i++; ?>
              <tr>
                  <td><font size="2"><?php echo $i;?></font></td>
                  <td><font size="2"><?php echo $row2['kode_jenis'] ?></font></td>
                  <td><font size="2"><?php echo $row2['jenis_barang'] ?></font></td>
                  <td><font size="2"><?php echo $row2['nup'] ?></font></td>
                  <td><font size="2"><?php echo $row2['tipe_barang'] ?></font></td>
                  <td><font size="2"><?php echo $row2['jumlah'] ?></font></td>
                  <td><font size="2"><?php //echo $row['peruntukan'] ?></font></td>
              <?php
            }
              ?></tr>
          </tbody>
        </table>
          <div style="text-align: justify;">
              <table id="example1" class="table table-bordered table-striped" width="100%">
                  <tbody>
                  <tr>
                      <td width="30%" align="left">

                          <p align="center">Peminjam</p><br><br><br><br>



                          <?php echo $nama?><br>
                          NIP <?php echo $nip ?>

                      </td>
                      <td width="30%" align="left">
                          <p align="center"><?php
                              $jabatan;
                              if($unit=='Subbag TU Kalan' || $unit=='Subbag Umum dan TI' || $unit=='Subbag SDM' ||
                                  $unit=='Subbag Keuangan' || $unit=='Subbag Humas' || $unit=='Subbag Hukum'){
                                  $jabatan = 'Kasubbag';
                                  ?>
                                  Kasubbag<br>
                                  <?php echo $unit?><br><br><br><br>
                              <?php             }
                              else{ $jabatan = 'Kasubaud' ?>
                                  Kasubaud<br>
                                  <?php echo $unit?><br><br><br><br>

                              <?php   }
                              $sql3 = $config->query("SELECT * from datapegawai where jabatan = '$jabatan'");
                              $row3 = $config->select($sql3);
                              $namaketua = $row3['nama'];
                              $nipketua = $row3['nip'];
                              ?></p>

                          <?php echo $namaketua?><br>
                          NIP <?php echo $nipketua ?>

                      </td>
                      <td width="40%" align="left">

                          <p align="right">Semarang, ............................<br>
                              <span style="float: left">Petugas Inventaris,</span>

                              <br><br><br><br></p>

                          <?php echo ".............................................."?><br>
                          <?php echo "NIP ......................................." ?>


                      </td>
                  </tr>
                  </tbody>
              </table>



          </div>
      </div>
    </div>
  </div>