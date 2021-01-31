<?php
/*

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporanterlantar extends MY_admin_controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('terlantar_model', 'Terlantar');
	}
	public function show($id = NULL)
	{
		$this->load->model('orang_terlantar_model', 'OrangTerlantar');
		$orang_terlantar = $this->OrangTerlantar->get_orang_terlantar($id);
		if (!$orang_terlantar) {
			redirect('admin/dashboard');
		}
		if (isset($_POST['export'])) {
			$this->excel($id);
		} else {

			$data['_view'] = 'admin/laporan_terlantar/index';
			$data['_title'] = 'Laporan Orang Terlantar ' . $orang_terlantar['orang_terlantar_nama'];
			$this->load->model('tempat_tinggal_model', 'TempatTinggal');
			$this->load->model('kondisi_tempat_tinggal_model', 'KondisiTempatTinggal');
			$this->load->model('kategori_ot_model', 'KategoriOt');
			$this->load->model('fasilitas_kesehatan_model', 'FasilitasKesehatan');
			$this->load->model('kondisi_ot_model', 'KondisiOt');
			$this->load->model('kebutuhan_diperlukan_model', 'KebutuhanDiperlukan');
			$data['_tempat_tinggals'] = $this->loopingSelect('tempat_tinggal', $this->TempatTinggal->get_all_tempat_tinggal());
			$data['_kondisi_tempat_tinggals'] = $this->loopingSelect('kondisi_tempat_tinggal', $this->KondisiTempatTinggal->get_all_kondisi_tempat_tinggal());
			$data['_kategori_ots'] = $this->loopingSelect('kategori_ot', $this->KategoriOt->get_all_kategori_ot());
			$data['_fasilitas_kesehatans'] = $this->loopingSelect('fasilitas_kesehatan', $this->FasilitasKesehatan->get_all_fasilitas_kesehatan());
			$data['_kondisi_ots'] = $this->loopingSelect('kondisi_ot', $this->KondisiOt->get_all_kondisi_ot());
			$kebutuhan_lainnyas = $this->Terlantar->count_field('kebutuhan_diperlukan_lainnya');
			$additional_kebutuhans = [];
			foreach ($kebutuhan_lainnyas as $kebutuhan) {
				array_push($additional_kebutuhans, ['id' => "lainnya*" . $kebutuhan['nama'], 'nama' => $kebutuhan['nama']]);
			}
			$data['_kebutuhan_diperlukans'] = $this->loopingSelect('kebutuhan_diperlukan', $this->KebutuhanDiperlukan->get_all_kebutuhan_diperlukan(), $additional_kebutuhans);
			$data['_have_identitass'] = [
				[
					'id' => '1',
					'nama' => 'ADA'
				],
				[
					'id' => '0',
					'nama' => 'TIDAK ADA'
				],
			];
			$data['_kecamatans'] = $this->Terlantar->count_field('terlantar_kecamatan');
			$data = array_merge($data, $this->data);
			$this->load->view('admin/layout', $data);
		}
	}
	private function loopingSelect($table, $datas, $lain = [])
	{
		$no = 0;
		$dataData = [];
		foreach ($datas as $data) {
			array_push($dataData, [
				'id' => $data[$table . '_id'],
				'nama' => $data[$table . '_nama'],
			]);
		}
		if (sizeof($lain) > 0) {
			$dataData = array_merge($dataData, $lain);
		}
		return $dataData;
	}
	function excel($id)
	{
		try {
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('A1', 'NO');
			$sheet->setCellValue('B1', 'NIK');
			$sheet->setCellValue('C1', 'NO KK');
			$sheet->setCellValue('D1', 'NAMA');
			$sheet->setCellValue('E1', 'TEMPAT LAHIR');
			$sheet->setCellValue('F1', 'TANGGAL LAHIR');
			$sheet->setCellValue('G1', 'JENIS KELAMIN');
			$sheet->setCellValue('H1', 'AGAMA');
			$sheet->setCellValue('I1', 'JL');
			$sheet->setCellValue('J1', 'RT');
			$sheet->setCellValue('K1', 'RW');
			$sheet->setCellValue('L1', 'DESA');
			$sheet->setCellValue('M1', 'KEC');
			$sheet->setCellValue('N1', 'TEMPAT TINGGAL');
			$sheet->setCellValue('O1', 'KONDISI TMP TINGGAL');
			$sheet->setCellValue('P1', 'KATEGORI OT');
			$sheet->setCellValue('Q1', 'FASKES');
			$sheet->setCellValue('R1', 'KONDISI OT');
			$sheet->setCellValue('S1', 'KEBUTUHAN');
			$sheet->setCellValue('T1', 'BANSOS YG DITERIMA');
			$sheet->setCellValue('U1', 'PERMASALAH YG DIHADAPI');
			$sheet->setCellValue('V1', 'TUJUAN PERJALANAN');
			$sheet->setCellValue('W1', 'PEMBERI BANTUAN');
			$sheet->setCellValue('X1', 'KETERANGAN');
			$sheet->setCellValue('Z1', 'DIAJUKAN PADA');
			$terlantars = [];
			$filename = 'Laporan Semua Orang Terlantar';
			$where =  ['terlantar.orang_terlantar_id' => $id];
			switch ($this->input->post('status')) {
				case '1':
					$where['terlantar.verif'] = 0;
					break;
				case '2':
					$where['terlantar.verif'] = 1;
					break;
				case '3':
					$where['terlantar.terima'] = 1;
					break;
				case '4':
					$where['terlantar.tolak'] = 1;
					break;
			}
			if ($this->input->post('tempat_tinggal')) {
				$where['terlantar.tempat_tinggal_id'] = htmlspecialchars($this->input->post('tempat_tinggal'));
			}
			if ($this->input->post('kondisi_tempat_tinggal')) {
				$where['terlantar.kondisi_tempat_tinggal_id'] = htmlspecialchars($this->input->post('kondisi_tempat_tinggal'));
			}
			if ($this->input->post('kategori_ot')) {
				$where['terlantar.kategori_ot_id'] = htmlspecialchars($this->input->post('kategori_ot'));
			}
			if ($this->input->post('fasilitas_kesehatan')) {
				$where['terlantar.fasilitas_kesehatan_id'] = htmlspecialchars($this->input->post('fasilitas_kesehatan'));
			}
			if ($this->input->post('kondisi_ot')) {
				$where['terlantar.kondisi_ot_id'] = htmlspecialchars($this->input->post('kondisi_ot'));
			}
			if ($this->input->post('kebutuhan_diperlukan')) {
				if (strpos($this->input->post('kebutuhan_diperlukan'), 'lainnya*') !== false) {
					$kebutuhan = explode('*', $this->input->post('kebutuhan_diperlukan'));
					$where['terlantar.kebutuhan_diperlukan_lainnya'] = htmlspecialchars($kebutuhan[1]);
				} else {
					$where['terlantar.kebutuhan_diperlukan_id'] = htmlspecialchars($this->input->post('kebutuhan_diperlukan'));
				}
			}
			// if ($this->input->post('have_identitas')) {
			// 	$where['terlantar.identitas_kependudukan'] = htmlspecialchars($this->input->post('have_identitas'));
			// }
			if ($this->input->post('kecamatan')) {
				$where['terlantar.terlantar_kecamatan'] = htmlspecialchars($this->input->post('kecamatan'));
			}
			// $where['terlantar.kebutuhan_diperlukan_lainnya'] = htmlspecialchars($this->input->post('kebutuhan_diperlukan'));
			$terlantars = $this->Terlantar->get_terlantar_detail(null, $where);

			$no = 1;
			$x = 2;
			foreach ($terlantars as $terlantar) {
				$sheet->setCellValue('A' . $x, $no++);
				$sheet->setCellValue('B' . $x, "'" . $terlantar['terlantar_nik']);
				$sheet->setCellValue('C' . $x, "'" . $terlantar['terlantar_no_kk']);
				$sheet->setCellValue('D' . $x, $terlantar['terlantar_nama']);
				$sheet->setCellValue('E' . $x, $terlantar['terlantar_tempat_lahir']);
				$sheet->setCellValue('F' . $x, $terlantar['terlantar_tanggal_lahir']);
				$sheet->setCellValue('G' . $x, $terlantar['terlantar_jenis_kelamin']);
				$sheet->setCellValue('H' . $x, $terlantar['agama_nama']);
				$sheet->setCellValue('I' . $x, $terlantar['terlantar_alamat']);
				$sheet->setCellValue('J' . $x, $terlantar['terlantar_rt']);
				$sheet->setCellValue('K' . $x, $terlantar['terlantar_rw']);
				$sheet->setCellValue('L' . $x, $terlantar['terlantar_desa']);
				$sheet->setCellValue('M' . $x, $terlantar['terlantar_kecamatan']);
				$sheet->setCellValue('N' . $x, $terlantar['tempat_tinggal_nama']);
				$sheet->setCellValue('O' . $x, $terlantar['kondisi_tempat_tinggal_nama']);
				$sheet->setCellValue('P' . $x, $terlantar['kategori_ot_nama']);
				$sheet->setCellValue('Q' . $x, $terlantar['fasilitas_kesehatan_nama']);
				$sheet->setCellValue('R' . $x, $terlantar['kondisi_ot_nama']);
				$sheet->setCellValue('S' . $x, $terlantar['kebutuhan_diperlukan_nama'] ?? $terlantar['kebutuhan_diperlukan_lainnya']);
				$sheet->setCellValue('T' . $x, ($terlantar['sumber_dana_id'] != null) ? $terlantar['bansos_nama'] . " Rp." . $terlantar['bansos_total'] : "Tidak Ada");
				$sheet->setCellValue('U' . $x, $terlantar['alasan_terlantar']);
				$sheet->setCellValue('V' . $x, $terlantar['tujuan_alamat']);
				$sheet->setCellValue('W' . $x, ($terlantar['sumber_dana_id'] != null) ? $terlantar['sumber_dana_nama'] : "Tidak Ada");
				$sheet->setCellValue('X' . $x, $terlantar['keterangan']);
				$sheet->setCellValue('Z' . $x, $terlantar['created_at']);
				$x++;
			}
			$writer = new Xlsx($spreadsheet);

			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
			header('Cache-Control: max-age=0');

			$writer->save('php://output');
		} catch (Exception $th) {
			$this->session->set_flashdata('error', $th->getMessage());
			redirect('admin/terlantar');
		}
	}
}
*/