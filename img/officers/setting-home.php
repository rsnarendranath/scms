
<?php
session_start();
error_reporting(0);
include('../config/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
   $query=mysqli_query($con,"SELECT setting_description FROM genaralsetting where id=3");
                     while($row=mysqli_fetch_array($query)) 
                     {
date_default_timezone_set($row['setting_description']);
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_POST['submit']))
{
	$status=0;
	$id = 1;
	$sql=mysqli_query($con,"update settinghome set status = '$status' where id='$id'");
	$_SESSION['msg']="Stack Bar Activated !!";
}

if(isset($_POST['submit2']))
{
	$status=1;
	$id = 1;
	$sql=mysqli_query($con,"update settinghome set status = '$status' where id='$id'");
	$_SESSION['msg']="Stack Bar Deactivated !!";
}

if(isset($_POST['submit3']))
{
	$status=0;
	$id = 2;
	$sql=mysqli_query($con,"update settinghome set status = '$status' where id='$id'");
	$_SESSION['msg']="Card Section Activated !!";
}

if(isset($_POST['submit4']))
{
	$status=1;
	$id = 2;
	$sql=mysqli_query($con,"update settinghome set status = '$status' where id='$id'");
	$_SESSION['msg']="Card Section Deactivated !!";
}

if(isset($_POST['submit5']))
{
	$status=0;
	$id = 3;
	$sql=mysqli_query($con,"update settinghome set status = '$status' where id='$id'");
	$_SESSION['msg']="Service Section Activated !!";
}

if(isset($_POST['submit6']))
{
	$status=1;
	$id = 3;
	$sql=mysqli_query($con,"update settinghome set status = '$status' where id='$id'");
	$_SESSION['msg']="Service Section Deactivated !!";
}

}
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="theme-color" content="#3e454c">

	<?php $query=mysqli_query($con,"SELECT * FROM genaralsetting where id=9");
    while($row=mysqli_fetch_array($query)) 
    {
     ?>
	<meta name="description" content="<?php echo htmlentities($row['setting_description']);?>"><?php }?>
	<?php $query=mysqli_query($con,"SELECT * FROM genaralsetting where id=10");
    while($row=mysqli_fetch_array($query)) 
    {
     ?>
  	<meta name="keywords" content="<?php echo htmlentities($row['setting_description']);?>"><?php }?>

  	<?php $query=mysqli_query($con,"SELECT * FROM genaralsetting where id=11");
    while($row=mysqli_fetch_array($query)) 
    {
     ?>
     <link rel="shortcut icon" type="image/x-icon" href="../images/favicon/<?php echo htmlentities($row['setting_description']);?>"/><?php }?>
	
	<?php $query=mysqli_query($con,"SELECT * FROM genaralsetting where id=1");
    while($row=mysqli_fetch_array($query)) 
    {
     ?>  
    <title><?php echo htmlentities($row['setting_description']);?></title><?php }?>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Home Page Setting</h2>

						<!-- <div class="row">
							<div class="col-md-10"> -->
								<div class="panel panel-default">
									<div class="panel-heading">Activate Section</div>
									<div class="panel-body">
										<form method="post" class="form-horizontal">
										
											
  	        	<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>

											<div class="form-group">
											<label class="col-sm-4 control-label">stack Bar Section ?</label>
											<div class="col-sm-8">
													<?php 
													$id=1;
													$query=mysqli_query($con,"SELECT status FROM settinghome where id='$id'");
					                     			while($row=mysqli_fetch_array($query)) 

																$status	= $row['status'];

																if($status==1)
													{
														?>
													<button class="btn btn-primary" name="submit" type="submit">Activated</button>
													<?php } else {?>
														<button class="btn btn-primary" style="background-color: #f44336;" name="submit2" type="submit2">Not Activated</button><?php }?>
												</div>
											</div>
											<div class="hr-dashed"></div>

											<div class="form-group">
												<label class="col-sm-4 control-label">card Section ?</label>
												<div class="col-sm-8">
													<?php 
													$id=2;
													$query=mysqli_query($con,"SELECT status FROM settinghome where id='$id'");
					                     			while($row=mysqli_fetch_array($query)) 

																$status	= $row['status'];

																if($status==1)
													{
														?>
													<button class="btn btn-primary" name="submit3" type="submit3">Activated</button>
													<?php } else {?>
														<button class="btn btn-primary" style="background-color: #f44336;" name="submit4" type="submit4">Not Activated</button><?php }?>
												</div>
												</div>
											<div class="hr-dashed"></div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Service Section ?</label>
												<div class="col-sm-8">
													<?php 
													$id=3;
													$query=mysqli_query($con,"SELECT status FROM settinghome where id='$id'");
					                     			while($row=mysqli_fetch_array($query)) 

																$status	= $row['status'];

																if($status==1)
													{
														?>
													<button class="btn btn-primary" name="submit5" type="submit5">Activated</button>
													<?php } else {?>
														<button class="btn btn-primary" style="background-color: #f44336;" name="submit6" type="submit6">Not Activated</button><?php }?>

														</div>
												</div>
											<div class="hr-dashed"></div>



										</form>


										
				
			
			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
<?php } ?>