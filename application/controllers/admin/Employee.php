<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		date_default_timezone_set('Asia/Jakarta');
		if ($this->session->userdata('adminLogin') != TRUE) {
			redirect(site_url('dashboard/login'));
		}
	}


	public function index()
	{
		$this->form_validation->set_rules('serviceId', 'service', 'required');
		$this->form_validation->set_rules('employeeName', 'employee', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->db->join('serviceTable', 'serviceTable.service_id = employeeTable.serviceId', 'left');
			$service = $this->db->get('employeeTable')->result_array();
			$data = [
				'title' => 'Employee List',
				'isi' => 'admin/master_employee',
				'results' => $service,
				'service' => $this->db->get('serviceTable')->result_array()
			];

			$this->load->view('index',$data);
		} else {
			$data = [
				'serviceId' => $this->input->post('serviceId'),
				'employeeName' => $this->input->post('employeeName'),
			];

			if ($this->db->insert('employeeTable',$data)) {
				$this->session->set_flashdata('success', 'data berhasil di input');
				redirect(site_url('dashboard/employee'));
			}else{
				$this->session->set_flashdata('error', 'data gagal di input');
				redirect(site_url('dashboard/employee'));
			}
		}
	}

	public function edit()
	{
		$this->form_validation->set_rules('serviceId', 'service', 'required');
		$this->form_validation->set_rules('employeeName', 'employee', 'required');
		$id = $this->uri->segment(4);
		if ($this->form_validation->run() == FALSE) {
			$this->db->join('serviceTable', 'serviceTable.service_id = employeeTable.serviceId', 'left');
			$service = $this->db->get('employeeTable')->result_array();
			$data = [
				'title' => 'Service List',
				'isi' => 'admin/master_employee',
				'results' => $service,
				'data' => $this->db->get_where('employeeTable',['id' => $id])->row_array(),
				'service' => $this->db->get('serviceTable')->result_array()
			];

			$this->load->view('index',$data);
		} else {
			$data = [
				'serviceId' => $this->input->post('serviceId'),
				'employeeName' => $this->input->post('employeeName'),
			];

			if ($this->db->update('employeeTable',$data,['id' => $id])) {
				$this->session->set_flashdata('success', 'data berhasil di update');
				redirect(site_url('dashboard/employee'));
			}else{
				$this->session->set_flashdata('error', 'data gagal di update');
				redirect(site_url('dashboard/employee'));
			}
		}
	}

	public function delete()
	{
		$id = $this->uri->segment(4);
		if ($this->db->delete('employeeTable',['id' => $id])) {
			$this->session->set_flashdata('success', 'data berhasil di delete');
			redirect(site_url('dashboard/employee'));
		}else{
			$this->session->set_flashdata('error', 'data gagal di delete');
			redirect(site_url('dashboard/employee'));
		}
	}


}

/* End of file Service.php */
/* Location: ./application/controllers/admin/Service.php */