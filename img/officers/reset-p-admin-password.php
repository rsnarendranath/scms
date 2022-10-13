<?php
session_start();
error_reporting(0);
include('../config/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_POST['submit']))
{
	$id=intval($_GET['id']);
	$password=md5($_POST['password']);
	$pw =$_POST['password'];
	$query=mysqli_query($con,"update users set password = '$password' where id='$id'");
	$msg="password Update successfuly.";

      	$weburl=mysqli_query($con,"SELECT * FROM genaralsetting where id=2");
		while($row=mysqli_fetch_array($weburl)) 
		{
			$sitelink = $row['setting_description'];

			$query=mysqli_query($con,"SELECT fullName,userEmail FROM users where id='$id'");
			while($row=mysqli_fetch_array($query)) 
			{
				$fullName = $row['fullName'];
				$email = $row['userEmail'];
	      		require '../phpmailer/provincialadminpwresetmail.php';
	      	}
      		
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
<script>
		function userAvailability() {
		$("#loaderIcon").show();
		jQuery.ajax({
		url: "check_availability.php",
		data:'email='+$("#email").val(),
		type: "POST",
		success:function(data){
		$("#user-availability-status1").html(data);
		$("#loaderIcon").hide();
		},
		error:function (){}
		});
		}
</script>
<script>
function valid()
{
  var passowrd = document.getElementById("find").value;
  var confirmpassword = document.getElementById("confirmpassword").value;

if(passowrd!= confirmpassword)
{
document.getElementById("passerror").innerHTML="Password and Confirm Password Field do not match  !!";
document.getElementById("submit").disabled = true;
}
else
{
  document.getElementById("passerror").innerHTML="";
  document.getElementById("submit").disabled = false;
}

}
</script>
</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Provincial Admin Password Reset</h2>
						<?php 
						$id=intval($_GET['id']);
						$query=mysqli_query($con,"select * from users where id='$id'");
						while($row=mysqli_fetch_array($query))
						{?>
						<div class="row">
							<div class="col-md-12">
									<p><a href="edit-p-admin.php?id=<?php echo $row['id']?>"><< Edit Provincial Admin Details</a></p>
									<p><a href="manage-p-admin.php"><< Manage Provincial Admin</a></p>
								<div class="panel panel-default">
									<div class="panel-heading"><b>User Name :</b> <?php echo htmlentities($row['fullName']);?> <br><b>User Email :</b> <?php echo htmlentities($row['userEmail']);?></div><?php } ?>

									<div class="panel-body">
<form name="state" method="post" class="form-horizontal" >
	<p style="padding-left: 1%; color: green">
              <?php if(isset($msg)){
            echo htmlentities($msg);
                }?>
            </p>
            <p style="padding-left: 1%; color: green">
              <?php if(isset($successmsg)){
            echo htmlentities($successmsg);
                }?>
            </p>
            <p style="padding-left: 1%; color: red">
              <?php if(isset($errormsg)){
            echo htmlentities($errormsg);
                }?>
            </p>


<div class="form-group">
<label class="col-sm-2 control-label">password<span style="color:red">* </span></label>
<div class="col-sm-4">
<input type="password" class="form-control" required="required" name="password" Placeholder="password" id="find" />
              
</div>
<label class="col-sm-2 control-label">confirm password<span style="color:red">* </label>
<div class="col-sm-4">
<input type="password" class="form-control" name="password"  Placeholder="confirm password" id="confirmpassword" onmouseout="valid()" />
<span id="passerror" style="font-size:12px; color: red;"></span>
</div>
</div>



											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-default" type="reset">Cancel</button>
													<button class="btn btn-primary" name="submit" type="submit">Save</button>
												</div>
											</div>

										</form>
									</div>
								</div>
							</div>
						</div>
						
					

					</div>
				</div>
				
			

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