<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>
				Halaman Data Akreditasi
			</h1>
		</div>
		<div class="row text-capitalize">

			<div class="col-12">

				<div class="card">

					<div class="card-header">
						<ul class="nav nav-pills" id="pembinaantab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active show" id="all" data-jenjang="" data-status="" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="false">
									Semua Data
									<!-- <span class="badge badge-info">5</span> -->
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="sma_negeri" data-jenjang="SMA" data-status="NEGERI" data-toggle="tab" href="#sma_negeri" role="tab" aria-controls="sma_negeri" aria-selected="false">
									SMA NEGERI
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="sma_swasta" data-jenjang="SMA" data-status="SWASTA" data-toggle="tab" href="#sma_swasta" role="tab" aria-controls="sma_swasta" aria-selected="true">
									SMA SWASTA
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="smk_negeri" data-jenjang="SMK" data-status="NEGERI" data-toggle="tab" href="#smk_negeri" role="tab" aria-controls="smk_negeri" aria-selected="false">
									SMK NEGERI
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="smk_swasta" data-jenjang="SMK" data-status="SWASTA" data-toggle="tab" href="#smk_swasta" role="tab" aria-controls="smk_swasta" aria-selected="true">
									SMK SWASTA
								</a>
							</li>
						</ul>
					</div>
					<div class="card-body">
						<div class="">
							<a href="<?= site_url('sekolah/export?jenjang=&status=') ?>" class="btn btn-md btn-info mb-5" id="export_url">
								Export Excel
							</a>
						</div>
						<div class="table-responsive">

							<table class="table table-striped" id="table">
								<thead>
									<tr>
										<th style="width:5%;">#</th>
										<th>NPSN</th>
										<th>Nama Sekolah</th>
										<th>Kabupaten/Kota</th>
										<!-- <th>Aksi</th> -->
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
		var jenjang = "";
		var status = "";
		let table = $("#table").DataTable({
			processing: true,
			serverSide: true,
			order: [],

			ajax: {
				url: "<?php echo site_url('sekolah/get_data_table') ?>",
				type: "POST",
				data: function(d) {
					d.jenjang = jenjang
					d.status = status
				}
			},

			columnDefs: [{
				targets: [0],
				orderable: false,
			}, ],
		})
		$('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
			var target = e.target // newly activated tab
			jenjang = $(target).data('jenjang')
			status = $(target).data('status')
			var currentHref = $("a#export_url").attr("href");
			console.log(currentHref)
			currentHref = currentHref.replace(/([\?&])(jenjang=)[^&#]*/, '$1$2' + $(target).data('jenjang'));
			$("a#export_url").attr("href", currentHref);
			currentHref = currentHref.replace(/([\?&])(status=)[^&#]*/, '$1$2' + $(target).data('status'));
			$("a#export_url").attr("href", currentHref);
			table.ajax.reload();

		})
	});
</script>