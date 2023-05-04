<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>
				Halaman Data Pembinaan
			</h1>
		</div>
		<div class="row text-capitalize">

			<div class="col-12">

				<a href="<?= site_url('pembinaan/export') ?>" class="btn btn-lg btn-info mb-5">
					Export Excel
				</a>

				<div class="card">
					<div class="card-header">
						<ul class="nav nav-pills" id="pembinaantab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active show" id="tab01" data-toggle="tab" href="#tab1" role="tab" aria-controls="home" aria-selected="false">
									Semua Data
									<!-- <span class="badge badge-info">5</span> -->
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="tab02" data-toggle="tab" href="#tab2" role="tab" aria-controls="profile" aria-selected="false">Belum Dibina
									<!-- <span class="badge badge-warning">5</span> -->
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="tab03" data-toggle="tab" href="#tab3" role="tab" aria-controls="contact" aria-selected="true">
									Sudah Dibina
									<!-- <span class="badge badge-success">5</span> -->
								</a>
							</li>
						</ul>
					</div>
					<div class="card-body">
						<div class="tab-content" id="kontenpembinaantab">
							<div class="tab-pane fade  active show" id="tab1" role="tabpanel" aria-labelledby="tab1">
								<div class="table-responsive">

									<table class="table table-striped" id="table1">
										<thead>
											<tr>
												<th style="width:5%;">#</th>
												<th>Nama</th>
												<th>Jenis Perpustakaan</th>
												<th style="width:30%;">Alamat</th>
												<th>Status</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1; ?>
											<?php
											foreach ($row->result() as $dataa) {

												switch ($dataa->jenis_perpus) {
													case 'sekolah';
														$jenis_perpus = 'Perpustakaan Sekolah';
														break;
													case 'umum';
														$jenis_perpus = 'Perpustakaan Umum';
														break;
													case 'khusus';
														$jenis_perpus = 'Perpustakaan Khusus';
														break;
												}

												switch ($dataa->status) {
													case '0';
														$status = '<span class="badge badge-warning">Belum Dibina</span>';
														break;
													case '1';
														$status = '<span class="badge badge-info">Sudah Dibina</span>';
														break;
												}

											?>
												<tr>
													<td><?= $no++; ?></td>
													<td><?= $dataa->nama; ?></td>
													<td>
														<?= $jenis_perpus; ?> - <?= $dataa->sub_jenis_perpus ?></td>
													<td>
														<?= $dataa->alamat; ?><br>
														<span id="kelurahan<?= $dataa->kelurahan; ?>"></span>,
														<span id="kecamatan<?= $dataa->kecamatan; ?>"></span>,
														<span id="kabupaten<?= $dataa->kabupaten; ?>"></span>
													</td>
													<td>
														<?= $status; ?>
													</td>
													<td>
														<a data-toggle="modal" data-target="#exampleModal" href="#" data-id="<?= $dataa->id ?>" data-name="<?= $dataa->nama ?>" data-nip="<?= $dataa->nip ?>" data-telp="<?= $dataa->no_telp ?>" data-nama-perpus="<?= $dataa->nama_perpus ?>" data-jenis="<?= $jenis_perpus ?>" data-jenis="<?= $jenis_perpus ?>" data-sub-jenis="<?= $dataa->sub_jenis_perpus ?>" data-alamat="<?= $dataa->alamat ?>" data-status="<?= $dataa->status ?>" data-daftar="<?= $dataa->created_at ?>" data-dibina="<?= $dataa->dibina_at ?>" data-akreditasi="<?= $dataa->akreditasi ?>" class="btn btn-info">Detail</a>
														<?php
														if ($dataa->status == 0) {
															echo '<a href="#" id="bina' . $dataa->id . '" class="btn btn-warning">Bina</a>';
														}
														?>
													</td>
												</tr>
											<?php
											}
											?>

											<script>
												$(document).ready(function() {
													<?php
													foreach ($row->result() as $dataa) {
													?>
														$.ajax({
															url: 'https://dev.farizdotid.com/api/daerahindonesia/kelurahan/<?= $dataa->kelurahan ?>',
															type: 'GET',
															dataType: 'json',
															success: function(data) {
																$('#kelurahan<?= $dataa->kelurahan; ?>').html(data.nama);
															}
														});
													<?php
													}
													?>

													<?php
													foreach ($row->result() as $dataa) {
													?>
														$.ajax({
															url: 'https://dev.farizdotid.com/api/daerahindonesia/kecamatan/<?= $dataa->kecamatan ?>',
															type: 'GET',
															dataType: 'json',
															success: function(data) {
																$('#kecamatan<?= $dataa->kecamatan; ?>').html(data.nama);
															}
														});
													<?php
													}
													?>

													<?php
													foreach ($row->result() as $dataa) {
													?>
														$.ajax({
															url: 'https://dev.farizdotid.com/api/daerahindonesia/kota/<?= $dataa->kabupaten ?>',
															type: 'GET',
															dataType: 'json',
															success: function(data) {
																$('#kabupaten<?= $dataa->kabupaten; ?>').html(data.nama);
															}
														});
													<?php
													}
													?>

													<?php
													foreach ($row->result() as $dataa) {
													?>
														$('#bina<?= $dataa->id; ?>').click(function() {
															$.ajax({
																url: '<?= base_url('pembinaan/ubah_status/' . $dataa->id); ?>',
																type: 'POST',
																dataType: 'json',
																data: {
																	id: '<?= $dataa->id; ?>'
																},
																success: function(data) {
																	Swal.fire({
																		title: 'Berhasil!',
																		text: 'Data Berhasil Di Kirim',
																		icon: 'success',
																		confirmButtonText: 'Ok'
																	}).then((result) => {
																		if (result.isConfirmed) {
																			window.location.href = "<?php echo base_url('pembinaan'); ?>";
																		}
																	})
																}
															});
														});
													<?php
													}
													?>
												});
											</script>

										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2">

								<div class="table-responsive">

									<table class="table table-striped" id="table1">
										<thead>
											<tr>
												<th style="width:5%;">#</th>
												<th>Nama</th>
												<th>Jenis Perpustakaan</th>
												<th style="width:30%;">Alamat</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1; ?>
											<?php
											foreach ($belum->result() as $dataa) {

												switch ($dataa->jenis_perpus) {
													case 'sekolah';
														$jenis_perpus = 'Perpustakaan Sekolah';
														break;
													case 'umum';
														$jenis_perpus = 'Perpustakaan Umum';
														break;
													case 'khusus';
														$jenis_perpus = 'Perpustakaan Khusus';
														break;
												}

											?>
												<tr>
													<td><?= $no++; ?></td>
													<td><?= $dataa->nama; ?></td>
													<td>
														<?= $jenis_perpus; ?> - <?= $dataa->sub_jenis_perpus ?></td>
													<td>
														<?= $dataa->alamat; ?><br>
														<span id="bkelurahan<?= $dataa->kelurahan; ?>"></span>,
														<span id="bkecamatan<?= $dataa->kecamatan; ?>"></span>,
														<span id="bkabupaten<?= $dataa->kabupaten; ?>"></span>
													</td>
													<td>
														<a data-toggle="modal" data-target="#exampleModal" href="#" data-id="<?= $dataa->id ?>" data-name="<?= $dataa->nama ?>" data-nip="<?= $dataa->nip ?>" data-telp="<?= $dataa->no_telp ?>" data-nama-perpus="<?= $dataa->nama_perpus ?>" data-jenis="<?= $jenis_perpus ?>" data-jenis="<?= $jenis_perpus ?>" data-sub-jenis="<?= $dataa->sub_jenis_perpus ?>" data-alamat="<?= $dataa->alamat ?>" data-status="<?= $dataa->status ?>" data-daftar="<?= $dataa->created_at ?>" data-dibina="<?= $dataa->dibina_at ?>" data-akreditasi="<?= $dataa->akreditasi ?>" class="btn btn-info">Detail</a>
														<?php
														if ($dataa->status == 0) {
															echo '<a href="#" class="btn btn-warning">Bina</a>';
														}
														?>
													</td>
												</tr>
											<?php
											}
											?>

											<script>
												$(document).ready(function() {
													<?php
													foreach ($belum->result() as $dataa) {
													?>
														$.ajax({
															url: 'https://dev.farizdotid.com/api/daerahindonesia/kelurahan/<?= $dataa->kelurahan ?>',
															type: 'GET',
															dataType: 'json',
															success: function(data) {
																$('#bkelurahan<?= $dataa->kelurahan; ?>').html(data.nama);
															}
														});
													<?php
													}
													?>

													<?php
													foreach ($belum->result() as $dataa) {
													?>
														$.ajax({
															url: 'https://dev.farizdotid.com/api/daerahindonesia/kecamatan/<?= $dataa->kecamatan ?>',
															type: 'GET',
															dataType: 'json',
															success: function(data) {
																$('#bkecamatan<?= $dataa->kecamatan; ?>').html(data.nama);
															}
														});
													<?php
													}
													?>

													<?php
													foreach ($belum->result() as $dataa) {
													?>
														$.ajax({
															url: 'https://dev.farizdotid.com/api/daerahindonesia/kota/<?= $dataa->kabupaten ?>',
															type: 'GET',
															dataType: 'json',
															success: function(data) {
																$('#bkabupaten<?= $dataa->kabupaten; ?>').html(data.nama);
															}
														});
													<?php
													}
													?>
												});
											</script>


										</tbody>
									</table>
								</div>

							</div>
							<div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3">

								<div class="table-responsive">

									<table class="table table-striped" id="table1">
										<thead>
											<tr>
												<th style="width:5%;">#</th>
												<th>Nama</th>
												<th>Jenis Perpustakaan</th>
												<th style="width:30%;">Alamat</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1; ?>
											<?php
											foreach ($sudah->result() as $dataa) {

												switch ($dataa->jenis_perpus) {
													case 'sekolah';
														$jenis_perpus = 'Perpustakaan Sekolah';
														break;
													case 'umum';
														$jenis_perpus = 'Perpustakaan Umum';
														break;
													case 'khusus';
														$jenis_perpus = 'Perpustakaan Khusus';
														break;
												}

											?>
												<tr>
													<td><?= $no++; ?></td>
													<td><?= $dataa->nama; ?></td>
													<td>
														<?= $jenis_perpus; ?> - <?= $dataa->sub_jenis_perpus ?></td>
													<td>
														<?= $dataa->alamat; ?><br>
														<span id="skelurahan<?= $dataa->kelurahan; ?>"></span>,
														<span id="skecamatan<?= $dataa->kecamatan; ?>"></span>,
														<span id="skabupaten<?= $dataa->kabupaten; ?>"></span>
													</td>
													<td>
														<a data-toggle="modal" data-target="#exampleModal" href="#" data-id="<?= $dataa->id ?>" data-name="<?= $dataa->nama ?>" data-nip="<?= $dataa->nip ?>" data-telp="<?= $dataa->no_telp ?>" data-nama-perpus="<?= $dataa->nama_perpus ?>" data-jenis="<?= $jenis_perpus ?>" data-jenis="<?= $jenis_perpus ?>" data-sub-jenis="<?= $dataa->sub_jenis_perpus ?>" data-alamat="<?= $dataa->alamat ?>" data-status="<?= $dataa->status ?>" data-daftar="<?= $dataa->created_at ?>" data-dibina="<?= $dataa->dibina_at ?>" data-akreditasi="<?= $dataa->akreditasi ?>" class="btn btn-info">Detail</a>
													</td>
												</tr>
											<?php
											}
											?>

											<script>
												$(document).ready(function() {
													<?php
													foreach ($sudah->result() as $dataa) {
													?>
														$.ajax({
															url: 'https://dev.farizdotid.com/api/daerahindonesia/kelurahan/<?= $dataa->kelurahan ?>',
															type: 'GET',
															dataType: 'json',
															success: function(data) {
																$('#skelurahan<?= $dataa->kelurahan; ?>').html(data.nama);
															}
														});
													<?php
													}
													?>

													<?php
													foreach ($sudah->result() as $dataa) {
													?>
														$.ajax({
															url: 'https://dev.farizdotid.com/api/daerahindonesia/kecamatan/<?= $dataa->kecamatan ?>',
															type: 'GET',
															dataType: 'json',
															success: function(data) {
																$('#skecamatan<?= $dataa->kecamatan; ?>').html(data.nama);
															}
														});
													<?php
													}
													?>

													<?php
													foreach ($sudah->result() as $dataa) {
													?>
														$.ajax({
															url: 'https://dev.farizdotid.com/api/daerahindonesia/kota/<?= $dataa->kabupaten ?>',
															type: 'GET',
															dataType: 'json',
															success: function(data) {
																$('#skabupaten<?= $dataa->kabupaten; ?>').html(data.nama);
															}
														});
													<?php
													}
													?>
												});
											</script>


										</tbody>
									</table>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-bordered table-striped table-hovered" id="datadetail">

				</table>

				<p class="d-block bg-info py-2 text-white text-center" id="isidibina"></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('.btn-info').on('click', function() {
			var id = $(this).data('id');
			var name = $(this).data('name');
			var nip = $(this).data('nip');
			var telp = $(this).data('telp');
			var nama_perpus = $(this).data('nama-perpus');
			var jenis = $(this).data('jenis');
			var sub_jenis = $(this).data('sub-jenis');
			var akreditasi = $(this).data('akreditasi');
			var alamat = $(this).data('alamat');
			var status = $(this).data('status');
			var daftar = $(this).data('daftar');
			var dibina = $(this).data('dibina');

			if (status == 1) {
				var status = "<span class='badge badge-success'>Sudah Dibina</span>";
			} else {
				var status = "<span class='badge badge-danger'>Belum Dibina</span>";
			}

			if (dibina) {
				$("#isidibina").append(`
				Tanggal Dibina : ${dibina}
				`);
			} else {
				$("#isidibina").append(`
				Belum Dibina
				`);
			}

			$("#datadetail").append(`
				<tr>
				<td>Nama</td>
				<td><strong>${name}</strong></td>
				</tr>
				<tr>
				<td>NIP</td>
				<td>${nip}</td>
				</tr>
				<tr>
				<td>Telp</td>
				<td>${telp}</td>
				</tr>
				<tr>
				<td>Nama Perpustakaan</td>
				<td>${nama_perpus}</td>
				</tr>
				<tr>
				<td>Akreditasi</td>
				<td>${akreditasi}</td>
				</tr>
				<tr>
				<td>Jenis Perpustakaan</td>
				<td>${jenis} - ${sub_jenis}</td>
				</tr>
				<tr>
				<td>Alamat</td>
				<td>${alamat}</td>
				</tr>
				<tr>
				<td>Tanggal Daftar</td>
				<td>${daftar}</td>
				</tr>
				<tr>
				<td>Tanggal Dibina</td>
				<td>${dibina}</td>
				</tr>
			`);
		});

		$('#exampleModal').on('hidden.bs.modal', function() {
			$("#datadetail").empty();
			$("#isidibina").empty();
		});
	});
</script>