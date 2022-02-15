<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT * FROM schedules WHERE id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		$row['time_in'] = date("h:i A", strtotime($row['time_in']));
		$row['time_out'] = date("h:i A", strtotime($row['time_out']));
		echo json_encode($row);
	}
?>