<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	<?php include 'includes/navbar.php'; ?>
	<?php include 'includes/menubar.php'; ?>
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>Add Leave</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Add Leave</li>
			</ol>
		</section>
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-body">
							<div class="row">
								<div class="col-md-6 col-md-offset-3">
									<form action="" method="post">
										<input type="hidden" name="empid" value="<?= $_SESSION['employee'] ?>" />
										<div class="form-group">
											<label> Start date</label>
											<input type="date" name="start_date" class="form-control" />
										</div>
										<div class="form-group">
											<label> End Date</label>
											<input type="date" name="end_date" class="form-control" />
										</div>
										<div class="form-group">
											<label> Reason</label>
											<textarea type="text" name="reason" class="form-control"> </textarea />
										</div>
										<input type="submit" name="submit" value="submit" class="btn btn-success">
										<a href="leave.php" class="btn btn-primary"> Back</a>
									</form>
								<?php  
									if(isset($_POST["submit"]) ) {
										$empid = $_POST["empid"];
										$startdate = $_POST["start_date"];
										$enddate = $_POST["end_date"];
										$reason = $_POST["reason"];
									
										$sql = "SELECT * from employees where employee_id = '$empid'";
										$re = mysqli_query($conn, $sql);	
										while($row= mysqli_fetch_array($re)){
											$empname = $row['firstname'];
										}
										$sql ="INSERT INTO `emp_leave`( `empid`, `from`,`to`, `reason`, `status`, `name`) VALUES ('$empid','$startdate','$enddate','$reason', '0', '$empname')" ;
										if(mysqli_query($conn, $sql)) {
											echo "<center> <div class='alert alert-success'>
												<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
												<b>Leave is added succesfully</b>
											</div></center>";
										} else echo $conn->error;
									}
								?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
   </div>
  	<?php include 'includes/footer.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
</body>
</html>
