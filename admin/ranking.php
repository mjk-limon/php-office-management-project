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
      <h1>Ranking</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Ranking</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
				<div class="box-body">      
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<tr>
							<th>Empolyee Id</th>
							<th>Empolyee name</th>
							<th>Position</th>
							<th>Task completed</th>
							<th>Attendance(day)</th>
							<th>Late(hrs)</th>
							<th>Overtime(hrs)</th>
							<th>Total points</th>
							<th>Ranking</th>
							<th>Action</th>
						</tr>
					<?php
						include "db.php";
						$sl=0; $date = date("Y-m-d"); $emp_ids = array(); $emp_points = array();
						class basicDB {
							public function get_single_index_data($tablename, $index, $extra_sql = true) {
								global $con;
								$sql = "SELECT {$index} FROM {$tablename} ";
								$sql.= "WHERE ".$extra_sql." ";
								$sql.= "LIMIT 1";
								
								//echo $sql;
								$row = $con->query($sql)->fetch_assoc();
								return $row[$index];
							}
							public function get_total_rows($tablename, $extra_sql = true, $index = '*') {
								global $con;
								$sql = "SELECT {$index} FROM {$tablename} ";
								$sql.= "WHERE ".$extra_sql." ";
								$num = $con->query($sql)->num_rows;
								return $num;
							}
						}
						$func = new basicDB();
						
						
						$sql = "SELECT * from emp_monitoring GROUP BY emp_id ORDER BY points DESC";
						$re = mysqli_query($con, $sql);	
						while($row= mysqli_fetch_array($re)) {
							$emp_ids[] = $row['emp_id'];
							$emp_serial = $func->get_single_index_data("employees", "id", "employee_id = '{$row['emp_id']}'");
							// Original point 
							$org_point = $row['points'];
							// Attendance point
							$usschedule_id = $func->get_single_index_data("employees", "schedule_id", "employee_id = '{$row['emp_id']}'");
							$res_sch_info = $func->get_single_index_data("schedules", "time_in", "id = '{$usschedule_id}'");
							$att_point = 0; $att_full = 0; $late_full = 0;
							$res_att = $con->query("SELECT * FROM attendance WHERE employee_id ='{$emp_serial}'");
							while($row_att = $res_att->fetch_array()) {
								$late_hrs = abs(strtotime($row_att['time_in']) - strtotime($res_sch_info));
								$late_hrs = round($late_hrs / 3600, 2);
								$att_full += 1;
								$late_full += $late_hrs;
								$att_point += round(1-($late_hrs*0.111111), 2);
							}
							// Overtime point
							$ot_point = 0; $ot_hours = 0;
							$res_ot = $con->query("SELECT * FROM overtime WHERE employee_id = '{$emp_serial}' ");
							while($row_ot = $res_ot->fetch_array()){
								$ot_hours += $row_ot['hours'];
								$ot_point += round(($row_ot['hours']*0.2), 2);
							}
							$emp_att[] = $att_full;
							$emp_late[] = $late_full;
							$emp_ot[] = $ot_hours;
							$emp_points[] = $org_point+$att_point+$ot_point;
						}
					?>
					<?php
						rsort($emp_points);
						foreach($emp_points as $key=>$point) {
							$emp_info = $con->query("SELECT * FROM employees WHERE employee_id = '{$emp_ids[$key]}' LIMIT 1")->fetch_assoc();
					?>
						<tr>
							<td><?php echo $emp_info['employee_id']; ?></td>
							<td><?php echo $emp_info['firstname'].' '.$emp_info['lastname'];; ?></td>
							<td><?php echo $func->get_single_index_data("position", "description", "id= '{$emp_info['position_id']}' "); ?></td>
							<td> 
							<?php
								$sql2 = "SELECT * from emp_monitoring where emp_id = '{$emp_info['employee_id']}' and status = 1 ";
								$re2 = mysqli_query($con,$sql2);	
								echo mysqli_num_rows($re2);
							?>
							</td>
							<td><?= $emp_att[$key] ?></td>
							<td><?= $emp_late[$key] ?></td>
							<td><?= $emp_ot[$key] ?></td>
							<td><?php echo $point; ?></td>
							<td><?php echo ($key+1);?></td>
							<td><a href="" class="btn btn-primary">View Details</a></td>
						</tr>
					<?php } ?>
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
