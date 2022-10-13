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
	$header_en=$_POST['header_en'];
	$header_si=$_POST['header_si'];
	$header_ta=$_POST['header_ta'];
	$description_en=$_POST['discription_en'];
	$description_si=$_POST['discription_si'];
	$description_ta=$_POST['discription_ta'];
	$link=$_POST['link'];
	$sql=mysqli_query($con,"update services set header_en = '$header_en',header_si = '$header_si',header_ta = '$header_ta',description_en = '$description_en',description_si = '$description_si',description_ta = '$description_ta',link='$link' where id ='$id'");
	$_SESSION['msg']="Services Update Successful !!";

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

	<link rel="stylesheet" type="text/css" href="css/customFont.css" />
<script type="text/javascript" src="js/nicEdit_dev.js"></script>

	<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<script type="text/javascript" src="nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
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
					
						<h2 class="page-title">Manage Pages </h2>

						<!-- <div class="row">
							<div class="col-md-10"> -->
								<p><a href="service-section.php"><< back to Service Section</a></p>
								<div class="panel panel-default">
									<div class="panel-heading">Manage Pages Details</div>
									<div class="panel-body">
										<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();">
											<?php
											$id=intval($_GET['id']);
											$query=mysqli_query($con,"SELECT * FROM services where id='$id'");
					                     while($row=mysqli_fetch_array($query)) 
					                     {
					                     ?> 
											<div class="form-group">
												<label class="col-sm-4 control-label">Header English</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" placeholder="Enter Header Text" value="<?php echo htmlentities($row['header_en']);?>" name="header_en" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Description English </label>
												<div class="col-sm-8">
													<textarea class="form-control" rows="5" cols="50" name="discription_en" id="discription_en" placeholder="Package Details" required>
														<?php echo  htmlentities($row['description_en']);?>

													</textarea> 
												</div>
											</div>
											<br>
											<br>

											<div class="form-group">
												<label class="col-sm-4 control-label">Header Sinhala</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" placeholder="Enter Header Text" value="<?php echo htmlentities($row['header_si']);?>" name="header_si" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Description Sinhala </label>
												<div class="col-sm-8">
													<textarea class="form-control" rows="5" cols="50" name="discription_si" id="discription_si" placeholder="Package Details" required>
														<?php echo  htmlentities($row['description_si']);?>

													</textarea> 
												</div>
											</div>
											<br>
											<br>

											<div class="form-group">
												<label class="col-sm-4 control-label">Header Tamil</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" placeholder="Enter Header Text" value="<?php echo htmlentities($row['header_ta']);?>" name="header_ta" required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Description Tamil </label>
												<div class="col-sm-8">
													<textarea class="form-control" rows="5" cols="50" name="discription_ta" id="discription_ta" placeholder="Package Details" required>
														<?php echo  htmlentities($row['description_ta']);?>

													</textarea> 
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">URL/Link</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" placeholder="Enter Header Text" value="<?php echo htmlentities($row['link']);?>" name="link" required>
												</div><?php } ?>
											</div>
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								
												<button type="submit" name="submit" value="Update" id="submit" class="btn-primary btn">Update</button>
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