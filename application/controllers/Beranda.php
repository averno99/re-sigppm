<?php
defined('BASEPATH') or exit('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Beranda extends CI_Controller
{
    public function index()
    {
        $this->load->model('M_kasusmalaria');
        $this->load->model('M_kasusdbd');
        $this->load->model('M_kasuskusta');
        $this->load->model('M_penyakit');

        $data['rasioM'] = $this->M_kasusmalaria->rasioMalaria()->row_array();
        $data['rasioK'] = $this->M_kasuskusta->rasioKusta()->row_array();
        $data['rasioD'] = $this->M_kasusdbd->rasioDbd()->row_array();
        $data['penyakit'] = $this->M_penyakit->ambilSemuaPenyakit();

        if ($this->input->get('cari')) {
            $data['rasioM'] = $this->M_kasusmalaria->cariRasioMalaria()->row_array();
            $data['rasioK'] = $this->M_kasuskusta->cariRasioKusta()->row_array();
            $data['rasioD'] = $this->M_kasusdbd->cariRasioDbd()->row_array();
            $data['penyakit'] = $this->M_penyakit->ambilSemuaPenyakit();
        }

        $this->load->view('frontend/template/head');
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/template/container');
        $this->load->view('frontend/template/content', $data);
        $this->load->view('frontend/template/footer');
    }

    public function pemetaan_malaria()
    {
        $this->load->model('M_kasusmalaria');
        $this->load->model('M_kecamatan');

        $data['judul'] = 'Pemetaan Malaria';
        $data['pemetaan'] = $this->M_kasusmalaria->dataMalaria()->result_array();
        $data['rasioM'] = $this->M_kasusmalaria->rasioMalaria()->row_array();
        $data['kecamatan'] = $this->M_kecamatan->ambilSemuaKecamatan();

        if ($this->input->get('cari')) {
            $data['pemetaan'] = $this->M_kasusmalaria->cariDataMalaria()->result_array();
            $data['rasioM'] = $this->M_kasusmalaria->cariRasioMalaria()->row_array();
            $data['kecamatan'] = $this->M_kecamatan->ambilSemuaKecamatan();
        }

        $this->load->view('frontend/template/head');
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/pemetaan/peta_malaria', $data);
        $this->load->view('frontend/template/footer');
    }

    public function grafik_malaria()
    {
        $this->load->model('M_kasusmalaria');

        $data['judul'] = 'Grafik Malaria';
        $data['rasioM'] = $this->M_kasusmalaria->rasioMalaria()->row_array();
        $data['apiM'] = $this->M_kasusmalaria->dataMalaria()->result_array();
        $data['tahun'] = $this->M_kasusmalaria->ambilTahun()->result_array();

        if ($this->input->get('cari')) {
            $data['rasioM'] = $this->M_kasusmalaria->cariRasioMalaria()->row_array();
            $data['apiM'] = $this->M_kasusmalaria->cariDataMalaria()->result_array();
            $data['tahun'] = $this->M_kasusmalaria->ambilTahun()->result_array();
        }

        $this->load->view('frontend/template/head');
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/grafik/grafik_malaria', $data);
        $this->load->view('frontend/template/footer');
    }

    public function pemetaan_dbd()
    {
        $this->load->model('M_kasusdbd');
        $this->load->model('M_kecamatan');

        $data['judul'] = 'Pemetaan DBD';
        $data['pemetaan'] = $this->M_kasusdbd->ambilPetaDBD()->result_array();
        $data['rasioD'] = $this->M_kasusdbd->rasioDbd()->row_array();
        $data['kecamatan'] = $this->M_kecamatan->ambilSemuaKecamatan();

        if ($this->input->get('cari')) {
            $data['pemetaan'] = $this->M_kasusdbd->cariPerhitunganDBD()->result_array();
            $data['rasioD'] = $this->M_kasusdbd->cariRasioDbd()->row_array();
            $data['kecamatan'] = $this->M_kecamatan->ambilSemuaKecamatan();
        }

        $this->load->view('frontend/template/head');
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/pemetaan/peta_dbd', $data);
        $this->load->view('frontend/template/footer');
    }

    public function grafik_dbd()
    {
        $this->load->model('M_kasusdbd');

        $data['judul'] = 'Grafik DBD';
        $data['irDbd'] = $this->M_kasusdbd->ambilPetaDBD()->result_array();
        $data['rasioD'] = $this->M_kasusdbd->rasioDbd()->row_array();
        $data['waktuDbd'] = $this->M_kasusdbd->waktuDbd()->result_array();
        $data['tahun'] = $this->M_kasusdbd->ambilTahun()->result_array();

        if ($this->input->get('cari')) {
            $data['irDbd'] = $this->M_kasusdbd->cariPerhitunganDBD()->result_array();
            $data['rasioD'] = $this->M_kasusdbd->cariRasioDbd()->row_array();
            $data['waktuDbd'] = $this->M_kasusdbd->cariWaktuDbd()->result_array();
            $data['tahun'] = $this->M_kasusdbd->ambilTahun()->result_array();
        }

        $this->load->view('frontend/template/head');
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/grafik/grafik_dbd', $data);
        $this->load->view('frontend/template/footer');
    }

    public function pemetaan_kusta()
    {
        $this->load->model('M_kasuskusta');
        $this->load->model('M_kecamatan');

        $data['judul'] = 'Pemetaan Kusta';
        $data['pemetaan'] = $this->M_kasuskusta->ambilPetaKusta()->result_array();
        $data['rasioK'] = $this->M_kasuskusta->rasioKusta()->row_array();
        $data['kecamatan'] = $this->M_kecamatan->ambilSemuaKecamatan();

        if ($this->input->get('cari')) {
            $data['pemetaan'] = $this->M_kasuskusta->cariDataKusta()->result_array();
            $data['rasioK'] = $this->M_kasuskusta->cariRasioKusta()->row_array();
            $data['kecamatan'] = $this->M_kecamatan->ambilSemuaKecamatan();
        }

        $this->load->view('frontend/template/head');
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/pemetaan/peta_kusta', $data);
        $this->load->view('frontend/template/footer');
    }

    public function grafik_kusta()
    {
        $this->load->model('M_kasuskusta');

        $data['judul'] = 'Grafik Kusta';
        $data['rasioK'] = $this->M_kasuskusta->rasioKusta()->row_array();
        $data['kusta'] = $this->M_kasuskusta->ambilPetaKusta()->result_array();
        $data['tahun'] = $this->M_kasuskusta->ambilTahun()->result_array();

        if ($this->input->get('cari')) {
            $data['rasioK'] = $this->M_kasuskusta->cariRasioKusta()->row_array();
            $data['kusta'] = $this->M_kasuskusta->cariDataKusta()->result_array();
            $data['tahun'] = $this->M_kasuskusta->ambilTahun()->result_array();
        }

        $this->load->view('frontend/template/head');
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/grafik/grafik_kusta', $data);
        $this->load->view('frontend/template/footer');
    }

    public function penyakit()
    {
        $this->load->model('M_penyakit');

        $data['judul'] = 'Penyakit Menular';
        $data['penyakit'] = $this->M_penyakit->ambilSemuaPenyakit();

        $this->load->view('frontend/template/head');
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/penyakit/penyakit', $data);
        $this->load->view('frontend/template/footer');
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

    public function excel_kusta($tahun)
    {
        $this->load->model('M_kasuskusta');

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $kasus = $this->M_kasuskusta->exportKusta($tahun)->result();
        $tahun = $this->M_kasuskusta->ambilCariTahun($tahun)->row();



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
            ->setCellValue('B4', 'No')->mergeCells('B4:B7')
            ->setCellValue('C4', 'Tahun')->mergeCells('C4:C7')
            ->setCellValue('D4', 'Kecamatan')->mergeCells('D4:D7')
            ->setCellValue('E4', 'Jumlah Penduduk')->mergeCells('E4:E7')
            ->setCellValue('F4', 'Kasus Baru')->mergeCells('F4:H6')
            ->setCellValue('I4', 'Penderita Terdaftar')->mergeCells('I4:AH4')
            ->setCellValue('I5', '< 15 thn')->mergeCells('I5:L5')
            ->setCellValue('M5', '16 - 25 thn')->mergeCells('M5:P5')
            ->setCellValue('Q5', '26 - 35 thn')->mergeCells('Q5:T5')
            ->setCellValue('U5', '36 - 45 thn')->mergeCells('U5:X5')
            ->setCellValue('Y5', '46 -  55 thn')->mergeCells('Y5:AB5')
            ->setCellValue('AC5', '> 56 thn')->mergeCells('AC5:AF5')
            ->setCellValue('AG5', 'Total')->mergeCells('AG5:AH6')
            ->setCellValue('AI4', 'Sembuh')->mergeCells('AI4:AK6')
            ->setCellValue('AL4', 'Cacat')->mergeCells('AL4:AN6')
            ->setCellValue('AO4', 'CDR')->mergeCells('AO4:AO7')
            ->setCellValue('AP4', 'PR')->mergeCells('AP4:AP7')
            ->setCellValue('I6', 'L')->mergeCells('I6:J6')
            ->setCellValue('K6', 'P')->mergeCells('K6:L6')
            ->setCellValue('M6', 'L')->mergeCells('M6:N6')
            ->setCellValue('O6', 'P')->mergeCells('O6:P6')
            ->setCellValue('Q6', 'L')->mergeCells('Q6:R6')
            ->setCellValue('S6', 'P')->mergeCells('S6:T6')
            ->setCellValue('U6', 'L')->mergeCells('U6:V6')
            ->setCellValue('W6', 'P')->mergeCells('W6:X6')
            ->setCellValue('Y6', 'L')->mergeCells('Y6:Z6')
            ->setCellValue('AA6', 'P')->mergeCells('AA6:AB6')
            ->setCellValue('AC6', 'L')->mergeCells('AC6:AD6')
            ->setCellValue('AE6', 'P')->mergeCells('AE6:AF6')
            ->setCellValue('F7', 'PB')
            ->setCellValue('G7', 'MB')
            ->setCellValue('H7', 'Total')
            ->setCellValue('I7', 'PB')
            ->setCellValue('J7', 'MB')
            ->setCellValue('K7', 'PB')
            ->setCellValue('L7', 'MB')
            ->setCellValue('M7', 'PB')
            ->setCellValue('N7', 'MB')
            ->setCellValue('O7', 'PB')
            ->setCellValue('P7', 'MB')
            ->setCellValue('Q7', 'PB')
            ->setCellValue('R7', 'MB')
            ->setCellValue('S7', 'PB')
            ->setCellValue('T7', 'MB')
            ->setCellValue('U7', 'PB')
            ->setCellValue('V7', 'MB')
            ->setCellValue('W7', 'PB')
            ->setCellValue('X7', 'MB')
            ->setCellValue('Y7', 'PB')
            ->setCellValue('Z7', 'MB')
            ->setCellValue('AA7', 'PB')
            ->setCellValue('AB7', 'MB')
            ->setCellValue('AC7', 'PB')
            ->setCellValue('AD7', 'MB')
            ->setCellValue('AE7', 'PB')
            ->setCellValue('AF7', 'MB')
            ->setCellValue('AG7', 'PB')
            ->setCellValue('AH7', 'MB')
            ->setCellValue('AI7', 'PB')
            ->setCellValue('AJ7', 'MB')
            ->setCellValue('AK7', 'Total')
            ->setCellValue('AL7', 'PB')
            ->setCellValue('AM7', 'MB')
            ->setCellValue('AN7', 'Total');


        $spreadsheet->getActiveSheet()->getStyle('B4:B7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('C4:C7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('D4:D7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('E4:E7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('F4:H6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('I4:AH4')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('I5:L5')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('M5:P5')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('Q5:T5')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('U5:X5')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('Y5:AB5')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('AC5:AF5')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('AG5:AH6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('AI4:AK6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('AL4:AN6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('AO4:AO7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('AP4:AP7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('I6:J6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('K6:L6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('M6:N6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('O6:P6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('Q6:R6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('S6:T6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('U6:V6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('W6:X6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('Y6:Z6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('AA6:AB6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('AC6:AD6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('AE6:AF6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('F7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('G7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('H7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('I7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('J7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('K7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('L7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('M7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('N7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('O7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('P7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('Q7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('R7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('S7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('T7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('U7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('V7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('W7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('X7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('Y7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('Z7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('AA7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('AB7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('AC7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('AD7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('AE7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('AF7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('AG7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('AH7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('AI7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('AJ7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('AK7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('AL7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('AM7')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('AN7')->applyFromArray($styleCol);




        $kolom = 8;
        $nomor = 1;
        foreach ($kasus as $kss) {

            $jumlahPenduduk = $kss->jumlahPenduduk;
            $total = $kss->kus_total;
            $kasus_baru = $kss->kasus_baru;

            $pr = ($total / $jumlahPenduduk) * 10000;
            $cdr = ($kasus_baru / $jumlahPenduduk) * 100000;

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('B' . $kolom, $nomor)
                ->setCellValue('C' . $kolom, $kss->tahun)
                ->setCellValue('D' . $kolom, $kss->nama)
                ->setCellValue('E' . $kolom, $kss->jumlahPenduduk)
                ->setCellValue('F' . $kolom, $kss->kusta_baruPB)
                ->setCellValue('G' . $kolom, $kss->kusta_baruMB)
                ->setCellValue('H' . $kolom, $kss->kasus_baru)
                ->setCellValue('I' . $kolom, $kss->kus15LPB)
                ->setCellValue('J' . $kolom, $kss->kus15LMB)
                ->setCellValue('K' . $kolom, $kss->kus15PPB)
                ->setCellValue('L' . $kolom, $kss->kus15PMB)
                ->setCellValue('M' . $kolom, $kss->kus1625LPB)
                ->setCellValue('N' . $kolom, $kss->kus1625LMB)
                ->setCellValue('O' . $kolom, $kss->kus1625PPB)
                ->setCellValue('P' . $kolom, $kss->kus1625PMB)
                ->setCellValue('Q' . $kolom, $kss->kus2635LPB)
                ->setCellValue('R' . $kolom, $kss->kus2635LMB)
                ->setCellValue('S' . $kolom, $kss->kus2635PPB)
                ->setCellValue('T' . $kolom, $kss->kus2635PMB)
                ->setCellValue('U' . $kolom, $kss->kus3645LPB)
                ->setCellValue('V' . $kolom, $kss->kus3645LMB)
                ->setCellValue('W' . $kolom, $kss->kus3645PPB)
                ->setCellValue('X' . $kolom, $kss->kus3645PMB)
                ->setCellValue('Y' . $kolom, $kss->kus4655LPB)
                ->setCellValue('Z' . $kolom, $kss->kus4655LMB)
                ->setCellValue('AA' . $kolom, $kss->kus4655PPB)
                ->setCellValue('AB' . $kolom, $kss->kus4655PMB)
                ->setCellValue('AC' . $kolom, $kss->kus56LPB)
                ->setCellValue('AD' . $kolom, $kss->kus56LMB)
                ->setCellValue('AE' . $kolom, $kss->kus56PPB)
                ->setCellValue('AF' . $kolom, $kss->kus56PMB)
                ->setCellValue('AG' . $kolom, $kss->pb)
                ->setCellValue('AH' . $kolom, $kss->mb)
                ->setCellValue('AI' . $kolom, $kss->sembuhPB)
                ->setCellValue('AJ' . $kolom, $kss->sembuhMB)
                ->setCellValue('AK' . $kolom, $kss->sembuh)
                ->setCellValue('AL' . $kolom, $kss->cacatPB)
                ->setCellValue('AM' . $kolom, $kss->cacatMB)
                ->setCellValue('AN' . $kolom, $kss->cacat)
                ->setCellValue('AO' . $kolom, number_format($cdr, 2))
                ->setCellValue('AP' . $kolom, number_format($pr, 2));

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
            $spreadsheet->getActiveSheet()->getStyle('AD' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('AE' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('AF' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('AG' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('AH' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('AI' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('AJ' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('AK' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('AL' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('AM' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('AN' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('AO' . $kolom)->applyFromArray($styleRow);
            $spreadsheet->getActiveSheet()->getStyle('AP' . $kolom)->applyFromArray($styleRow);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Kasus-kusta-tahun-' . $tahun->tahun . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function excel_dbd($tahun)
    {
        $this->load->model('M_kasusdbd');

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $kasus = $this->M_kasusdbd->exportDBD($tahun)->result();
        $tahun = $this->M_kasusdbd->ambilCariTahun($tahun)->row();

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
            ->setCellValue('F4', 'Penderita Positif')->mergeCells('F4:V4')
            ->setCellValue('F5', '< 1 thn')->mergeCells('F5:G5')
            ->setCellValue('H5', '1 - 4 thn')->mergeCells('H5:I5')
            ->setCellValue('J5', '5 - 9 thn')->mergeCells('J5:K5')
            ->setCellValue('L5', '10 - 14 thn')->mergeCells('L5:M5')
            ->setCellValue('N5', '15 - 19 thn')->mergeCells('N5:O5')
            ->setCellValue('P5', '20 - 44 thn')->mergeCells('P5:Q5')
            ->setCellValue('R5', '> 45 thn')->mergeCells('R5:S5')
            ->setCellValue('T5', 'Jumlah')->mergeCells('T5:U5')
            ->setCellValue('V5', 'Total')->mergeCells('V5:V6')
            ->setCellValue('W4', 'Meninggal')->mergeCells('W4:W6')
            ->setCellValue('X4', 'CFR')->mergeCells('X4:X6')
            ->setCellValue('Y4', 'IR')->mergeCells('Y4:Y6')
            ->setCellValue('F6', 'L')
            ->setCellValue('G6', 'P')
            ->setCellValue('H6', 'L')
            ->setCellValue('I6', 'P')
            ->setCellValue('J6', 'L')
            ->setCellValue('K6', 'P')
            ->setCellValue('L6', 'L')
            ->setCellValue('M6', 'P')
            ->setCellValue('N6', 'L')
            ->setCellValue('O6', 'P')
            ->setCellValue('P6', 'L')
            ->setCellValue('Q6', 'P')
            ->setCellValue('R6', 'L')
            ->setCellValue('S6', 'P')
            ->setCellValue('T6', 'L')
            ->setCellValue('U6', 'P');


        $spreadsheet->getActiveSheet()->getStyle('B4:B6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('C4:C6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('D4:D6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('E4:E6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('F4:V4')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('F5:G5')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('H5:I5')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('J5:K5')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('L5:M5')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('N5:O5')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('P5:Q5')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('R5:S5')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('T5:U5')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('V5:V6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('W4:W6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('X4:X6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('Y4:Y6')->applyFromArray($styleCol);
        $spreadsheet->getActiveSheet()->getStyle('F6')->applyFromArray($styleCol);
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
        $spreadsheet->getActiveSheet()->getStyle('U6')->applyFromArray($styleCol);



        $kolom = 7;
        $nomor = 1;
        foreach ($kasus as $kss) {

            $jumlahPenduduk = $kss->jumlahPenduduk;
            $total_kasus = $kss->jumlah_kasus;
            $meninggal = $kss->dbd_meninggal;

            $ir = $total_kasus / $jumlahPenduduk * 100000;

            if ($meninggal != 0) {
                $cfr = round($meninggal / $total_kasus * 100, 2);
            } else {
                $cfr = $meninggal;
            }

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('B' . $kolom, $nomor)
                ->setCellValue('C' . $kolom, $kss->tahun)
                ->setCellValue('D' . $kolom, $kss->nama)
                ->setCellValue('E' . $kolom, $kss->jumlahPenduduk)
                ->setCellValue('F' . $kolom, $kss->dbd1L)
                ->setCellValue('G' . $kolom, $kss->dbd1P)
                ->setCellValue('H' . $kolom, $kss->dbd14L)
                ->setCellValue('I' . $kolom, $kss->dbd14P)
                ->setCellValue('J' . $kolom, $kss->dbd59L)
                ->setCellValue('K' . $kolom, $kss->dbd59P)
                ->setCellValue('L' . $kolom, $kss->dbd1014L)
                ->setCellValue('M' . $kolom, $kss->dbd1014P)
                ->setCellValue('N' . $kolom, $kss->dbd1519L)
                ->setCellValue('O' . $kolom, $kss->dbd1519P)
                ->setCellValue('P' . $kolom, $kss->dbd2044L)
                ->setCellValue('Q' . $kolom, $kss->dbd2044P)
                ->setCellValue('R' . $kolom, $kss->dbd45L)
                ->setCellValue('S' . $kolom, $kss->dbd45P)
                ->setCellValue('T' . $kolom, $kss->totalL)
                ->setCellValue('U' . $kolom, $kss->totalP)
                ->setCellValue('V' . $kolom, $kss->jumlah_kasus)
                ->setCellValue('W' . $kolom, $kss->dbd_meninggal)
                ->setCellValue('X' . $kolom, number_format($cfr, 2) . '%')
                ->setCellValue('Y' . $kolom, number_format($ir, 2));



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

            $kolom++;
            $nomor++;
        }

        // $spreadsheet->createSheet();
        // $spreadsheet->setActiveSheetIndex(1)
        //     ->setCellValue('B4', 'No')->mergeCells('B4:B6')
        //     ->setCellValue('C4', 'Tahun')->mergeCells('C4:C6')
        //     ->setCellValue('D4', 'Kecamatan')->mergeCells('D4:D6')
        //     ->setCellValue('E4', 'Jumlah Penduduk')->mergeCells('E4:E6');


        // $spreadsheet->getActiveSheet()->getStyle('B4:B6')->applyFromArray($styleCol);
        // $spreadsheet->getActiveSheet()->getStyle('C4:C6')->applyFromArray($styleCol);
        // $spreadsheet->getActiveSheet()->getStyle('D4:D6')->applyFromArray($styleCol);
        // $spreadsheet->getActiveSheet()->getStyle('E4:E6')->applyFromArray($styleCol);



        // $kolom = 7;
        // $nomor = 1;
        // foreach ($kasus as $kss) {

        //     $spreadsheet->setActiveSheetIndex(1)
        //         ->setCellValue('B' . $kolom, $nomor)
        //         ->setCellValue('C' . $kolom, $kss->tahun)
        //         ->setCellValue('D' . $kolom, $kss->nama)
        //         ->setCellValue('E' . $kolom, $kss->jumlahPenduduk);

        //     $spreadsheet->getActiveSheet()->getStyle('B' . $kolom)->applyFromArray($styleRow);
        //     $spreadsheet->getActiveSheet()->getStyle('C' . $kolom)->applyFromArray($styleRow);
        //     $spreadsheet->getActiveSheet()->getStyle('D' . $kolom)->applyFromArray($styleRow);
        //     $spreadsheet->getActiveSheet()->getStyle('E' . $kolom)->applyFromArray($styleRow);

        //     $kolom++;
        //     $nomor++;
        // }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Kasus-dbd-tahun-' . $tahun->tahun . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
