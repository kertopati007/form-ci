<div class="main-content">
<section class="section">

<div class="section-header">
	<h1>Tambah Pengguna</h1>
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item active"><a href="">Main Navigation</a></div>
		<div class="breadcrumb-item"><a href="<?= site_url('user') ?>">Pengguna</a></div>
		<div class="breadcrumb-item">Tambah Pengguna</div>
	</div>
</div>

<div class="row">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-12">
						<div class="float-right">
							<a href="<?= site_url('user') ?>" class="btn btn-sm btn-warning">
								<i class="fa fa-undo"> Back</i>
							</a>
						</div>
					</div>
				</div>

				<form action="" method="post">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group <?= form_error('fullname') ? 'has-error' : null ?>">
								<label>Nama *</label>
								<input type="text" name="fullname" value="<?= set_value('fullname') ?>" class="form-control">
								<?= form_error('fullname') ?></span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
								<label>Username *</label>
								<input type="text" name="username" value="<?= set_value('username') ?>" class="form-control">
								<?= form_error('username') ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
								<label>Password *</label>
								<input type="password" name="password" value="<?= set_value('password') ?>" class="form-control">
								<?= form_error('password') ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group <?= form_error('passconf') ? 'has-error' : null ?>">
								<label>Password Confirmation *</label>
								<input type="password" name="passconf" value="<?= set_value('passconf') ?>" class="form-control">
								<?= form_error('passconf') ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="form-group float-right">
								<button type="reset" class="btn">Reset</button>
								<button type="submit" class="btn btn-primary">
									<i class="fa fa-paper-plane"> Simpan</i>
								</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

</section>
</div>
