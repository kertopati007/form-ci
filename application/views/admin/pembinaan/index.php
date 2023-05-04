<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>
				Halaman Semua Data Pembinaan
			</h1>
		</div>
		<div class="row text-capitalize">

			<div class="col-12">

				<!-- <a href="<?= site_url('pembinaan/export') ?>" class="btn btn-lg btn-info mb-4">
					Export Excel
				</a> -->

				<div class="card">
					<div class="card-body">
						<div class="table-responsive">

							<table class="table table-striped" id="table1">
								<thead>
									<tr>
										<th style="width:5%;">#</th>
										<th>Nama</th>
										<th>NIP</th>
										<th>Jenis Perpustakaan</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
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

		$('#table1').DataTable({
			"processing": true,
			"serverSide": true,
			// "searching": false,
			"ordering": false,
			"order": [],
			"ajax": {
				"url": "<?= site_url('pembinaan/get_semua_data_dibina') ?>",
				"type": "POST"
			},
			'aoColumnDefs': [{
				'bSortable': false,
				'aTargets': ['nosort']
			}],
		})

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