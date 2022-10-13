<?php
session_start();
error_reporting(0);
include('../config/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

$query222=mysqli_query($con,"SELECT COUNT(feedbackValue),feedbackValue from feedback GROUP BY feedbackValue");

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

	<link href="web/css/bootstrap.css" rel='stylesheet' type='text/css' />

	<!-- Custom CSS -->
	<link href="web/css/style.css" rel='stylesheet' type='text/css' />

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

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Feedback', 'Presentage'],
          <?php 
          while($row=mysqli_fetch_array($query222)) 
          {
            echo "['".$row['feedbackValue']."',".$row['COUNT(feedbackValue)']."],";
          }

          ?>
        ]);

        var options = {
          title: 'Feedback Precentage',
          // legend : { position : 'labeled'}
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
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

						<h2 class="page-title">Feedback Dashboard</h2>
						
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-excelent text-light">
												<div class="stat-panel text-center">
                             <?php
                             $Excellent = 'Excellent';
$rt = mysqli_query($con,"SELECT * FROM feedback where feedbackValue = '$Excellent'");
$num1 = mysqli_num_rows($rt);
{?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($num1);?></div>
													<?php }?>
													<div class="stat-panel-title text-uppercase"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
														<li>Excellent</li>
													</div>

												</div>
											</div>
											
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-good text-light">
												<div class="stat-panel text-center">
                   <?php 
                $Good = 'Good';
$rt = mysqli_query($con,"SELECT * FROM feedback where feedbackValue = '$Good'");
$num1 = mysqli_num_rows($rt);
{?>									<div class="stat-panel-number h1 "><?php echo htmlentities($num1);?></div>
													<div class="stat-panel-title text-uppercase"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><li>Good</li></div>
													  <?php }?>
												</div>
											</div>
											
										</div>
									</div>








									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-nathural text-light">
												<div class="stat-panel text-center">
												     <?php 
                 $Neutral = 'Neutral';
$rt = mysqli_query($con,"SELECT * FROM feedback where feedbackValue ='$Neutral'");
$num1 = mysqli_num_rows($rt);
{?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($num1);?></div>
													<?php }?>
													<div class="stat-panel-title text-uppercase"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><li>Neutral</li></div>
												</div>
											</div>
											
										</div>
									</div>	

									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-poor text-light">
												<div class="stat-panel text-center">
												     <?php 
                  $Poor = 'Poor';
$rt = mysqli_query($con,"SELECT * FROM feedback where feedbackValue ='$Poor'");
$num1 = mysqli_num_rows($rt);
{?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($num1);?></div>
													<?php }?>
													<div class="stat-panel-title text-uppercase"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><li>Poor</li></div>
												</div>
											</div>
											
										</div>
									</div>	

									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-verypoor text-light">
												<div class="stat-panel text-center">
												     <?php 
               $VeryPoor = 'VeryPoor';
$rt = mysqli_query($con,"SELECT * FROM feedback where feedbackValue ='$VeryPoor'");
$num1 = mysqli_num_rows($rt);
{?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($num1);?></div>
													<?php }?>
													<div class="stat-panel-title text-uppercase"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><li>Very Poor</li></div>
												</div>
											</div>
											
										</div>
									</div>	

									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-totfeed text-light">
												<div class="stat-panel text-center">
												     <?php 
                
$rt = mysqli_query($con,"SELECT * FROM feedback");
$num1 = mysqli_num_rows($rt);
{?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($num1);?></div>
													<?php }?>
													<i class="fa fa-trophy" aria-hidden="true"></i></li>
													<div class="stat-panel-title text-uppercase">Total No Of Feedback<li></div>

												</div>
											</div>
											
										</div>
									</div>	

									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-userfeed text-light">
												<div class="stat-panel text-center">
												     <?php 
                  
$rt = mysqli_query($con,"SELECT * FROM feedback Group By userEmail");
$num1 = mysqli_num_rows($rt);
{?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($num1);?></div>
													<?php }?>
													<i class="fa fa-suitcase" aria-hidden="true"></i></li>
													<div class="stat-panel-title text-uppercase">Total Feedback Users<li></div>
												</div>
											</div>
											
										</div>
									</div>	

									
 <?php $query=mysqli_query($con,"select feedbackValue,COUNT(feedbackValue) AS MOST_FREQUENT from feedback GROUP BY feedbackValue ORDER BY COUNT(feedbackValue) DESC LIMIT 1");
while($row=mysqli_fetch_array($query))
{
?>							
													<?php 
                        $feedbackValue  = $row['feedbackValue'];

                        $Excellent = 'Excellent';
                        $Good = 'Good';
                        $Neutral = 'Neutral';
                        $Poor = 'Poor';

                        if($feedbackValue==$Excellent)
                          {
                            ?>
                            <div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-sysstatus text-light">
												<div class="stat-panel text-center">
                            <div class="stat-panel-number h1 ">Excellent</div>
                            <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><br />
                            	</i><li>Most Common Feedback</li></div>
                            <?php } 
                        elseif($feedbackValue==$Good) {
                          ?>
                          <div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-sysstatus text-light">
												<div class="stat-panel text-center">
                          <div class="stat-panel-number h1 ">Good</div>
                          <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><br />
                          	</i><li>Most Common Feedback</li></div>
                            <?php } 
                        elseif($feedbackValue==$Neutral) {
                          ?>
                          <div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-sysstatus text-light">
												<div class="stat-panel text-center">
                          <div class="stat-panel-number h1 ">Neutral</div>
                          <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><br />
                          	</i><li>Most Common Feedback</li></div>
                            <?php } 
                        elseif($feedbackValue==$Poor) {
                          ?>
                          <div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-sysstatus text-light">
												<div class="stat-panel text-center">
                          <div class="stat-panel-number h1 ">Poor</div>
                          <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i></i><br />
                          	</i><li>Most Common Feedback</li></div>
                            <?php }     
                        else {?>
                        	<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-sysstatus text-light">
												<div class="stat-panel text-center">
                          <div class="stat-panel-number h1 ">Very Poor</div>
                            <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i></i></i>
                            </i><li>Most Common Feedback</li></div>

                          


                        <?php } ?>
                        <?php }?>

												</div>
											</div>
											
										</div>
									</div>		

							
					





							<div class="panel panel-default">
							<div class="panel-heading">Province Wise Users</div>
							<div class="panel-body">
							<!--  -->
								<table  cellspacing="0" width="100%">
									<thead>
										<tr><tbody>
											<th><div id="piechart" style="width: 900px; height: 500px;"></div></th>
										</tr></tbody>
									</thead>
								</table>
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
<?php }?>