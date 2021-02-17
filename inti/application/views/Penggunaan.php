<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title m-b-0">Price Table</h5>
				</div>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">No Pelanggan</th>
							<th scope="col">Nomor Meteran</th>
							<th scope="col">Daya</th>
							<th colspan="3" scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$i = 0;
						foreach ($show as $s ) {
							$i++;?>

							<tr>
								<th scope="row"><?=$i?></th>
								<td><?=$s->nama?></td>
								<td><?=$s->no_meter?></td>
								<td><?=$s->daya?> KW</td>
								<td>
									<button type="button" class="btn btn-success btn-sm" onclick="update(<?=$s->id_pelanggan?>)" data-toggle="modal" data-target="#add">Add Penggunaan</button>

									<button onclick="window.location.href='<?=base_url()?>penggunaan/detail/<?=$s->id_pelanggan?>'"" class="btn btn-primary btn-sm ml-1">&nbsp;Detail Penggunaan&nbsp;</button>

									<button onclick="window.location.href='<?=base_url()?>tagihan/detail/<?=$s->id_pelanggan?>'"" class="btn btn-info btn-sm ml-1">&nbsp;Detail Tagihan&nbsp;</button>
								</td>
							</tr>

							<?php } ?>


						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title te" id="myModalLabel">Update</h4>
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				</div>
				<form class="form-horizontal" action="<?=base_url('penggunaan/create')?>" method="POST">
					<div class="modal-body">
						<input type="hidden" name="id_pelanggan" id="u_id">
						<div class="form-group row">
							<label for="fnama" class="col-sm-3 text-left control-label col-form-label">Nama</label>
							<div class="col-sm-9">
								<input type="text" id="disabledTextInput" name="nama" class="form-control" disabled="">
							</div>
						</div>

						<div class="form-group row">
							<label for="fbulan" class="col-sm-3 text-left control-label col-form-label">Bulan</label>
							<div class="col-sm-9">
								<?php $bulan=array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		                          ?>
		                          <select name="bulan" class="form-control">
		                            <option></option>
		                            <?php foreach ($bulan as $a => $b): ?>
		                              <option value="<?=$a?>"><?=$b?></option>
		                            <?php endforeach ?>
		                          </select>
							</div>
						</div>
						<div class="form-group row">
							<label for="ftahun" class="col-sm-3 text-left control-label col-form-label">Tahun</label>
							<div class="col-sm-9">
		                          <select name="tahun" class="form-control">
		                            <option></option>
		                            <?php for ($i=2015; $i <= 2020 ; $i++) { ?>
		                            	<option value="<?=$i?>"><?=$i?></option>
		                            <?php } ?>
		                            
		                          </select>
							</div>
						</div>
						<div class="form-group row">
							<label for="fmeterawal" class="col-sm-3 text-left control-label col-form-label">Meter Awal</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="metwal" id="u_fmeterawal" placeholder="Value of Meter Awal Here">
							</div>
						</div>
						<div class="form-group row">
							<label for="fmeterakhir" class="col-sm-3 text-left control-label col-form-label">Meter Akhir</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="methir" id="u_fmeterakhir" placeholder="Value of Meter Akhir Here">
							</div>
						</div>

						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input type="submit" name="submit" class="btn btn-primary" value="Submit">
					</div>
				</div>
			</form>
		</div>
	</div>

	<script type="text/javascript">
		function update(a) {
			$.ajax({
				type:"post",
				url:"<?=base_url()?>customer/show_data/"+a,
				dataType:"json",
				success:function (data) {
					$('#u_id').val(data[0].id_pelanggan);
					$('#disabledTextInput').val(data[0].nama);
				}
			})
		}
	</script>