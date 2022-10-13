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
											<th>Email Address</th>
											<th>ip Address</th>
											<th>Login Details </th>
											<th>Logout Details </th>
											<th>Status</th>
										</tr>
									</thead>

<?php
$filename="User Log list";
$query=mysqli_query($con,"select * from userlog");
$cnt=1;
while($row=mysqli_fetch_array($query))
{	
$ip = $row['userip'];
$userEmail = $row['username'];	
$login = $row['loginTime'];	
$logout = $row['logout'];
$status = $row['status'];

echo '  
<tr>  
<td>'.$cnt.'</td> 
<td>'.$userEmail.'</td> 
<td>'.$ip.'</td> 
<td>'.$login.'</td> 
<td>'.$logout.'</td>
<td>'.$status.'</td> 											
</tr>
';
header("Content-Disposition: attachment; filename=".$filename."-report.xls");
			$cnt++;
			}
	}
?>
</table>
