
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
	$id=intval($_GET['id']);
	$header=$_POST['header'];
	$lineone=$_POST['lineone'];
	$linetwo=$_POST['linetwo'];
	$btnurl=$_POST['btnurl'];
	$btnname=$_POST['btnname'];
	$startdate=$_POST['startdate'];
	$nodays=$_POST['nodays'];
	$expire= date('Y-m-d', strtotime($startdate . '+ '.$nodays.'days'));
	$status = $_REQUEST['status'];
    if ($status == 1 )
      {
        $status = 1;
        $statactive="Slider Banner Activated !!";
      }
    else
     {
       $status = 0;
       $statdeactive="Slider Banner Deactivated !!";
     }
	// $sql=mysqli_query($con,"insert into sliderbanner(header,firstline,secondline,link,buttonname) values('$header','$lineone','$linetwo','$btnurl','$btnname') selec id ='$id'");
	$sql=mysqli_query($con,"update sliderbanner set header = '$header',firstline = '$lineone',secondline = '$linetwo',link = '$btnurl',buttonname = '$btnname',status = '$status',startdate='$startdate',nodays='$nodays',expire='$expire' where id ='$id'");
	$_SESSION['msg']="Slider Banner Content Updated";

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

<script src="http://res.cloudinary.com/vsevolodts/raw/upload/v1503371762/timeit.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Edit Slider Banner</h2>
  	        	 <?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>
						<!-- <div class="row">
							<div class="col-md-10"> -->
								<p><a href="slider-banner.php"><< back to Announcement</a></p>

								<div class="panel panel-default">

									<div class="panel-heading">Banner Details</div>
									<div class="panel-body">
										<form name="Category" method="post" class="form-horizontal" onSubmit="return valid();">


            <?php if(isset($statactive)){?>
            <div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<?php echo htmlentities($statactive);?> 
			</div><?php } ?>

			 <?php if(isset($statdeactive)){?>
            <div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<?php echo htmlentities($statdeactive);?> 
			</div><?php } ?>

											<?php
											$id=intval($_GET['id']);
											$query=mysqli_query($con,"SELECT * FROM sliderbanner where id='$id'");
					                     while($row=mysqli_fetch_array($query)) 
					                     {
					                     ?> 


											<div class="form-group">
												<label class="col-sm-4 control-label">Banner Header</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" placeholder="Enter Header Text" value="<?php echo htmlentities($row['header']);?>" name="header" required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">First Line Text</label>
												<div class="col-sm-8">
													<textarea class="form-control" name="lineone" required ><?php echo htmlentities($row['firstline']);?></textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Second Line Text</label>
												<div class="col-sm-8">
													<textarea class="form-control" name="linetwo" required ><?php echo htmlentities($row['secondline']);?></textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Button URL</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" placeholder="Enter Butto URL"  name="btnurl" value="<?php echo htmlentities($row['link']);?>" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Button Name</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" placeholder="Enter Button Name" value="<?php echo htmlentities($row['buttonname']);?>" name="btnname" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Start Date</label>
												<div class="col-sm-8">
													<input type="date" class="form-control" placeholder="Enter Button Name"  name="startdate" >
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">No of Date</label>
												<div class="col-sm-8">
													<input type="number" class="form-control" placeholder="Enter No of days" value="<?php echo htmlentities($row['nodays']);?>" name="nodays" ><?php } ?>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">is Activate ?</label>
												<div class="col-sm-8">
													<?php 
													$id=intval($_GET['id']);
													$query=mysqli_query($con,"SELECT status FROM sliderbanner where id='$id'");
					                     			while($row=mysqli_fetch_array($query)) 

																$status	= $row['status'];

																if($status==1)
													{
														?>
													<input type="checkbox" class="awesome-bootstrap-checkbox" checked value="0"  name="status" >
													<?php } else {?>
														<input type="checkbox" class="awesome-bootstrap-checkbox" unchecked value="1"  name="status" ><?php } ?>
												</div>
											</div>
											<div class="hr-dashed"></div>

											
										
								
											
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								
													<button class="btn btn-primary" name="submit" type="submit">Submit</button>
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