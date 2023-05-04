<div class="main-content">
<section class="section">

<div class="section-header">
	<h1>Data Pengguna</h1>
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item active"><a href="">Main Navigation</a></div>
		<!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
		<div class="breadcrumb-item">Pengguna</div>
	</div>
</div>

<?php $this->view('messages'); ?>

<div class="row">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="mb-4">
					<a href="<?= site_url('user/add') ?>" class="btn btn-primary">
						<i class="fa fa-plus"> Data Baru</i>
					</a>
				</div>
				<div class="table-responsive">
					<table class="table table-striped" id="table1">
						<thead>
							<tr>
								<th>#</th>
								<th>Username</th>
								<th>Nama</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($row->result() as $data) { ?>
								<tr>
									<td style="width:5%;"><?= $no++; ?></td>
									<td><?= $data->username ?></td>
									<td><?= $data->name ?></td>
									<td class="text-center" width="110px">
										<form action="<?= site_url('user/del') ?>" method="POST">
											
											<input type="hidden" name="user_id" value="<?= $data->id ?>">
											<button onclick="return confirm('Apakah Anda Yakin Hapus Data Ini?')" class="btn btn-danger btn-sm btn-icon">
												<i class="fa fa-trash"></i>
											</button>
										</form>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

</section>
</div>
