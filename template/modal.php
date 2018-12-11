<div id="modal-gl" class="modal hide fade" tabindex="-1">
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			GL Account
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<table id="modal-glaccount" class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
				<thead>
				
							<tr>
								<th>No</th>
								<th>Description</th>
								<th>GL Account</th>
							</tr>
				
				</thead>

				<tbody>
					<?php 
						$q_gl = mysqli_query($koneksi, "SELECT * FROM gl_account");
						if(mysqli_num_rows($q_gl) == 0){ 
							echo '<tr><td>Tidak ada data!</td></tr>';
						}else{
							$n = 1;
							while ($gl = mysqli_fetch_array($q_gl)) {
					?>
						<tr>
							<td><?php echo $n; ?></td>
							<td><?php echo $gl['gl_desc']; ?></td>
							<td><?php echo $gl['gl_no']; ?></td>
						</tr>
					<?php
							$n++;
							}
						}
					?>
				</tbody>
			</table>
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-small btn-danger pull-right" data-dismiss="modal">
			<i class="icon-remove"></i>
			Close
		</button>
	</div>
</div><!--GL ACCOUNT-->

<div id="modal-cost" class="modal hide fade" tabindex="-1">
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Cost Center
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<table id="modal-costcenter" class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
				<thead>
				
							<tr>
								<th>No</th>
								<th>Description</th>
								<th>Cost Center</th>
							</tr>
				
				</thead>

				<tbody>
					<?php 
						$q_cost = mysqli_query($koneksi, "SELECT * FROM cost_center");
						if(mysqli_num_rows($q_cost) == 0){ 
							echo '<tr><td>Tidak ada data!</td></tr>';
						}else{
							$c = 1;
							while ($cost = mysqli_fetch_array($q_cost)) {
					?>
						<tr>
							<td><?php echo $c; ?></td>
							<td><?php echo $cost['cost_desc']; ?></td>
							<td><?php echo $cost['cost_no']; ?></td>
						</tr>
					<?php
							$c++;
							}
						}
					?>
				</tbody>
			</table>
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-small btn-danger pull-right" data-dismiss="modal">
			<i class="icon-remove"></i>
			Close
		</button>
	</div>
</div><!--COST CENTER-->

<div id="modal-create" class="modal hide fade" tabindex="-1">
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Create BPK
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="space-6"></div>
		<div class="row-fluid">
			<div class="span3 offset3">
				<a href="">	
					<button type="button" class="btn btn-primary btn-small pull-left">
			  			<i class="icon-plus"></i> Create Debit
			  		</button>
			  	</a>
			</div>
			<div class="span6">
				<a href="index.php?page=create">
					<button class="btn btn-warning btn-small" type="button">
						<i class="icon-plus"></i> Create Kredit
					</button>
				</a>
			</div>
		</div>
		<div class="space-6"></div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-small btn-danger pull-right" data-dismiss="modal">
			<i class="icon-remove"></i>
			Close
		</button>
	</div>
</div><!--COST CENTER-->		