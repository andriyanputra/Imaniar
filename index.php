<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:login.php");
	}
	include 'template/header.php';
?>
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a href="#" class="brand">
					<small>
						<i class="icon-leaf"></i>
						Kas Kecil
					</small>
				</a><!--/.brand-->

				<ul class="nav ace-nav pull-right">
					<li class="light-blue">
						<a data-toggle="dropdown" href="#" class="dropdown-toggle">
							<img class="nav-user-photo" src="assets/avatars/user.jpg" />
							<span class="user-info">
								<small>Welcome,</small>
								<?php echo $_SESSION['username']; ?>
							</span>

							<i class="icon-caret-down"></i>
						</a>

						<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">

							<li>
								<a href="#">
									<i class="icon-user"></i>
									Profile
								</a>
							</li>

							<li class="divider"></li>

							<li>
								<a href="logout.php">
									<i class="icon-off"></i>
									Logout
								</a>
							</li>
						</ul>
					</li>
				</ul><!--/.ace-nav-->
			</div><!--/.container-fluid-->
		</div><!--/.navbar-inner-->
	</div>

	<div class="main-container container-fluid">
		<a class="menu-toggler" id="menu-toggler" href="#">
			<span class="menu-text"></span>
		</a>

		<div class="sidebar" id="sidebar">
			<ul class="nav nav-list">
				<li class="active">
					<a href="index.php">
						<i class="icon-dashboard"></i>
						<span class="menu-text"> Dashboard </span>
					</a>
				</li><!--Dashboard-->
				<?php 
					if($_SESSION['level'] == '1'){
				?>
					<li>
						<a href="index.php?page=1">
							<i class="icon-bookmark"></i>
							<span class="menu-text"> Data BPK </span>
						</a>
					</li><!--Data BPK-->
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-bar-chart"></i>
							<span class="menu-text"> Report BPK </span>

							<b class="arrow icon-angle-down"></b>
						</a><!--Report BPK-->

						<ul class="submenu">
							<li>
								<a href="index.php?page=2">
									<i class="icon-double-angle-right"></i>
									Overview
								</a>
							</li><!--Reject-->

							<li>
								<a href="#">
									<i class="icon-double-angle-right"></i>
									Approve
								</a>
							</li><!--Approve-->
						</ul>
					</li><!--Report BPK-->
				<?php
					}else if($_SESSION['level'] == '2'){
				?>
				<li>
					<a href="#" class="dropdown-toggle">
						<i class="icon-bar-chart"></i>
						<span class="menu-text"> Report BPK </span>

						<b class="arrow icon-angle-down"></b>
					</a><!--Report BPK-->

					<ul class="submenu">
						<li>
							<a href="index.php?page=2">
								<i class="icon-double-angle-right"></i>
								Overview
							</a>
						</li><!--Reject-->

						<li>
							<a href="#">
								<i class="icon-double-angle-right"></i>
								Approve
							</a>
						</li><!--Approve-->
					</ul>
				</li><!--Report BPK-->
				<?php 
					}
				?>
			</ul><!--/.nav-list-->

			<div class="sidebar-collapse" id="sidebar-collapse">
				<i class="icon-double-angle-left"></i>
			</div>
		</div>

		<div class="main-content">
			<div class="breadcrumbs" id="breadcrumbs">
				<ul class="breadcrumb">
					<li>
						<i class="icon-home home-icon"></i>
						<a href="index.php">Home</a>

						<span class="divider">
							<i class="icon-angle-right arrow-icon"></i>
						</span>
					</li>
					<?php
						if(isset($_GET['page'])){
							if($_GET['page'] == '1'){
								echo "<li class='active'>Data BPK</li>";
							}else if($_GET['page'] == '2'){
								echo "<li class='active'>Report BPK</li>";
							}else{
								echo "<li class='active'>Dashboard</li>";
							}
						}
					?>
				</ul><!--.breadcrumb-->

				<div class="pull-right">
                    <script>
                        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                        var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                        var date = new Date();
                        var day = date.getDate();
                        var month = date.getMonth();
                        var thisDay = date.getDay(),
                                thisDay = myDays[thisDay];
                        var yy = date.getYear();
                        var year = (yy < 1000) ? yy + 1900 : yy;
                        document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                    </script>
                    , Pukul <span id="clock"></span>
                </div>
            </div>

				<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							<?php
								if(isset($_GET['page'])){
									if($_GET['page'] == '1'){
										echo "Data BPK";
									}else if($_GET['page'] == '2'){
										echo "Report BPK";
									}else{
										echo "Dashboard";
									}
								}
							?>
							<small>
								<i class="icon-double-angle-right"></i>
								overview
							</small>
						</h1>
					</div><!--/.page-header-->

					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->

							<div class="alert alert-block alert-success">
								<!--<button type="button" class="close" data-dismiss="alert">
									<i class="icon-remove"></i>
								</button>-->

								<i class="icon-ok green"></i>

								Welcome <?php echo $_SESSION['nama']; ?> to
								<strong class="green">
									Aplikasi Kas Kecil
									<small>(v1.0.0)</small>
								</strong>
								,easy to use and user friendly.
							</div>

							<div class="space-6"></div>

							<?php
								if(isset($_GET['page'])){
									if($_GET['page'] == '1'){
										include 'page/bpk.php';
									}else if($_GET['page'] == '2'){
										include 'page/report.php';
									}else{
										echo "kosong";
									}
								}
							?>

							<div class="space-6"></div>

							<div class="row-fluid">
								<div align="right">
									<address class="pull-right">
										<strong>PT. Aneka Mitra Gemilang</strong>

										<br />
										Jl. Kaliabang Bungur KM 27
										<br />
										Pejuang, Medan Satria, Bekasi - 17131
										<br />
										<abbr title="Phone">P:</abbr>
										(021) 295-66700<br />
										<abbr title="Fax">F:</abbr>
										(021) 295-66782
									</address>
								</div>
							</div><!--/row-->
							<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->
		</div><!--/.main-content-->
	</div><!--/.main-container-->
<?php include 'template/footer.php'; ?>