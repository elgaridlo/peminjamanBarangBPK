<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan Penjualan</title>
</head>
<body onload=window.print();>
 <button onClick="window.print();" style="margin-bottom: 12px; width: 70px; height: 50px;" type="button" class="btn btn-success btn-print" ><i class="fa fa-print"></i>Cetak</button> 
	<div class="container">
		<div class="col-md-12">
			<h1 style="text-align: center;">LAPORAN DATA KEMATIAN</h1>
			<h2 style="text-align: center;">DESA MOJO KECAMATAN ULUJAMI KABUPATEN PEMALANG</h2>
		<hr style="border: 2px solid #000000;">
		<hr style="border: 1px solid #000000;">
		<div class="table-responsive">
              <table  class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nik</th>
                  <th>Nama</th>
                  <th>Tanggal Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>Agama</th>
                  <th>Tanggal Kematian</th>
                  <th>Penyebab Kematian</th>
                </tr>
                 </thead>
                <tbody>
<?php 
  $sql = $config->query('select * from kematian');
  $i=0;
  while($row = $config->select($sql)){
  $i++;
?>
                <tr>
                <td><?php echo $i;?></td>
                  <td><?php echo $row['nik'] ?></td>
                  <td><?php echo $row['nama'] ?></td>
                  <td><?php echo $row['tanggal_lahir'] ?></td>
                  <td><?php echo $row['jenis_kelamin'] ?></td>
                  <td><?php echo $row['agama'] ?></td>
                  <td><?php echo $row['tanggal_kematian'] ?></td>
                  <td><?php echo $row['penyebab_kematian'] ?></td>
                  </tr>
<?php
  }
?>
</div>
</tbody>
</table>
</div>
</body>
</html>
</div>
</div>
</body>
</html>