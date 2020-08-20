<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {
	private $table = 'user';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getUser()
	{
		$query = "SELECT `pengguna`.*, `role`.`roleName` 
					FROM `pengguna` JOIN `role` 
						ON `role`.`id` = `pengguna`.`role_id`
							WHERE `pengguna`.`is_active` = '1'";
		return $this->db->query($query)->result_array();
		
	}

	public function getOneUser($id)
	{
		$query = "SELECT `pengguna`.*, `role`.`roleName` 
					FROM `pengguna` JOIN `role` 
						ON `role`.`id` = `pengguna`.`role_id`
							WHERE `pengguna`.`is_active` = '1' AND `pengguna`.`id` = '$id'";
		return $this->db->query($query)->row_array();
	}

	public function update($id, $nama, $alamat, $gambar)
	{
		$data = [
			'nama' => $nama,
			'alamat' => $alamat,			
			'gambar' => $gambar			
		];		
		$this->db->set($data);
		$this->db->where('id', $id);
		$query = $this->db->update('pengguna');
		return $query;
	}

	public function delete($id)
	{
		$data = $this->db->get_where('pengguna', ['id' => $id])->row_array();
		if ($data['gambar']) {
			unlink(FCPATH . 'assets/img/profil/' . $data['gambar']);
		}
		$this->db->where('id', $id);
		$query =  $this->db->delete('pengguna');
		return $query;
	}

	public function sortingData()
	{
		$query = $this->db->query("SELECT * FROM pengguna ORDER BY id");
		$no = 1;
		foreach ($query->result_array() as $row) {

			$id = $row['id'];

			$this->db->set('id', $no); 
			$this->db->where('id', $id);
			$query2 = $this->db->update('pengguna');
			$no++;
		}
		$this->db->query("ALTER TABLE pengguna AUTO_INCREMENT = $no");
	}

	public function siswa()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
			'required' => 'Nama wajib diisi!'
		]);
		$this->form_validation->set_rules('username', 'Username', 'required|trim',[
			'required' => 'Username wajib diisi!'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pengguna.email]',[
			'valid_email' => 'Email harus benar!',
			'is_unique' => 'Email sudah digunakan!',
			'required' => 'Email wajib diisi!'
		]);
		$this->form_validation->set_rules('pw', 'Password', 'required|trim|min_length[3]|matches[pw2]',[
			'matches' => 'Password tidak cocok!',
			'min_length' => 'Password terlalu pendek!',
			'required' => 'Password wajib diisi'
		]);
		$this->form_validation->set_rules('pw2', 'Password', 'required|trim|matches[pw]',[
			'matches' => 'Password tidak cocok!',
			'min_length' => 'Password terlalu pendek!',
			'required' => 'Password wajib diisi'
		]);
		if( $this->form_validation->run() == false ) {
			$data['judul'] = 'BeLon || Registrasi';
			$this->load->view('templates/authHeader', $data);
			$this->load->view('auth/register'); 
			$this->load->view('templates/authFooter');
		}else{
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'pw' => password_hash($this->input->post('pw'), PASSWORD_DEFAULT),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'gambar' => 'default.png',
				'role_id' => 3,
				'is_active' => 1,
				'last_login' => '',
				'created_at' => date('d M Y H:i:s')
			];

			$this->db->insert('pengguna', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! akun anda telah dibuat. Silahkan Login</div>');
			redirect('auth');
		}
	}

	public function instruktur()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
			'required' => 'Nama wajib diisi!'
		]);
		$this->form_validation->set_rules('username', 'Username', 'required|trim',[
			'required' => 'Username wajib diisi!'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pengguna.email]',[
			'valid_email' => 'Email harus benar!',
			'is_unique' => 'Email sudah digunakan!',
			'required' => 'Email wajib diisi!'
		]);
		$this->form_validation->set_rules('pw', 'Password', 'required|trim|min_length[3]|matches[pw2]',[
			'matches' => 'Password tidak cocok!',
			'min_length' => 'Password terlalu pendek!',
			'required' => 'Password wajib diisi'
		]);
		$this->form_validation->set_rules('pw2', 'Password', 'required|trim|matches[pw]',[
			'matches' => 'Password tidak cocok!',
			'min_length' => 'Password terlalu pendek!',
			'required' => 'Password wajib diisi'
		]);
		if( $this->form_validation->run() == false ) {
			$data['judul'] = 'BeLon || Registrasi';
			$this->load->view('templates/authHeader', $data);
			$this->load->view('auth/reg2'); 
			$this->load->view('templates/authFooter');
		}else{
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'pw' => password_hash($this->input->post('pw'), PASSWORD_DEFAULT),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'gambar' => 'default.png',
				'role_id' => 2,
				'is_active' => 1,
				'last_login' => '',
				'created_at' => date('d M Y H:i:s')
			];

			$this->db->insert('pengguna', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! akun anda telah dibuat. Silahkan Login</div>');
			redirect('auth');
		}
	}

	public function doLogin()
	{
		$post = $this->input->post();
		

		$user = $this->db->get_where('pengguna', ['email' => $post['email']])->row_array();
		
		// var_dump($post['pw']);
		// die;
		if ($user) {
			if ($user['is_active'] == 1) {
				if (password_verify($post['pw'], $user['pw'])) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id'],
						'username' => $user['username'],
						'id' => $user['id'],
					];
					$this->session->set_userdata($data);
					$this->update_last_login();
					if ($user['role_id'] == 1) {
						redirect('admin');
					}elseif ($user['role_id'] == 2) {
						redirect('admin');
					}else {
						redirect('siswa');
					}
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger">Password salah!</div>');
					redirect('auth');
				}
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Akun Belum diaktifasi!</div>');
				redirect('auth');
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger">Akun ini belum terdaftar, Silahkan daftar!</div>');
			redirect('auth');
		}
	}

	private function update_last_login()
	{
		$data = [
			'last_login' => date('d M Y H:i:s')
		];
		
		$this->db->where('email', $this->session->userdata('email'));
		$this->db->update('pengguna', $data);
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah keluar!</div>');
		redirect('home');
	}
}
