<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>
				Detail Data Pembinaan
			</h1>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header p-2">
						<h5 class="col-8">Nama Lengkap</h5>
						<div class="col-4">
							<span class=" badge badge-warning float-right">Belum Dibina</span>
						</div>
					</div>
					<div class="card-body">
						<table class="table table-striped">
							<tr>
								<td width="30%">NIP</td>
								<td><?= $row['nip'] ?></td>
							</tr>
							<tr>
								<td>No Telp</td>
								<td><?= $row['no_telp'] ?></td>
							</tr>
							<tr>
								<td>Nama Perpus</td>
								<td><?= $row['nama_perpus'] ?></td>
							</tr>
							<tr>
								<td>Jenis Perpus</td>
								<td><?= $row['jenis_perpus'] ?> - <?= $row['sub_jenis_perpus'] ?></td>
							</tr>
							<tr>
								<td>Nama Lembaga</td>
								<td><?= $row['nama_lembaga'] ?></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td><?= $row['alamat'] ?></td>
							</tr>
							<tr>
								<td>Tanggal Permohonan</td>
								<!-- <td><?= $row['created_at']->format('dd-mm-yyyy') ?></td> -->
							</tr>
						</table>
					</div>
				</div>
			</div>

		</div>
	</section>
</div>