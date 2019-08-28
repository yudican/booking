<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');
		$this->load->model('M_booking','booking');
		date_default_timezone_set('Asia/Jakarta');
		// if ($this->session->userdata('login') != TRUE) {
		// 	$this->session->set_flashdata('message','anda harus login dulu');
		// 	redirect(site_url('member/login'),'refresh');
		// }
	}

	public function index()
	{
		$data = [
			'title' => 'Booking',
			'isi'	=> 'client/booking_time',
			'category' => $this->db->get('categoryTable')->result_array(),
		];
		$this->load->view('client/home', $data);
	}



	public function getTime()
	{
		$tgl = $this->input->post('tanggal',true);
		$now = date('Y-m-d');
		$selectQuery = $this->db->get_where('bookingTable',['bookDate' => $tgl]);

	    $data = $selectQuery->row_array();
	    if ($selectQuery->num_rows() > 0) {
	    	$ex = explode('-', $data['bookTime']);
	    }else{
	    	$ex = explode('-', '00:00-00:00');
	    }
		$ex2 = json_encode($ex, JSON_FORCE_OBJECT);
		$hasil = json_decode($ex2, true);
	    $booked = array();

	    $booked[] = $hasil[0].'-'.$hasil[1];
        $start_time = date('Y-m-d').'08:00:00';  //start time as string
		$end_time = date('Y-m-d').'18:00:00';  //end time as string
		$start = DateTime::createFromFormat('Y-m-d H:i:s',$start_time);  //create date time objects
		$end = DateTime::createFromFormat('Y-m-d H:i:s',$end_time);  //create date time objects
		$count = 0;  //number of slots
		$out = array();   //array of slots 
		for($i = $start; $i<$end;)  //for loop 
		{
			$avoid = false;   //booked slot?
			$time1 = $i->format('H:i');   //take hour and minute
			$i->modify("+60 minutes");      //add 20 minutes
			$time2 = $i->format('H:i');     //take hour and minute
			$slot = $time1."-".$time2;      //create a format 12:40-13:00 etc
			    for($k=0;$k<sizeof($booked);$k++)  //if booked hour
			    {
			    if($booked[$k] == $slot)  //check
			    $avoid = true;   //yes. booked
			    }
			if(!$avoid && $i<$end)  //if not booked and less than end time
			{
				$count++;           //add count
				$slots = ['start'=>$time1, 'end'=>$time2];         //add count
				array_push($out,$slots); //add slot to array
			}
		}

		$availiable = json_decode(json_encode($out), true);
		$html = '';
		if ($tgl < $now) {
			$results['status'] = false;
			foreach ($availiable as $val) {
				$html .= '<option value="" disabled>'.$val['start'].'-'.$val['end'].' - Not Available</option>';
			}
		}else{
			$results['status'] = true;
			foreach ($availiable as $val) {
				$html .= '<option value="'.$val['start'].'-'.$val['end'].'">'.$val['start'].'-'.$val['end'].' - Available</option>';
			}
		}
		
		$results['token'] = $this->security->get_csrf_hash();
		$results['time'] = $html;
		echo json_encode($results);
	}


	public function getService()
	{
		$categoryId = $this->input->post('category');
		$service = $this->db->get_where('serviceTable',['categoryId' => $categoryId])->result_array();
		$html = '';
		foreach ($service as $row) {
			$html .= '<option value="'.$row['service_id'].'">'.$row['service_name'].'</option>';
		}
		$results['token'] = $this->security->get_csrf_hash();
		$results['data'] = $html;
		echo json_encode($results);
	}

	public function getEmployee()
	{
		$serviceId = $this->input->post('service');
		$employee = $this->db->get_where('employeeTable',['serviceId' => $serviceId])->result_array();
		$html = '';
		foreach ($employee as $row) {
			$html .= '<option value="'.$row['id'].'">'.$row['employeeName'].'</option>';
		}
		$results['token'] = $this->security->get_csrf_hash();
		$results['data'] = $html;
		echo json_encode($results);
	}
	

	public function detail($id=null)
	{
		if ($this->session->userdata('login') != TRUE) {
			$this->session->set_flashdata('error','anda harus login dulu');
			redirect(site_url('member/login'));
		} 
		$category = $this->input->post('category',true);
		$service = $this->input->post('service',true);
		$employee = $this->input->post('employee',true);
		$bookDate = $this->input->post('tanggal',true);
		$bookTime = $this->input->post('time',true);

		$this->form_validation->set_rules('tanggal', 'Booking Date', 'trim|required');
		$this->form_validation->set_rules('time', 'Time', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Booking Detail ',
				'isi'	=> 'client/booking_detail',
				'category' => $category,
				'service' => $service,
				'employee' => $employee,
				'list_category' => $this->db->get('categoryTable')->result_array(),
				'list_service' => $this->db->get('serviceTable')->result_array(),
				'list_employee' => $this->db->get('employeeTable')->result_array()
			];
			
			$this->load->view('client/home', $data);
		} else {
			$send = [
				'category_id' => $category,
				'service_id' => $service,
				'employee_id' => $employee,
				'userId' => $this->session->userdata('id'),
				'bookDate' => $bookDate,
				'bookTime' => $bookTime,
				'status' => 'active'
			];
			if ($this->db->insert('bookingTable', $send)) {
				$id = $this->db->insert_id();
				redirect('member/booking/detail/'.$id);
				$this->load->view('client/home', $data);
			}
		}
	}

	public function BookingListProfile()
	{
		if ($this->session->userdata('login') != TRUE) {
			$this->session->set_flashdata('error','anda harus login dulu');
			redirect(site_url('member/login'));
		}
		$id = $this->session->userdata('id');
		 $row = $this->booking->getData($id);
		 $now = date('Y-m-d');
		if ($now > $row['bookDate']) {
			$this->db->where('bookDate <', $now);
			$this->db->update('bookingTable',['status' => 'nonactive']);
		}
		$data = [
			'title' => 'Profile',
			'isi'	=> 'client/profile',
			'results' => $this->booking->getList($id),
			'profile' => $this->db->get_where('member',['id' => $id])->row_array()
		];
		$this->load->view('client/home', $data);
	}

	public function bookingDetail()
	{
		if ($this->session->userdata('login') != TRUE) {
			$this->session->set_flashdata('error','anda harus login dulu');
			redirect(site_url('member/login'));
		}
		$id = $this->uri->segment(4);
		$data = [
				'title' => 'Booking Detail ',
				'isi'	=> 'client/booking'
			];
		$data['data'] = $this->booking->getData($id);
		$this->load->view('client/home', $data);
	}

}

/* End of file Booking.php */
/* Location: ./application/controllers/Booking.php */