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
	$province=$_POST['province'];
	$fullname=$_POST['fullname'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$contactno=$_POST['contactno'];
	$status=1;
	$usertype=2;
	$nicadmin='admin';
	$pw = $_POST['password'];
	$query=mysqli_query($con,"insert into users(province,fullName,userEmail,password,contactNo,status,usertype,nic) values('$province','$fullname','$email','$password','$contactno','$status','$usertype','$nicadmin')");

	$msg="Provincial Admin Added successfully.";
		
		
	$weburl=mysqli_query($con,"SELECT * FROM genaralsetting where id=2");
	while($row=mysqli_fetch_array($weburl)) 
	{
		$sitelink = $row['setting_description'];
      	require '../phpmailer/addprovinceadminmail.php';
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

</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Add Provincial Admin</h2>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Provincial Admin Details</div>

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
<label class="col-sm-2 control-label">Province<span style="color:red">*  </span></label>
<div class="col-sm-4">
<select name="province" class="form-control"  required autofocus> 
<option value="">Select Province</option> 
<?php $query=mysqli_query($con,"select * from province");
while($row=mysqli_fetch_array($query))
{?>

<option value="<?php echo $row['id'];?>"><?php echo $row['provinceName'];?></option>
<?php } ?>
</select>
</div>
<label class="col-sm-2 control-label">Full Name<span style="color:red">* </span></label>
<div class="col-sm-4">
<input type="text" name="fullname" required="required" placeholder="Full Name" class="form-control">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Email id<span style="color:red">* </label>
<div class="col-sm-4">
<input type="email" id="email" onBlur="userAvailability()" name="email" required="required" class="form-control" placeholder="E-Mail">
<span id="user-availability-status1" style="font-size:12px;"></span>
</div>
<label class="col-sm-2 control-label">Contact No</label>
<div class="col-sm-4">
<input type="text" maxlength="10" name="contactno" placeholder="Contact No"  class="form-control">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Password<span style="color:red">* </label>
<div class="col-sm-4">
<input type="text" id="password" name="password" required="required" class="form-control" placeholder="Password">
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