<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_booking extends CI_Model {
	var $table = 'bookingTable';
	var $id = 'bookingId';

	public function getData($id)
	{
		$this->db->join('categoryTable', 'categoryTable.id = bookingTable.category_id', 'left');
		$this->db->join('serviceTable', 'serviceTable.service_id = bookingTable.service_id', 'left');
		$this->db->join('employeeTable', 'employeeTable.id = bookingTable.employee_id', 'left');
		return $this->db->get_where($this->table, ['bookingId' => $id])->row_array();
	}
	
	public function getList($id)
	{
		$this->db->join('categoryTable', 'categoryTable.id = bookingTable.category_id', 'left');
		$this->db->join('serviceTable', 'serviceTable.service_id = bookingTable.service_id', 'left');
		$this->db->join('employeeTable', 'employeeTable.id = bookingTable.employee_id', 'left');
		return $this->db->get_where('bookingTable',['userId' => $id,'status' => 'active'])->result_array();
	}

	public function getListBooking($number,$offset)
	{
		$this->db->join('categoryTable', 'categoryTable.id = bookingTable.category_id', 'left');
		$this->db->join('serviceTable', 'serviceTable.service_id = bookingTable.service_id', 'left');
		$this->db->join('employeeTable', 'employeeTable.id = bookingTable.employee_id', 'left');
		$this->db->join('member', 'member.id = bookingTable.userId', 'left');
		return $this->db->get($this->table,$number,$offset);
	}
	public function getRowBooking()
	{
		$this->db->join('categoryTable', 'categoryTable.id = bookingTable.category_id', 'left');
		$this->db->join('serviceTable', 'serviceTable.service_id = bookingTable.service_id', 'left');
		$this->db->join('employeeTable', 'employeeTable.id = bookingTable.employee_id', 'left');
		$this->db->join('member', 'member.id = bookingTable.userId', 'left');
		return $this->db->get($this->table);
	}



}

/* End of file M_booking.php */
/* Location: ./application/models/M_booking.php */