<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['judul'] = 'Belajar Online';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/banner');
		// $this->load->view('templates/about');
		$this->load->view('templates/course');
		$this->load->view('templates/footer');
	}
}