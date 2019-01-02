<div class="sidebar" id="sidebar">
	<ul class="nav nav-list">
		<li class="active">
			<a href="index.php?page=home">
				<i class="icon-dashboard"></i>
				<span class="menu-text"> Dashboard </span>
			</a>
		</li><!--Dashboard-->
		<?php 
			if($_SESSION['level'] == '1'){
		?>
			<li>
				<a href="index.php?page=view">
					<i class="icon-bookmark"></i>
					<span class="menu-text"> Data BPK </span>
				</a>
			</li><!--Data BPK-->
			<li>
				<a href="index.php?page=search">
					<i class="icon-search"></i>
					<span class="menu-text"> Search BPK </span>
				</a>
			</li><!--Data BPK-->
			<!--<li>
				<a href="#" class="dropdown-toggle">
					<i class="icon-bar-chart"></i>
					<span class="menu-text"> Report BPK </span>

					<b class="arrow icon-angle-down"></b>
				</a>

				<ul class="submenu">
					<li>
						<a href="index.php?page=2">
							<i class="icon-double-angle-right"></i>
							Overview
						</a>
					</li>

					<li>
						<a href="#">
							<i class="icon-double-angle-right"></i>
							Approve
						</a>
					</li>
				</ul>
			</li>Report BPK-->
		<?php
			}else if($_SESSION['level'] == '2'){
		?>
		<li>
			<a href="index.php?page=report">
				<i class="icon-bar-chart"></i>
				<span class="menu-text"> Data BPK </span>
			</a><!--Report BPK-->
		</li><!--Report BPK-->
		<?php 
			}else if($_SESSION['level'] == '3'){
		?>
		<li>
			<a href="index.php?page=view">
				<i class="icon-bookmark"></i>
				<span class="menu-text"> Data BPK </span>
			</a>
		</li><!--Data BPK-->
		<?php 
			}
		?>
	</ul><!--/.nav-list-->

	<div class="sidebar-collapse" id="sidebar-collapse">
		<i class="icon-double-angle-left"></i>
	</div>
</div>