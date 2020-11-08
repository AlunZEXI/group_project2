<?php 

	include 'common.php';
	session_handler();

	session_unset(); 
	session_destroy();

	header('Location: index.php');
	exit();
	
?>