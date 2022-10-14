<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label">Main</li>
				<li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			
				<li><a href="#"><i class="fa fa-files-o"></i>Manage Complaint</a>
					<ul>
						<?php
						
						$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where category= (select category from officers where id='" . $_SESSION['id'] . "') and status is null");
						$num1 = mysqli_num_rows($rt);
						{?>
						<li><a href="notprocess-complaint.php">Not Process Complaint &nbsp;&nbsp; <span class="label danger">&nbsp;<?php echo htmlentities($num1); ?>&nbsp;</span></a></li><?php } ?>
						 <?php 
						  $status="in Process";                   
						$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where category= (select category from officers where id='" . $_SESSION['id'] . "') and status='$status'");
						$num1 = mysqli_num_rows($rt);
						{?>
						<li><a href="inprocess-complaint.php">In Process Complaint &nbsp;&nbsp; <span class="label info">&nbsp;<?php echo htmlentities($num1); ?>&nbsp;</span></a></li><?php } ?>
						<?php 
						  $status="closed";                   
						$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where category= (select category from officers where id='" . $_SESSION['id'] . "') and status='$status'");
						$num1 = mysqli_num_rows($rt);
						{?>						
						<li><a href="closed-complaint.php">Closed Complaints &nbsp;&nbsp; <span class="label success">&nbsp;<?php echo htmlentities($num1); ?>&nbsp;</span></a></li><?php } ?>
					</ul>
				</li>
				<li ><a href="change-password.php"><i class="fa fa-key"></i>  Change Password</a></li>
				<li><a href="logout.php"><i class="fa fa-sign-out"> </i> Log Out</a></li>
			</ul>
		</nav>
		