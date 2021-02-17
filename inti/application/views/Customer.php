<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<form class="form-horizontal" action="<?=base_url('customer/create')?>" method="POST">
					<div class="card-body">
						<h4 class="card-title">Customer Input</h4>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<label for="fmeter" class="col-sm-3 text-left control-label col-form-label">No Meter</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="meter" id="fmeter" placeholder="Value of Meter Here">
									</div>
								</div> 
								<div class="form-group row">
									<label for="fnama" class="col-sm-3 text-left control-label col-form-label">Nama</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="nama" id="fnama" placeholder="Value of Nama Here">
									</div>
								</div>
								<div class="form-group row">
									<label for="femail" class="col-sm-3 text-left control-label col-form-label">Email</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="email" id="femail" placeholder="Value of Email Here" email>
									</div>
								</div>
								<div class="form-group row">
									<label for="fusername" class="col-sm-3 text-left control-label col-form-label">Username</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="username" id="fusername" placeholder="Value of Username Here">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<label for="fpassword" class="col-sm-3 text-left control-label col-form-label">Password</label>
									<div class="col-sm-9">
										<input type="Password" class="form-control" name="password" id="fpassword" placeholder="Value of Password Here">
									</div>
								</div>
								<div class="form-group row">
									<label for="falamat" class="col-sm-3 text-left control-label col-form-label">Alamat</label>
									<div class="col-sm-9">
										<textarea style="height: 85px;" class="form-control" name="alamat" id="falamat" placeholder="Value of Alamat Here">
										</textarea>
									</div>
								</div>
								<div class="form-group row">
									<label for="fdaya" class="col-sm-3 text-left control-label col-form-label">Daya</label>
									<div class="col-sm-9">
										<select class="select2 form-control custom-select" name="daya" style="width: 100%; height:36px;">
											<option>Select</option>
											<?php foreach ($daya as $d): ?>
												<option value="<?=$d->id_tarif?>"><?=$d->daya?> KW</option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>


					<div class="border-top">
						<div class="card-body">
							<input type="submit" class="btn btn-info" value="Submit">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
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
							<th scope="col">No Meter</th>
							<th scope="col">Nama</th>
							<th scope="col">Email</th>
							<th scope="col">Username</th>
							<th scope="col">Password</th>
							<th scope="col">Alamat</th>
							<th scope="col">Daya</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 0;
						foreach ($show as $s ) {
							$i++;?>

							<tr>
								<th scope="row"><?=$i?></th>
								<td><?=$s->no_meter?></td>
								<td><?=$s->nama?></td>
								<td><?=$s->email?></td>
								<td><?=$s->username?></td>
								<td><?=md5($s->password)?></td>
								<td><?=$s->alamat?></td>
								<td><?=$s->daya?> KW</td>
								<td>
									<button type="button" class="btn btn-warning btn-sm" onclick="update(<?=$s->id_pelanggan?>)" data-toggle="modal" data-target="#edit">Update</button>
									<a href="<?=base_url()?>customer/delete/<?=$s->id_pelanggan?>" type="button" class="btn btn-danger btn-sm ml-1">&nbsp;Delete&nbsp;</a>
								</td>
							</tr>

							<?php } ?>


						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title te" id="myModalLabel">Update</h4>
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				</div>
				<form class="form-horizontal" action="<?=base_url('customer/updateCustomer')?>" method="POST">
					<div class="modal-body">
						<input type="hidden" name="u_id" id="u_id">
						<div class="form-group row">
							<label for="fmeter" class="col-sm-3 text-left control-label col-form-label">No Meter</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="meter" id="u_fmeter" placeholder="Value of Meter Here">
							</div>
						</div>
						<div class="form-group row">
							<label for="fnama" class="col-sm-3 text-left control-label col-form-label">Nama</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="nama" id="u_fnama" placeholder="Value of Nama Here">
							</div>
						</div>
						<div class="form-group row">
							<label for="femail" class="col-sm-3 text-left control-label col-form-label">Email</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="email" id="u_femail" placeholder="Value of Email Here" email>
							</div>
						</div>
						<div class="form-group row">
							<label for="fusername" class="col-sm-3 text-left control-label col-form-label">Username</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="username" id="u_fusername" placeholder="Value of Username Here">
							</div>
						</div>
						<div class="form-group row">
							<label for="fpassword" class="col-sm-3 text-left control-label col-form-label">Password</label>
							<div class="col-sm-9">
								<input type="Password" class="form-control" name="password" id="u_fpassword" placeholder="Value of Password Here">
							</div>
						</div>
						<div class="form-group row">
							<label for="falamat" class="col-sm-3 text-left control-label col-form-label">Alamat</label>
							<div class="col-sm-9">
								<textarea style="height: 85px;" class="form-control" name="alamat" id="u_falamat" placeholder="Value of Alamat Here">
								</textarea>
							</div>
						</div>
						<div class="form-group row">
							<label for="fdaya" class="col-sm-3 text-left control-label col-form-label">Daya</label>
							<div class="col-sm-9">
								<select class="select2 form-control custom-select" id="u_fdaya" name="daya" style="width: 100%; height:36px;">
									<option>Select</option>
									<?php foreach ($daya as $d): ?>
										<option value="<?=$d->id_tarif?>"><?=$d->daya?> KW</option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input type="submit" name="submit" class="btn btn-primary" value="Save Changes">
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
					$('#u_fmeter').val(data[0].no_meter);
					$('#u_fnama').val(data[0].nama);
					$('#u_femail').val(data[0].email);
					$('#u_fusername').val(data[0].username);
					$('#u_fpassword').val(data[0].password);
					$('#u_falamat').val(data[0].alamat);
					$('#u_fdaya').val(data[0].id_tarif);

				}
			})
		}
	</script>
