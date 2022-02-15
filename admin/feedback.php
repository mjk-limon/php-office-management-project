

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
                <form class="form-inline">
                  <div class="form-group">
                    <label> </label>
                    <select class="form-control input-sm" id="select_year">
                      
                    </select>
                  </div>
                </form>
              </div>
            </div>
            <div class="box-body">
              <span style="float:right;">  <a href="newtask.php" class="btn btn-primary"> Add new task</a></span>
			 
			 
			 
			 <?php
			    $proid = $_GET["id"];
			 
			  include "db.php";
			   $sql = "SELECT * from emp_monitoring where id = $proid";
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
										}
			 
			 ?>
			 
			 
			 
			 
			 
			 <form action="" method="post">
			 
			 <div class="form-group">
			 <label> Employee Id </label>
			 <input type="text" name="" value="<?php echo $empid ;?>"  class="form-control" readonly />
			 
			 </div>
			 
			 <div class="form-group">
			 <label> Project Name </label>
			 <input type="text" name="" value="<?php echo $task ;?>" class="form-control" readonly />
			 
			 </div>
			 
			 
			 <div class="form-group">
			 <label> points </label>
			 <input type="number" name="point" class="form-control"/>
			 
			 </div>
			 
			 
			 
			 
			 <div class="form-group">
			 <label> Feedback </label>
			 <textarea type="text" name="commend" class="form-control"> </textarea>
			 
			 </div>
			 
			 <input type="submit" name="feedback" value="submit" class="btn btn-primary"/>
			 
			 
			 
			 </form>
			
			  
			  
			  
			  
			  
            </div>
			
			
			<?php
			if(isset($_POST["feedback"]))
			{
				$point = $_POST["point"];
				$feedback = $_POST["commend"];
				
				
				
				$sql = "UPDATE emp_monitoring SET points ='$point',feedback = '$feedback'  WHERE id = '$proid' ";
	
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>project Feedback is updated</b>
				</div>";

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
