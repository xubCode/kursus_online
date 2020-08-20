<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// cek();
		$this->load->model('UserModel');
		$this->load->model('CourseModel');
		$this->load->model('GenreModel');	

	}

	public function index()
	{
		$id = $this->session->userdata('id');

		$data['userAktif'] = $this->UserModel->getOneUser($id);
		$data['course'] = $this->CourseModel->getCourseByMaker($id);
		
		$this->load->view('templates/adminHeader');
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('course/index',$data);
		$this->load->view('templates/adminFooter');	
	}

	public function create()
	{
		$id = $this->session->userdata('id');

		$data['userAktif'] = $this->UserModel->getOneUser($id);
		$data['genre'] = $this->GenreModel->get();
		$this->load->view('templates/adminHeader');
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('course/create');
		$this->load->view('templates/adminFooter');
	}

	public function insert()
	{	
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
				'required' => 'Nama wajib diisi!'
		]);
		$this->form_validation->set_rules('genre', 'Genre', 'trim|required', [
				'required' => 'Genre wajib diisi!'
		]);				
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required', [
				'required' => 'Kolom Deskripsi wajib diisi!'
		]);
		$this->form_validation->set_rules('keuntungan', 'Keuntungan', 'trim|required', [
				'required' => 'Kolom Keuntungan wajib diisi!'
		]);

		if ($this->form_validation->run() == false) {			
			 
			$id = $this->session->userdata('id');

			$data['userAktif'] = $this->UserModel->getOneUser($id);
			$data['genre'] = $this->GenreModel->get();
			$this->load->view('templates/adminHeader');
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('course/create');
			$this->load->view('templates/adminFooter');
		}else{
			// var_dump($this->input->post('gambar'));die;
			$upload_gambar = $_FILES['gambar']['name'];
			if ($upload_gambar) {


				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']		 = '2048';
				$config['upload_path']   = './assets/img/course/';
				$config['encrypt_name'] = FALSE;

				$this->load->library('upload', $config);
					
				if($this->upload->do_upload('gambar')){

					$gambar = $this->upload->data('file_name');	
					// var_dump($gambar);die;				
					$config['image_library']='gd2';
	                $config['source_image']=FCPATH . './assets/img/course/'. $gambar;
	                $config['create_thumb']= FALSE;
	                $config['maintain_ratio']= FALSE;
	                $config['quality']= '50%';
	                $config['width']= 288;
	                $config['height']= 161;
	                $config['new_image']= FCPATH . './assets/img/course/'. $gambar;
	                $this->load->library('image_lib', $config);
	                $this->image_lib->resize();

					
					$nama = $this->input->post('nama'); 
					$genre = $this->input->post('genre');
					$deskripsi = $this->input->post('deskripsi');
					$keuntungan = $this->input->post('keuntungan');	
					
					$id = $this->session->userdata('id');

					$data['gambar'] = $gambar;
					$data['userAktif'] = $this->UserModel->getOneUser($id);
					$data['genre'] = $this->GenreModel->get();
					$this->load->view('templates/adminHeader');
					$this->load->view('templates/topbar', $data);
					$this->load->view('templates/sidebar');
					$this->load->view('course/create');
					$this->load->view('templates/adminFooter');

					
					
					$this->CourseModel->insert($nama, $genre, $deskripsi, $gambar, $keuntungan);		
				}

			}
				
				$this->session->set_flashdata('message', '<div class="alert alert-success">Kursus Berhasil dibuat.</div>');
				redirect('course');	

			
		}
	}

	public function editKursus($idKursus)
	{
		$id = $this->session->userdata('id');

		$data['judul'] = 'Edit Kursus';
		$data['userAktif'] = $this->UserModel->getOneUser($id);
		$data['course'] = $this->CourseModel->getCourseByID($idKursus);	
		// $data['genre'] = $this->GenreModel->get();
		$this->load->view('templates/adminHeader');
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('course/edit');
		$this->load->view('templates/adminFooter');
	}

	public function update()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
				'required' => 'Nama wajib diisi!'
		]);		
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required', [
				'required' => 'Kolom Deskripsi wajib diisi!'
		]);
		$this->form_validation->set_rules('keuntungan', 'Keuntungan', 'trim|required', [
				'required' => 'Kolom Keuntungan wajib diisi!'
		]);

		if ($this->form_validation->run() == false) {			
			 
			$id = $this->session->userdata('id');

			$data['judul'] = 'Edit Kursus';
			$data['userAktif'] = $this->UserModel->getOneUser($id);
			$data['course'] = $this->CourseModel->getCourseByID($idKursus);	
			$this->load->view('templates/adminHeader');
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('course/edit');
			$this->load->view('templates/adminFooter');
		}else{
			// var_dump($this->input->post('gambar'));die;
			
			if ($_FILES['gambar']['name'] != '') {	
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']		 = '2048';
				$config['upload_path']   = './assets/img/course/';
				$config['encrypt_name'] = FALSE;

				$this->load->library('upload', $config);
					
				if($this->upload->do_upload('gambar')){
					$data_gambar = $this->upload->data();
					$gambar = $data_gambar['file_name'];

					$id_kursus = $this->input->post('id_kursus');
					$data_lama = $this->db->get_where('kursus', ['id_kursus' => $id_kursus])->result_array();
					// var_dump($data_lama['0']['gambar']);die;
					if ($data_lama['0']['gambar'] != $gambar) {
						unlink(FCPATH . 'assets/img/course/' . $data_lama['0']['gambar']);
					}

					$config['image_library']='gd2';
	                $config['source_image']=FCPATH . './assets/img/course/'. $gambar;
	                $config['create_thumb']= FALSE;
	                $config['maintain_ratio']= FALSE;
	                $config['quality']= '50%';
	                $config['width']= 288;
	                $config['height']= 161;
	                $config['new_image']= FCPATH . './assets/img/course/'. $gambar;
	                $this->load->library('image_lib', $config);
	                $this->image_lib->resize();							
				}

			}else{
				$gambar = $this->input->post('oldImg');
			}		
		}																			
				$data = [
					'nama_krs' => $this->input->post('nama'), 				
					'gambar' => $gambar,
					'deskripsi' => $this->input->post('deskripsi'),
					'keuntungan' => $this->input->post('keuntungan')
				];
				// var_dump($data);die;
				
				$id_kursus = $this->input->post('id_kursus');
				$this->CourseModel->update($data, $id_kursus);		
				$this->session->set_flashdata('message', '<div class="alert alert-success">Kursus Berhasil diupdate.</div>');
				redirect('course');
	}

	public function publish()
	{
		$data['judul'] = 'BeLon || Daftra Kursus';
		$data['course'] = $this->CourseModel->getAllCourse();

		$this->load->view('templates/userHeader', $data);
		$this->load->view('templates/userTopbar');
		$this->load->view('course/publish', $data);
		$this->load->view('templates/userFooter');

	}


	//detail kursus untuk instruktur
	public function detail($idKursus)
	{
		$id = $this->session->userdata('id');

		$data['userAktif'] = $this->UserModel->getOneUser($id);
		$data['course'] = $this->CourseModel->getCourseByID($idKursus);	
		$data['materi'] = $this->CourseModel->getMateriByCourseID($idKursus);
		foreach ($data['course'] as $row) {
			$id_pengguna = $row['id_pengguna'];
		}
		
		// var_dump($id_pengguna);die;	
		if ($this->session->userdata('id') == $id_pengguna) {
			$this->load->view('templates/adminHeader');
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('course/detail');
			$this->load->view('templates/adminFooter');	
		}else{
			$this->load->view('templates/adminHeader');			
			$this->load->view('errors/404');			
			$this->load->view('templates/adminFooter');	
		}
		
	}

	public function delete($id_kursus)
	{
		// $data_file = $this->CourseModel->getFileMateriByCourseID($id_kursus);
		// echo $data_file->num_rows();die;
		$data = $this->CourseModel->getCourseByID($id_kursus);			
		if ($data['0']['gambar'] != '') {
			unlink(FCPATH . 'assets/img/course/' . $data['0']['gambar']);
		}
		$this->CourseModel->deleteKursus($id_kursus);

		$data_file = $this->CourseModel->getFileMateriByCourseID($id_kursus);

		// for ($i = 0;$i < ) {
		// 	unlink(FCPATH . 'assets/file/course/' . $file['file_pendukung']);
			$this->CourseModel->deleteMateriByCourseID($id_kursus);		
		// }

		
		
		$this->session->set_flashdata('message', '<div class="alert alert-success">Kursus Berhasil dihapus.</div>');
				redirect('course');
	}

	public function save()
	{
		$status = $this->uri->segment(3);
		//var_dump($status);die;
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
				'required' => 'Nama wajib diisi!'
		]);
		$this->form_validation->set_rules('genre', 'Genre', 'trim|required', [
				'required' => 'Genre wajib diisi!'
		]);				
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required', [
				'required' => 'Kolom Deskripsi wajib diisi!'
		]);
		$this->form_validation->set_rules('keuntungan', 'Keuntungan', 'trim|required', [
				'required' => 'Kolom Keuntungan wajib diisi!'
		]);

		if ($status == null) {
			$this->load->view('templates/adminHeader');			
			$this->load->view('errors/405');			
			$this->load->view('templates/adminFooter');
		}else{
			if ($this->form_validation->run() == false) {
				$id = $this->session->userdata('id');

				$data['userAktif'] = $this->UserModel->getOneUser($id);
				$data['genre'] = $this->GenreModel->get();
				$this->load->view('templates/adminHeader');
				$this->load->view('templates/topbar', $data);
				$this->load->view('templates/sidebar');
				$this->load->view('course/index');
				$this->load->view('templates/adminFooter');
			}else{
				if ($status == 'insert') {
					echo "insert";
				}else{
					echo "update";
				}
			}			
		}die;
	}

}