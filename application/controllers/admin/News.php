<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

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
			'title' => 'NEWS LIST',
			'isi'	=> 'admin/pages_news',
			'news' => $this->news->getRecord()
		];
		$this->load->view('index', $data);
	}
	public function createOrUpdate($id=null)
	{
        $this->form_validation->set_rules('newsTitle', 'title', 'required');
        $this->form_validation->set_rules('newsBody', 'isi berita', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = [
				'title' => 'news form',
				'isi'	=> 'admin/pages_news',
				'action' => $this->uri->segment(3)
			];
			if ($id) {
				$data['data'] = $this->news->getRecord($id); 
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
		$oldfoto = $this->news->getRecord($id);
		if(file_exists('upload/'.$oldfoto['newsBanner'])){
        	if ($oldfoto['newsBanner'] != 'default-thumbnail.jpg') {
            	unlink('upload/'.$oldfoto['newsBanner']);
        	}
        }
		if ($this->news->deleteRecord($id)) {
			$this->session->set_flashdata('success', 'data berhasil di hapus');
			redirect(site_url('dashboard/news-list'));
		}else{
			$this->session->set_flashdata('error', 'data gagal di hapus');
			redirect(site_url('dashboard/news-list'));
		}
	}

	function updateData($id){
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
            if ($this->news->updateRecord($id,$data)) {
				$this->session->set_flashdata('success', 'data berhasil di update');
				redirect(site_url('dashboard/news-list'));
			}else{
				$this->session->set_flashdata('error', 'data gagal di update');
				redirect(site_url('dashboard/news-list'));
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
            if ($this->news->updateRecord($id,$data)) {
				$this->session->set_flashdata('success', 'data berhasil di update');
				redirect(site_url('dashboard/news-list'));
			}else{
				$this->session->set_flashdata('error', 'data gagal di update');
				redirect(site_url('dashboard/news-list'));
			}
            
        }
	}

	function insertData(){
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
            if ($this->news->insertRecord($data)) {
				$this->session->set_flashdata('success', 'data berhasil di insert');
				redirect(site_url('dashboard/news-list'));
			}else{
				$this->session->set_flashdata('error', 'data gagal di insert');
				redirect(site_url('dashboard/news-list'));
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
            if ($this->news->insertRecord($data)) {
				$this->session->set_flashdata('success', 'data berhasil di simpan');
				redirect(site_url('dashboard/news-list'));
			}else{
				$this->session->set_flashdata('error', 'data gagal di simpan');
				redirect(site_url('dashboard/news-list'));
			}
            
        }
	}

}

/* End of file News.php */
/* Location: ./application/controllers/admin/News.php */