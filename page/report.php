<?php 
if(isset($_GET['page'])){
	if($_GET['page'] == 'report'){
?>
<div class="row-fluid">
	<p class="pull-right">
		<b class="text-error">Balance</b> : <input type="text" required readonly value="15.000.000" />
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
				<th>Amount</th>
				<th>Requestor</th>
				<th>Dept. Unit</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<td>100</td>
				<td>26.11.2018</td>
				<td>Iuran Lingkungan RT. 01</td>
				<td>50.000</td>
				<td>Angga</td>
				<td>HRD & GA</td>
				<td>
					<span class="label label-warning arrowed-in-right arrowed">Pengajuan</span>
				</td>
				<td>
					<div class="hidden-phone visible-desktop action-buttons">
						<a href="#" title="Approve">
					  		<button type="button" class="btn btn-success btn-mini">
					  			<!--<i class="icon-check"></i>-->Approve
					  		</button>
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
					</div>
				</td>
			</tr><!--ALL-->
			<tr>
				<td>100</td>
				<td>26.11.2018</td>
				<td>Iuran Lingkungan RT. 01</td>
				<td>50.000</td>
				<td>Angga</td>
				<td>HRD & GA</td>
				<td>
					<span class="label label-info arrowed-in-right arrowed">Direvisi</span>
					<a href="#" data-toggle="tooltip" title="Detail Revisi"> 
						<i class="icon-zoom-in bigger-130"></i>
					</a>
				</td>
				<td>
					<div class="hidden-phone visible-desktop action-buttons">
						<a href="#" title="Approve">
					  		<button type="button" class="btn btn-success btn-mini">
					  			<!--<i class="icon-check"></i>-->Approve
					  		</button>
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
					</div>
				</td>
			</tr><!--REVISI-->
			<tr>
				<td>100</td>
				<td>27.11.2018</td>
				<td>Iuran Lingkungan RT. 01</td>
				<td>50.000</td>
				<td>Angga</td>
				<td>HRD & GA</td>
				<td>
					<span class="label label-success arrowed-in-right arrowed">Disetujui</span>
				</td>
				<td></td>
			</tr><!--APPROVE-->
			<tr>
				<td>100</td>
				<td>27.11.2018</td>
				<td>Iuran Lingkungan RT. 01</td>
				<td>50.000</td>
				<td>Angga</td>
				<td>HRD & GA</td>
				<td>
					<span class="label label-important arrowed-in-right arrowed">Direject</span>
					<a href="index.php?page=detail" data-toggle="tooltip" title="Detail Reject"> 
						<i class="icon-zoom-in bigger-130"></i>
					</a>
				</td>
				<td></td>
			</tr><!--REJECT-->
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