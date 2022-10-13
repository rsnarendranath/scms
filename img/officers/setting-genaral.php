
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
	$title=$_POST['title'];
	$link=$_POST['link'];
	
	$currency=$_POST['currency'];
	$description=$_POST['description'];
	$keywords=$_POST['keywords'];
	$sql=mysqli_query($con,"update genaralsetting set setting_description = '$title' where id=1");
	$sql=mysqli_query($con,"update genaralsetting set setting_description = '$link' where id=2");
	
	$sql=mysqli_query($con,"update genaralsetting set setting_description = '$currency' where id=8");
	$sql=mysqli_query($con,"update genaralsetting set setting_description = '$description' where id=9");
	$sql=mysqli_query($con,"update genaralsetting set setting_description = '$keywords' where id=10");
	$_SESSION['msg']="Settings Updated !!";

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
					
						<h2 class="page-title">Site Genaral Setting</h2>

						<!-- <div class="row">
							<div class="col-md-10"> -->
								<div class="panel panel-default">
									<div class="panel-heading">Genaral Setting</div>
									<div class="panel-body">
										<form name="Category" method="post" class="form-horizontal" onSubmit="return valid();">
										
											
  	        	<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>
										 <?php $query=mysqli_query($con,"select setting_description from genaralsetting where id=4");
										 while($row=mysqli_fetch_array($query)) 
										 {
										 ?>                       
										<div class="form-group">
												<label class="col-sm-4 control-label">Site Logo</label>
												<div class="col-sm-8">
													<?php $logophoto=$row['setting_description'];
													if($logophoto==""):
													?>
													<img src="../images/logo/logo.png" width="256" height="80" >
													<?php else:?>
														<img src="../images/logo/<?php echo htmlentities($logophoto);?>" width="256" height="80" >

													<?php endif;?><?php } ?><br>
													<strong><a href="update-logo.php">Click Here to Change Web site Logo</a></strong>
												</div>
											</div>

											<?php $query=mysqli_query($con,"select setting_description from genaralsetting where id=5");
										 while($row=mysqli_fetch_array($query)) 
										 {
										 ?>                       
										<div class="form-group">
												<label class="col-sm-4 control-label">Slider Banner 01</label>
												<div class="col-sm-8">
													<?php $banner=$row['setting_description'];
													if($banner==""):
													?>
													<img src="../images/banner/logo.png" width="256" height="80" >
													<?php else:?>
														<img src="../images/banner/<?php echo htmlentities($banner);?>" width="256" height="80" >

													<?php endif;?><?php } ?><br>
													
												</div>
											</div>

											<?php $query=mysqli_query($con,"select setting_description from genaralsetting where id=6");
										 while($row=mysqli_fetch_array($query)) 
										 {
										 ?>                       
										<div class="form-group">
												<label class="col-sm-4 control-label">Slider Banner 02</label>
												<div class="col-sm-8">
													<?php $banner=$row['setting_description'];
													if($banner==""):
													?>
													<img src="../images/banner/logo.png" width="256" height="80" >
													<?php else:?>
														<img src="../images/banner/<?php echo htmlentities($banner);?>" width="256" height="80" >

													<?php endif;?><?php } ?><br>
													<strong><a href="update-slider-banner.php">Click Here to Change Slider Banners</a></strong>
												</div>
											</div>

											<?php $query=mysqli_query($con,"select setting_description from genaralsetting where id=11");
										 while($row=mysqli_fetch_array($query)) 
										 {
										 ?>                       
										<div class="form-group">
												<label class="col-sm-4 control-label">Favicon</label>
												<div class="col-sm-8">
													<?php $favicon=$row['setting_description'];
													if($favicon==""):
													?>
													<img src="../images/favicon/favicon.ico" width="50" height="50" >
													<?php else:?>
														<img src="../images/favicon/<?php echo htmlentities($favicon);?>" width="50" height="50" >

													<?php endif;?><?php } ?><br>
													<strong><a href="update-favicon.php">Click Here to Change Favicon</a></strong>
												</div>
											</div>

										<?php $query=mysqli_query($con,"SELECT setting_description FROM genaralsetting where id=1");
					                     while($row=mysqli_fetch_array($query)) 
					                     {
					                     ?> 
											<div class="form-group">
												<label class="col-sm-4 control-label">Site Title</label>
												<div class="col-sm-8">
													<input type="text" placeholder="Enter Site Title" value="<?php echo htmlentities($row['setting_description']);?>" name="title" class="form-control" required><?php } ?>
												</div>
											</div>

											<?php $query=mysqli_query($con,"SELECT setting_description FROM genaralsetting where id=9");
					                     while($row=mysqli_fetch_array($query)) 
					                     {
					                     ?> 
											<div class="form-group">
												<label class="col-sm-4 control-label">Site Description</label>
												<div class="col-sm-8">
													<input type="text" placeholder="Enter Site Description" value="<?php echo htmlentities($row['setting_description']);?>" name="description" class="form-control" required><?php } ?>
												</div>
											</div>

											<?php $query=mysqli_query($con,"SELECT setting_description FROM genaralsetting where id=2");
					                     while($row=mysqli_fetch_array($query)) 
					                     {
					                     ?> 
											<div class="form-group">
												<label class="col-sm-4 control-label">Site Link</label>
												<div class="col-sm-8">
													<input type="text" placeholder="http://yourwebsite.com" value="<?php echo htmlentities($row['setting_description']);?>" name="link" class="form-control" required>
												</div><?php } ?>
											</div>
											
											<?php $query=mysqli_query($con,"SELECT setting_description FROM genaralsetting where id=8");
					                     while($row=mysqli_fetch_array($query)) 
					                     {
					                     ?> 
											<div class="form-group">
												<label class="col-sm-4 control-label">Site Currency</label>
												<div class="col-sm-8">
													<input type="text" placeholder="Enter Site Currency" value="<?php echo htmlentities($row['setting_description']);?>" name="currency" class="form-control" required><?php } ?>
												</div>
											</div>

											<?php $query=mysqli_query($con,"SELECT setting_description FROM genaralsetting where id=10");
					                     while($row=mysqli_fetch_array($query)) 
					                     {
					                     ?> 
											<div class="form-group">
												<label class="col-sm-4 control-label">Site Keywords</label>
												<div class="col-sm-8">
													<input type="text" placeholder="Enter Site Keywords" value="<?php echo htmlentities($row['setting_description']);?>" name="keywords" class="form-control" required><?php } ?>
												</div>
											</div>
											<?php $query=mysqli_query($con,"select setting_description from genaralsetting where id=7");
										 while($row=mysqli_fetch_array($query)) 
										 {
										 ?>                       
										<div class="form-group">
												<label class="col-sm-4 control-label">Home Page Buttom Banner</label>
												<div class="col-sm-8">
													<?php $btmbanner=$row['setting_description'];
													if($btmbanner==""):
													?>
													<a href="update-home-buttom-banner.php"><img src="../images/buttom/noimage.jpg" width="256" height="80" ></a>
													<?php else:?>
														<a href="update-home-buttom-banner.php"><img src="../images/buttom/<?php echo htmlentities($btmbanner);?>" width="256" height="80" ></a>

													<?php endif;?><?php } ?><br>
													<strong><a href="update-home-buttom-banner.php">Click Here to Change Web site Logo</a></strong>
												</div>
											</div>
											<div class="hr-dashed"></div>

											
										
								
											
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								
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