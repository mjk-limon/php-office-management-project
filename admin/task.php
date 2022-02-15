<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  	<?php include 'includes/navbar.php'; ?>
  	<?php include 'includes/menubar.php'; ?>
	<div class="content-wrapper">
		<section class="content-header">
			<h1>Project Monitoring</h1>
			<ol class="breadcrumb">
			  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			  <li class="active">Project monitoring</li>
			</ol>
		</section>
		<section class="content">
			<!-- /.row -->
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-body">
							<p class="text-right"><a href="newtask.php" class="btn btn-primary"> Add new task</a></p>
							<table class="table table-striped table-bordered table-hover" id="example1">
								<thead>
									<tr>
										<th>  Sl</th>
										<th>  Empolyee Id</th>
										<th>  Empolyee name</th>
										<th>  position</th>
										<th>  task</th>
										<th>  Starting date</th>
										<th>  Ending date</th>
										<th>  points</th>
										<th>  File</th>
										<th>  Feedback</th>
										<th>  Time</th>
										<th>  status</th>
										<th>  Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$sl = 0;
										$date = date("Y-m-d");
										include "db.php";
										$sql = "SELECT * from emp_monitoring";
											$re = mysqli_query($con,$sql);	
											while($row= mysqli_fetch_array($re))
															{
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
																	$file = $row['file'];
										$sl++;
										
																						?>
									<tr>
										<td> <?php echo $sl; ?> </td>
										<td> <?php echo $empid; ?> </td>
										<td> <?php echo $name; ?> </td>
										<td> <?php echo $position; ?> </td>
										<td> <?php echo $task; ?> </td>
										<td> <?php echo $startdate; ?> </td>
										<td> <?php echo $enddate; ?> </td>
										<td> <?php echo $points; ?> </td>
										<td>  
											<?php 
												if($file != "")
												{
												
												?>
											<a href="../images/<?php echo $file;?>" style="color:green;" > View </a> 
											<?php
												}
												?>
											<?php 
												if($file == "")
												{
												
												?>
											<a href="" style="color:red;" > No file </a> 
											<?php
												}
												?>
										</td>
										<td> <?php echo $feedback; ?> </td>
										<td> <?php 
											if( $enddate < $date)
												
											
											{
												echo "<b style='color:red;'> time expired </b>";
												
											}
											else{
												$date1=date_create($startdate);
														$date2=date_create($enddate);
														$diff=date_diff($date1,$date2);
														
													
												$dt = $diff->format("%R%a days");
											echo $dt."  remaining";
											}
											?> </td>
										<td> <?php 
											if( $status ==0)
											{
												echo "<b style='color:blue;'> Not completed </b>";
												
											}
											if( $status ==1)
											{
												echo "<b style='color:green;'> Completed </b>";
												
											}
											
											?> </td>
										<td> <a href="feedback.php?id=<?php echo $id;?>"  class="btn btn-primary" > Feedback </a>    <a href="?did=<?php echo $id;?>" class="btn btn-danger" > Delete </a> </td>
									</tr>
									<?php }  ?>
								</tbody>
							</table>
						</div>
						<?php
							if(isset($_GET["did"]))
							{
							
									$empdlt = $_GET["did"];	
							
											$sql = "DELETE FROM emp_monitoring WHERE id = '$empdlt'";
							if($con->query($sql)){
							 echo "
																			<center> <div class='alert alert-success'>
																				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
																				<b>Task is deleted</b>
																			</div></center>";
							
							}
								
							}
							
							?>
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
