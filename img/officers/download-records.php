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
											<th>NIC </th>
											<th>Email </th>
											<th>Contact No</th>
											<th>Address</th>
											<th>Zipcode</th>
											<th>Gender</th>
											<th>Birthday</th>
											<th>Province</th>
											<th>District</th>
											<th>City</th>
											<th>Register Date</th>
										</tr>
									</thead>

<?php
$filename="Users list";
$query=mysqli_query($con,"select users.*,province.provinceName,state.stateName,city.cityName from users INNER JOIN province on province.id=users.province INNER JOIN state ON state.id=users.state INNER JOIN city on city.id= users.city where usertype is null");
$cnt=1;
while($row=mysqli_fetch_array($query))
{	
$fullName = $row['fullName'];
$userEmail = $row['userEmail'];	
$contactNo = $row['contactNo'];	
$nic = $row['nic'];
$pincode = $row['pincode'];
$address = $row['address'];
$gender = $row['gender'];
$birthday = $row['birthday'];
$regDate = $row['regDate'];
$province = $row['provinceName'];
$state = $row['stateName'];
$city = $row['cityName'];

echo '  
<tr>  
<td>'.$cnt.'</td> 
<td>'.$fullName.'</td> 
<td>'.$nic.'</td> 
<td>'.$userEmail.'</td> 
<td>'.$contactNo.'</td>
<td>'.$address.'</td> 
<td>'.$pincode.'</td> 
<td>'.$gender.'</td> 
<td>'.$birthday.'</td> 
<td>'.$province.'</td> 		
<td>'.$state.'</td> 
<td>'.$city.'</td> 
<td>'.$regDate.'</td> 									
</tr>    '
;
header("Content-Disposition: attachment; filename=".$filename."-report.xls");
			$cnt++;
			}
	}
?>
</table>
