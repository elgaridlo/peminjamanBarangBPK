<?php /* Created by ELGA RIDLO SINATRIYA
         18-Oktober-2018
         email address elgaridlosinatriya@gmail.com
  */ ?>

<?php
// set mode production/development
 define('MODE','production');
 if(MODE=="development"){
 	error_reporting(0);
 }
 
// define variable page
 $page = isset($_GET['page'])?$_GET['page']:'';
 //session start
 session_start();

 //configuration db
 include('config/config.php');
 $config = new config();

 // unset session msg after 5 second
 $_SESSION['most_recent_activity'] = time();
 if (isset($_SESSION['most_recent_activity']) && 
    (time() -   $_SESSION['most_recent_activity'] > 5)) {
	 session_unset($_SESSION['msg']);  
 }

/* //previlage sidebar menu for add petugas
 if($page=="tambah-petugas" && isset($_SESSION['level'])!="admin"){
 	header('Location: index.php');
 }
*/
 

 // cek session login
 if(!empty($_SESSION['session_login'])){
	include("header.php");
	include('main_header.php');
	include('sidebar.php');
	include("content.php");
	include("main_footer.php");
	include("footer.php"); 	
 } else{
 	header('Location: login.php');
 }
?>