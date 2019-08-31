<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// if ($this->session->userdata('login') != TRUE) {
		// 	$this->session->set_flashdata('message','anda harus login dulu');
		// 	redirect(site_url('login'),'refresh');
		// }
	}

	public function index()
	{
		$data = [
			'title' => 'Home',
			'isi'	=> 'client/how-to-export',
			'file' => $this->db->get_where('exportTable',['status' => 1],1)->row_array(),
		];

		$this->load->view('client/home', $data);
	}

	public function product()
	{
		$id = $this->uri->segment(4);
		$data = [
			'title' => 'Product Detail',
			'isi'	=> 'client/news_detail',
			'val' => $this->db->get_where('newsTable',['status' => 2],1)->row_array(),
			'recent' => $this->db->order_by('newsId','DESC')->get('newsTable',5)->result_array()
		];

		$this->load->view('client/home', $data);
	}

	public function market()
	{
		$data = [
			'title' => 'Market',
			'isi'	=> 'client/market',
			'file' => $this->db->get_where('exportTable',['status' => 2],1)->row_array(),
		];

		$this->load->view('client/home', $data);
	}

	public function event()
	{
		$id = $this->uri->segment(4);
		$data = [
			'title' => 'event Detail',
			'isi'	=> 'client/news_detail',
			'val' => $this->db->get_where('newsTable',['status' => 3],1)->row_array(),
			'recent' => $this->db->order_by('newsId','DESC')->get('newsTable',5)->result_array()
		];

		$this->load->view('client/home', $data);
	}

	public function our_story()
	{
		$id = $this->uri->segment(4);
		$data = [
			'title' => 'our story',
			'isi'	=> 'client/news_detail',
			'val' => $this->db->get_where('newsTable',['status' => 4],1)->row_array(),
			'recent' => $this->db->order_by('newsId','DESC')->get('newsTable',5)->result_array()
		];

		$this->load->view('client/home', $data);
	}

	public function faq()
	{
		$id = $this->uri->segment(4);
		$data = [
			'title' => 'faq',
			'isi'	=> 'client/news_detail',
			'val' => $this->db->get_where('newsTable',['status' => 5],1)->row_array(),
			'recent' => $this->db->order_by('newsId','DESC')->get('newsTable',5)->result_array()
		];

		$this->load->view('client/home', $data);
	}
	

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */