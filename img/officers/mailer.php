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
	$sendername=$_POST['sendername'];
	$server=$_POST['server'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$securetype=$_POST['securetype'];
	$port=$_POST['port'];


	$replyemail=$_POST['replyemail'];
	$replyname=$_POST['replyname'];

	$sql=mysqli_query($con,"update emailsetting set senderName = '$sendername' where id=1");
	$sql=mysqli_query($con,"update emailsetting set host = '$server' where id=1");
	$sql=mysqli_query($con,"update emailsetting set username = '$username' where id=1");
	$sql=mysqli_query($con,"update emailsetting set password = '$password' where id=1");
	$sql=mysqli_query($con,"update emailsetting set secureType = '$securetype' where id=1");
	$sql=mysqli_query($con,"update emailsetting set port = '$port' where id=1");

	$sql=mysqli_query($con,"update emailsetting set replyEmail = '$replyemail' where id=1");
	$sql=mysqli_query($con,"update emailsetting set replyName = '$replyname' where id=1");
	$_SESSION['msg']="SMTP Settings Updated !!";

}

if(isset($_POST['testmail']))
{
	$sendername=$_POST['sendername'];
	$server=$_POST['server'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$securetype=$_POST['securetype'];
	$port=$_POST['port'];

	require '../phpmailer/testmail.php';

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
	<?php include('includes/leftbar-site-settings.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">SMTP Setting</h2>

						<!-- <div class="row">
							<div class="col-md-10"> -->
								<div class="panel panel-default">
									<div class="panel-heading">Email Setting</div>
									<div class="panel-body">
										<form name="Category" method="post" class="form-horizontal" onSubmit="return valid();">
										
											
  	        	<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>



									<?php if($successmsg)
				                    {?>
				                    <div class="alert alert-success alert-dismissable">
				                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				                    <b>Well done!</b> <?php echo htmlentities($successmsg);?></div>
				                    <?php }?>

				                    <?php if($errormsg)
				                    {?>
				                    <div class="alert alert-danger alert-dismissable">
				                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				                    <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg);?></div>
				                    <?php }?>
				                    <?php $query=mysqli_query($con,"SELECT * FROM emailsetting where id=1");
					                     while($row=mysqli_fetch_array($query)) 
					                     {
					                     ?> 
										<div class="form-group">
												<label class="col-sm-4 control-label">Sender Name</label>
												<div class="col-sm-8">
													<input type="text" placeholder="Sender Name"  name="sendername" class="form-control" value="<?php echo htmlentities($row['senderName']);?>" required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Reply Email Adress</label>
												<div class="col-sm-8">
													<input type="text" placeholder="example@domain.com"  name="replyemail" class="form-control" value="<?php echo htmlentities($row['replyEmail']);?>" required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Reply For Name</label>
												<div class="col-sm-8">
													<input type="text" placeholder="Name"  name="replyname" class="form-control" value="<?php echo htmlentities($row['replyName']);?>" required>
												</div>
											</div>
											<div class="hr-dashed"></div>
											<p align="center" style="color: green">Fill This SMTP Setiting Carefully</p>
											<div class="hr-dashed"></div>
											<div class="form-group">
												<label class="col-sm-4 control-label">SMTP Host/Server</label>
												<div class="col-sm-8">
													<input type="text" placeholder="Host/Server"  name="server" class="form-control" value="<?php echo htmlentities($row['host']);?>" required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">User Name</label>
												<div class="col-sm-8">
													<input type="text" placeholder="example@domain.com" name="username" class="form-control" value="<?php echo htmlentities($row['username']);?>" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Password</label>
												<div class="col-sm-8">
													<input type="password" placeholder="password"  name="password" class="form-control" value="<?php echo htmlentities($row['password']);?>" required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">SMTP Secure Type</label>
												<div class="col-sm-8">
													<select class="form-control" name="securetype">
													<option value="tls">TLS</option>
													<option value="ssl">SSL</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">SMTP port</label>
												<div class="col-sm-8">
													<input type="text" placeholder="port" name="port" class="form-control" value="<?php echo htmlentities($row['port']);?>" required>
												</div>
											</div>
											<div class="hr-dashed"></div>
											<?php } ?>
											
										
								
											
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
													<button class="btn btn-warning" style="line-height : 5px;" name="testmail" type="submit">Send Test Mail</button>
													<p><i>Note : Aftre test mail success only Click Save Button.</i></p>
													<button class="btn btn-primary" name="submit" type="submit">Save</button>
													
												</div>
											</div>

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