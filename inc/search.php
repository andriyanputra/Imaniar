<?php
	if(isset($_POST['search'])){
		$tgl_awal = date('Y-m-d', strtotime($_POST['start_date']));
		$tgl_akhir = date('Y-m-d', strtotime($_POST['end_date']));
		//echo $tgl_awal.' - '.$tgl_akhir;
		if(empty($tgl_awal) || empty($tgl_akhir)){
		?>
			<script language="JavaScript">
                alert('Tanggal Awal dan Tanggal Akhir Harap di Isi!');
                document.location='index.php?page=search';
            </script>
        <?php
		}else{
		?>
			<!-- End Search BPK-->
			<i class="center"><b>Informasi : </b> Hasil pencarian data berdasarkan periode Tanggal <b><?php echo $_POST['start_date']?></b> s/d <b><?php echo $_POST['end_date']?></b></i>
			<div class="table-header">
				Hasil Pencarian
			</div>

		<?php
		}
		?>
		<table id="modal-searchbpk" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>BPK No</th>
					<th>Doc. Date</th>
					<th>Desc</th>
					<th colspan="2" class="center">Amount</th>
					<th>Requestor</th>
					<th>Dept. Unit</th>
					<th>Status</th>
					<!--<th>Action</th>-->
				</tr>
			</thead>
			<tbody>
				<?php 
					$q_search=mysqli_query($koneksi, "SELECT 
														kas_no AS noBPK,
														kas_datecreate AS tgl,
														kas_desc, amount_kredit AS kredit,
														amount_debet AS debet,
														kas_requestor AS req,
														dept_nama AS dept,
														kas_status AS status
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
									    WHERE kas_kecil.kas_datecreate between '$tgl_awal' and '$tgl_akhir'");
					if(mysqli_num_rows($q_search) == 0){ 
				?>
						<tr><td colspan="8">Tidak Ada data</td></tr>
				<?php 
					}else{
						$no = 1;
						while ($d_search = mysqli_fetch_array($q_search)) {
					?>
						<tr>
							<td><?=$no?></td>
							<td><?=$d_search['noBPK']?></td>
							<td><?=$d_search['tgl']?></td>
							<td><?=$d_search['kas_desc']?></td>
							<td><?=rupiah($d_search['debet'])?></td>
							<td><?=rupiah($d_search['kredit'])?></td>
							<td><?=$d_search['req']?></td>
							<td><?=$d_search['dept']?></td>
							<td>
								<?php
									if($d_search['status'] == 1){//pengajuan
								?>
								<span class="label label-warning arrowed-in-right arrowed">Pengajuan</span>
								<?php
									}else if($d_search['status'] == 2){//direvisi
								?>
								<span class="label label-info arrowed-in-right arrowed">Direvisi</span>
								<?php
									}else if($d_search['status'] == 3){//diproses
								?>
								<span class="label label-inverse arrowed-in-right arrowed">Diproses</span>
								<?php
									}else if($d_search['status'] == 4){//disetujui
								?>
								<span class="label label-success arrowed-in-right arrowed">Disetujui</span>
								<?php
									}else if($d_search['status'] == 5){//ditolak
								?>
								<span class="label label-important arrowed-in-right arrowed">Ditolak</span>
								<?php
									}
								?>
							</td>
						</tr>
					<?php
							$no++;
						}
					}
				?>
			</tbody>
		</table>
		<?php
			$q_amount = mysqli_query($koneksi, "SELECT SUM(amount.amount_kredit) AS kredit, SUM(amount.amount_debet) AS debet
									FROM
									    amount
									    INNER JOIN kas_kecil
									        ON (amount.amount_id = kas_kecil.amount_id) 
									    WHERE kas_kecil.kas_status = 4 AND kas_kecil.kas_datecreate BETWEEN '$tgl_awal' AND '$tgl_akhir'");
			$d_amount = mysqli_fetch_array($q_amount);
		?>
		<div class="space-6"></div>
		<p class="pull-right">
	  		<?php if($d_amount['debet'] == 0){?>
	  		<b class="text-error">Balance</b> : <input type="text" required readonly value="<?=rupiah(0-$d_amount['kredit'])?>" />
	  		<?php }else{?>
	  		<b class="text-error">Balance</b> : <input type="text" required readonly value="<?=rupiah($d_amount['debet']-$d_amount['kredit'])?>" />
	  		<?php } ?>
		</p>
<?php
	}
?>