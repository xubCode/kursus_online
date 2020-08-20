<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();	
		$this->load->model('UserModel');
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
				'required' => 'Email wajib diisi!',
				'valid_email' => 'Email harus benar!'
			]);
		$this->form_validation->set_rules('pw', 'Password', 'trim|required|min_length[3]', [
				'required' => 'Password wajib diisi!',
				'min_length' => 'Password minimaml 3 karakter!'
			]);
		if ($this->form_validation->run() == false) {
			$data['judul'] = 'BelON || Login';
			$this->load->view('templates/authHeader', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/authFooter');
		}else{
			$this->_login();
		}
	}

	public function register()
	{
		$this->UserModel->siswa();
	}

	public function instruktur()
	{
		$this->UserModel->instruktur();
	}

	public function logout()
	{
		$this->UserModel->logout();
	}

	private function _login()
	{
		$this->UserModel->doLogin();
	}
}
