<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('M_banner' => 'banner','M_news' => 'news'));
		$this->load->library('pagination');
		// if ($this->session->userdata('login') != TRUE) {
		// 	$this->session->set_flashdata('message','anda harus login dulu');
		// 	redirect(site_url('login'),'refresh');
		// }
	}

	public function index()
	{
		$data = [
			'title' => 'Home',
			'isi'	=> 'client/home_v',
			'category' => $this->db->get('categoryTable')->result_array(),
			'result' => $this->db->get('aboutUs',1)->row_array(),
			'news' => $this->db->get('newsTable',3)->result_array(),
			'banner' => $this->banner->getRecord(),
			'results' => $this->db->get_where('message',['type' => 2])->result_array()
		];

		$this->load->view('client/home', $data);
	}
	
	public function information()
	{
		$data = [
			'title' => 'Home',
			'isi'	=> 'client/information',
			'result' => $this->db->get('aboutUs',1)->row_array(),
			'recent' => $this->db->order_by('newsId','DESC')->get('newsTable',5)->result_array()
		];

		$this->load->view('client/home', $data);
	}
	public function news()
	{
		$config['base_url'] = base_url().'news/';
		$offset = 5;
		$config['per_page'] = $offset;
		$config['total_rows'] = $this->db->get('newsTable')->num_rows(); //total row
        $config['next_link']        = '<i class="icon-keyboard_arrow_right"></i>';
        $config['prev_link']        = '<i class="icon-keyboard_arrow_left"></i>';
        $config['full_tag_open']    = '<ul class="pagination custom-pagination">';
        $config['full_tag_close']   = '</ul>';
        $config['num_tag_open']     = ' <li class="page-item">';
        $config['num_tag_close']    = '</li>';
        $config['cur_tag_open']     = ' <li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close']    = '</a></li>';
        $config['next_tag_open']    = '<li class="page-item next">';
        $config['next_tagl_close']  = '</li>';
        $config['prev_tag_open']    = '<li class="page-item prev">';
        $config['prev_tagl_close']  = '</li>';
		$from = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$this->pagination->initialize($config);
		$data = [
			'title' => 'News',
			'isi'	=> 'client/news',
			'news' => $this->news->getListNews($offset,$from),
			'recent' => $this->db->order_by('newsId','DESC')->get('newsTable',5)->result_array(),
			'pagination' => $this->pagination->create_links()
		];

		$this->load->view('client/home', $data);
	}

	public function news_detail()
	{
		$id = $this->uri->segment(4);
		$data = [
			'title' => 'News Detail',
			'isi'	=> 'client/news_detail',
			'val' => $this->db->get_where('newsTable',['newsId' => $id])->row_array(),
			'recent' => $this->db->order_by('newsId','DESC')->get('newsTable',5)->result_array()
		];

		$this->load->view('client/home', $data);
	}

	function ceKTime($id=null)
	{
        $duration="30";
		$start="08:00AM";
		$end="05:00PM";

		$start = new DateTime($start);
	    $end = new DateTime($end);
	    $start_time = $start->format('H:i');
	    $end_time = $end->format('H:i');
	    $i=0;
	    $finalTime='';
	    while(strtotime($start_time) <= strtotime($end_time)){
		    $start = $start_time;
		    $end = date('H:i',strtotime('+'.$duration.' minutes',strtotime($start_time)));
		    $start_time = date('H:i',strtotime('+'.$duration.' minutes',strtotime($start_time)));
		    $i++;
		    if(strtotime($start_time) <= strtotime($end_time)){
		        $time[$i]['start'] = $start;
		        $time[$i]['end'] = $end;
		    }
		    //Here you need to write query and fetch data.
		    $todayDate = date('Y-m-d'); //Please check date format. It should be similar as your database date field format.
		    //please use data binding instead of contacting variable.

		    $this->db->where('bookDate', $todayDate);
		    $this->db->where('bookTime >= ', $start);
		    $this->db->or_where('bookTime <=', $start);
		    $this->db->where('bookTimeEnd >= ', $end);
		    $this->db->where('bookTimeEnd >= ', $end);
		    $selectQuery = $this->db->get('bookingTable');
		    // After, you need to exeucte this query and need to check query output. if it has records, then you need to show booked else available. as below
		    $data = $selectQuery->row_array();
		    if ($selectQuery->num_rows()) {
		        $time[$i]['status'] = 'booked';
		    } else {
		        $time[$i]['status'] = 'availiable';
		    }
		    if ($start <= $data['bookTimeEnd']) {
		        $range=range(strtotime($data['bookTime']),strtotime($data['bookTimeEnd']),30*60);
		        array_pop($range);
		        foreach($range as $times){
		            $finalTime .= date("H:i",$times).',';
		        }
		        
		    }

		    $string = implode(' ', array_unique(explode(',', $finalTime)));
		    $pecah = explode(' ', $string);
		    $data = json_encode($pecah, JSON_FORCE_OBJECT);
		    $arr = json_decode($data, true);

		    for($b=0;$b<count($pecah);$b++){
		    	// $akhir = date('H:i',strtotime('-'.$duration.' minutes',strtotime($start_time)));
		        if ($arr[$b] == $start || $arr[$b] == $end) {
		            $time[$i]['status'] = 'bookeds';
		        }
		    }
		}

		array_pop($time); //hapus element terkahir dari array
		return $time;
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */