<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_partner extends CI_Model {
	var $table = 'partnerTable';
	var $id = 'partnerId';

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

/* End of file M_partner.php */
/* Location: ./application/models/M_partner.php */