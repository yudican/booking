<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partner extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_partner','partner');
		if ($this->session->userdata('adminLogin') != TRUE) {
			redirect(site_url('dashboard/login'));
		} 
	}

	public function index()
	{
		$data = [
			'title' => 'Partner Page',
			'isi'	=> 'admin/pages_partner',
			'partner' => $this->partner->getRecord()
		];
		$this->load->view('index', $data);
	}
	public function createOrUpdate($id=null)
	{
        $this->form_validation->set_rules('partnerName', 'Partner Name', 'required');
        $this->form_validation->set_rules('partnerTitle', 'Partner Title', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = [
				'title' => 'Partner Form',
				'isi'	=> 'admin/pages_partner',
				'action' => $this->uri->segment(3),
			];
			if ($id) {
				$data['data'] = $this->partner->getRecord($id); 
			}
			$this->load->view('index', $data);
        }else{
			if ($id) {
				$this->updateData($id);
			}else{
				$this->insertData();
			}
        }
	}

	public function delete($id)
	{
		if ($this->partner->deleteRecord($id)) {
			$this->session->set_flashdata('success', 'data berhasil di hapus');
			redirect(site_url('dashboard/partner'));
		}else{
			$this->session->set_flashdata('error', 'data gagal di hapus');
			redirect(site_url('dashboard/partner'));
		}
	}

	function updateData($id){
		$oldfoto = $this->partner->getRecord($id);
            
		$config['upload_path']          = './upload/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|svg';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('partnerImage'))
        {
            $data['partnerTitle']      = $this->input->post('partnerTitle', TRUE);
            $data['partnerName']       = $this->input->post('partnerName',TRUE);
            $data['partnerBody']       = $this->input->post('partnerBody',TRUE);
            if ($this->partner->updateRecord($id,$data)) {
				$this->session->set_flashdata('success', 'data berhasil di update');
				redirect(site_url('dashboard/partner'));
			}else{
				$this->session->set_flashdata('error', 'data gagal di update');
				redirect(site_url('dashboard/partner'));
			}
        }
        else
        {
            //hapus foto di folder
            $oldfoto = $this->partner->getRecord($id);
            if(file_exists('./upload/'.$oldfoto['partnerImage'])){
            	if ($oldfoto['partnerImage'] != 'default-thumbnail.jpg') {
                	unlink('./upload/'.$oldfoto['partnerImage']);
            	}
            }
            $file = $this->upload->data();
            $data['partnerTitle']      = $this->input->post('partnerTitle', TRUE);
            $data['partnerName']       = $this->input->post('partnerName',TRUE);
            $data['partnerBody']       = $this->input->post('partnerBody',TRUE);
            $data['partnerImage'] = $file['file_name'];
            if ($this->partner->updateRecord($id,$data)) {
				$this->session->set_flashdata('success', 'data berhasil di update');
				redirect(site_url('dashboard/partner'));
			}else{
				$this->session->set_flashdata('error', 'data gagal di update');
				redirect(site_url('dashboard/partner'));
			}
            
        }
	}

	function insertData(){
		$config['upload_path']          = './upload/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|svg';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('partnerImage'))
        {
            $data['partnerTitle']      = $this->input->post('partnerTitle', TRUE);
            $data['partnerName']       = $this->input->post('partnerName',TRUE);
            $data['partnerBody']       = $this->input->post('partnerBody',TRUE);
            $data['partnerImage'] = 'default-thumbnail.jpg';
            if ($this->partner->insertRecord($data)) {
				$this->session->set_flashdata('success', 'data berhasil di insert');
				redirect(site_url('dashboard/partner'));
			}else{
				$this->session->set_flashdata('error', 'data gagal di insert');
				redirect(site_url('dashboard/partner'));
			}
        }
        else
        {
            $file = $this->upload->data();
            $data['partnerTitle']      = $this->input->post('partnerTitle', TRUE);
            $data['partnerName']       = $this->input->post('partnerName',TRUE);
            $data['partnerBody']       = $this->input->post('partnerBody',TRUE);
            $data['partnerImage'] = $file['file_name'];
            if ($this->partner->insertRecord($data)) {
				$this->session->set_flashdata('success', 'data berhasil di simpan');
				redirect(site_url('dashboard/partner'));
			}else{
				$this->session->set_flashdata('error', 'data gagal di simpan');
				redirect(site_url('dashboard/partner'));
			}
            
        }
	}

}

/* End of file Partner.php */
/* Location: ./application/controllers/admin/Partner.php */