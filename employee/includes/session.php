<?php
	session_start();
	include 'includes/conn.php';

	if(!isset($_SESSION['employee']) || trim($_SESSION['employee']) == ''){
		header('location: index.php');
	}

	$sql = "SELECT * FROM  employee_login WHERE user_id = '".$_SESSION['employee']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	$uisql = "SELECT * FROM  employees WHERE employee_id = '".$_SESSION['employee']."'";
	$uiquery = $conn->query($uisql);
	$user_info = $uiquery->fetch_assoc();
?>