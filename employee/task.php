<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  	<?php include 'includes/navbar.php'; ?>
  	<?php include 'includes/menubar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>My Tasks</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tasks</li>
      </ol>
    </section>
		<section class="content">
			<div class="row">
			  <div class="col-xs-12">
				 <div class="box">
					<div class="box-body">
						<table class="table table-striped table-bordered table-hover" id="example1">
							<thead>
								<tr>
									<th>Sl</th>
									<th>Task</th>
									<th>Starting date</th>
									<th>Ending date</th>
									<th>Points</th>
									<th>Time</th>
									<th>Feedback</th>
									<th>status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$date = date("Y-m-d");
								$empid = $_SESSION["employee"];
								$sql = "SELECT * from emp_monitoring where emp_id =  $empid ";
								$re = mysqli_query($conn, $sql);	
								while($row= mysqli_fetch_array($re)) {
									$id = $row['id'];
									$empid = $row['emp_id'];
									
									$name = $row['name'];
									
									$position = $row['position'];
									$task = $row['running_project'];
									$startdate = $row['start_date'];
									
									$enddate = $row['end_date'];
									$status = $row['status'];
									$points = $row['points'];
									$feedback = $row['feedback'];
							?>
								<tr>
									<td> <?php echo $id; ?> </td>
									<td> <?php echo $task; ?> </td>
									<td> <?php echo $startdate; ?> </td>
									<td> <?php echo $enddate; ?> </td>
									<td> <?php echo $points; ?> </td>
									<td> <?php 
									
									
									if( $enddate < $date)
										
									
									{
										echo "<b style='color:red;'>Time expired </b>";
										
									}
									else{
										$date1=date_create($startdate);
												$date2=date_create($enddate);
												$diff=date_diff($date1,$date2);
												
											
										$dt = $diff->format("%R%a days");
									echo $dt."  Remaining";
									}
									?> </td>
										<td> <?php echo $feedback; ?> </td>
										<td> <?php 

										if( $status ==0)
										{
											echo "<b style='color:blue;'> Running </b>";
											
										}
										if( $status ==1)
										{
											echo "<b style='color:green;'> Completed </b>";
											
										}
									
								  ?>
									</td> 
									<td> <a href="feedback.php?id=<?php echo $id;?>"  class="btn btn-primary" > Submit </a>    </td>
								</tr>
						  <?php } ?>
						  </tbody>
						</table>
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
