	<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label">Main</li>
				<li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			
				<li><a href="#"><i class="fa fa-files-o"></i>Manage Complaint</a>
					<ul>
						<?php
						$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where status is null");
						$num1 = mysqli_num_rows($rt);
						{?>
						<li><a href="notprocess-complaint.php">Not Process Complaint &nbsp;&nbsp; <span class="label danger">&nbsp;<?php echo htmlentities($num1); ?>&nbsp;</span></a></li><?php } ?>
						 <?php 
						  $status="in Process";                   
						$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where status='$status'");
						$num1 = mysqli_num_rows($rt);
						{?>
						<li><a href="inprocess-complaint.php">In Process Complaint &nbsp;&nbsp; <span class="label info">&nbsp;<?php echo htmlentities($num1); ?>&nbsp;</span></a></li><?php } ?>
						<?php 
						  $status="closed";                   
						$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where status='$status'");
						$num1 = mysqli_num_rows($rt);
						{?>						
						<li><a href="closed-complaint.php">Closed Complaints &nbsp;&nbsp; <span class="label success">&nbsp;<?php echo htmlentities($num1); ?>&nbsp;</span></a></li><?php } ?>
					</ul>
				</li>
				<?php 
				$status="Not Process Yet";                   
				$rt = mysqli_query($con,"SELECT * from appealcomplaint WHERE status='$status'");
				$num1 = mysqli_num_rows($rt);
				{?>	
				<li><a href="#"><i class="fa fa-rocket"></i>Complaint Appeal &nbsp;&nbsp; <span class="label danger">&nbsp;<?php echo htmlentities($num1); ?>&nbsp;</span></a><?php } ?>
				<ul>
						<li><a href="complaint-appeal.php">Appeal List</a></li>
						<li><a href="appeal-charges.php">Appeal Charges</a></li>
					</ul>
				</li>
				<li><a href="#"><i class="fa fa-users"></i>Manage Users</a>
					<ul>
						<li><a href="manage-users.php">Manage users</a></li>
						<li><a href="add-users.php">Add users</a></li>
					</ul>
				</li>

				<li><a href="#"><i class="fa fa-map-marker"></i>Manage State</a>
					<ul>
						<li><a href="province.php">Add Province</a></li>
						<li><a href="state.php">Add District</a></li>
						<li><a href="city.php">Add City</a></li>
					</ul>
				</li>

				<li><a href="#"><i class="fa fa-list-alt"></i>Manage Category</a>
					<ul>
						<li><a href="category.php">Add Category</a></li>
						<li><a href="subcategory.php">Add Sub-Category</a></li>
					</ul>
				</li>

				<li><a href="#"><i class="fa fa-map"></i>Manage P Admin</a>
					<ul>
						<li><a href="add-p-admin.php">Add Provincial Admin</a></li>
						<li><a href="manage-p-admin.php">Provincial Admin</a></li>
					</ul>
				</li>
				
				<li><a href="complaint-type.php"><i class="fa fa-file"></i>Add Complaint Type</a></li>
				<?php
				$rt = mysqli_query($con,"SELECT * from tblcontactusquery WHERE status is null");
				$num1 = mysqli_num_rows($rt);
				{?>
				<li><a href="manage-conactusquery.php"><i class="fa fa-desktop"></i> Manage Conatctus Query&nbsp;<span class="label danger">&nbsp;<?php echo htmlentities($num1); ?>&nbsp;</span></a></li><?php } ?>
				<li><a href="manage-pages.php"><i class="fa fa-book"></i> Manage Pages</a></li>
				<li><a href="update-contactinfo.php"><i class="fa fa-envelope-o"></i> Update Contact Info</a></li>
				<li><a href="user-logs.php"><i class="fa fa-list"></i>User Login Log</a></li>
				<li><a href="#"><i class="fa fa-comment-o"></i>User Feedback</a>
					<ul>
						<li><a href="feedback-static.php">Feedback Dashboard</a></li>
						<li><a href="feedback-all.php">All Feedback</a></li>
						<li><a href="feedback-user-wise.php">User Wise Feedback</a></li>
					</ul>
				</li>
				<li><a href="#"><i class="fa fa-bullhorn"></i>Announcement</a>
					<ul>
						<li><a href="users-announcement.php">To Registerd Users</a></li>
						<li><a href="admin-announcement.php">To Admin</a></li>
						<li><a href="email-announcement.php">Send E-Mail</a></li>
					</ul>
				</li>

				<li><a href="#"><i class="fa fa-cogs"></i>Advance Settings</a>
					<ul>
						<li><a href="setting-home.php">Activate Section(Home)</a></li>
						<li><a href="slider-banner.php">Slider Announcement</a></li>
						<li><a href="service-section.php">Service Section</a></li>
					</ul>
				</li>
				<li class="logout"><a href="logout.php"><i class="fa fa-sign-out"> </i> Log Out</a></li>
			</ul>
		</nav>