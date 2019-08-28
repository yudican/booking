<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_news extends CI_Model {
	var $table = 'newsTable';
	var $id = 'newsId';


	public function getListNews($number,$offset)
	{
		return $this->db->get($this->table,$number,$offset)->result_array();
	}
	public function getRecord($id=null)
	{
		if ($id) {
			$result = $this->db->get_where($this->table,[$this->id => $id])->row_array();
		}else{
			$result = $this->db->get($this->table)->result_array();
		}
		return $result;
	}

	public function insertRecord($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->affected_rows();
	}
	// update
	public function updateRecord($id,$data)
	{
		$this->db->update($this->table, $data,[$this->id => $id]);
		return $this->db->affected_rows();
	}

	//hapus
	public function deleteRecord($id)
	{
		$this->db->delete($this->table,[$this->id => $id]);
		return $this->db->affected_rows();
	}

}

/* End of file M_news.php */
/* Location: ./application/models/M_news.php */