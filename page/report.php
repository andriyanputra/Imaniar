<?php 
if(isset($_GET['page'])){
	if($_GET['page'] == 'report'){
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
									        ON (dept.dept_id = kas_kecil.dept_id)");
		$q_amount = mysqli_query($koneksi, "SELECT SUM(amount.amount_kredit) AS kredit, SUM(amount.amount_debet) AS debet
									FROM
									    amount
									    INNER JOIN kas_kecil
									        ON (amount.amount_id = kas_kecil.amount_id) WHERE kas_kecil.kas_status = 3");
		$d_amount = mysqli_fetch_array($q_amount);
?>
		<div class="row-fluid">
			<p class="pull-right">
				<?php if($d_amount['debet'] == 0){?>
		  		<b class="text-error">Balance</b> : <input type="text" required readonly value="<?=rupiah(0-$d_amount['kredit'])?>" />
		  		<?php }else{?>
		  		<b class="text-error">Balance</b> : <input type="text" required readonly value="<?=rupiah($d_amount['debet']-$d_amount['kredit'])?>" />
		  		<?php } ?>
			</p>
			<div class="space"></div><div class="space"></div><div class="space"></div>
			<div class="table-header">
				Results for "Latest BPK"
			</div>

			<table id="modal-viewbpk" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>BPK No</th>
						<th>Doc. Date</th>
						<th>Desc</th>
						<th colspan="2" class="center">Amount</th>
						<th>Requestor</th>
						<th>Dept. Unit</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					<?php
						if(mysqli_num_rows($q_bpk) == 0){ 
								echo '<tr><td>Tidak ada data!</td></tr>';
							}else{
								$c = 1;
								while ($d_bpk = mysqli_fetch_array($q_bpk)) {
					?>
					<tr>
						<td><?=$d_bpk['kas_no']?></td>
						<td><?=$d_bpk['kas_datecreate']?></td>
						<td><?=$d_bpk['kas_desc']?></td>
						<td><?=rupiah($d_bpk['amount_debet'])?></td>
						<td><?=rupiah($d_bpk['amount_kredit'])?></td>
						<td><?=$d_bpk['kas_requestor']?></td>
						<td><?=$d_bpk['dept_nama']?></td>
						<td>
							<?php
								if($d_bpk['kas_status'] == 1){//pengajuan
							?>
							<span class="label label-warning arrowed-in-right arrowed">Pengajuan</span>
							<?php
								}else if($d_bpk['kas_status'] == 2){//direvisi
							?>
							<span class="label label-info arrowed-in-right arrowed">Direvisi</span>
							<?php
								}else if($d_bpk['kas_status'] == 3){//disetujui
							?>
							<span class="label label-success arrowed-in-right arrowed">Disetujui</span>
							<?php
								}else if($d_bpk['kas_status'] == 4){//ditolak
							?>
							<span class="label label-important arrowed-in-right arrowed">Ditolak</span>
							<?php
								}
							?>
						</td>
						<td>
							<div class="hidden-phone visible-desktop action-buttons">
								<?php
								if($d_bpk['kas_status'] == 1 || $d_bpk['kas_status'] == 2){//pengajuan & Revisi
								?>
									<a href="#" title="Approve">
								  		<a href="#modal-approve" role="button" class="btn btn-mini btn-success" data-toggle="modal"> Approve </a>
								  		<!--<button type="button" class="btn btn-success btn-mini">
								  			<i class="icon-check"></i>Approve
								  		</button>-->
								  	</a> 
								  	<a href="#" title="Reject">
								  		<button type="button" class="btn btn-warning btn-mini">
								  			<!--<i class="icon-edit"></i>-->Revisi
								  		</button>
								  	</a> 
								  	<a href="#" title="Reject">
								  		<button type="button" class="btn btn-danger btn-mini">
								  			<!--<i class="icon-ban-circle"></i>-->Reject
								  		</button>
								  	</a>
								<?php
									}else if($d_bpk['kas_status'] == 3){//disetujui
								?>
								<div class="hidden-phone visible-desktop action-buttons">
									<a class="text-info" href="index.php?page=create&no=<?=$d_bpk['kas_no']?>" data-toggle="tooltip" title="View">
										<i class="icon-zoom-in bigger-130"></i>
									</a>
								</div>
								<?php
									}else if($d_bpk['kas_status'] == 4){//ditolak
								?>
								<div class="hidden-phone visible-desktop action-buttons">
									<a class="text-info" href="index.php?page=create&no=<?=$d_bpk['kas_no']?>" data-toggle="tooltip" title="View">
										<i class="icon-zoom-in bigger-130"></i>
									</a>
								</div>
								<?php
									}
								?>

								
							</div>
						</td>
					</tr><!--ALL-->
					<?php
							$c++;
							}
						}
					?>
				</tbody>
			</table>
		</div>
<?php 
	}elseif ($_GET['page'] == 'detail') {
?>
		<form class="form-horizontal" />
			<div class="row-fluid">
				<div class="span6">
					<div class="control-group">
						<label class="control-label" for="form-no-bpk">No. BPK</label>
						<?php //Untuk perulangan No BPK ?>
						<div class="controls">
							<input class="input-mini" type="text" id="form-no-bpk" name="bpk_no" required disabled value="100" />
						</div>
					</div><!--No BPK-->
					<div class="control-group">
						<label class="control-label" for="form-comp_code">Company Code</label>

						<div class="controls">
							<input class="input-mini" type="text" id="form-comp_code" name="bpk_comp_code" required disabled value="A019" />
						</div>
					</div><!--Company Code-->
				</div><!--End Span6-->
				<div class="span6">
					<div class="control-group">
						<label class="control-label" for="form-doc-date">Document Date</label>

						<div class="controls">
							<input type="text" id="form-doc-date" name="bpk_date" required disabled value="<?php echo date('d.m.Y H:i:s'); ?>" />
						</div>
					</div><!--Document Date-->
					<div class="control-group">
						<label class="control-label" for="form-dept">Dept. Unit</label>

						<div class="controls">
							<input type="text" id="form-dept" name="bpk_dept" required disabled value="<?php echo $_SESSION['dept_name']; ?>" />
						</div>
					</div><!--Dept. Unit-->
				</div><!--End Span6-->
			</div><!--End row-Fluid-->
			
			<div class="control-group">
				<label class="control-label" for="form-requestor">Requestor <b class="text-error">*</b></label>

				<div class="controls">
					<input type="text" id="form-requestor" name="bpk_req" required value="" placeholder="Requestor"/>
				</div>
			</div><!--Requestor-->

			<table class="table table-striped table-bordered table-hover">
				<thead>
					<th>GL Account</th>
					<th>Description</th>
					<th>Kredit</th>
					<th>Cost Center</th>
					<th>Status</th>
				</thead>

				<tbody>
					<tr>
						<td>100</td>
						<td>Iuran Lingkungan RT. 01</td>
						<td>50.000</td>
						<td>331101</td>
						<td>
							<span class="label label-info arrowed-in-right arrowed">Direvisi</span>
						</td>
					</tr><!--REVISI-->
				</tbody>
			</table>

			<div class="form-actions">
				<button class="btn btn-info" type="button" id="back" onclick="window.history.go(-1);"">
					<i class="icon-hand-left bigger-110"></i>
					Back
				</button>
			</div><!--Form Submit-->
		</form>
<?php
	}
}
?>