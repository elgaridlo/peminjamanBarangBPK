<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->

<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- AdminLTE App -->
<link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>

<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->

<?php
    $barang_ada = $config->query('select * from barang where ketersediaan = 1');
    $barang_dipinjam = $config->query('select * from barang where ketersediaan = 0');
?>

<script src="dist/js/demo.js"></script>
<script>

  $('#startDate').datepicker({
      autoclose: true,
      format : 'yyyy-mm-dd'
    });

  $('#endDate').datepicker({
      autoclose: true,
      format : 'yyyy-mm-dd'
    });

    $("#example1").DataTable({
        "searching": false
    })
  ;
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    }); 

  var donut = new Morris.Donut({
      element: 'sales-chart',
      resize: true,
      colors: ["#3c8dbc", "#f56954", "#00a65a", "#FFD700", "#DEB887","#00FF00", "#9ACD32","#000000" , "#FF1493"],
      data: [
          {label: "Jumlah Barang Tersedia", value: <?php echo $barang_ada->num_rows; ?>},
          {label: "Jumlah Barang Dipinjam", value: <?php echo $barang_dipinjam->num_rows; ?>}
      ],
      hideHover: 'auto'
    });
  
  function unsetMsg(){
  <?php unset($_SESSION['msg']); ?>
  }

  //Date picker
    
</script>
</body>
</html>