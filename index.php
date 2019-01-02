<?php 
	session_start();
 	include 'koneksi.php';
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
							<img class="nav-user-photo" src="assets/avatars/user.png" />
							<span class="user-info">
								<small>Welcome,</small>
								<?php echo $_SESSION['nama']; ?>
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

		<?php include 'template/sidebar.php'; ?>

		<div class="main-content">
			<div class="breadcrumbs" id="breadcrumbs">
				<ul class="breadcrumb">
					<li>
						<i class="icon-home home-icon"></i>
						<a href="index.php?page=home">Home</a>

						<span class="divider">
							<i class="icon-angle-right arrow-icon"></i>
						</span>
					</li>
					<?php
						function rupiah($angka){
							$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
							return $hasil_rupiah;
						}
						
						if(isset($_GET['page'])){
							if($_GET['page'] == 'create' || $_GET['page'] == 'createDebit' || $_GET['page'] == 'search'){
								echo "<li>
										<a href='#' onclick='history.go(-1)'>Data BPK</a>

										<span class='divider'>
											<i class='icon-angle-right arrow-icon'></i>
										</span>
									</li>";
									if(isset($_GET['no'])){
										if($_GET['no']>0){
											echo "<li class='active'>View BPK</li>";
										}
									}else if($_GET['page'] == 'search'){
										echo "<li class='active'>Search BPK</li>";
									}else{
										echo "<li class='active'>Create BPK</li>";
									}
							}else if($_GET['page'] == 'view'){
								echo "<li class='active'>Data BPK</li>";
							}else if($_GET['page'] == 'report'){
								echo "<li class='active'>Data BPK</li>";
							}else if($_GET['page'] == 'detail'){
								echo "<li>
										<a href='#' onclick='history.go(-1)'>Data BPK</a>

										<span class='divider'>
											<i class='icon-angle-right arrow-icon'></i>
										</span>
									</li>
									<li class='active'>Detail BPK</li>";
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
									if($_GET['page'] == 'view'){
										echo "Data BPK";
									}else if($_GET['page'] == 'create' || $_GET['page'] == 'report' || $_GET['page'] == 'detail' || $_GET['page'] == 'createDebit'){
										echo "Data BPK";
									}else if($_GET['page'] == 'search'){
										echo "Search BPK";
									}else{
										echo "Dashboard";
									}
								}
							?>
							<small>
								<i class="icon-double-angle-right"></i>
								<?php
									if(isset($_GET['page'])){
										if($_GET['page'] == 'view'){
											echo "Overview";
										}else if($_GET['page'] == 'create' || $_GET['page'] == 'createDebit'){
											if(isset($_GET['no'])){
												if($_GET['no']>0){
													echo "Overview";
												}
											}else{
												echo "Create BPK";
											}
										}else if($_GET['page'] == 'report'){
											echo "Overview";
										}else{
											echo "Overview";
										}
									}
								?>
							</small>
						</h1>
					</div><!--/.page-header-->

					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->

							<div class="alert alert-block alert-success">
								<button type="button" class="close" data-dismiss="alert">
									<i class="icon-remove"></i>
								</button>

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
									if($_GET['page'] == 'create' || $_GET['page'] == 'createDebit' || $_GET['page'] == 'search'){
										include 'page/bpk.php';
									}else if($_GET['page'] == 'view'){
										include 'page/bpk.php';
									}else if($_GET['page'] == 'report' || $_GET['page'] == 'detail'){
										include 'page/report.php';
									}
								}
							?>

							<div class="space-6"></div>
							
							<?php 
								if(isset($_GET['page'])){
									if($_GET['page'] == 'home'){
							?>
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
							<?php }} ?>

							<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->
		</div><!--/.main-content-->
	</div><!--/.main-container-->
<?php 
	include 'template/modal.php'; 
	include 'template/footer.php'; 
?>