<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_us extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}
	public function index()
	{
		$data = [
			'title' => 'Home',
			'isi'	=> 'client/about_us',
			'result' => $this->db->get('aboutUs',1)->row_array(),
			'partner' => $this->db->get('partnerTable')->result_array()
		];

		$this->load->view('client/home', $data);
	}

	public function partner()
	{
		$data = [
			'title' => 'Partner',
			'isi'	=> 'client/partner',
			'partner' => $this->db->get('partnerTable')->result_array()
		];

		$this->load->view('client/home', $data);
	}
	public function testimonial()
	{
		$data = [
			'title' => 'Testimonial',
			'isi'	=> 'client/testimonial',
			'results' => $this->db->get_where('message',['type' => 2])->result_array()
		];

		$this->load->view('client/home', $data);
	}
	public function contact()
	{
		$data = [
			'title' => 'Contact',
			'isi'	=> 'client/contact',
			'contact' => $this->db->get('contactTable',1)->row_array()
		];

		$this->load->view('client/home', $data);
	}

	public function sendContact()
	{
		$type = $this->input->post('type');
			$data = [
				'name' => $this->input->post('name'),
				'email' => strtolower($this->input->post('email')),
				'telepon' => $this->input->post('telepon'),
				'isi' => $this->input->post('isi'),
				'type' => $type, // 1 = message, 2 = testimonial
				'datePost' => date('Y-m-d H:i:s')
			];
			$redirect = ($type == 1) ? 'contact' : 'testimonial';
			if ($this->db->insert('message', $data)) {
				$this->session->set_flashdata('success', 'data berhasil di update');
				redirect(site_url('about-us/'.$redirect));
			}else{
				$this->session->set_flashdata('error', 'data gagal di input');
				redirect(site_url('about-us/'.$redirect));
			}
	}

}

/* End of file About_us.php */
/* Location: ./application/controllers/About_us.php */