
<?php
session_start();
error_reporting(0);
include('../config/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{


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

	<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>

</script>

	<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow2(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+1000+',height='+370+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
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

						<h2 class="page-title">Appeal Detail</h2>
						<p><a href="complaint-appeal.php"><< Back to Appeal List</a></p>
						<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									
									<tbody>

<?php
$id=intval($_GET['id']);
$query=mysqli_query($con,"select appealcomplaint.*,users.fullName,users.userEmail,province.provinceName from appealcomplaint INNER JOIN users on users.id=appealcomplaint.UserID INNER JOIN province on province.id=appealcomplaint.province where appealcomplaint.id='".$_GET['id']."'");
while($row=mysqli_fetch_array($query))
{

?>									
										<tr>
											<td><b>Complaint Number</b></td>
											<td><?php echo htmlentities($row['complaintNo']);?></td>
											<td><b>Complainant Name</b></td>
											<td colspan="3"><?php echo htmlentities($row['fullName']);?>
											</td>
										</tr>

<tr>
											<td><b>Date/Time </b></td>
											<td><?php echo htmlentities($row['DateTime']);?></td>
											<td><b>Complainant Email</b></td>
											<td colspan="3"><?php echo htmlentities($row['userEmail']);?>
											</td>
										</tr>
<tr>
											<td><b>Appeal Details </b></td>
											
											<td colspan="5"> <?php echo htmlentities($row['appeal_description']);?></td>
											
										</tr>

											</tr>
<tr>
											<td><b>File(if any) </b></td>
											
											<td colspan="5"> <?php $cfile=$row['appealFile'];
											if($cfile=="" || $cfile=="NULL")
											{
											  echo "File NA";
											}
											else{?>
											<a href="../users/appealdocs/<?php echo htmlentities($row['appealFile']);?>" target="_blank"/> View File</a>
											<?php } ?></td>
											</tr>

											<tr>
											<td><b>Final Status</b></td>
														<?php
															$stat = $row['status'];

															$notprocess='Not Process Yet';
															$inprocess='In Process';													
															if($stat==$notprocess)
															{ ?>
																<td colspan="5" style="color: red"><b>Not Process Yet</b></td>
															<?php }
															else if($stat==$inprocess)
															{ ?>
																<td colspan="5" style="color: blue"><b>In Process</b></td>
															<?php }
															else
															{?>
																<td colspan="5" style="color: green"><b>Closed</b></td>
															<?php } ?>
											
										</tr>

<!-- dadz -->
									<tr>
										<td><b>Payament Status</b></td>
											<?php 

											$paystat=$row['paymentStatus'];
											if($paystat == 0)
											{?>
											  <td colspan="5" style="color: red"> Pending Payment</a></td>
											<?php }
											else
											{?>
												<td colspan="5" style="color: green">Payment Done</td>
											
										 <?php } ?>
											
										</tr>




<tr>
											<td><b>Action</b></td>
											
											<td> 
<a href="javascript:void(0);" onClick="popUpWindow('update-appeal-details.php?id=<?php echo htmlentities($row['id']);?>');" title="Update Appeal">
											 <button type="button" class="btn btn-primary">Take Action</button></td>
											</a></td>
											<td colspan="3"> 
											<a href="javascript:void(0);" onClick="popUpWindow('userprofile-appeal.php?id=<?php echo htmlentities($row['UserID']);?>');" title="Update order">
											 <button type="button" class="btn btn-primary">View User Detials</button></a></td>

											 <td colspan="1">
											 	<a href="javascript:void(0);" onClick="popUpWindow2('appeal-cmp-detail.php?id=<?php echo htmlentities($row['complaintNo']);?>');" title="Update order">
											 <button type="button" class="btn btn-primary">View Complaint Detials</button></a>
											 </td>
											
										</tr>
										<?php  } ?>
										
								</table>












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
	
	<script>
		
	window.onload = function(){
    
		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		}); 
		
		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>
</body>
</html>
<?php } ?>