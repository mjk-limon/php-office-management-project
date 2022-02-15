<?php
	$conn = new mysqli('localhost', 'root', 'adminlimon', 'office_management');
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>