<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>
				Halaman Data Sudah Dibina
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
	function detailData(id) {

		$('#exampleModal').modal('show');
		$.ajax({
			url: "<?= site_url('pembinaan/detailData') ?>",
			type: "POST",
			data: {
				id: id
			},
			success: function(data) {

				var dibina = data.dibina_at;
				var daftar = data.created_at;



				$("#datadetail").empty();
				$("#isidibina").empty();

				if (dibina) {
					$("#isidibina").append(`
				Tanggal Dibina : ${dibina}
			`);
				} else {
					$("#isidibina").append(`
				Belum Dibina
			`);

					var dibina = '-';
				}

				$("#datadetail").append(`
		<tr>
		<td>Nama</td>
		<td><strong>` + data.nama + `</strong></td>
		</tr>
		<tr>
		<td>NIP</td>
		<td>` + data.nip + `</td>
		</tr>
		<tr>
		<td>Telp</td>
		<td>` + data.no_telp + `</td>
		</tr>
		<tr>
		<td>Nama Perpustakaan</td>
		<td>` + data.nama_perpus + `</td>
		</tr>
		<tr>
		<td>Nama Perpustakaan</td>
		<td>` + data.nama_lembaga + `</td>
		</tr>
		<tr>
		<td>Akreditasi</td>
		<td>` + data.akreditasi + `</td>
		</tr>
		<tr>
		<td>Jenis Perpustakaan</td>
		<td>` + data.jenis_perpus + ` - ` + data.sub_jenis_perpus + `</td>
		</tr>
		<tr>
		<td>Alamat</td>
		<td>` + data.alamat + `</td>
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
			}
		})
	}

	function deleteData(id) {
		$.ajax({
			url: "<?= site_url('pembinaan/deleteData') ?>",
			type: "POST",
			data: {
				id: id
			},
			success: function(data) {

				Swal.fire({
					title: 'Berhasil!',
					text: 'Data Berhasil Di Hapus',
					icon: 'success',
					confirmButtonText: 'Ok'
				}).then((result) => {
					if (result.isConfirmed) {
						$('#table1').DataTable().ajax.reload();
					}
				})
			}
		})
	}

	$(document).ready(function() {

		$('#table1').DataTable({
			"processing": true,
			"serverSide": true,
			// "searching": false,
			"ordering": false,
			"order": [],
			"ajax": {
				"url": "<?= site_url('pembinaan/get_data_sudah_dibina') ?>",
				"type": "POST"
			},
			'aoColumnDefs': [{
				'bSortable': false,
				'aTargets': ['nosort']
			}],
		})

		$('#exampleModal').on('hidden.bs.modal', function() {
			$("#datadetail").empty();
			$("#isidibina").empty();
		});
	});
</script>