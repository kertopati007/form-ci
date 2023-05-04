<?php
defined('BASEPATH') or exit('No direct script access allowed');

// require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\F;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pembinaan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Pembinaan_m', 'pembinaan');
		is_login();
	}

	public function index_old()
	{
		$data['row'] = $this->pembinaan->get();
		$data['belum'] = $this->pembinaan->get('0');
		$data['sudah'] = $this->pembinaan->get('1');
		$this->template->load('admin/template_cms', 'admin/pembinaan/index', $data);
	}

	public function index()
	{
		$this->template->load('admin/template_cms', 'admin/pembinaan/belum_dibina');
	}

	public function ubah_status($id)
	{
		$this->pembinaan->ubah_status($id);
		return $this->output
			->set_content_type('application/json')
			->set_status_header(200)
			->set_output(json_encode(['status' => 'success']));
	}

	public function statusGanti()
	{
		$id = $this->input->post('id');
		$this->pembinaan->ubah_status($id);
		return $this->output
			->set_content_type('application/json')
			->set_status_header(200)
			->set_output(json_encode(['status' => 'success']));
	}

	public function detail($id)
	{
		$data['row'] = $this->pembinaan->detail($id)->row_array();
		$this->template->load('admin/template_cms', 'admin/pembinaan/detail', $data);
	}

	public function detailData()
	{
		$id = $this->input->post('id');
		$data = $this->pembinaan->detail($id)->row_array();
		return $this->output
			->set_content_type('application/json')
			->set_status_header(200)
			->set_output(json_encode($data));
	}

	public function deleteData()
	{
		$id = $this->input->post('id');
		$this->pembinaan->delete($id);
		return $this->output
			->set_content_type('application/json')
			->set_status_header(200)
			->set_output(json_encode(['status' => 'success']));
	}

	public function export()
	{
		$spreadsheet = new Spreadsheet;
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Nama');
		$sheet->setCellValue('C1', 'NIP');
		$sheet->setCellValue('D1', 'No Telp');
		$sheet->setCellValue('E1', 'Nama Perpustakaan');
		$sheet->setCellValue('F1', 'Jenis Perpustakaan');
		$sheet->setCellValue('G1', 'Sub Jenis Perpustakaan');
		$sheet->setCellValue('H1', 'Nama Lembaga');
		$sheet->setCellValue('I1', 'Alamat');
		$sheet->setCellValue('J1', 'Akreditasi');
		$sheet->setCellValue('K1', 'Kelurahan');
		$sheet->setCellValue('L1', 'Kecamatan');
		$sheet->setCellValue('M1', 'Kabupaten');
		$sheet->setCellValue('N1', 'Status');
		$sheet->setCellValue('O1', 'Tanggal Daftar');
		$sheet->setCellValue('P1', 'Tanggal Dibina');



		$data = $this->pembinaan->getAll();
		$no = 1;
		$x = 2;
		foreach ($data as $row) {

			if ($row->status == 0) {
				$status = 'Belum Dibina';
			} else {
				$status = 'Sudah Dibina';
			}

			$kel = file_get_contents('https://dev.farizdotid.com/api/daerahindonesia/kelurahan/' . $row->kelurahan);
			$kel = json_decode($kel, true);

			$kec = file_get_contents('https://dev.farizdotid.com/api/daerahindonesia/kecamatan/' . $row->kecamatan);
			$kec = json_decode($kec, true);

			$kab = file_get_contents('https://dev.farizdotid.com/api/daerahindonesia/kota/' . $row->kabupaten);
			$kab = json_decode($kab, true);

			$sheet->setCellValue('A' . $x, $no++);
			$sheet->setCellValue('B' . $x, $row->nama);
			$sheet->setCellValue('C' . $x, $row->nip);
			$sheet->setCellValue('D' . $x, $row->no_telp);
			$sheet->setCellValue('E' . $x, $row->nama_perpus);
			$sheet->setCellValue('F' . $x, $row->jenis_perpus);
			$sheet->setCellValue('G' . $x, $row->sub_jenis_perpus);
			$sheet->setCellValue('H' . $x, $row->nama_lembaga);
			$sheet->setCellValue('I' . $x, $row->alamat);
			$sheet->setCellValue('J' . $x, $row->akreditasi);
			$sheet->setCellValue('K' . $x, $kel['nama']);
			$sheet->setCellValue('L' . $x, $kec['nama']);
			$sheet->setCellValue('M' . $x, $kab['nama']);
			$sheet->setCellValue('N' . $x, $status);
			$sheet->setCellValue('O' . $x, $row->created_at);
			$sheet->setCellValue('P' . $x, $row->dibina_at);
			$x++;
			$x++;
		}

		$writer = new Xlsx($spreadsheet);
		$filename = 'laporan-pembinaan';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	public function belum_dibina()
	{
		$this->template->load('admin/template_cms', 'admin/pembinaan/belum_dibina');
	}

	public function sudah_dibina()
	{
		$this->template->load('admin/template_cms', 'admin/pembinaan/sudah_dibina');
	}

	public function get_semua_data_dibina()
	{
		header('Content-Type: application/json');
		$sudah = $this->pembinaan->get_datatables();
		$data = array();
		$no = 1;

		foreach ($sudah as $sdh) {
			$row = array();
			$row[] = $no++;
			$row[] = $sdh->nama;
			$row[] = $sdh->nip . ' - ' . $sdh->status;
			$row[] = $sdh->jenis_perpus . ' - ' . $sdh->sub_jenis_perpus;
			$row[] = '<a href="' . base_url('admin/pembinaan/detail/' . $sdh->id) . '" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->pembinaan->count_all('1'),
			"recordsFiltered" => $this->pembinaan->count_filtered('1'),
			"data" => $data,
		);
		echo json_encode($output);
	}

	public function get_data_sudah_dibina()
	{
		header('Content-Type: application/json');
		$sudah = $this->pembinaan->get_datatables('1');
		$data = array();
		$no = 1;

		foreach ($sudah as $sdh) {
			$row = array();
			$row[] = $no++;
			$row[] = $sdh->nama;
			$row[] = $sdh->nip;
			$row[] = $sdh->jenis_perpus . ' - ' . $sdh->sub_jenis_perpus;
			$row[] = '<button class="btn btn-primary btn-sm detaildatabina' . $sdh->id . '" onclick="detailData(' . $sdh->id . ')" >Detail</button>
								<button class="btn btn-danger btn-sm deletedatabina' . $sdh->id . '" onclick="deleteData(' . $sdh->id . ')" >Hapus</button>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->pembinaan->count_all('1'),
			"recordsFiltered" => $this->pembinaan->count_filtered('1'),
			"data" => $data,
		);
		echo json_encode($output);
	}

	public function get_data_belum_dibina()
	{
		header('Content-Type: application/json');
		$belum = $this->pembinaan->get_datatables('0');
		$data = array();
		$no = 1;

		foreach ($belum as $blm) {
			$row = array();
			$row[] = $no++;
			$row[] = $blm->nama;
			$row[] = $blm->nip;
			$row[] = $blm->jenis_perpus . ' - ' . $blm->sub_jenis_perpus;
			$row[] = '
								<button class="btn btn-warning btn-sm statusbina' . $blm->id . '" onclick="ubahStatusBina(' . $blm->id . ')" >Bina</button>  
								<button class="btn btn-primary btn-sm detaildatabina' . $blm->id . '" onclick="detailData(' . $blm->id . ')" >Detail</button>
								<button class="btn btn-danger btn-sm deletedatabina' . $blm->id . '" onclick="deleteData(' . $blm->id . ')" >Hapus</button>';

			$data[] = $row;
		}

		$output = array(
			'draw' => $_POST['draw'],
			'recordsTotal' => $this->pembinaan->count_all('0'),
			'recordsFiltered' => $this->pembinaan->count_filtered('0'),
			'data' => $data
		);

		echo json_encode($output);
	}

	// public function tesdata() 
	// {
	// 	$data = $this->pembinaan->getAll() ;
	// 	foreach ($data as $row) {
	// 		$kel = file_get_contents('https://dev.farizdotid.com/api/daerahindonesia/kelurahan/'.$row->kelurahan);
	// 		$kel = json_decode($kel, true);

	// 		$kec = file_get_contents('https://dev.farizdotid.com/api/daerahindonesia/kecamatan/'.$row->kecamatan);
	// 		$kec = json_decode($kec, true);

	// 		$kab = file_get_contents('https://dev.farizdotid.com/api/daerahindonesia/kota/'.$row->kabupaten);
	// 		$kab = json_decode($kab, true);

	// 		echo $kel['nama'] . ' - ' . $kec['nama'] . ' - ' . $kab['nama'] . '<br>';
	// 	}


	// }
}
