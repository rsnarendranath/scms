<div class="brand clearfix">
	<?php $query=mysqli_query($con,"select setting_description from genaralsetting where id=4");
                while($row=mysqli_fetch_array($query)) 
                {
                ?>
                <?php $logophoto=$row['setting_description'];
                if($logophoto==""):
                ?>
                <a href="dashboard.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../images/logo/logo.png" alt="" class="header" /></a>
                <?php else:?>
                <a href="dashboard.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../images/logo/<?php echo htmlentities($logophoto);?>" alt="" class="header"/></a>&nbsp;
                <?php endif;?><?php } ?>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			<li class="ts-account">
				<a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt="">Admin Account <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li ><a href="setting-genaral.php"><i class="fa fa-cogs"></i>  Site Setting</a></li>
					<li ><a href="change-password.php"><i class="fa fa-key"></i>  Change Password</a></li>
					<li ><a href="../index.php" target="_blank"><i class="fa fa-home" ></i>  Home</a></li>
					<li><a href="logout.php"><i class="fa fa-sign-out"></i>  Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>
