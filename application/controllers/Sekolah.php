<?php

defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class Sekolah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Sekolah_m', 'sekolah');
        is_login();
    }

    public function index()
    {

        $this->template->load('admin/template_cms', 'admin/sekolah/index');
    }
    function get_data_table()
    {
        $list = $this->sekolah->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->npsn;
            $row[] = $field->nama;
            $row[] = $field->kab_kota;
            // $row[] = '<div class="btn-group"><a href="' . site_url('sekolah/edit?id=' . $field->id) . '" class="btn btn-info">Edit</a><button class="btn btn-danger btn-delete" data-url="' . site_url('sekolah/delete?id=') . $field->id . '">Delete</button></div>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->sekolah->count_all(),
            "recordsFiltered" => $this->sekolah->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    public function export()
    {

        $spreadsheet = new Spreadsheet;
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'NPSN');
        $sheet->setCellValue('C1', 'Nama Sekolah');
        $sheet->setCellValue('D1', 'Kabupaten/Kota');
        $sheet->setCellValue('E1', 'Jenjang');
        $sheet->setCellValue('F1', 'Status');


        $data = $this->sekolah->getAll();
        // echo json_encode($data->result());
        // die();
        $no = 1;
        $x = 2;
        $last = 'A1';
        foreach ($data->result() as $row) {

            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, $row->npsn);
            $sheet->setCellValue('C' . $x, $row->nama);
            $sheet->setCellValue('D' . $x, $row->kab_kota);
            $sheet->setCellValue('E' . $x, $row->jenjang);
            $sheet->setCellValue('F' . $x, $row->status);
            $last = 'F' . $x;
            $x++;
        }


        // Style header row
        $headerStyle = [
            'font' => [
                'bold' => true
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['argb' => '00999999'],
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ];
        $sheet->getStyle('A1:F1')->applyFromArray($headerStyle);

        // Set table border
        $tableBorder = [
            'borders' => [
                'outline' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ];
        $sheet->getStyle('A1:' . $last)->applyFromArray($tableBorder);



        foreach (range('A', 'F') as $columnID) {
            $sheet->getColumnDimension($columnID)
                ->setAutoSize(true);
        }


        $writer = new Xlsx($spreadsheet);
        $filename = 'export-sekolah';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
