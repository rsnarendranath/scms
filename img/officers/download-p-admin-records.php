<?php 
session_start();
error_reporting(0);
session_regenerate_id(true);
include('../config/config.php');

if(strlen($_SESSION['alogin'])==0)
	{	
	header("Location: index.php"); //
	}
	else{?>
<table border="1">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>Province </th>
											<th>Email </th>
											<th>Contact no</th>
										</tr>
									</thead>

<?php
$filename="Provincial Admins list";
$query=mysqli_query($con,"select users.*,province.provinceName from users INNER JOIN province ON users.province=province.id where usertype=2");
$cnt=1;
while($row=mysqli_fetch_array($query))
{	
$fullName = $row['fullName'];
$userEmail = $row['userEmail'];	
$contactNo = $row['contactNo'];	
$province = $row['provinceName'];

echo '  
<tr>  
<td>'.$cnt.'</td> 
<td>'.$fullName.'</td> 
<td>'.$province.'</td> 
<td>'.$userEmail.'</td> 
<td>'.$contactNo.'</td> 												
</tr>    '
;
header("Content-Disposition: attachment; filename=".$filename."-report.xls");
			$cnt++;
			}
	}
?>
</table>
