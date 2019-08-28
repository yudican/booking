<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

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
			'title' => 'site setting',
			'isi'	=> 'admin/setting_web',
			'about' => $this->db->get('aboutUs')->result_array()
		];

		$this->load->view('index', $data);
	}
	public function site()
	{
		$config['upload_path']          = './upload/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|svg|ico';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('logo'))
        {
        	$cek = $this->db->get('webTable');
			$oldfoto = $cek->row_array();
			if(file_exists('upload/'.$oldfoto['logo'])){
            	if ($oldfoto['favicon'] != 'default-thumbnail.jpg') {
                	unlink('upload/'.$oldfoto['logo']);
            	}
            }
        	$file = $this->upload->data();
            $data['logo'] = $file['file_name'];
			if ($cek->num_rows() > 0) {
				$store = $this->db->update('webTable', $data); 
			}else{
				$store = $this->db->insert('webTable', $data); 
			}
        }

       
        if ($this->upload->do_upload('favicon'))
        {
        	$cek = $this->db->get('webTable');
        	$oldfoto = $cek->row_array();
				if(file_exists('upload/'.$oldfoto['favicon'])){
	            	if ($oldfoto['favicon'] != 'default-thumbnail.jpg') {
	                	unlink('upload/'.$oldfoto['favicon']);
	            	}
	            }
        	$file1 = $this->upload->data();
            $data['favicon'] = $file1['file_name'];
            if ($cek->num_rows() > 0) {
				$store = $this->db->update('webTable', $data); 
			}else{
				$store = $this->db->insert('webTable', $data); 
			}
        }
		

		
		if ($store) {
			$this->session->set_flashdata('success', 'data berhasil di update');
			redirect(site_url('dashboard/site-setting'));
		}else{
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(site_url('dashboard/site-setting'));
		}
	}



}

/* End of file Setting.php */
/* Location: ./application/controllers/admin/Setting.php */