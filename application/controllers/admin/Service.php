<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

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
		$this->form_validation->set_rules('categoryId', 'kategori', 'required');
		$this->form_validation->set_rules('service_name', 'service', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->db->join('categoryTable', 'categoryTable.id = serviceTable.categoryId', 'left');
			$service = $this->db->get('serviceTable')->result_array();
			$data = [
				'title' => 'Service List',
				'isi' => 'admin/master_service',
				'results' => $service,
				'category' => $this->db->get('categoryTable')->result_array()
			];

			$this->load->view('index',$data);
		} else {
			$data = [
				'categoryId' => $this->input->post('categoryId'),
				'service_name' => $this->input->post('service_name'),
			];

			if ($this->db->insert('serviceTable',$data)) {
				$this->session->set_flashdata('success', 'data berhasil di input');
				redirect(site_url('dashboard/service'));
			}else{
				$this->session->set_flashdata('error', 'data gagal di input');
				redirect(site_url('dashboard/service'));
			}
		}
	}

	public function edit()
	{
		$this->form_validation->set_rules('categoryId', 'kategori', 'required');
		$this->form_validation->set_rules('service_name', 'service', 'required');
		$id = $this->uri->segment(4);
		if ($this->form_validation->run() == FALSE) {
			$this->db->join('categoryTable', 'categoryTable.id = serviceTable.categoryId', 'left');
			$service = $this->db->get('serviceTable')->result_array();
			$data = [
				'title' => 'Service List',
				'isi' => 'admin/master_service',
				'results' => $service,
				'data' => $this->db->get_where('serviceTable',['service_id' => $id])->row_array(),
				'category' => $this->db->get('categoryTable')->result_array()
			];

			$this->load->view('index',$data);
		} else {
			$data = [
				'categoryId' => $this->input->post('categoryId'),
				'service_name' => $this->input->post('service_name'),
			];

			if ($this->db->update('serviceTable',$data,['service_id' => $id])) {
				$this->session->set_flashdata('success', 'data berhasil di update');
				redirect(site_url('dashboard/service'));
			}else{
				$this->session->set_flashdata('error', 'data gagal di update');
				redirect(site_url('dashboard/service'));
			}
		}
	}

	public function delete()
	{
		$id = $this->uri->segment(4);
		if ($this->db->delete('serviceTable',['service_id' => $id])) {
			$this->session->set_flashdata('success', 'data berhasil di delete');
			redirect(site_url('dashboard/service'));
		}else{
			$this->session->set_flashdata('error', 'data gagal di delete');
			redirect(site_url('dashboard/service'));
		}
	}


}

/* End of file Service.php */
/* Location: ./application/controllers/admin/Service.php */