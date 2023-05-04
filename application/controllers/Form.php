<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Form extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->model('Form_m', 'form_model');
	}

	public function index()
	{
		$this->load->view('form');
	}
	public function admin()
	{
		# code...
		$this->load->view('admin');
	}

	public function save()
	{
		$nama = $this->input->post('nama');
		$nip = $this->input->post('nip');
		$no_telp = $this->input->post('no_telp');
		$jenis_perpus = $this->input->post('jenis_perpus');
		$sub_jenis_perpus = $this->input->post('sub_jenis_perpus');
		$nama_lembaga = $this->input->post('nama_lembaga');
		$nama_perpus = $this->input->post('nama_perpus');
		$akreditasi = $this->input->post('akreditasi');
		$alamat = $this->input->post('alamat');
		$kecamatan = $this->input->post('kecamatan');
		$kelurahan = $this->input->post('kelurahan');
		$kabupaten = $this->input->post('kabupaten');
		$terakhir_dibina = $this->input->post('terakhir_dibina');
		$rec_hasil = $this->input->post('rec_hasil');
		$created_at = date('Y-m-d H:i:s');

		$data = array(
			'nama' => $nama,
			'nip' => $nip,
			'no_telp' => $no_telp,
			'jenis_perpus' => $jenis_perpus,
			'sub_jenis_perpus' => $sub_jenis_perpus,
			'nama_lembaga' => $nama_lembaga,
			'nama_perpus' => $nama_perpus,
			'akreditasi' => $akreditasi,
			'alamat' => $alamat,
			'kecamatan' => $kecamatan,
			'kelurahan' => $kelurahan,
			'kabupaten' => $kabupaten,
			'terakhir_dibina' => $terakhir_dibina,
			'rec_hasil' => $rec_hasil,
			'created_at' => $created_at
		);

		$this->form_model->insert($data);

		// echo json_encode($data);
	}
}


/* End of file Form.php */
/* Location: ./application/controllers/Form.php */
