  <!-- Content Wrapper. Contains page content -->
  <body onLoad="goforit()">
  <div class="content-wrapper">
      <section class="content-header">
      <h1>
          Aplikasi Peminjaman Barang
          <small>Selamat Datang
        </small>
      </h1>
    </section>



<span id="clock"></span>
  <?php
      switch($page){
        default:
          include('content/home.php');
        break;
        case "tambah-petugas":
          include('content/tambah-petugas.php');
        break;
        case "profile":
          include('content/profile.php');
        break;
        case "data-penduduk":
          include('content/data-penduduk.php');
        break;
        case "data-peminjam":
          include('content/data-peminjam.php');
        break;
        case "data-kode-jenis":
          include('content/data-kode-jenis.php');
        break;
        case "data-barang":
          include('content/data-barang.php');
        break;
        case "data-barang2":
          include('content/data-barang2.php');
        break;
        case "data-history":
          include('content/data-history.php');
        break;
        case "data-pinjam-user":
          include('content/data-pinjam-user.php');
        break;
        case "data-history-user":
          include('content/data-history-user.php');
        break;
        case "data-pinjam-pegawai":
          include('content/data-pinjam-pegawai.php');
        break;
        case "laporan":
          include('content/laporan.php');
        break;
        case "cetak-pengembalian":
          include('content/cetak-pengembalian.php');
        break;
        case "cetak-peminjaman":
          include('content/cetak-peminjaman.php');
        break;
        case "about":
          include('about.php');
        break;
      }
  ?>
  </div>
  <!-- /.content-wrapper -->

