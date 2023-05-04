<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Permohonan pembinaan perpustakaan di provinsi jawa tengah</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/component.css">
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/rtl.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css"> -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css"> -->
	<link type="text/javascript" href="<?php echo base_url(); ?>assets/js/stisla.js">
</head>

<style>
	.bgbg {
		background: url(<?= base_url('assets/home/bg-masthead.jpg') ?>);
		background-position: center center;
		background-repeat: no-repeat;
		background-size: cover;
		width: 100%;
	}
</style>

<body class="bgbg">
	<div id="app">
		<section class="section">
			<div class="container mt-3">
				<div class="row">
					<div class="col-12 col-md-12">
						<div class="login-brand text-light">
							<!-- <img src="<?php base_url(); ?>/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle"> -->
							<h3>Formulir Permohonan pembinaan<br>perpustakaan di provinsi jawa tengah</h3>
						</div>

						<div class="card shadow shadow-lg">
							<div class="card-body">
								<form method="POST" action="">

									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<label for="nama_pemohon">Nama Pemohon <span class="text-danger">*</span></label>
												<input id="nama_pemohon" type="text" class="form-control" name="nama_pemohon" autofocus>
											</div>
										</div>
										<div class="col-12 col-md-6">
											<div class="form-group">
												<label for="nip">NIP Pemohon <span class="text-danger">*</span></label>
												<input id="nip" type="nip" class="form-control" name="nip">
											</div>
										</div>
										<div class="col-12 col-md-6">
											<div class="form-group">
												<label for="no_telp">No Telepon Pemohon <span class="text-danger">*</span></label>
												<input id="no_telp" type="no_telp" class="form-control" name="no_telp">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-12 col-md-6">
											<div class="form-group">
												<label for="jenis_perpus">Jenis Perpustakaan <span class="text-danger">*</span></label>
												<select name="jenis_perpus" class="form-control" id="jenis_perpus">
													<option selected disabled>-- Pilih Salah Satu</option>
													<option value="sekolah">Perpustakaan Sekolah</option>
													<option value="khusus">Perpustakaan Khusus</option>
													<option value="umum">Perpustakaan Umum</option>
												</select>
											</div>
										</div>
										<div class="col-6 col-md-3">
											<div class="form-group">
												<label for="sub_jenis_perpus">Sub Jenis Perpustakaan <span class="text-danger">*</span></label>
												<select name="sub_jenis_perpus" class="form-control" id="sub_jenis_perpus">
													<option selected disabled>-- Pilih Salah Satu</option>
												</select>
											</div>
										</div>
										<div class="col-6 col-md-3">
											<div class="form-group">
												<label for="akreditasi">Akreditasi <span class="text-danger">*</span></label>
												<select name="akreditasi" class="form-control" id="akreditasi">
													<option selected disabled>-- Pilih Salah Satu</option>
													<option value="A">A</option>
													<option value="B">B</option>
													<option value="C">C</option>
													<option value="BELUM">BELUM</option>
												</select>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-12 col-md-6">
											<div class="form-group">
												<label for="nama_lembaga">Nama Lembaga / Instansi Induk <span class="text-danger">*</span></label>
												<input id="nama_lembaga" type="text" class="form-control" name="nama_lembaga" autofocus>
											</div>
										</div>
										<div class="col-12 col-md-6">
											<div class="form-group">
												<label for="nama_perpus">Nama Perpustakaan <span class="text-danger">*</span></label>
												<input id="nama_perpus" type="nama_perpus" class="form-control" name="nama_perpus">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<label for="alamat">Alamat Perpustakaan <span class="text-danger">*</span></label>
												<textarea name="alamat" id="alamat" class="form-control"></textarea>
											</div>
										</div>
										<div class="col-12 col-md-4">
											<div class="form-group">
												<label for="kabupaten">Kabupaten <span class="text-danger">*</span></label>
												<select name="kabupaten" class="form-control" id="kabupaten">
													<option selected disabled>-- Pilih Salah Satu</option>
												</select>
											</div>
										</div>
										<div class="col-12 col-md-4">
											<div class="form-group">
												<label for="kecamatan">Kecamatan <span class="text-danger">*</span></label>
												<select name="kecamatan" class="form-control" id="kecamatan">
													<option selected disabled>-- Pilih Salah Satu</option>
												</select>
											</div>
										</div>
										<div class="col-12 col-md-4">
											<div class="form-group">
												<label for="kelurahan">Kelurahan <span class="text-danger">*</span></label>
												<select name="kelurahan" class="form-control" id="kelurahan">
													<option selected disabled>-- Pilih Salah Satu</option>
												</select>
											</div>
										</div>

										<div class="col-12 col-md-6">
											<div class="form-group">
												<label for="terakhir_dibina">Terakhir Dibina <small class="text-danger">(Kosongi bila belum dibina)</small></label>
												<input id="terakhir_dibina" type="date" class="form-control" name="terakhir_dibina">
											</div>
										</div>

										<div class="col-12 col-md-6">
											<div class="form-group">
												<label for="rec_hasil">Rekomendasi Hasil Pembinaan <small class="text-danger">(Kosongi bila belum dibina)</small></label>
												<input id="rec_hasil" type="text" class="form-control" name="rec_hasil">
											</div>
										</div>
									</div>

									<div class="form-group mt-5">
										<button id="save" type="submit" class="btn btn-primary float-right">
											Kirim Formulir Permohonan
										</button>
									</div>

								</form>
							</div>
						</div>
						<!-- <div class="simple-footer">
								Copyright &copy; 2023
							</div> -->
					</div>
				</div>
			</div>
		</section>
	</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/stisla.js"></script>
<!-- Template JS File -->
<script src="<?php echo base_url(); ?>/assets/js/scripts.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/custom.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
	$(document).ready(function() {


		$('#save').click(function(e) {
			e.preventDefault();
			var nama = $('#nama_pemohon').val();
			var nip = $('#nip').val();
			var no_telp = $('#no_telp').val();
			var jenis_perpus = $('#jenis_perpus').val();
			var sub_jenis_perpus = $('#sub_jenis_perpus').val();
			var nama_lembaga = $('#nama_lembaga').val();
			var nama_perpus = $('#nama_perpus').val();
			var alamat = $('#alamat').val();
			var kecamatan = $('#kecamatan').val();
			var kabupaten = $('#kabupaten').val();
			var kelurahan = $('#kelurahan').val();
			var terakhir_dibina = $('#terakhir_dibina').val();
			var rec_hasil = $('#rec_hasil').val();
			var nakreditasi = $('#akreditasi').val();

			if (nama == '' || nip == '' || no_telp == '' || jenis_perpus == '' || sub_jenis_perpus == '' || nakreditasi == '' || nama_lembaga == '' || nama_perpus == '' || alamat == '' || kecamatan == '' || kabupaten == '' || kelurahan == '') {
				Swal.fire({
					title: 'Error!',
					text: 'Data Ada Yang Kosong',
					icon: 'error',
					confirmButtonText: 'Lengkapi'
				})
			} else {
				$.ajax({
					url: "<?php echo base_url(); ?>form/save",
					type: "POST",
					data: {
						nama: nama,
						nip: nip,
						no_telp: no_telp,
						jenis_perpus: jenis_perpus,
						sub_jenis_perpus: sub_jenis_perpus,
						nama_lembaga: nama_lembaga,
						nama_perpus: nama_perpus,
						akreditasi: nakreditasi,
						alamat: alamat,
						kecamatan: kecamatan,
						kabupaten: kabupaten,
						kelurahan: kelurahan,
						terakhir_dibina: terakhir_dibina,
						rec_hasil: rec_hasil
					},

					success: function(data) {

						// console.log(data);
						Swal.fire({
							title: 'Berhasil!',
							text: 'Data Berhasil Di Kirim',
							icon: 'success',
							confirmButtonText: 'Ok'
						}).then((result) => {
							if (result.isConfirmed) {
								window.location.href = "<?php echo base_url(); ?>";
							}
						})
					}
				});
			}
		});

		$('#jenis_perpus').change(function() {
			var jenis_perpus = $(this).val();
			if (jenis_perpus == 'sekolah') {
				$('#sub_jenis_perpus').html(`
					<option selected disabled>-- Pilih Salah Satu</option>
					<option value="Perpustakaan SMAN">Perpustakaan SMAN</option>
					<option value="Perpustakaan SMKN">Perpustakaan SMKN</option>
					<option value="Perpustakaan SMAS">Perpustakaan SMAS</option>
					<option value="Perpustakaan SMKS">Perpustakaan SMKS</option>
					`);
			} else if (jenis_perpus == 'khusus') {
				$('#sub_jenis_perpus').html(`
					<option selected disabled>-- Pilih Salah Satu</option>
					<option value="Perpustakaan Instansi Provinsi Jawa Tengah">Perpustakaan Instansi Provinsi Jawa Tengah</option>
					<option value="Perpustakaan Rumah Sakit Provinsi Jawa Tengah">Perpustakaan Rumah Sakit Provinsi Jawa Tengah</option>
					`);
			} else if (jenis_perpus == 'umum') {
				$('#sub_jenis_perpus').html(`
					<option selected disabled>-- Pilih Salah Satu</option>
					<option value="Perpustakaan Kabupaten Kota">Perpustakaan Kabupaten Kota</option>
					`);
			} else {
				$('#sub_jenis_perpus').html('<option selected disabled>-- Pilih Salah Satu</option>');
			}
		});

		fetch_kabupaten();

		$('#kabupaten').change(function() {
			$('#kecamatan').html('<option value="">-- Pilih Kecamatan --</option>');
			var id_kabupaten = $(this).val();
			if (id_kabupaten != '') {
				fetch_kecamatan(id_kabupaten);
			} else {
				$('#kecamatan').html('<option value="">-- Pilih Kecamatan --</option>');
			}
		});

		$('#kecamatan').change(function() {
			$('#kelurahan').html('<option value="">-- Pilih Kelurahan --</option>');
			var id_kecamatan = $(this).val();
			if (id_kecamatan != '') {
				fetch_kelurahan(id_kecamatan);
			} else {
				$('#kelurahan').html('<option value="">-- Pilih Kelurahan --</option>');
			}
		});




		function fetch_kabupaten() {
			$.ajax({
				url: "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=33",
				method: "GET",
				async: true,
				dataType: 'json',
				success: function(data) {
					// var html = '';
					$.each(data.kota_kabupaten, function(i, item) {
						$('#kabupaten').append($('<option>', {
							value: item.id,
							text: item.nama
						}));
					});
				}
			});
		}

		function fetch_kecamatan() {
			$.ajax({
				url: "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=" + $('#kabupaten').val(),
				method: "GET",
				async: true,
				dataType: 'json',
				success: function(data) {
					// var html = '';
					$.each(data.kecamatan, function(i, item) {
						$('#kecamatan').append($('<option>', {
							value: item.id,
							text: item.nama
						}));
					});
				}
			});
		}

		function fetch_kelurahan() {
			$.ajax({
				url: "https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=" + $('#kecamatan').val(),
				method: "GET",
				async: true,
				dataType: 'json',
				success: function(data) {
					// var html = '';
					$.each(data.kelurahan, function(i, item) {
						$('#kelurahan').append($('<option>', {
							value: item.id,
							text: item.nama
						}));
					});
				}
			});
		}

	});
</script>



</html>