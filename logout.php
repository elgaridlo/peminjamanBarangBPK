<?php
	session_start();
	if(!empty($_SESSION['session_login'])){
		session_destroy();
		header('Location: index.php');
	} else{
		header('Location: index.php');
	}
?>