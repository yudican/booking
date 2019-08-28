<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_booking','booking');
		$this->load->library('pagination');
		date_default_timezone_set('Asia/Jakarta');
		if ($this->session->userdata('adminLogin') != TRUE) {
			redirect(site_url('dashboard/login'));
		}
	}
	public function index()
	{
		$from = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$offset = 10;
		$config['base_url'] = base_url().'dashboard/booking-list/';
		$config['per_page'] = $offset;
		$config['total_rows'] = $this->booking->getRowBooking()->num_rows(); //total row
        $config['next_link']        = '<i class="fas fa-chevron-right"></i>';
        $config['prev_link']        = '<i class="fas fa-chevron-left"></i>';
        $config['full_tag_open']    = '<nav class="d-inline-block"><ul class="pagination mb-0">';
        $config['full_tag_close']   = '</ul></nav>';
        $config['num_tag_open']     = ' <li class="page-item">';
        $config['num_tag_close']    = '</li>';
        $config['cur_tag_open']     = ' <li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></a></li>';
        $config['next_tag_open']    = '<li class="page-item ">';
        $config['next_tagl_close']  = '</li>';
        $config['prev_tag_open']    = '<li class="page-item">';
        $config['prev_tagl_close']  = '</li>';
		$this->pagination->initialize($config);		
		$data = [
			'title' => 'booking list',
			'isi' => 'admin/booking',
			'results' => $this->booking->getListBooking($offset,$from)->result_array(),
			'pagination' => $this->pagination->create_links()
		];
		$this->load->view('index', $data);
	}

	public function delete()
	{
		$id = $this->uri->segment(4);
		if ($this->db->delete('bookingTable',['bookingId' => $this->uri->segment(4)])) {
			$this->session->set_flashdata('success', 'data berhasil di hapus');
			redirect(site_url('dashboard/booking-list'));
		}else{
			$this->session->set_flashdata('error', 'data gagal di hapus');
			redirect(site_url('dashboard/booking-list'));
		}
	}

	public function detail()
	{
		
		$id = $this->uri->segment(4);
		$data = [
				'title' => 'Booking Detail ',
				'isi'	=> 'admin/booking_detail'
			];
		$data['data'] = $this->booking->getData($id);
		$this->load->view('index', $data);
	}


}

/* End of file Booking.php */
/* Location: ./application/controllers/admin/Booking.php */