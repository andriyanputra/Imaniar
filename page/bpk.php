<?php 
if(isset($_GET['page'])){
	if($_GET['page'] == 'create'){
		if($_GET['no']){
?>
			<form class="form-horizontal" >
				<?php 
					$qView = mysqli_query($koneksi, 
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
							        WHERE kas_kecil.kas_no = $_GET[no]");
					$d = mysqli_fetch_array($qView);
				?>

				<div class="row-fluid">
					<div class="span6">
						<div class="control-group">
							<label class="control-label" for="form-no-bpk">No. BPK</label>
							<div class="controls">
								<input class="input-mini" type="text" id="form-no-bpk" name="bpk_no" disabled value="<?=$d['kas_no']?>" />
							</div>
						</div><!--No BPK-->
						<div class="control-group">
							<label class="control-label" for="form-comp_code">Company Code</label>

							<div class="controls">
								<input class="input-mini" type="text" id="form-comp_code" name="bpk_comp_code" disabled value="<?=$d['kas_companycode']?>" />
							</div>
						</div><!--Company Code-->

						<div class="control-group">
							<label class="control-label" for="form-requestor">Requestor</label>

							<div class="controls">
								<input type="text" id="form-requestor" name="bpk_req" disabled value="<?=$d['kas_requestor']?>" placeholder="Requestor"/>
							</div>
						</div><!--Requestor-->

						<div class="control-group">
							<label class="control-label" for="form-notes">Notes</label>

							<div class="controls">
								<input type="text" id="form-notes" readonly value="<?=$d['kas_note']?>"/>
							</div>
						</div><!--BPK Notes-->
					</div><!--End Span6-->
					<div class="span6">
						<div class="control-group">
							<label class="control-label" for="form-doc-date">Document Date</label>
							<?php
								if($d['kas_status'] == 4){
							?>
							<div class="controls">
								<input type="text" id="form-doc-date" name="bpk_date" disabled value="<?=$d['kas_date']?>" />
							</div>
							<?php
								}else{
							?>
							<div class="controls">
								<input type="text" id="form-doc-date" name="bpk_date" disabled value="<?=$d['kas_datecreate']?>" />
							</div>
							<?php		
								}
							?>
						</div><!--Document Date-->
						<div class="control-group">
							<label class="control-label" for="form-dept">Dept. Unit</label>

							<div class="controls">
								<input type="text" id="form-dept" name="bpk_dept" disabled value="<?=$d['dept_nama']?>" />
							</div>
						</div><!--Dept. Unit-->

						<div class="control-group">
							<label class="control-label" for="form-status">Status</label>

							<div class="controls">
								<?php
									if($d['kas_status'] == 1){//pengajuan
								?>
								<span class="label label-warning arrowed-in-right arrowed">Pengajuan</span>
								<?php
									}else if($d['kas_status'] == 2){//direvisi
								?>
								<span class="label label-info arrowed-in-right arrowed">Direvisi</span>
								<?php
									}else if($d['kas_status'] == 3){//diproses
								?>
								<span class="label label-inverse arrowed-in-right arrowed">Diproses</span>
								<?php
									}else if($d['kas_status'] == 4){//disetujui
								?>
								<span class="label label-success arrowed-in-right arrowed">Disetujui</span>
								<?php
									}else if($d['kas_status'] == 5){//ditolak
								?>
								<span class="label label-important arrowed-in-right arrowed">Ditolak</span>
								<?php
									}
								?>
							</div>
						</div><!--Status-->
					</div><!--End Span6-->
				</div><!--End row-Fluid-->
				
				

				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<td>GL Account</td>
								<td>Cost Center</td>
								<td>Description</td>
								<?php
									if($d['amount_debet'] == 0){
										echo "<td>Kredit</td>";
									}else{
										echo "<td>Debet</td>";
									}
								?>
							</tr>
						</thead>

						<tbody>
							<tr>
								<td><?=$d['gl_no'].' - '.$d['gl_desc']?></td>
								<td><?=$d['cost_no'].' - '.$d['cost_desc']?></td>
								<td><?=$d['kas_desc']?></td>
							<?php
								if($d['amount_debet'] == 0){
							?>
									<td><?=rupiah($d['amount_kredit'])?></td>
							<?php
								}else{
							?>
									<td><?=rupiah($d['amount_debet'])?></td>
							<?php
								} 
							?>
							</tr>
						</tbody>
					</table>
				</div>
			    
				<div class="form-actions">
					<button class="btn btn-info" type="button" onclick='history.go(-1)'>
						<i class="icon-circle-arrow-left bigger-110"></i>
						Back
					</button>
				</div><!--Form Submit-->
			</form>	
<?php
		}else{
?>
			<form class="form-horizontal">
				<div class="row-fluid">
					<div class="span6">
						<div class="control-group">
							<label class="control-label" for="form-no-bpk">No. BPK</label>
							<?php 
								$q_bpk = mysqli_query($koneksi, "SELECT * FROM kas_kecil ORDER BY kas_no DESC LIMIT 1");
									if(mysqli_num_rows($q_bpk) == 0){ 
							?>
							<div class="controls">
								<input class="input-mini" type="text" id="form-no-bpk" name="bpk_no" required disabled value="100" />
							</div>
							<?php 
									}else{
										$bpk_no = mysqli_fetch_array($q_bpk);
							?>
							<div class="controls">
								<input class="input-mini" type="text" id="form-no-bpk" name="bpk_no" required disabled value="<?=$bpk_no['kas_no']+1?>" />
							</div>
							<?php
									}
							?>
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

				<div class="row-fluid">
					<div class="span6">
						<div class="control-group">
							<div class="controls">
								<a href="#modal-gl" role="button" class="btn btn-small btn-danger" data-toggle="modal"> Daftar GL Account </a>
							</div>
						</div><!--Requestor-->
					</div>
					<div class="span6">
						<div class="control-group">
							<div class="controls">
								<a href="#modal-cost" role="button" class="btn btn-small btn-danger" data-toggle="modal"> Daftar Cost Center </a>
							</div>
						</div><!--Requestor-->
						
					</div>
				</div>

				<div class="table-responsive">
				    <table class="table table-striped table-bordered table-hover" id="crud_table">
					    <tr>
							<th width="20%">GL Account <b class="text-error">*</b></th>
							<th width="45%">Description <b class="text-error">*</b></th>
							<th width="20%">Kredit <b class="text-error">*</b></th>
							<th width="20%">Cost Center <b class="text-error">*</b></th>
							<th>Action</th>
					    </tr>
					    <tr>
							<td contenteditable="true" class="item_gl"></td>
							<td contenteditable="true" class="item_desc"></td>
							<td contenteditable="true" class="item_kredit"></td>
							<td contenteditable="true" class="item_cost"></td>
							<td></td>
					    </tr>
				    </table>
				</div>
			    <div align="right">
			     	<button type="button" name="add" id="add" class="btn btn-success btn-small"><i class="icon-plus"></i> Add Row</button>
			    </div>

				<p>
					<h6><i class="text-error">Note:</i><br /><b class="text-error">*</b> <i>Mandatory</i></h6>
				</p>

				<div class="form-actions">
					<button class="btn btn-info" type="button" name="save" id="save">
						<i class="icon-ok bigger-110"></i>
						Submit
					</button>

					&nbsp; &nbsp; &nbsp;
					<button class="btn" type="reset">
						<i class="icon-undo bigger-110"></i>
						Reset
					</button>
				</div><!--Form Submit-->
			</form>
<?php 
		}
	}elseif ($_GET['page'] == 'search') {
?>
		<div class="row-fluid">
			<?php
				if($_SESSION['level'] == '1'){
			?>
				<a href="#modal-create" title="Create BPK" data-toggle="modal">
			  		<button type="button" class="btn btn-danger btn-small pull-left">
			  			<i class="icon-plus"></i> Create BPK
			  		</button>
			  	</a>
		  	<?php
		  			
		  		}else{
		  	?>
		  		<a href="index.php?page=create" title="Create BPK">
			  		<button type="button" class="btn btn-danger btn-small pull-left">
			  			<i class="icon-plus"></i> Create BPK
			  		</button>
			  	</a>
		  	<?php		
		  		}
		  	?>
			<!-- Search BPK-->
			<div class="space"></div><div class="space"></div><div class="space"></div>
			<div class="row-fluid">
				<div class="span12">
					<form class="form-inline center" action="" method="post" name="postformsearch">
						<!--<div class="input-daterange">-->
							<div class="input-append">
								<input class="input-small date-picker" id="start_date" name="start_date" type="text" data-date-format="dd-mm-yyyy" placeholder="Start Date"/>
								<span class="add-on">
									<i class="icon-calendar"></i>
								</span>
							</div>
							&nbsp;&nbsp;-&nbsp;&nbsp;
							<div class="input-append">
								<input class="input-small date-picker" id="end_date" name="end_date" type="text" data-date-format="dd-mm-yyyy" placeholder="End Date"/>
								<span class="add-on">
									<i class="icon-calendar"></i>
								</span>
							</div>
						<!--</div>-->
						&nbsp;&nbsp;&nbsp;
						<input type="submit" name="search" id="search" value="Search" class="btn btn-info" />
						<!--<button onclick="return true;" id="search" class="btn btn-info btn-small">
							Search
							<i class="icon-search icon-on-right bigger-110"></i>
						</button>-->
					</form>
				</div>
			</div>
			
			<?php 
				if($_SESSION['level'] == '1'){
					include 'inc/search.php';
				}
			?>
		</div>
<?php 
	}elseif ($_GET['page'] == 'createDebit') {
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

			<div class="row-fluid">
				<div class="span6">
					<div class="control-group">
						<div class="controls">
							<a href="#modal-gl" role="button" class="btn btn-small btn-danger" data-toggle="modal"> Daftar GL Account </a>
						</div>
					</div><!--Requestor-->
				</div>
				<div class="span6">
					<div class="control-group">
						<div class="controls">
							<a href="#modal-cost" role="button" class="btn btn-small btn-danger" data-toggle="modal"> Daftar Cost Center </a>
						</div>
					</div><!--Requestor-->
					
				</div>
			</div>

			<div class="table-responsive">
			    <table class="table table-striped table-bordered table-hover" id="crud_table">
				    <tr>
						<th width="20%">GL Account <b class="text-error">*</b></th>
						<th width="45%">Description <b class="text-error">*</b></th>
						<th width="20%">Debit <b class="text-error">*</b></th>
						<th width="20%">Cost Center <b class="text-error">*</b></th>
						<th>Action</th>
				    </tr>
				    <tr>
						<td contenteditable="true" class="item_gl"></td>
						<td contenteditable="true" class="item_desc"></td>
						<td contenteditable="true" class="item_debit"></td>
						<td contenteditable="true" class="item_cost"></td>
						<td></td>
				    </tr>
			    </table>
			</div>
		    <div align="right">
		     	<button type="button" name="add" id="add" class="btn btn-success btn-small"><i class="icon-plus"></i> Add Row</button>
		    </div>

			<p>
				<h6><i class="text-error">Note:</i><br /><b class="text-error">*</b> <i>Mandatory</i></h6>
			</p>

			<div class="form-actions">
				<button class="btn btn-info" type="button" name="save" id="save">
					<i class="icon-ok bigger-110"></i>
					Submit
				</button>

				&nbsp; &nbsp; &nbsp;
				<button class="btn" type="reset">
					<i class="icon-undo bigger-110"></i>
					Reset
				</button>
			</div><!--Form Submit-->
		</form>
<?php 
	}elseif ($_GET['page'] == 'view') {
?>
		<div class="row-fluid">
			<?php
				$q_amount = mysqli_query($koneksi, "SELECT SUM(amount.amount_kredit) AS kredit, SUM(amount.amount_debet) AS debet
									FROM
									    amount
									    INNER JOIN kas_kecil
									        ON (amount.amount_id = kas_kecil.amount_id) WHERE kas_kecil.kas_status = 4");
				$d_amount = mysqli_fetch_array($q_amount);
				if($_SESSION['level'] == '1'){
			?>
				<a href="#modal-create" title="Create BPK" data-toggle="modal">
			  		<button type="button" class="btn btn-danger btn-small pull-left">
			  			<i class="icon-plus"></i> Create BPK
			  		</button>
			  	</a>
			  	<p class="pull-right">
			  		<?php if($d_amount['debet'] == 0){?>
			  		<b class="text-error">Balance</b> : <input type="text" required readonly value="<?=rupiah(0-$d_amount['kredit'])?>" />
			  		<?php }else{?>
			  		<b class="text-error">Balance</b> : <input type="text" required readonly value="<?=rupiah($d_amount['debet']-$d_amount['kredit'])?>" />
			  		<?php } ?>
				</p>
		  	<?php
		  			
		  		}else{
		  	?>
		  		<a href="index.php?page=create" title="Create BPK">
			  		<button type="button" class="btn btn-danger btn-small pull-left">
			  			<i class="icon-plus"></i> Create BPK
			  		</button>
			  	</a>
		  	<?php		
		  		}
		  	?>
			<div class="space"></div><div class="space"></div><div class="space"></div>
			<div class="table-header">
				Results for "Latest BPK" <?php //echo $_SESSION['dept_id']; ?>
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
						if($_SESSION['dept_id'] == 6){
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
						}else{ 
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
									        WHERE kas_kecil.dept_id = $_SESSION[dept_id] AND cost_center.dept_id = $_SESSION[dept_id]");
						}
						if(mysqli_num_rows($q_bpk) == 0){ 
							echo '<tr><td>Tidak ada data!</td></tr>';
						}else{
							$c = 1;
							while ($bpk = mysqli_fetch_array($q_bpk)) {
					?>
						<tr>
							<td><?=$bpk['kas_no']?></td>
							<?php if($bpk['kas_status'] == 4 || $bpk['kas_status'] == 2 || $bpk['kas_status'] == 5){ ?>
								<td><?=$bpk['kas_date']?></td>
							<?php } else{ ?>
								<td><?=$bpk['kas_datecreate']?></td>
							<?php } ?>
							<td><?=$bpk['kas_desc']?></td>
							<td><?=rupiah($bpk['amount_debet'])?></td>
							<td><?=rupiah($bpk['amount_kredit'])?></td>
							<td><?=$bpk['kas_requestor']?></td>
							<td><?=$bpk['dept_nama']?></td>
							<td>
								<?php
									if($bpk['kas_status'] == 1){//pengajuan
								?>
								<span class="label label-warning arrowed-in-right arrowed">Pengajuan</span>
								<?php
									}else if($bpk['kas_status'] == 2){//direvisi
								?>
								<span class="label label-info arrowed-in-right arrowed">Direvisi</span>
								<?php
									}else if($bpk['kas_status'] == 3){//diproses
								?>
								<span class="label label-inverse arrowed-in-right arrowed">Diproses</span>
								<?php
									}else if($bpk['kas_status'] == 4){//disetujui
								?>
								<span class="label label-success arrowed-in-right arrowed">Disetujui</span>
								<?php
									}else if($bpk['kas_status'] == 5){//ditolak
								?>
								<span class="label label-important arrowed-in-right arrowed">Ditolak</span>
								<?php
									}
								?>
							</td>
							<td>
								<?php
									if($bpk['kas_status'] == 2){//direvisi
								?>
								<div class="hidden-phone visible-desktop action-buttons">
									<a class="text-warning" href="#" data-toggle="tooltip" title="Revisi">
										<i class="icon-pencil bigger-130"></i>
									</a>
								</div>
								<?php
									}else{
										if($_SESSION['level'] == '1'){
								?>
								<div class="hidden-phone visible-desktop action-buttons">
									<a class="text-info" href="index.php?page=create&no=<?=$bpk['kas_no']?>" data-toggle="tooltip" title="View">
										<i class="icon-zoom-in bigger-130"></i>
									</a>
								</div>
								<?php
											if($bpk['kas_status'] == 4){
								?>
								<div class="hidden-phone visible-desktop action-buttons">
									<a class="text-info" href="#" data-toggle="tooltip" title="View" onClick="window.open('page/print.php?no=<?=$bpk['kas_no']?>', 'Print Doc').print()">
										<i class="icon-print bigger-130"></i>
									</a>
								</div>
								<?php
											}
										}else{
								?>
								<div class="hidden-phone visible-desktop action-buttons">
									<a class="text-info" href="index.php?page=create&no=<?=$bpk['kas_no']?>" data-toggle="tooltip" title="View">
										<i class="icon-zoom-in bigger-130"></i>
									</a>
								</div>
								<?php
										}
									}
								?>
							</td>
						</tr>
					<?php
							$c++;
							}
						}
					?>
				</tbody>
			</table>
		</div>
<?php
	}
}
?>