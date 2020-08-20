<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GenreModel extends CI_Model {

	public function create()
	{
		$pengguna_id = $this->session->userdata('id');		
		$genre = $this->input->post('nama_genre');

		$query = "INSERT INTO `genre` VALUES('','$pengguna_id','$genre')";

		$this->db->query($query);
	}

	public function get()
	{		

		$query = "SELECT * FROM `genre`";

		return $this->db->query($query)->result_array();
	}

	public function update()
	{
		$id = htmlspecialchars($this->input->post('id'));
		$nama = htmlspecialchars($this->input->post('nama'));

		$query = "UPDATE `genre` SET `nama_genre` = '$nama' WHERE `id` = '$id'";
		return $this->db->query($query);
	}

	public function delete($id)
	{
		$query = "DELETE FROM `genre` WHERE `id` = '$id'";
		return $this->db->query($query);
	}

}
