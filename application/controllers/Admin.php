<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '2') {
			$this->load->view('templates/adminHeader');			
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/dashboard');						
			$this->load->view('templates/adminFooter');	
		}else{
			$this->load->view('templates/adminHeader');			
			$this->load->view('errors/404');			
			$this->load->view('templates/adminFooter');	
		}	
			
	}

	public function getUser()
	{
		$data['user'] = $this->UserModel->getUser();
		// var_dump($data['user']);
		// die;
		$id = $this->session->userdata('id');

		$data['userAktif'] = $this->UserModel->getOneUser($id);
		
		if ($this->session->userdata('role_id') == '1') {
			$this->load->view('templates/adminHeader');
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/user', $data);
			$this->load->view('templates/adminFooter');
		}else{
			$this->load->view('templates/adminHeader');			
			$this->load->view('errors/404');			
			$this->load->view('templates/adminFooter');	
		}
		
						
		
	}

	public function delete($id)
	{
		if ($this->session->userdata('role_id') == '1') {
			$this->UserModel->delete($id);
			$this->UserModel->sortingData();
			$this->session->set_flashdata('message', '<div class="alert alert-success">User berhasil dihapus.</div>');
			redirect('admin/getUser');				
		}else{
			$this->load->view('templates/adminHeader');
			$this->load->view('errors/404');
			$this->load->view('templates/adminFooter');
		}
		
	}
}
