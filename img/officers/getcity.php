<?php
include('../config/config.php');
error_reporting(0);
if(!empty($_POST["cityid"])) 
{
 $id=intval($_POST['cityid']);
 if(!is_numeric($id)){
 
 	echo htmlentities("invalid industryid");exit;
 }
 else{
 $stmt = mysqli_query($con,"SELECT id,cityName FROM city WHERE sid ='$id'");
 ?><option selected="selected">Select City </option><?php
 while($row=mysqli_fetch_array($stmt))
 {
  ?>
  <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['cityName']); ?></option>
  <?php
 }
}

}
?>