<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {

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
		$data = [
			'title' => 'Messages',
			'isi'	=> 'admin/message',
			'results' => $this->db->get_where('message',['type' => 1])->result_array()
		];

		$this->load->view('index', $data);
	}
	public function detail()
	{
		$id = $this->uri->segment(4);
		$this->db->update('message', ['status' => 1],['messageId' => $id,'type' => 1]);
		$data = [
			'title' => 'Messages detail',
			'isi'	=> 'admin/message_detail',
			'row' => $this->db->get_where('message',['messageId' => $id,'type' => 1])->row_array()
		];

		$this->load->view('index', $data);
	}

	public function msgDelete()
	{
		$id = $this->uri->segment(4);
		if ($this->db->delete('message',['messageId' => $this->uri->segment(4),'type' => 1])) {
			$this->session->set_flashdata('success', 'data berhasil di hapus');
			redirect(site_url('dashboard/messages'));
		}else{
			$this->session->set_flashdata('error', 'data gagal di hapus');
			redirect(site_url('dashboard/messages'));
		}
	}
}