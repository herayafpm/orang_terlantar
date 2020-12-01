<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_user_controller
{
	public function index()
	{
		$data['_view'] = 'user/dashboard';
		$data['_title'] = 'Riwayat Pendaftaran';
		$data['_datatable'] = true;
		$data['_datatable_view'] = 'user/orang_terlantar/datatables';
		$this->load->view('layout', $data);
	}
	public function changepass()
	{
		try {
			$data['_view'] = 'user/changepass';
			$data['_title'] = 'Ganti Password';
			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->load->library('form_validation');
				$this->form_validation->set_rules('old_password', 'Password Lama', 'required|min_length[6]|callback_cek_password');
				$this->form_validation->set_rules('new_password', 'Password Baru', 'required|min_length[6]');
				$this->form_validation->set_rules('new_password2', 'Konfirmasi Password Baru', 'required|min_length[6]|matches[new_password]');
				$this->form_validation->set_message('required', '{field} tidak boleh kosong');
				$this->form_validation->set_message('cek_password', '{field} tidak valid');
				$this->form_validation->set_message('min_length', '{field} harus lebih dari {param} karakter');
				$this->form_validation->set_message('matches', '{field} tidak sama dengan {param}');
				header('Content-Type: application/json');
				if ($this->form_validation->run()) {
					$params = [
						'user_password' => htmlspecialchars($this->input->post('new_password')),
					];
					if ($this->User->update_user($this->user['user_id'], $params)) {
						echo json_encode(['status' => 1, 'message' => 'Berhasil mengubah password', "data" => ["to" => base_url('user/dashboard/changepass')]]);
					} else {
						echo json_encode(['status' => 0, 'message' => 'Gagal mengubah password', "data" => []]);
					}
				} else {
					echo json_encode(['status' => 0, 'message' => validation_errors(), "data" => []]);
				}
			} else {
				$this->load->view('layout', $data);
			}
		} catch (Exception $th) {
			show_error($th->getMessage());
		}
	}
	function cek_password($str)
	{
		$user = $this->user;
		if (password_verify($str, $user['user_password'])) {
			return true;
		}
		return false;
	}
}
