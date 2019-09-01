<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_news','news');
		date_default_timezone_set('Asia/Jakarta');
		if ($this->session->userdata('adminLogin') != TRUE) {
			redirect(site_url('dashboard/login'));
		} 
	}

	public function index()
	{
		$data = [
			'title' => 'How To Export',
			'isi'	=> 'admin/pages_export',
			'file' => $this->db->get_where('exportTable',['status' => 1],1)->row_array()
		];
		
		$this->load->view('index', $data);
	}
	public function export()
	{
		ini_set('post_max_size', '750M');
		ini_set('upload_max_filesize', '750M');
		ini_set('max_execution_time', 5000);
		ini_set('max_input_time', 5000);
		ini_set('memory_limit', '10000M');
		
		$config['upload_path']          = './upload/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';

        $this->load->library('upload', $config);
        $status = $this->input->post('status');
        $redirect = $this->input->post('redirect');
        if ( ! $this->upload->do_upload('file_export'))
        {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(site_url('dashboard/'.$redirect));
        }
        else
        {
            $file1 = $this->upload->data();

            $cek = $this->db->get_where('exportTable',['status' => $status],1);
        	$oldfile = $cek->row_array();
				if(file_exists('upload/'.$oldfile['file'])){
	            	unlink('upload/'.$oldfile['file']);
	            }
            $data['file'] = $file1['file_name'];
            $data['status'] = $status;
            if ($cek->num_rows() > 0) {
            	$this->db->update('exportTable',$data,['status' => $status]);
				$this->session->set_flashdata('success', 'data berhasil di update');
				redirect(site_url('dashboard/'.$redirect));
			}else{
				$this->db->insert('exportTable',$data);
				$this->session->set_flashdata('success', 'data berhasil di update');
				redirect(site_url('dashboard/'.$redirect));
			}
        }
	}

	public function market()
	{
		
		$data = [
			'title' => 'Market',
			'isi'	=> 'admin/pages_market',
			'file' => $this->db->get_where('exportTable',['status' => 2],1)->row_array()
		];

		$this->load->view('index', $data);
	}

	public function article($id=null)
	{
        $this->form_validation->set_rules('newsTitle', 'product title', 'required');
        $this->form_validation->set_rules('newsBody', 'product description', 'required');

        	if ($this->uri->segment(2) == 'product') {
        		$status = 2;
        		$redirect='product';
        	}else if ($this->uri->segment(2) == 'event') {
        		$status = 3;
        		$redirect='event';
        	}else if ($this->uri->segment(2) == 'story') {
        		$status = 4;
        		$redirect='story';
        	} else{
        		$status = 5;
        		$redirect='faq';
        	}
        	$cek = $this->db->get_where('newsTable',['status' => $status],1);
        	$data = $cek->row_array();
        if ($this->form_validation->run() == FALSE) {
            $data = [
				'title' => $this->uri->segment(2),
				'isi'	=> 'admin/pages_'.$this->uri->segment(2),
				'data' => $data
			];
			if ($id) {
				$data['data'] = $data; 
			}
			$this->load->view('index', $data);
        }else{
			if ($cek->num_rows() > 0) {
				$this->updateData($data['newsId'],$status);
			}else{
				$this->insertData($status);
			}
        }
	}


	function updateData($id,$status){
		$config['upload_path']          = './upload/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|svg';
        $uid = $this->session->userdata('uid');
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('newsBanner'))
        {
            $data['newsTitle']      = $this->input->post('newsTitle', TRUE);
            $data['newsBody']       = str_replace('<p data-f-id="pbf" xss="removed">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>','',$this->input->post('newsBody',TRUE));
            $data['postDate']       = date('Y-m-d');
            $data['userId']       = $uid;
            $data['status']       = $status;
            if ($this->news->updateRecord($id,$data)) {
				$this->session->set_flashdata('success', 'data berhasil di update');
				redirect(site_url('dashboard/'.$this->input->post('redirect')));
			}else{
				$this->session->set_flashdata('error', 'data gagal di update');
				redirect(site_url('dashboard/'.$this->input->post('redirect')));
			}
        }
        else
        {
            //hapus foto di folder
            $oldfoto = $this->news->getRecord($id);
            if(file_exists('upload/'.$oldfoto['newsBanner'])){
            	if ($oldfoto['newsBanner'] != 'default-thumbnail.jpg') {
                	unlink('upload/'.$oldfoto['newsBanner']);
            	}
            }
            $file = $this->upload->data();
            $data['newsTitle']      = $this->input->post('newsTitle', TRUE);
            $data['newsBody']       = str_replace('<p data-f-id="pbf" xss="removed">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>','',$this->input->post('newsBody',TRUE));
            $data['postDate']       = date('Y-m-d');
            $data['newsBanner'] = $file['file_name'];
            $data['userId']       = $uid;
            $data['status']       = $status;
            if ($this->news->updateRecord($id,$data)) {
				$this->session->set_flashdata('success', 'data berhasil di update');
				redirect(site_url('dashboard/'.$this->input->post('redirect')));
			}else{
				$this->session->set_flashdata('error', 'data gagal di update');
				redirect(site_url('dashboard/'.$this->input->post('redirect')));
			}
            
        }
	}

	function insertData($status){
		$config['upload_path']          = './upload/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|svg';
        $uid = $this->session->userdata('uid');
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('newsBanner'))
        {
            $data['newsTitle']      = $this->input->post('newsTitle', TRUE);
            $data['newsBody']       = str_replace('<p data-f-id="pbf" xss="removed">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>','',$this->input->post('newsBody',TRUE));
            $data['postDate']       = date('Y-m-d');
            $data['newsBanner'] = 'default-thumbnail.jpg';
            $data['userId']       = $uid;
            $data['status']       = $status;
            if ($this->news->insertRecord($data)) {
				$this->session->set_flashdata('success', 'data berhasil di insert');
				redirect(site_url('dashboard/'.$this->input->post('redirect')));
			}else{
				$this->session->set_flashdata('error', 'data gagal di insert');
				redirect(site_url('dashboard/'.$this->input->post('redirect')));
			}
        }
        else
        {
            $file = $this->upload->data();
            $data['newsTitle']      = $this->input->post('newsTitle', TRUE);
            $data['newsBody']       = str_replace('<p data-f-id="pbf" xss="removed">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>','',$this->input->post('newsBody',TRUE));
            $data['postDate']       = date('Y-m-d');
            $data['newsBanner'] = $file['file_name'];
            $data['userId']       = $uid;
            $data['status']       = $status;
            if ($this->news->insertRecord($data)) {
				$this->session->set_flashdata('success', 'data berhasil di simpan');
				redirect(site_url('dashboard/'.$this->input->post('redirect')));
			}else{
				$this->session->set_flashdata('error', 'data gagal di simpan');
				redirect(site_url('dashboard/'.$this->input->post('redirect')));
			}
            
        }
	}
}

/* End of file Information.php */
/* Location: ./application/controllers/admin/Information.php */