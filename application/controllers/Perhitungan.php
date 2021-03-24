<?php
defined('BASEPATH') or exit('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Perhitungan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function perhitungan_malaria()
    {
        $this->load->model('M_kasusmalaria');

        $data['judul'] = 'Kelola Perhitungan Malaria';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kasus'] = $this->M_kasusmalaria->ambilKasusMalaria()->result_array();
        $data['tahun'] = $this->M_kasusmalaria->ambilTahun()->result_array();

        if ($this->input->get('cari')) {
            $data['kasus'] = $this->M_kasusmalaria->cariDataMalaria()->result_array();
            $data['tahun'] = $this->M_kasusmalaria->ambilTahun()->result_array();
        }

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/pegawai/perhitungan/v_perhitunganmalaria', $data);
        $this->load->view('backend/template/footer');
    }

    public function excel_malaria($tahun)
    {
        $this->load->model('M_kasusmalaria');

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $kasus = $this->M_kasusmalaria->exportMalaria($tahun)->result();
        $tahun = $this->M_kasusmalaria->ambilCariTahun($tahun)->row();



        $spreadsheet = new Spreadsheet;

        $styleCol = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ],
            'borders' => [
                'top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
            ]

        ];

        $styleRow = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ],
            'borders' => [
                'top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
            ]

        ];

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('B4', 'No')->mergeCells('B4:B6')
            ->setCellValue('C4', 'Tahun')->mergeCells('C4:C6')
            ->setCellValue('D4', 'Kecamatan')->mergeCells('D4:D6')
            ->setCellValue('E4', 'Jumlah Penduduk')->mergeCells('E4:E6')
            ->setCellValue('F4', 'Suspek Malaria')->mergeCells('F4:F6')
            ->setCellValue('G4', 'Malaria Positif')->mergeCells('G4:U4')
            ->setCellValue('G5', '0 - 11 bln')->mergeCells('G5:H5')
            ->setCellValue('I5', '1 - 4 thn')->mergeCells('I5:J5')
            ->setCellValue('K5', '5 - 9 thn')->mergeCells('K5:L5')
            ->setCellValue('M5', '10 - 14 thn')->mergeCells('M5:N5')
            ->setCellValue('O5', '15- 64 thn')->mergeCells('O5:P5')
            ->setCellValue('Q5', '> 64 thn')->mergeCells('Q5:R5')
            ->setCellValue('S5', 'Jumlah')->mergeCells('S5:T5')
            ->setCellValue('U5', 'Total')->mergeCells('U5:U6')
            ->setCellValue('G6', 'L')
            ->setCellValue('H6', 'P')
            ->setCellValue('I6', 'L')
            ->setCellValue('J6', 'P')
            ->setCellValue('K6', 'L')
            ->setCellValue('L6', 'P')
            ->setCellValue('M6', 'L')
            ->setCellValue('N6', 'P')
            ->setCellValue('O6', 'L')
            ->setCellValue('P6', 'P')
            ->setCellValue('Q6', 'L')
            ->setCellValue('R6', 'P')
            ->setCellValue('S6', 'L')
            ->setCellValue('T6', 'P')
            ->setCellValue('V4', 'Konfirmasi Lab')->mergeCells('V4:W5')
            ->setCellValue('V6', 'RDT')
            ->setCellValue('W6', 'Mikroskop')
            ->setCellValue('X4', 'Jenis Parasit')->mergeCells('X4:AB5')
            ->setCellValue('X6', 'Pf')
            ->setCellValue('Y6', 'Pv')
            ->setCellValue('Z6', 'Pm')
            ->setCellValue('AA6', 'Po')
            ->setCellValue('AB6', 'Mix')
            ->setCellValue('AC4', 'Meninggal')->mergeCells('AC4:AC6')
            ->setCellValue('AD4', 'AMI')->mergeCells('AD4:AD6')
            ->setCellValue('AE4', 'API')->mergeCells('AE4:AE6');

        $spreadsheet->getActiveSheet()->getStyle('B4:B6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('C4:C6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('D4:D6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('E4:E6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('F4:F6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('G4:U4')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('G5:H5')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('I5:J5')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('K5:L5')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('M5:N5')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('O5:P5')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('Q5:R5')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('S5:T5')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('U5:U6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('G6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('H6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('I6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('J6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('K6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('L6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('M6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('N6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('O6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('P6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('Q6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('R6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('S6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('T6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('V4:W5')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('V6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('W6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('X4:AB5')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('X6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('Y6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('Z6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('AA6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('AB6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('AC4:AC6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('AD4:AD6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('AE4:AE6')->applyFromArray($styleCol);


        $kolom = 7;
        $nomor = 1;
        foreach ($kasus as $kss) {

            $jumlahPenduduk = $kss->jumlahPenduduk;
            $positif = $kss->malaria_positif;
            $klinis = $kss->malaria_klinis;

            $ami = ($klinis / $jumlahPenduduk) * 1000;
            $api = ($positif / $jumlahPenduduk) * 1000;

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('B' . $kolom, $nomor)
                ->setCellValue('C' . $kolom, $kss->tahun)
                ->setCellValue('D' . $kolom, $kss->nama)
                ->setCellValue('E' . $kolom, $kss->jumlahPenduduk)
                ->setCellValue('F' . $kolom, $kss->malaria_klinis)
                ->setCellValue('G' . $kolom, $kss->mal011L)
                ->setCellValue('H' . $kolom, $kss->mal011P)
                ->setCellValue('I' . $kolom, $kss->mal14L)
                ->setCellValue('J' . $kolom, $kss->mal14P)
                ->setCellValue('K' . $kolom, $kss->mal59L)
                ->setCellValue('L' . $kolom, $kss->mal59P)
                ->setCellValue('M' . $kolom, $kss->mal1014L)
                ->setCellValue('N' . $kolom, $kss->mal1014P)
                ->setCellValue('O' . $kolom, $kss->mal1564L)
                ->setCellValue('P' . $kolom, $kss->mal1564P)
                ->setCellValue('Q' . $kolom, $kss->mal65L)
                ->setCellValue('R' . $kolom, $kss->mal65P)
                ->setCellValue('S' . $kolom, $kss->laki_laki)
                ->setCellValue('T' . $kolom, $kss->perempuan)
                ->setCellValue('U' . $kolom, $kss->malaria_positif)
                ->setCellValue('V' . $kolom, $kss->rdt)
                ->setCellValue('W' . $kolom, $kss->mik)
                ->setCellValue('X' . $kolom, $kss->pf)
                ->setCellValue('Y' . $kolom, $kss->pv)
                ->setCellValue('Z' . $kolom, $kss->pm)
                ->setCellValue('AA' . $kolom, $kss->po)
                ->setCellValue('AB' . $kolom, $kss->mix)
                ->setCellValue('AC' . $kolom, $kss->malaria_meninggal)
                ->setCellValue('AD' . $kolom, number_format($ami, 2))
                ->setCellValue('AE' . $kolom, number_format($api, 2));

            $spreadsheet->getActiveSheet()->getStyle('B' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('C' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('D' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('E' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('F' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('G' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('H' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('I' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('J' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('K' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('L' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('M' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('N' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('O' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('P' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('Q' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('R' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('S' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('T' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('U' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('V' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('W' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('X' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('Y' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('Z' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('AA' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('AB' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('AC' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('AE' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('AD' . $kolom)->applyFromArray($styleRow);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Kasus-malaria-tahun-' . $tahun->tahun . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function perhitungan_kusta()
    {
        $this->load->model('M_kasuskusta');

        $data['judul'] = 'Kelola Perhitungan Kusta';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kasus'] = $this->M_kasuskusta->ambilKasusKusta()->result_array();

        if ($this->input->get('cari')) {
            $data['kasus'] = $this->M_kasuskusta->cariDataKusta()->result_array();
        }

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/pegawai/perhitungan/v_perhitungankusta', $data);
        $this->load->view('backend/template/footer');
    }

    public function perhitungan_dbd()
    {
        $this->load->model('M_kasusdbd');
        $data['judul'] = 'Kelola Perhitungan DBD';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kasus'] = $this->M_kasusdbd->perhitunganDBD()->result_array();

        if ($this->input->get('cari')) {
            $data['kasus'] = $this->M_kasusdbd->cariPerhitunganDBD()->result_array();
        }

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/pegawai/perhitungan/v_perhitungandbd', $data);
        $this->load->view('backend/template/footer');
    }
}
