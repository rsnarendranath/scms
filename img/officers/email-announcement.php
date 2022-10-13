
<?php
session_start();
error_reporting(0);
include('../config/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

if(isset($_POST['send']))
{
	$subject=$_POST['subject'];
	$body=$_POST['body'];
	$towho=$_POST['towho'];

	if (empty($body)) 
	{
		$errmsg="Please Fill Body";
	}
	else
	{
		if ($towho==1) 
		{
			$sql=mysqli_query($con,"insert into maillist(subject,body) values('$subject','$body')");
			if($sql == true)
			{
			    require '../phpmailer/tousermail.php';
			    $donemsg="Email Successfully Sended To Users";
			}
			else
			{
			    $errmsg="Error ! Mail Not Sended";
			}
		}
		elseif ($towho==2) 
		{
			$sql=mysqli_query($con,"insert into maillist(subject,body) values('$subject','$body')");
			
			if($sql == true)
			{
			    require '../phpmailer/topadminmail.php';
			    $donemsg="Email Successfully Sended To Provincial Admins";
			}
			else
			{
			    $errmsg="Error ! Mail Not Sended";
			}
			
		}
		elseif ($towho==3) 
		{
			$sql=mysqli_query($con,"insert into maillist(subject,body) values('$subject','$body')");
			
			if($sql == true)
			{
			    require '../phpmailer/toallmail.php';
			    $donemsg="Email Successfully Sended To Users And Provincial Admins";
			}
			else
			{
			    $errmsg="Error ! Mail Not Sended";
			}
			
		}
		else
		{
			$errmsg="Please Selct To Whome";
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
					
						<h2 class="page-title">Mail List</h2>

						<!-- <div class="row">
							<div class="col-md-10"> -->
								<div class="panel panel-default">
									<div class="panel-heading">Send Emails</div>
									<div class="panel-body">
										<form name="Category" method="post" class="form-horizontal" id="myFormName">
										
											
	  	        	<?php if($donemsg)
	                {?>
	                <div class="alert alert-success alert-dismissable">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <b>Well Done ! </b> <?php echo htmlentities($donemsg);?></div>
	                <?php }?>

					<?php if($errmsg)
                    {?>
                    <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b>Oh Snap ! </b> </b> <?php echo htmlentities($errmsg);?></div>
                    <?php }?>

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
												<label class="col-sm-4 control-label">E Mail Subject</label>
												<div class="col-sm-8">
													<input type="text" placeholder="Enter Subject" value="<?php echo htmlentities($row['secret_key']);?>" name="subject" class="form-control" required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">E Mail Body<br>(HTML SUPPORTED)</label>
												<div class="col-sm-8">
													<textarea style="width: 680px; height: 200px;" name="body" id="myArea2" onclick ="addArea2();"></textarea>
												</div>
											</div>
											<div class="hr-dashed"></div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Select To Whom</label>
												<div class="col-sm-8">
													<select class="form-control" name="towho" required>
														<option value="0">Select whom</option>
														<option value="1">To Users</option>
														<option value="2">To Provincial Admins</option>
														<option value="3">To All</option>
													</select>
												</div>
											</div>


											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
													<button class="btn btn-primary" name="send" type="submit">Send Mail</button>
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

	<script src="../nicEdit.js" type="text/javascript"></script>
	<script>
	var area2;

	function addArea2() {
	area2 = new nicEditor({fullPanel : true}).panelInstance('myArea2');
}
	bkLib.onDomLoaded(function() { toggleArea1(); });
	</script>	

</body>

</html>
<?php } ?>