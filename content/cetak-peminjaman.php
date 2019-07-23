
<div class="box-body">

<form method="get" target="_blank" action="cetak/cetakpeminjaman.php">
<!-- Date -->
    <div class="box">
        <div class="box-body">
    <div class="form-group">
     <label class="form">NIP:</label>
        <div class="input-group" >
        <div class="input-group-addon">
            <i class="fa fa-angle-down"></i>
        </div>
            <input type="text" name="nip" class="form-control" minlength="9" size="100%" required >
        </div>
      <!-- /.input group -->
    </div>
    <!-- /.form group -->

    <div class="form-group">
      <label>TANGGAL PEMINJAMAN:</label>

      <div class="input-group date">
        <div class="input-group-addon">
          <i class="fa fa-calendar"></i>
        </div>
        <input type="text" name="end" class="form-control" id="endDate">
      </div>
      <!-- /.input group -->
    </div>
    <!-- /.form group -->

    <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-print"></i> Cetak</button>
        </div>
        </div>
</form>
</div>