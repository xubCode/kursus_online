<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CourseModel extends CI_Model {

	public function getCourseByMaker($id)
	{
		$query = "SELECT `kursus`.*, `genre`.`nama_genre` 
					FROM `kursus` JOIN `genre` 
						ON `genre`.`id` = `kursus`.`id_genre`
							WHERE `kursus`.`id_pengguna` = '$id'";

		return $this->db->query($query)->result_array();
	}

	public function getCourseByID($idKursus)
	{
		$query = "SELECT * FROM `kursus` WHERE id_kursus = '$idKursus'";

		return $this->db->query($query)->result_array();
	}

	public function getCourseByGenre($idGenre)
	{
		$query = "SELECT * FROM `kursus` WHERE id_genre = '$idGenre'";

		return $this->db->query($query)->result_array();	
	}
	
	public function getMateriByID($id)
	{
		// var_dump($id);die;
		$query = "SELECT * FROM `materi` WHERE id = '$id'";

		return $this->db->query($query)->row_array();
	}

	public function getAllCourse()
	{
		$query = "SELECT `kursus`.*, `genre`.`nama_genre` 
					FROM `kursus` JOIN `genre` 
						ON `genre`.`id` = `kursus`.`id_genre`";

		return $this->db->query($query)->result_array();
	}

	public function insert($nama, $genre, $deskripsi, $gambar, $keuntungan)
	{
		$data = [			
			'id_genre' => $genre,
			'id_pengguna' => $this->session->userdata('id'),
			'nama_krs' => $nama,			
			'gambar' => $gambar,
			'deskripsi' => $deskripsi,
			'keuntungan' => $keuntungan,
			'created_at' => date('d M Y H:i:s')
		];
		
		$this->db->insert('kursus', $data);
	}

	public function update($data, $id_kursus)
	{
		$this->db->where('id_kursus', $id_kursus);

		return $this->db->update('kursus', $data);
	}

	public function deleteKursus($id)
	{
		$query = "DELETE FROM `kursus` WHERE id_kursus = '$id'";

		return $this->db->query($query);
	}

	public function insertMateri($data)
	{
		$this->db->insert('materi', $data);
	}

	public function updateMateri($data,$id_materi)
	{
		// var_dump($id_materi);die;
		$this->db->where('id', $id_materi);

		return $this->db->update('materi', $data);

	}

	public function getMateriByCourseID($idKursus)
	{
		$query = "SELECT * FROM `materi` WHERE id_kursus = '$idKursus'";

		return $this->db->query($query)->result_array();
	}

	public function getFileMateriByCourseID($idKursus)
	{
		$query = "SELECT file_pendukung FROM `materi` WHERE id_kursus = '$idKursus'";

		return $this->db->query($query)->result_array();
	}

	public function deleteMateriByCourseID($id_kursus)
	{
		$query = "DELETE FROM `materi` WHERE id_kursus = '$id_kursus'";

		return $this->db->query($query);
	}

	public function getTugasByMAteriID($idMateri)
	{
		$query = "SELECT * FROM `tugas` WHERE id_materi = '$idMateri'";

		return $this->db->query($query)->result_array();	
	}

	public function addPenugasan()
	{
		$data = [
			'id_materi' => $this->input->post('id_materi'),
			'penugasan' => trim($this->input->post('penugasan')),
			'file_penugasan' => ''
		];

		$this->db->insert('tugas', $data);
	}

}
