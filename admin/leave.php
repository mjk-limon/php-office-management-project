<?php include 'includes/session.php'; ?>
<?php
	if(isset($_GET['c'])) {
		if($conn->query("UPDATE emp_leave SET status = '".$_GET['a']."' WHERE id = '".$_GET['c']."'")) {
			header("Location: leave.php");
		} else echo $conn->error;
	}
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  	<?php include 'includes/navbar.php'; ?>
  	<?php include 'includes/menubar.php'; ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Leave Management</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Leave</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
					<p class="text-right"><a href="add_leave.php" class="btn btn-primary"> Add Leave</a></p>
					<table id="example1" class="table table-bordered">
						<thead>
							<tr>
								<th>Empolyee Id</th>
								<th>Empolyee name</th>
								<th>From </th>
								<th>To</th>
								<th>Reason</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						 <?php
							$sl=0; $date = date("Y-m-d");
							$sql1 = "SELECT * from emp_leave ORDER BY id DESC";
							$re1 = mysqli_query($conn, $sql1);	
							while($row= mysqli_fetch_array($re1)) {
								$id = $row['id'];
								$empid = $row['empid'];
								$name = $row['name'];
								$from = $row['from'];
								$to = $row['to'];
								$desc = $row['reason'];
								$sl++;
								if($row['status'] == 3) continue;
								switch($row['status']) {
									case '0': $status = '<a href="?c='.$id.'&a=1">Confirm Now</a> - <a href="?c='.$id.'&a=2">Cancel</a>'; break;
									case '1': $status = 'Confimed'; break;
									case '2': $status = 'Cancelled'; break;
									default: break;
								}
						?>
							<tr>
								<td><?php echo $empid; ?></td>
								<td><?php echo $name; ?></td>
								<td><?php echo $from; ?></td>
								<td><?php echo $to; ?></td>
								<td><?php echo $desc; ?></td>
								<td><?= $status  ?></td>
								<td><a href="?lid=<?php echo $id;?>" class="btn btn-danger">Delete</a></td>
						  </tr>
						  <?php } ?>
						</tbody>
					</table>
            </div>
			<?php
				if(isset($_GET["lid"])) {
					$empdlt = $_GET["lid"];	
					$sql = "DELETE FROM emp_leave WHERE id = '$empdlt'";
					if($conn->query($sql)){
						echo "<center> <div class='alert alert-success'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>Leave is deleted</b>
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
