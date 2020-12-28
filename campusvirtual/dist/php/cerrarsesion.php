<?php
	error_reporting(0);
	session_start();
	session_unset();
	session_destroy();
	$varsesion = $_SESSION['usuario'];
  	if($varsesion == null || $varsesion = ''){
	header("location:../index.html");
    die();
  }


	header("location:../index.html");
?>