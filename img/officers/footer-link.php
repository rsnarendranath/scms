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
	$applink=$_POST['applink'];
	$applelink=$_POST['applelink'];
	$fblink=$_POST['fblink'];
	$twitterlink=$_POST['twitterlink'];
	$sql=mysqli_query($con,"UPDATE footerlink SET link='$applink' WHERE id=1");
	$sql=mysqli_query($con,"UPDATE footerlink SET link='$fblink' WHERE id=2");
	$sql=mysqli_query($con,"UPDATE footerlink SET link='$twitterlink' WHERE id=3");
	$sql=mysqli_query($con,"UPDATE footerlink SET link='$applelink' WHERE id=6");
	$_SESSION['msg']="Footer Link Updated";
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
	<?php include('includes/leftbar-site-settings.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Footer Link</h2>

						<!-- <div class="row">
							<div class="col-md-10"> -->
								<div class="panel panel-default">
									<div class="panel-heading">Update Footer Links</div>
									<div class="panel-body">
										<form method="post"  class="form-horizontal">
										<p style="color: red">if you not have to insert URL/Link Please Fill it using # Mark</p>
											
  	        	  <?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>
										<?php $query=mysqli_query($con,"SELECT * FROM footerlink where id=1");
					                     while($row=mysqli_fetch_array($query)) 
					                     {
					                     ?> 
											<div class="form-group">
												<label class="col-sm-4 control-label">Google Play Store Link</label>
												<div class="col-sm-8">
													<input type="text" placeholder="Enter Google Play Store Link"  name="applink" class="form-control" required
													value="<?php echo htmlentities($row['link']);?>" >
												</div><?php } ?>
											</div>

											<?php $query=mysqli_query($con,"SELECT * FROM footerlink where id=6");
					                     while($row=mysqli_fetch_array($query)) 
					                     {
					                     ?> 
											<div class="form-group">
												<label class="col-sm-4 control-label">Apple App Store Link</label>
												<div class="col-sm-8">
													<input type="text" placeholder="Enter Apple App Store Link"  name="applelink" class="form-control" required
													value="<?php echo htmlentities($row['link']);?>" >
												</div><?php } ?>
											</div>
											<div class="hr-dashed"></div>
										<?php $query=mysqli_query($con,"SELECT * FROM footerlink where id=2");
					                     while($row=mysqli_fetch_array($query)) 
					                     {
					                     ?>
											<div class="form-group">
												<label class="col-sm-4 control-label">Facebook</label>
												<div class="col-sm-8">
													<input type="text" placeholder="Enter Facebook Link"  name="fblink" class="form-control" required value="<?php echo htmlentities($row['link']);?>" >
												</div><?php } ?>
											</div>
										<?php $query=mysqli_query($con,"SELECT * FROM footerlink where id=3");
					                     while($row=mysqli_fetch_array($query)) 
					                     {
					                     ?>
											<div class="form-group">
												<label class="col-sm-4 control-label">Twitter</label>
												<div class="col-sm-8">
													<input type="text" placeholder="Enter Twitter Link"  name="twitterlink" class="form-control" required value="<?php echo htmlentities($row['link']);?>" >
												</div><?php } ?>
											</div>

											<div class="hr-dashed"></div>
										
								
											
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								
													<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
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