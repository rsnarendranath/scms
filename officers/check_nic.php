<?php 
require_once("../config/config.php");
error_reporting(0);
if(!empty($_POST["nic"])) {
	$nic= $_POST["nic"];
	
		$result =mysqli_query($con,"SELECT nic FROM users WHERE nic='$nic'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> NIC already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'></span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
