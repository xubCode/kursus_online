<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cek();
		$this->load->model('UserModel');
		$this->load->model('CourseModel');
		// $this->load->model('GenreModel');
	}

	public function detail($idMateri)
	{
		$id = $this->session->userdata('id');

		$data['userAktif'] = $this->UserModel->getOneUser($id);
		
		$data['materi'] = $this->CourseModel->getMateriByID($idMateri);
		$data['tugas'] = $this->CourseModel->getTugasByMAteriID($idMateri);	
		//$data['file'] = $this->CourseModel->getMateriByIdAndFile($idMateri);
		 // var_dump($data['materi']);die;

		 if ($this->session->userdata('id') == $data['materi']['pengguna_id']) {
			$this->load->view('templates/adminHeader');
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('course/detailMateri');
			$this->load->view('templates/adminFooter');
		 }else{
			$this->load->view('templates/adminHeader');			
			$this->load->view('errors/404');			
			$this->load->view('templates/adminFooter');
		}
	}

	public function add()
	{
		$idKursus = $this->uri->segment(3);
		// var_dump($idKursus);die;	
		// $this->session->set_userdata($idKursus);
			// var_dump($this->session->userdata('idKursus'));die;
		$this->form_validation->set_rules('judul', 'Judul', 'trim|required', [
				'required' => 'Judul wajib diisi!'
		]);
		$this->form_validation->set_rules('konten', 'Konten', 'trim|required', [
				'required' => 'Konten wajib diisi!'
		]);	
		$this->form_validation->set_rules('status', 'Status', 'trim|required', [
				'required' => 'Status wajib diisi!'
		]);				
		$this->form_validation->set_rules('video_pendukung', 'Link', 'trim');	

		if ($this->form_validation->run() == false) {			
			 
			$id = $this->session->userdata('id');

			$data['userAktif'] = $this->UserModel->getOneUser($id);
			$data['course'] = $this->CourseModel->getCourseByID($idKursus);
			$this->load->view('templates/adminHeader');
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('course/addMateri');
			$this->load->view('templates/adminFooter');
			// echo "false";
		}else{
			$file = $_FILES['file_pendukung']['name'];
			// var_dump($file);die;
			if ($file) {
				$config['allowed_types'] = 'docx|xlsx|doc|xls|pdf';
				$config['max_size']		 = '2048';
				$config['upload_path']   = './assets/file/course/';
				$config['encrypt_name'] = FALSE;

				$this->load->library('upload', $config);

				if($this->upload->do_upload('file_pendukung')){	
					$data = [
						'id_kursus' => $this->input->post('idKursus'),
						'pengguna_id' => $this->session->userdata('id'),
						'judul' => $this->input->post('judul'),
						'konten' => trim($this->input->post('konten')),
						'link' => $this->input->post('video_pendukung'),
						'file_pendukung' => $file,
						'status' => $this->input->post('status'),
						'created_at' => date('d M Y H:i:s')
					];
			
			$this->CourseModel->insertMateri($data);
				
				
				}
			}else{
				$data = [
						'id_kursus' => $this->input->post('idKursus'),
						'pengguna_id' => $this->session->userdata('id'),
						'judul' => $this->input->post('judul'),
						'konten' => trim($this->input->post('konten')),
						'link' => $this->input->post('video_pendukung'),
						'file_pendukung' => '',
						'status' => $this->input->post('status'),
						'created_at' => date('d M Y H:i:s')
					];
			
				$this->CourseModel->insertMateri($data);
			}
			$this->session->set_flashdata('message', '<div class="alert alert-success">Materi Berhasil dibuat.</div>');
			redirect('course/detail/'. $this->input->post('idKursus') .'');	
			
		 }
	}

	public function edit($id_materi)
	{
		$id = $this->session->userdata('id');

		$data['userAktif'] = $this->UserModel->getOneUser($id);
		$data['materi'] = $this->CourseModel->getMateriByID($id_materi);
		// var_dump($data['course']);die;
		$this->load->view('templates/adminHeader');
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('course/editMateri');
		$this->load->view('templates/adminFooter');
	}

	public function update()
	{
		$this->form_validation->set_rules('judul', 'Judul', 'trim|required', [
				'required' => 'Judul wajib diisi!'
		]);
		$this->form_validation->set_rules('konten', 'Konten', 'trim|required', [
				'required' => 'Konten wajib diisi!'
		]);				
		

		if ($this->form_validation->run() == false) {
			$id = $this->session->userdata('id');

			$data['userAktif'] = $this->UserModel->getOneUser($id);
			$data['materi'] = $this->CourseModel->getMateriByID($id_materi);
			// var_dump($data['course']);die;
			$this->load->view('templates/adminHeader');
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('course/editMateri');
			$this->load->view('templates/adminFooter');
			// echo "false";
		}else{
		
			// var_dump($this->input->post('konten'));die;
			$data = [				
				'judul' => $this->input->post('judul'),
				'konten' => trim($this->input->post('konten')),				
			];
			$id = $this->input->post('id_materi');
			// var_dump($id);die;
			$this->CourseModel->updateMateri($data, $id);
				$this->session->set_flashdata('message', '<div class="alert alert-success">Materi Berhasil diupdate.</div>');
				redirect('materi/detail/' . $id);	

			
		 }
	}

	public function downloadFile()
	{
		$filename = $this->uri->segment(3);
		$data = file_get_contents(FCPATH . 'assets/file/course/' . $filename);
		// $data
		force_download($filename, $data);
		
	}

	public function penugasan()
	{
		$this->CourseModel->addPenugasan();
		$this->session->set_flashdata('message', '<div class="alert alert-success">Penugasan Berhasil dibuat.</div>');
		redirect('materi/detail/' . $this->input->post('id_materi'));	
	}


}