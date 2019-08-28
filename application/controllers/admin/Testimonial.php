<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('adminLogin') != TRUE) {
			redirect(site_url('dashboard/login'));
		} 
	}
	public function index()
	{
		$data = [
			'title' => 'Testimonial',
			'isi'	=> 'admin/message',
			'results' => $this->db->get_where('message',['type' => 2])->result_array()
		];

		$this->load->view('index', $data);
	}
	public function detail()
	{
		$id = $this->uri->segment(4);
		$this->db->update('message', ['status' => 1],['messageId' => $id,'type' => 2]);
		$data = [
			'title' => 'Testimonial detail',
			'isi'	=> 'admin/message_detail',
			'row' => $this->db->get_where('message',['messageId' => $id,'type' => 2])->row_array()
		];

		$this->load->view('index', $data);
	}

	public function testimonialDelete()
	{
		$id = $this->uri->segment(4);
		if ($this->db->delete('message',['messageId' => $this->uri->segment(4),'type' => 2])) {
			$this->session->set_flashdata('success', 'data berhasil di hapus');
			redirect(site_url('dashboard/testimonial'));
		}else{
			$this->session->set_flashdata('error', 'data gagal di hapus');
			redirect(site_url('dashboard/testimonial'));
		}
	}
	public function publish()
	{
		$id = $this->uri->segment(4);
		if ($this->db->update('message',['publish' => 1],['messageId' => $id,'type' => 2])) {
			$this->session->set_flashdata('success', 'testimonial berhasil di publish');
			redirect(site_url('dashboard/testimonial'));
		}else{
			$this->session->set_flashdata('error', 'testimonial gagal di publish');
			redirect(site_url('dashboard/testimonial'));
		}
	}
	public function unpublish()
	{
		$id = $this->uri->segment(4);
		if ($this->db->update('message',['publish' => 0],['messageId' => $id,'type' => 2])) {
			$this->session->set_flashdata('success', 'testimonial berhasil di unpublish');
			redirect(site_url('dashboard/testimonial'));
		}else{
			$this->session->set_flashdata('error', 'testimonial gagal di unpublish');
			redirect(site_url('dashboard/testimonial'));
		}
	}
}