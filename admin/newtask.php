

<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  	<?php include 'includes/navbar.php'; ?>
  	<?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              

              <p>Total Employees</p>
            </div>
            <div class="">
              <i class=""></i>
            </div>
            <a href="employee.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
             
          
              <p>On Time Percentage</p>
            </div>
            <div class="">
              <i class=""></i>
            </div>
            <a href="attendance.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              
             
              <p>On Time Today</p>
            </div>
            <div class="">
              <i class=""></i>
            </div>
            <a href="attendance.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              

              <p>Late Today</p>
            </div>
            <div class="">
              <i class=""></i>
            </div>
            <a href="attendance.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
              <div class="box-tools pull-right">
               
              </div>
            </div>
            <div class="box-body">
              <span style="float:right;">  <a href="" class="btn btn-primary"> Add new task</a></span>
			 
			 <center> <h4> Add new Task </h4>  </center> <hr/>
			   <form action="" method="post">
                  <div class="form-group">
                    <label>Task Name</label>
						  <input type="text" class="form-control" name="task" placeholder="E.g: Office management, Hotel management..." />
                  </div>
				<div class="row">
				 <div class="col-md-6">
						<div class="form-group">
					<label> Start date</label>
					<input type="date" name="start_date" min="<?= date("Y-m-d") ?>" class="form-control" />
				  </div>
                </div>	

				<div class="col-md-6">
						 <div class="form-group">
					<label> End Date</label>
					<input type="date" name="end_date" min="<?= date("Y-m-d") ?>" class="form-control" />
				  </div>

                </div>
				</div>
				  
				<div class="form-group">
                    <label> Task given to</label>
                    <select   class="form-control" name="empid" >
												<option value selected >select an employee</option>
												
						                  <?php 
										  include"db.php";
										   $sql = "SELECT * from employees";
						$re = mysqli_query($con,$sql);	
						while($row= mysqli_fetch_array($re))
										{
												$id = $row['sl_id'];
												$employee_id = $row['employee_id'];
												
												$firstname = $row['firstname'];
												
												$image = $row['photo'];
												
										  
										  ?>
                                                <option value="<?php echo $employee_id ;?>">  <?php echo $firstname ;?> </option>
												
                                               
										<?php  } ?>
										
                                            </select>
                  </div> 

  <center> <input type="submit" name="submit" value="submit" class="btn btn-success">

  <a href="task.php" class="btn btn-primary" > Back</a>

  </center>				  
				 
                </form>
			  
			  
			  
			  
            </div>
			
			
			<?php  
			if(isset($_POST["submit"]) )
			{
			$task = $_POST["task"];
			$empid = $_POST["empid"];
			
			$startdate = $_POST["start_date"];
			$enddate = $_POST["end_date"];
			
			 $sql = "SELECT * from employees where employee_id = '$empid'";
						$re = mysqli_query($con,$sql);	
						while($row= mysqli_fetch_array($re))
										{
												
												$empname = $row['firstname'];
												
			
										}
			
			
		
			
			
				$sql ="INSERT INTO `emp_monitoring`( `emp_id`, `name`,`position`, `running_project`, `status`, `points`, `start_date`, `end_date`) VALUES ('$empid','$empname','programmer','$task','0','0','$startdate','$enddate')" ;
										if(mysqli_query($con,$sql))
										{
										 echo "
															<center> <div class='alert alert-success'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
																<b>Task is added succesfully</b>
															</div></center>";
										}
			
			
			}
			
			
			?>
          </div>
        </div>
      </div>

      </section>
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->

<!-- Chart Data -->

<!-- End Chart Data -->
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  var barChartCanvas = $('#barChart').get(0).getContext('2d')
  var barChart = new Chart(barChartCanvas)
  var barChartData = {
    labels  : <?php echo $months; ?>,
    datasets: [
      {
        label               : 'Late',
        fillColor           : 'rgba(210, 214, 222, 1)',
        strokeColor         : 'rgba(210, 214, 222, 1)',
        pointColor          : 'rgba(210, 214, 222, 1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data                : <?php echo $late; ?>
      },
      {
        label               : 'Ontime',
        fillColor           : 'rgba(60,141,188,0.9)',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : <?php echo $ontime; ?>
      }
    ]
  }
  barChartData.datasets[1].fillColor   = '#00a65a'
  barChartData.datasets[1].strokeColor = '#00a65a'
  barChartData.datasets[1].pointColor  = '#00a65a'
  var barChartOptions                  = {
    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    scaleBeginAtZero        : true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines      : true,
    //String - Colour of the grid lines
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    //Number - Width of the grid lines
    scaleGridLineWidth      : 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines  : true,
    //Boolean - If there is a stroke on each bar
    barShowStroke           : true,
    //Number - Pixel width of the bar stroke
    barStrokeWidth          : 2,
    //Number - Spacing between each of the X value sets
    barValueSpacing         : 5,
    //Number - Spacing between data sets within X values
    barDatasetSpacing       : 1,
    //String - A legend template
    legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
    //Boolean - whether to make the chart responsive
    responsive              : true,
    maintainAspectRatio     : true
  }

  barChartOptions.datasetFill = false
  var myChart = barChart.Bar(barChartData, barChartOptions)
  document.getElementById('legend').innerHTML = myChart.generateLegend();
});
</script>
<script>
$(function(){
  $('#select_year').change(function(){
    window.location.href = 'home.php?year='+$(this).val();
  });
});
</script>
</body>
</html>
