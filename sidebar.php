  <!-- Left side column. contains the logo and sidebar -->
  <?php /* Created by ELGA RIDLO SINATRIYA
         18-Oktober-2018
         email address elgaridlosinatriya@gmail.com
  */ ?>
  <?php
  $user = $_SESSION['session_login']; $prev = $_SESSION['level'];
  $result = $config->query('select * from '.$prev.' where nip="'.$user.'"');
  $row = $config->select($result);
  $jabatan = $row['jabatan'];

  ?>

  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">PILIHAN MENU</li>
        <li class="active">
          <a href="index.php?page=home">
            <i class="fa fa-th"></i> <span>Home</span>
            <small class="label pull-right bg-green"></small>
          </a>
        </li>
        <?php
          if($_SESSION['level']=="admin"){
        ?>
        <li class="treeview">
          <a href="index.php?page=tambah-petugas">
            <i class="fa fa-plus"></i>
            <span>Menu Admin</span>
          </a>
        </li>
              <!-- KALAU MAU MENAMBAHKAN SESUATU BUAT ADMIN DISINI -->
        <?php
          }
        ?>
        <li>
          <a href="index.php?page=profile">
            <i class="fa fa-user"></i> <span>Profile</span>
            <small class="label pull-right bg-green"></small>
          </a>
        </li>

          <?php
          if($_SESSION['level']=="admin") {
              ?>
              <li class="treeview">
                  <a href="#">
                      <i class="fa fa-pie-chart"></i>
                      <span>Master Data</span>
                      <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="index.php?page=data-kode-jenis"><i class="fa fa-pie-chart"></i> Tambah Kode dan Jenis</a>
                      <li><a href="index.php?page=data-barang"><i class="fa fa-pie-chart"></i> Data Barang</a></li>
                      <li><a href="index.php?page=data-peminjam"><i class="fa fa-pie-chart"></i> Transaksi Peminjaman</a></li>
                      <li><a href="index.php?page=data-barang2"><i class="fa fa-pie-chart"></i> Data Peminjaman</a></li>
                  </ul>
              </li>

        <li>
          <a href="index.php?page=data-history">
            <i class="fa fa-circle-o"></i> <span>Riwayat Pengembalian</span>
            <small class="label pull-right bg-green"></small>
          </a>
        </li>
          <?php
          }

          if($_SESSION['level']=="datapegawai"&&($jabatan!= "Kasubaud"&&$jabatan!= "Kasubbag")) {
              ?>

              <li>
                  <a href="index.php?page=data-pinjam-user">
                      <i class="fa fa-pie-chart"></i> <span>Barang Dipinjam</span>
                      <small class="label pull-right bg-green"></small>
                  </a>
              </li>
              <li>
                  <a href="index.php?page=data-history-user">
                      <i class="fa fa-pie-chart"></i> <span>Riwayat Pengembalian</span>
                      <small class="label pull-right bg-green"></small>
                  </a>
              </li>
              <?php
          }
          if($_SESSION['level']=="datapegawai"&&($jabatan== "Kasubaud"||$jabatan== "Kasubbag")) {

          ?>

          <li>
              <a href="index.php?page=data-pinjam-pegawai">
                  <i class="fa fa-pie-chart"></i> <span>Barang Dipinjam Pegawai</span>
                  <small class="label pull-right bg-green"></small>
              </a>
          </li>
<?php }?>

        <li>
          <a href="index.php?page=laporan">
            <i class="fa fa-print"></i> <span>Laporan</span>
            <small class="label pull-right bg-green"></small>
          </a>
        </li>
        <li>
          <a href="index.php?page=about">
            <i class="fa fa-circle-o"></i> <span>About</span>
            <small class="label pull-right bg-green"></small>
          </a>
        </li>
         <li>
          <a href="<?php echo $config->site_url().'logout.php'; ?>">
            <i class="fa fa-close"></i> <span>LogOut</span>
            <small class="label pull-right bg-green"></small>
          </a>
        </li>
    </section>
    <!-- /.sidebar -->
  </aside>
