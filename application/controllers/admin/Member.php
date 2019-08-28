<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_member','member');
		$this->load->library('pagination');
		date_default_timezone_set('Asia/Jakarta');
		if ($this->session->userdata('adminLogin') != TRUE) {
			redirect(site_url('dashboard/login'));
		}
	}
	public function index()
	{
		$config['base_url'] = base_url().'dashboard/member-list/';
		$offset = 10;
		$config['per_page'] = $offset;
		$config['total_rows'] = $this->db->get_where('member',['level' => 0])->num_rows(); //total row
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
		$from = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->pagination->initialize($config);		
		$data = [
			'title' => 'member list',
			'isi' => 'admin/member',
			'results' => $this->member->getListMember($offset,$from),
			'pagination' => $this->pagination->create_links()
		];
		$this->load->view('index', $data);
	}

	public function delete()
	{
		$id = $this->uri->segment(4);
		if ($this->db->delete('member',['id' => $this->uri->segment(4)])) {
			$this->session->set_flashdata('success', 'data berhasil di hapus');
			redirect(site_url('dashboard/member-list'));
		}else{
			$this->session->set_flashdata('error', 'data gagal di hapus');
			redirect(site_url('dashboard/member-list'));
		}
	}

	public function changeProfile()
	{
		if ($this->session->userdata('adminLogin') != TRUE) {
			$this->session->set_flashdata('error','anda harus login dulu');
			redirect(site_url('dashboard/login'));
		}
		$this->form_validation->set_rules('fullName', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[member.email]');
		$this->form_validation->set_rules('telepon', 'telepon', 'trim|required');
		$id = $this->session->userdata('uid');
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'change Profile',
				'isi' => 'admin/profile_edit',
				'data' => $this->member->getRecord($id)
			];
			$this->load->view('index', $data);
		} else {
			$data = [
				'fullName' => $this->input->post('fullName'),
				'username' => strtolower($this->input->post('username')),
				'email' => strtolower($this->input->post('email')),
				'telepon' => $this->input->post('telepon'),
			];
			if ($this->member->updateRecord($id,$data)) {
				$this->session->set_flashdata('success', 'success updated profile');
				redirect(site_url('dashboard/change/profile'));
			}else{
				$this->session->set_flashdata('error', 'gagal update');
				redirect(site_url('dashboard/change/profile'));
			}

		}
	}

public function changePassword()
	{
		if ($this->session->userdata('adminLogin') != TRUE) {
			$this->session->set_flashdata('error','anda harus login dulu');
			redirect(site_url('dashboard/login'));
		}
		$this->form_validation->set_rules('old_password', 'old_password', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
		$id = $this->session->userdata('uid');
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Change Profile',
				'isi' => 'admin/profile_edit',
				'data' => $this->member->getRecord($id)
			];
			$this->load->view('index', $data);
		} else {
			
			$oldpassword = $this->input->post('old_password');
			$newPassword = $this->input->post('password');

			$userData = $this->member->getRecord($id);

			if (password_verify($oldpassword, $userData['password'])) {
				$data = [
					'password' => password_hash($newPassword, PASSWORD_DEFAULT)
				];
				$this->member->updateRecord($id,$data);
				$this->session->set_flashdata('success', ' Berhail Update Password');
				redirect(site_url('dashboard/change/profile'));
				
			}else{
				$this->session->set_flashdata('error', 'password lama salah');
				redirect(site_url('dashboard/change/profile'));
			}

		}
	}


}

/* End of file Member.php */
/* Location: ./application/controllers/admin/Member.php */