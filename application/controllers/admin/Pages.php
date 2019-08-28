<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta');
		if ($this->session->userdata('adminLogin') != TRUE) {
			redirect(site_url('dashboard/login'));
		} 
	}
	public function index()
	{
		$data = [
			'title' => 'About Us',
			'isi'	=> 'admin/pages_about',
			'about' => $this->db->get('aboutUs')->result_array()
		];

		$this->load->view('index', $data);
	}
	public function update()
	{
		

		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('bookingBody', 'text booking', 'required');
		$this->form_validation->set_rules('aboutBody', 'text about', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'About Us update',
				'isi'	=> 'admin/pages_about',
				'data' => $this->db->get_where('aboutUs',['aboutid' => $this->uri->segment(4)])->row_array()
			];
			$this->load->view('index', $data);
		} else {
			$data = [
				'title' => $this->input->post('title'),
				'bookingBody' => $this->input->post('bookingBody'),
				'aboutBody' => $this->input->post('aboutBody'),
			];

			if ($this->db->update('aboutUs', $data,['aboutid' => $this->uri->segment(4)])) {
				$this->session->set_flashdata('success', 'data berhasil di update');
				redirect(site_url('dashboard/about-us'));
			}else{
				$this->session->set_flashdata('error', 'data gagal di input');
				redirect(site_url('dashboard/about-us'));
			}
		}

	}
	public function update_contact()
	{
		

		$this->form_validation->set_rules('contactPhone', 'Telephone', 'required');
		$this->form_validation->set_rules('contactEmail', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('contactOffice', 'Office', 'required');
		$this->form_validation->set_rules('contactAdress', 'Alamat Kantor', 'required');
		$this->form_validation->set_rules('jadwal', 'Hari Kerja', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Contact update',
				'isi'	=> 'admin/pages_kontak',
				'data' => $this->db->get('contactTable',1)->row_array()
			];
			$this->load->view('index', $data);
		} else {
			$cek = $this->db->get('contactTable');

			$data = [
				'contactPhone' => $this->input->post('contactPhone'),
				'contactEmail' => strtolower($this->input->post('contactEmail')),
				'contactOffice' => $this->input->post('contactOffice'),
				'contactAdress' => $this->input->post('contactAdress'),
				'jadwal' => $this->input->post('jadwal'),
			];
			if ($cek->num_rows() > 0) {
				$store = $this->db->update('contactTable', $data); 
			}else{
				$store = $this->db->insert('contactTable', $data); 
			}
			if ($store) {
				$this->session->set_flashdata('success', 'data berhasil di update');
				redirect(site_url('dashboard/contact'));
			}else{
				$this->session->set_flashdata('error', 'data gagal di input');
				redirect(site_url('dashboard/contact'));
			}
		}

	}

	public function information()
	{
		

		$this->form_validation->set_rules('informationBody', 'information', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Information Setting',
				'isi'	=> 'admin/information',
				'data' => $this->db->get('aboutUs',1)->row_array()
			];
			$this->load->view('index', $data);
		} else {
			$data = [
				'informationBody' => str_replace('<p data-f-id="pbf" xss="removed">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>','',$this->input->post('informationBody',TRUE)),
			];

			if ($this->db->update('aboutUs', $data)) {
				$this->session->set_flashdata('success', 'data berhasil di update');
				redirect(site_url('dashboard/information'));
			}else{
				$this->session->set_flashdata('error', 'data gagal di input');
				redirect(site_url('dashboard/information'));
			}
		}

	}

}

/* End of file Pages.php */
/* Location: ./application/controllers/admin/Pages.php */