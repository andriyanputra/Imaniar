<?php include 'template/header.php';?>
<body class="login-layout">
	<div class="main-container container-fluid">
		<div class="main-content">
			<div class="row-fluid">
				<div class="span12">
					<div class="login-container">
						<div class="row-fluid">
							<div class="center">
								<h1>
									<i class="icon-leaf green"></i>
									<span class="red">kas - </span>
									<span class="white">Kecil</span>
								</h1>
								<h4 class="blue">&copy; PT. Aneka Mitra Gemilang</h4>
							</div>
						</div>

						<div class="space-6"></div>

							<div class="row-fluid">
								<div class="position-relative">
									<div id="login-box" class="login-box visible widget-box no-border">
										<div class="widget-body">
											<div class="widget-main">
												<h4 class="header blue lighter bigger">
													<i class="icon-coffee green"></i>
													Please Enter Your Information
												</h4>

												<div class="space-6"></div>

												<form action="cek_login.php" method="post">
													<?php 
														if(isset($_GET['pesan'])){
															if($_GET['pesan']=="gagal"){
																echo "
																<div class='alert alert-error'>
																	<button type='button' class='close' data-dismiss='alert'>
																		<i class='icon-remove'></i>
																	</button>

																	<strong>
																		<i class='icon-remove'></i>
																		Oh snap!
																	</strong>

																	Username dan password tidak sama!!
																	<br />
																</div>
																";
															}else if($_GET['pesan']=="logout"){
																echo "
																<div class='alert alert-success'>
																	<button type='button' class='close' data-dismiss='alert'>
																		<i class='icon-remove'></i>
																	</button>

																	<strong>
																		<i class='icon-ok'></i>
																		Well done!
																	</strong>

																	You successfully logout from application.
																	<br />
																</div>
																";
															}
														}
													?>
													<fieldset>
														<label>
															<span class="block input-icon input-icon-right">
																<input type="text" name="username" class="span12" placeholder="Username .." required="required">
																<i class="icon-user"></i>
															</span>
														</label>

														<label>
															<span class="block input-icon input-icon-right">
																<input type="password" name="password" class="span12" placeholder="Password .." required="required">
																<i class="icon-lock"></i>
															</span>
														</label>

														<div class="space"></div>

														<div class="clearfix">
															<button onclick="return true;" class="width-35 pull-right btn btn-small btn-primary">
																<i class="icon-key"></i>
																Login
															</button>
														</div>

														<div class="space-4"></div>
													</fieldset>
												</form>
											</div><!--/widget-main-->

											<!--<div class="toolbar clearfix">
												<div>
													<a href="#" onclick="show_box('forgot-box'); return false;" class="forgot-password-link">
														<i class="icon-arrow-left"></i>
														I forgot my password
													</a>
												</div>
											</div>-->
										</div><!--/widget-body-->
									</div><!--/login-box-->
								</div><!--/position-relative-->
							</div>
					</div>
				</div><!--/.span-->
			</div><!--/.row-fluid-->
		</div>
	</div><!--/.main-container-->
<?php include 'template/footer.php'; ?>