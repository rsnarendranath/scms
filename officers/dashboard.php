<?php
session_start();
error_reporting(0);
include('../config/config.php');
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
?>
  <!doctype html>
  <html lang="en" class="no-js">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#3e454c">
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
  </head>

  <body>
    <?php include('includes/header.php'); ?>
    <div class="ts-main-content">
      <?php include('includes/leftbar.php'); ?>
      <div class="content-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <h2 class="page-title">Dashboard</h2>
              <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="panel panel-default">
                        <div class="panel-body bk-danger text-light">
                          <div class="stat-panel text-center">
                            <?php
                            $rt = mysqli_query($con, "SELECT * FROM tblcomplaints where category= (select category from officers where id='" . $_SESSION['id'] . "') and status is null");
                            $num1 = mysqli_num_rows($rt); { ?>
                              <div class="stat-panel-number h1 "><?php echo htmlentities($num1); ?></div>
                            <?php } ?>
                            <i class="fa fa-hourglass" aria-hidden="true"></i>
                            <div class="stat-panel-title text-uppercase">Not Process Complaints</div>
                          </div>
                        </div>
                        <a href="notprocess-complaint.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="panel panel-default">
                        <div class="panel-body bk-info text-light">
                          <div class="stat-panel text-center">
                            <?php
                            $status = "in Process";
                            $rt = mysqli_query($con, "SELECT * FROM tblcomplaints where category= (select category from officers where id='" . $_SESSION['id'] . "') and status='$status'");
                            $num1 = mysqli_num_rows($rt); { ?> <div class="stat-panel-number h1 "><?php echo htmlentities($num1); ?></div>
                              <i class="fa fa-hourglass-half" aria-hidden="true"></i>
                              <div class="stat-panel-title text-uppercase">Complaints in process</div>
                            <?php } ?>
                          </div>
                        </div>
                        <a href="inprocess-complaint.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="panel panel-default">
                        <div class="panel-body bk-success text-light">
                          <div class="stat-panel text-center">
                            <?php
                            $status = "closed";
                            $rt = mysqli_query($con, "SELECT * FROM tblcomplaints where category= (select category from officers where id='" . $_SESSION['id'] . "') and status='$status'");
                            $num1 = mysqli_num_rows($rt); { ?>
                              <div class="stat-panel-number h1 "><?php echo htmlentities($num1); ?></div>
                            <?php } ?>
                            <i class="fa fa-hourglass-end" aria-hidden="true"></i>
                            <div class="stat-panel-title text-uppercase">closed Complaint</div>
                          </div>
                        </div>
                        <a href="closed-complaint.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
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

        <script>
          window.onload = function() {

            // Line chart from swirlData for dashReport
            var ctx = document.getElementById("dashReport").getContext("2d");
            window.myLine = new Chart(ctx).Line(swirlData, {
              responsive: true,
              scaleShowVerticalLines: false,
              scaleBeginAtZero: true,
              multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
            });

            // Pie Chart from doughutData
            var doctx = document.getElementById("chart-area3").getContext("2d");
            window.myDoughnut = new Chart(doctx).Pie(doughnutData, {
              responsive: true
            });

            // Dougnut Chart from doughnutData
            var doctx = document.getElementById("chart-area4").getContext("2d");
            window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {
              responsive: true
            });

          }
        </script>
  </body>

  </html>
<?php } ?>