<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RbModel extends CI_Model {

  public function getRbByMaker($id)
  {
    $query = "SELECT `kursus`.*, `detail_order`.*
					FROM `kursus` JOIN `detail_order`
						ON `detail_order`.`id_produk` = `kursus`.`id_kursus`
							WHERE `detail_order`.`id_pengguna` = '$id'";

    return $this->db->query($query)->result_array();
  }

  public function get_produk_kategori($kategori)
	{
		if($kategori>0)
			{
				$this->db->where('id_genre',$kategori);
			}
		$query = $this->db->get('kursus');
		return $query->result_array();
	}

	public function get_kategori_all()
	{
		$query = $this->db->get('genre');
		return $query->result_array();
	}

  public function insert_cart($data_cart)
	{
		$this->db->insert('keranjang', $data_cart);
	}

  public function get_pengguna_byID($id)
  {
    $query = "SELECT * FROM pengguna WHERE id = '$id'";

    return $this->db->query($query)->result_array();
  }

  public function tambah_order($data)
{
  $this->db->insert('tbl_order', $data);
  $id = $this->db->insert_id();
  return (isset($id)) ? $id : FALSE;
}

public function tambah_detail_order($data)
{
  $this->db->insert('detail_order', $data);
}


}
