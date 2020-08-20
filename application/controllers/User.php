<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cek();
		$this->load->model('UserModel');
	}

	public function index()
	{
		$id = $this->session->userdata('id');

		$data['userAktif'] = $this->UserModel->getOneUser($id);
		// var_dump($data['user']);
		// die;
		$this->load->view('templates/adminHeader');
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('profil/index', $data);
		$this->load->view('templates/adminFooter');
		
	}

	public function update()
	{
		$this->form_validation->set_rules('edit_nama', 'Nama', 'required|trim', [
			'required' => 'Nama wajib diisi!'
		]);
		$this->form_validation->set_rules('edit_alamat', 'Alamat', 'required|trim', [
			'required' => 'Alamat wajib diisi!'
		]);				
		if ($this->form_validation->run() == false) {
			$id = $this->session->userdata('id');

			$data['userAktif'] = $this->UserModel->getOneUser($id);
			// var_dump($data['user']);
			// die;
			$this->load->view('templates/adminHeader');
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('profil/index', $data);
			$this->load->view('templates/adminFooter');
		}else{
			$upload_gambar = $_FILES['edit_foto']['name'];
			$data = $this->UserModel->getOneUser($this->input->post('id'));
			if ($upload_gambar) {
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']		 = '2048';
				$config['upload_path']   = './assets/img/profil/';
				$config['encrypt_name'] = FALSE;

				$this->load->library('upload', $config);
					
				if($this->upload->do_upload('edit_foto')){
					$gambar = $this->upload->data('file_name');					
					$gambar_lama = $data['gambar'];
					
					if ($gambar_lama != 'default.jpg') {
						unlink(FCPATH . 'assets/img/profil/' . $gambar_lama);
					}					
				}
			}			
				$id = $this->input->post('id'); 
				$nama = $this->input->post('edit_nama');
				$alamat = trim($this->input->post('edit_alamat'));				
				$this->UserModel->update($id, $nama, $alamat, $gambar);
				$this->session->set_flashdata('message', '<div class="alert alert-success">Profil berhasil diupdate.</div>');
				redirect('user');	
								
		}				
	}
}