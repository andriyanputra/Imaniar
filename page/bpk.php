<?php 
if(isset($_GET['page'])){
	if($_GET['page'] == 'create'){
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
	}elseif ($_GET['page'] == 'view') {
?>
<div class="row-fluid">
	<a href="#modal-create" title="Create BPK" data-toggle="modal">
  		<button type="button" class="btn btn-danger btn-small pull-left">
  			<i class="icon-plus"></i> Create BPK
  		</button>
  	</a>
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
			<?php 
				/*$q_cost = mysqli_query($koneksi, "SELECT * FROM cost_center");
				if(mysqli_num_rows($q_cost) == 0){ 
					echo '<tr><td>Tidak ada data!</td></tr>';
				}else{
					$c = 1;
					while ($cost = mysqli_fetch_array($q_cost)) {*/
			?>
				<tr>
					<td>100</td>
					<td>26.11.2018</td>
					<td>Iuran Lingkungan RT. 01</td>
					<td>50.000</td>
					<td>Angga</td>
					<td>HRD & GA</td>
					<td>
						<span class="label label-warning arrowed-in-right arrowed">Pengajuan</span>
						<span class="label label-info arrowed-in-right arrowed">Direvisi</span>
						<span class="label label-success arrowed-in-right arrowed">Disetujui</span>
						<span class="label label-important arrowed-in-right arrowed">Ditolak</span>
					</td>
					<td>
						<div class="hidden-phone visible-desktop action-buttons">
							<a class="text-warning" href="#" data-toggle="tooltip" title="Revisi">
								<i class="icon-pencil bigger-130"></i>
							</a>
						</div>
					</td>
				</tr>
			<?php
					/*$c++;
					}
				}*/
			?>
		</tbody>
	</table>
</div>
<?php
	}
}
?>