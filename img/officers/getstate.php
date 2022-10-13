<?php
include('../config/config.php');
error_reporting(0);
if(!empty($_POST["stateid"])) 
{
 $id=intval($_POST['stateid']);
 if(!is_numeric($id)){
 
 	echo htmlentities("invalid industryid");exit;
 }
 else{
 $stmt = mysqli_query($con,"SELECT id,stateName FROM state WHERE pid ='$id'");
 ?><option selected="selected">Select Sub </option><?php
 while($row=mysqli_fetch_array($stmt))
 {
  ?>
  <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['stateName']); ?></option>
  <?php
 }
}

}
?>