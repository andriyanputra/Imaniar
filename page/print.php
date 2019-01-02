<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>
			<?php
				session_start();
				include '../koneksi.php'; 
				date_default_timezone_set("Asia/Jakarta");
				function rupiah($angka){
					$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
					return $hasil_rupiah;
				}
				if(isset($_SESSION['level'])){
					if($_SESSION['level'] == 2 || $_SESSION['level'] == 3){
						header("location:javascript://history.go(-1)");
					}
				}
			?> 
			Cetak - Kas Kecil
		</title>

		<meta name="description" content="User Print" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!--basic styles-->
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="../assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="../assets/css/font-awesome.min.css" />
		<link rel="shortcut icon" type="image/png" href="../assets/images/ico.png"/>
		<!--page specific plugin styles-->

		<!--fonts-->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!--ace styles-->
		<link rel="stylesheet" href="../assets/css/ace.min.css" />
		<link rel="stylesheet" href="../assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="../assets/css/ace-skins.min.css" />

		<!--inline styles related to this page-->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>

	<body>
		<div class="row-fluid">
			<div class="span12">
				<!--PAGE CONTENT BEGINS-->

				<div class="space-6"></div>

				<div class="row-fluid">
					<div class="span10 offset1">
						<div class="widget-box transparent invoice-box">
							<div class="widget-header widget-header-large">
								<h3 class="grey lighter pull-left position-relative">
									<img src="../assets/images/ico.png" alt="logo amg" width="30" height="30">
									PT. Aneka Mitra Gemilang
								</h3>
								<?php
								if(isset($_GET['no'])){
									$noBPK = $_GET['no'];
								}
								?>
								<div class="widget-toolbar no-border invoice-info">
									<span class="invoice-info-label">No BPK:</span>
									<span class="red">#<?=$noBPK?></span>

									<br />
									<span class="invoice-info-label">Date:</span>
									<span class="blue"><?php echo date('d/m/Y'); ?></span>
								</div>
							</div>

							<?php
								$q_bpk1 = mysqli_query($koneksi, 
										"SELECT *
											FROM
											    amount
											    INNER JOIN kas_kecil
											        ON (amount.amount_id = kas_kecil.amount_id)
											    INNER JOIN cost_center 
											        ON (cost_center.cost_id = kas_kecil.cost_id)
											    INNER JOIN gl_account
											        ON (gl_account.gl_id = kas_kecil.gl_id)
											    INNER JOIN dept
											        ON (dept.dept_id = kas_kecil.dept_id)
											        WHERE kas_kecil.kas_no = $noBPK");
									$Dbpk1 = mysqli_fetch_array($q_bpk1);
									//$tgl = date('l, d-m-Y  h:i:s a', strtotime('$Dbpk1[kas_datecreate]'));
							?>

							<div class="widget-body">
								<div class="widget-main padding-24">
									<div class="row-fluid">
										<div class="row-fluid">
											<div class="span12 label label-large label-info arrowed-in arrowed-right">
												<b>Detail Biaya Pengeluaran Kas</b>
											</div>
											<div class="span12">
												<div class="span6">
													<div class="space-6"></div>
													<div class="row-fluid form-horizontal">
														<div class="control-group">
															<label class="control-label" for="form-comp_code">Company Code</label>

															<div class="controls">
																<input class="input-mini" type="text" readonly value="<?=$Dbpk1['kas_companycode']?>" />
															</div>
														</div><!--Company Code-->

														<div class="control-group">
															<label class="control-label">Dept. Unit</label>

															<div class="controls">
																<input type="text" readonly value="<?=$Dbpk1['dept_nama']?>" />
															</div>
														</div><!--Dept. Unit-->
													
														<div class="control-group">
															<label class="control-label">Requestor</label>

															<div class="controls">
																<input type="text" readonly value="<?=$Dbpk1['kas_requestor']?>" />
															</div>
														</div><!--Requestor-->
													</div>
												</div><!--/span-->
												<div class="space-6"></div>
												<div class="span6">
													<div class="row-fluid form-horizontal">
														<div class="control-group">
															<label class="control-label" for="form-comp_code">Document Create</label>

															<div class="controls">
																<input type="text" readonly value="<?=$Dbpk1['kas_datecreate']?>" />
															</div>
														</div><!--Date create-->
													</div>
												</div><!--/span-->
											</div>
										</div><!--row-->

										<div class="space"></div>

										<div class="row-fluid">
											<div class="span12">
												<table class="table table-striped table-bordered">
													<thead>
														<tr>
															<th class="center">No</th>
															<th>GL Account</th>
															<th>Cost - Center</th>
															<th>Description</th>
															<th>Biaya</th>
														</tr>
													</thead>

													<tbody>
														<?php
															$q_bpk = mysqli_query($koneksi, 
																	"SELECT *
																		FROM
																		    amount
																		    INNER JOIN kas_kecil
																		        ON (amount.amount_id = kas_kecil.amount_id)
																		    INNER JOIN cost_center 
																		        ON (cost_center.cost_id = kas_kecil.cost_id)
																		    INNER JOIN gl_account
																		        ON (gl_account.gl_id = kas_kecil.gl_id)
																		    INNER JOIN dept
																		        ON (dept.dept_id = kas_kecil.dept_id)
																		        WHERE kas_kecil.kas_no = $noBPK");
																$c = 1;
																while ($Dbpk = mysqli_fetch_array($q_bpk)) {
																	//$tgl = date('l, d-m-Y  h:i:s a', strtotime('$Dbpk[kas_datecreate]'));
															
														?>
														<tr>
															<td class="center"><?=$c?></td>
															<td><?=$Dbpk['gl_no'].' - '.$Dbpk['gl_desc']?></td>
															<td><?=$Dbpk['cost_no'].' - '.$Dbpk['cost_desc']?></td>
															<td><?=$Dbpk['kas_desc']?></td>
															<td>
																<?php
																	if($Dbpk['amount_debet']==0){
																		echo rupiah($Dbpk['amount_kredit']);
																	}else{
																		echo rupiah($Dbpk['amount_debet']);
																	}
																?>
															</td>
														</tr>
														<?php
																$c++;
																}
														?>
													</tbody>
												</table>	
											</div>
										</div>

										<div class="hr hr8 hr-double hr-dotted"></div>

										<div class="row-fluid">
											<div class="span5 pull-right">
												<?php
													if($Dbpk1['amount_debet'] == 0){
														$q_amount = mysqli_query($koneksi,"SELECT SUM(amount.amount_kredit) AS total
																				FROM
																				    amount
																				    INNER JOIN kas_kecil
																				        ON (amount.amount_id = kas_kecil.amount_id)
																				        WHERE kas_kecil.kas_no = $noBPK");
													}else{
														$q_amount = mysqli_query($koneksi,"SELECT SUM(amount.amount_debet) AS total
																				FROM
																				    amount
																				    INNER JOIN kas_kecil
																				        ON (amount.amount_id = kas_kecil.amount_id)
																				        WHERE kas_kecil.kas_no = $noBPK");
													}
													$d_amount = mysqli_fetch_array($q_amount); 
												?>
												<h4 class="pull-right">
													Total amount :
													<span class="red"><?=rupiah($d_amount['total'])?></span>
												</h4>
											</div>
											<div class="span7 pull-left"></div>
										</div>

										<div class="space-6"></div>

										<div class="row-fluid">
											<div class="span5 pull-right">
												<h5 class="pull-right">
													Mengetahui,<br />
													Bekasi, 
													<br />
													<br />
													<br />
													<br />
													(Herman Suwanto)
												</h5>
											</div>
											<div class="span7 pull-left">
												<h5 class="pull-left">
													<br />
													<br />
													<br />
													<br />
													<br />
													(Imaniar Pratiwi)
												</h5>
											</div>
										</div>

										<div class="row-fluid">
											<div class="span12 well center">
												Love & Care For Better Life.
											</div>
										</div>
									</div>
								</div>
							</div><!--widget-body-->
						</div><!--widget-box-->
					</div>
				</div>

				<!--PAGE CONTENT ENDS-->
			</div><!--/.span-->
		</div><!--/.row-fluid-->

		<!--basic scripts-->

		<!--[if !IE]>-->

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<!--<![endif]-->

		<!--[if IE]>
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<![endif]-->

		<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='../assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!--<![endif]-->

		<!--[if IE]>
			<script type="text/javascript">
			 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
			</script>
		<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="../ssets/js/bootstrap.min.js"></script>

		<!--page specific plugin scripts-->

		<!--ace scripts-->

		<script src="../assets/js/ace-elements.min.js"></script>
		<!--<script src="../assets/js/ace.min.js"></script>-->

		<!--inline scripts related to this page-->
	</body>
</html>