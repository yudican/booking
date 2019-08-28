<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_banner','banner');
		date_default_timezone_set('Asia/Jakarta');
		if ($this->session->userdata('adminLogin') != TRUE) {
			redirect(site_url('dashboard/login'));
		} 
	}

	public function index()
	{
		$data = [
			'title' => 'Banner setting',
			'isi'	=> 'admin/banner',
			'banner' => $this->banner->getRecord()
		];
		$this->load->view('index', $data);
	}
	public function createOrUpdate($id=null)
	{

       	if ($this->input->post('submit')) {
       		if ($id) {
				$this->updateData($id);
			}else{
				$this->insertData();
			}
        }else{
            $data = [
				'title' => 'Banner Setting',
				'isi'	=> 'admin/banner',
				'action' => $this->uri->segment(3)
			];
			if ($id) {
				$data['data'] = $this->banner->getRecord($id); 
			}
			$this->load->view('index', $data);
			
        }
	}

	public function delete($id)
	{
		$oldfoto = $this->banner->getRecord($id);
        if(file_exists('upload/'.$oldfoto['bannerImage'])){
        	if ($oldfoto['bannerImage'] != 'default-thumbnail.jpg') {
            	unlink('upload/'.$oldfoto['bannerImage']);
        	}
        }
		if ($this->banner->deleteRecord($id)) {
			$this->session->set_flashdata('success', 'data berhasil di hapus');
			redirect(site_url('dashboard/banner-setting'));
		}else{
			$this->session->set_flashdata('error', 'data gagal di hapus');
			redirect(site_url('dashboard/banner-setting'));
		}
	}

	function updateData($id){
		$config['upload_path']          = './upload/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|svg';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('bannerImage'))
        {
            $data['bannerTitle']      = $this->input->post('bannerTitle', TRUE);
            $data['bannerText']      = $this->input->post('bannerText', TRUE);
            if ($this->banner->updateRecord($id,$data)) {
				$this->session->set_flashdata('success', 'data berhasil di update');
				redirect(site_url('dashboard/banner-setting'));
			}else{
				$this->session->set_flashdata('error', 'data gagal di update');
				redirect(site_url('dashboard/banner-setting'));
			}
        }
        else
        {
            //hapus foto di folder
            $oldfoto = $this->banner->getRecord($id);
            if(file_exists('upload/'.$oldfoto['bannerImage'])){
            	if ($oldfoto['bannerImage'] != 'default-thumbnail.jpg') {
                	unlink('upload/'.$oldfoto['bannerImage']);
            	}
            }
            $file = $this->upload->data();
            $data['bannerTitle']      = $this->input->post('bannerTitle', TRUE);
            $data['bannerText']      = $this->input->post('bannerText', TRUE);
            $data['bannerImage'] = $file['file_name'];
            if ($this->banner->updateRecord($id,$data)) {
				$this->session->set_flashdata('success', 'data berhasil di update');
				redirect(site_url('dashboard/banner-setting'));
			}else{
				$this->session->set_flashdata('error', 'data gagal di update');
				redirect(site_url('dashboard/banner-setting'));
			}
            
        }
	}

	function insertData(){
		$config['upload_path']          = './upload/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|svg';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('bannerImage'))
        {
            $data['bannerTitle']      = $this->input->post('bannerTitle', TRUE);
            $data['bannerText']      = $this->input->post('bannerText', TRUE);
            $data['bannerImage'] = 'default-thumbnail.jpg';
            if ($this->banner->insertRecord($data)) {
				$this->session->set_flashdata('success', 'data berhasil di insert');
				redirect(site_url('dashboard/banner-setting'));
			}else{
				$this->session->set_flashdata('error', 'data gagal di insert');
				redirect(site_url('dashboard/banner-setting'));
			}
        }
        else
        {
            $file = $this->upload->data();
            $data['bannerTitle']      = $this->input->post('bannerTitle', TRUE);
            $data['bannerText']      = $this->input->post('bannerText', TRUE);
            $data['bannerImage'] = $file['file_name'];
            if ($this->banner->insertRecord($data)) {
				$this->session->set_flashdata('success', 'data berhasil di simpan');
				redirect(site_url('dashboard/banner-setting'));
			}else{
				$this->session->set_flashdata('error', 'data gagal di simpan');
				redirect(site_url('dashboard/banner-setting'));
			}
            
        }
	}

}

/* End of file Banner.php */
/* Location: ./application/controllers/admin/Banner.php */