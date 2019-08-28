<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

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
		$this->form_validation->set_rules('categoryName', 'nama kategori', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Kategori List',
				'isi' => 'admin/master_kategori',
				'results' => $this->db->get('categoryTable')->result_array()
			];

			$this->load->view('index',$data);
		} else {
			$data = ['categoryName' => $this->input->post('categoryName')];

			if ($this->db->insert('categoryTable',$data)) {
				$this->session->set_flashdata('success', 'data berhasil di input');
				redirect(site_url('dashboard/category'));
			}else{
				$this->session->set_flashdata('error', 'data gagal di input');
				redirect(site_url('dashboard/category'));
			}
		}
	}

	public function edit()
	{
		$this->form_validation->set_rules('categoryName', 'nama kategori', 'required');
		$id = $this->uri->segment(4);
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Kategori List',
				'isi' => 'admin/master_kategori',
				'results' => $this->db->get('categoryTable')->result_array(),
				'data' => $this->db->get_where('categoryTable',['id' => $id])->row_array()
			];

			$this->load->view('index',$data);
		} else {
			$data = ['categoryName' => $this->input->post('categoryName')];

			if ($this->db->update('categoryTable',$data,['id' => $id])) {
				$this->session->set_flashdata('success', 'data berhasil di update');
				redirect(site_url('dashboard/category'));
			}else{
				$this->session->set_flashdata('error', 'data gagal di update');
				redirect(site_url('dashboard/category'));
			}
		}
	}

	public function delete()
	{
		$id = $this->uri->segment(4);
		if ($this->db->delete('categoryTable',['id' => $id])) {
			$this->session->set_flashdata('success', 'data berhasil di delete');
			redirect(site_url('dashboard/category'));
		}else{
			$this->session->set_flashdata('error', 'data gagal di delete');
			redirect(site_url('dashboard/category'));
		}
	}


}

/* End of file Booking.php */
/* Location: ./application/controllers/admin/Booking.php */