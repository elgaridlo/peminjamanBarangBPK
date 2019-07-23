<?php /* Created by ELGA RIDLO SINATRIYA
         18-Oktober-2018
         email address elgaridlosinatriya@gmail.com
  */ ?>
<?php


  session_start();
  include('config/config.php');

  $config = new config();

  if($_SERVER['REQUEST_METHOD']=="POST"){
    if($_POST['level']=="admin"){
      $id = "id_admin"; $table = "admin";
    } else{
      $id = "id_data"; $table = "datapegawai";
    }
   // $id = "id_admin"; $table = "admin";
    $sql = $config->query('select '.$id.' FROM '.$table.' where nip="'.$_POST['nip'].'" and password="'.$_POST['password'].'"');
    $result = mysqli_num_rows($sql);
    $row        = $config->select($sql);
    $unit       = $row['unit_kerja'];
    $jabatan    = $row['jabatan'];

    if($result>0){
      $_SESSION['session_login']    = $_POST['nip'];
      $_SESSION['session_unit']     = $unit;
      $_SESSION['session_jabatan']  = $jabatan;
      $_SESSION['level'] = $_POST['level'];
      header('Location: index.php');
    } else{
      echo '<script>alert("Gagal login");</script>';
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <style type="text/css">

  .bglogin{

    background-image: url("img/bg.jpg");
    background-size: cover;
    background-position: center;
  }


  </style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page bglogin">
<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="login-box-body">
    <div class="login-logo">
    <a href="#"><b>Data Pusat Peminjaman Barang</b></a>
  </div>
      <p class="login-box-msg">Silahkan Isi Data Anda</p>

    <form action="#" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="nip" class="form-control" placeholder="Nomor Induk Pegawai">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <select name="level" class="form-control" required>
      <option value="admin">Admin</option>
      <option value="datapegawai">Non-Admin</option>
    </select>
      </div>
     
        <!-- /.col -->
        <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->



<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script> 
</body>
</html>
