<div class="main-content">
<section class="section">

<div class="section-header">
	<h1>Edit User</h1>
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item active"><a href="">Main Navigation</a></div>
		<div class="breadcrumb-item"><a href="<?= site_url('user') ?>">Users</a></div>
		<div class="breadcrumb-item">Edit User</div>
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
								<input type="hidden" name="user_id" value="<?= $row->id ?>">
								<input type="text" name="fullname" value="<?= $this->input->post('fullname') ?? $row->name ?>" class="form-control">
								<?= form_error('fullname') ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
								<label>Username *</label>
								<input type="text" name="username" value="<?= $this->input->post('username') ?? $row->username ?>" class="form-control">
								<?= form_error('username') ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
								<label>Password</label> <small>(Biarkan kosong jika tidak diganti)</small>
								<input type="password" name="password" value="<?= $this->input->post('password') ?>" class="form-control">
								<?= form_error('password') ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group <?= form_error('passconf') ? 'has-error' : null ?>">
								<label>Password Confirmation</label>
								<input type="password" name="passconf" value="<?= $this->input->post('passconf') ?>" class="form-control">
								<?= form_error('passconf') ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group <?= form_error('level') ? 'has-error' : null ?>">
								<label>Level</label>
								<select name="level" class="form-control">
									<?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level ?>
									<option value="1">Admin </option>
									<option value="2" <?= $level == 2 ? "selected" : null ?>>Kasir </option>
								</select>
								<?= form_error('level') ?>
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<label>Alamat </label>
								<textarea name="address" class="form-control"><?= $this->input->post('address') ?? $row->address ?></textarea>
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
