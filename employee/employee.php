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
      <h1>
        Employee Info
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Employees</li>
        <li class="active">Employee Info</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
					<table class="table">
						<tr>
							<td width="80%">
								<p><strong>Full Name: </strong><?= $user_info['firstname']." ".$user_info['lastname'] ?></p>
								<p><strong>Employee ID: </strong><?= $user_info['employee_id'] ?></p>
								<p><strong>Position: </strong><?= $user_info['position_id'] ?></p>
								<p><strong>Schedule: </strong><?= $user_info['schedule_id'] ?></p>
								<p><strong>Address: </strong><?= $user_info['address'] ?></p>
								<p><strong>Birthdate: </strong><?= $user_info['birthdate'] ?></p>
								<p><strong>Contact Info: </strong><?= $user_info['contact_info'] ?></p>
								<p><strong>Gender: </strong><?= $user_info['gender'] ?></p>
								<p><strong>Member Since: </strong><?= $user_info['created_on'] ?></p>
							</td>
							<td width="" rowspan="10">
								<img src="<?php echo (!empty($user_info['photo'])) ? '../images/'.$user_info['photo'] : '../images/profile.jpg'; ?>" class="img-responsive" alt="User Image">
							</td>
						</tr>
					</table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/employee_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
</body>
</html>
