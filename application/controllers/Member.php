<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_member','member');
	}
	public function index()
	{
		$this->form_validation->set_rules('fullName', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[member.username]|min_length[6]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[member.email]');
		$this->form_validation->set_rules('telepon', 'telepon', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Member Register',
				'isi' => 'client/register'
			];
			$this->load->view('client/home', $data);
		} else {
			$data = [
				'fullName' => $this->input->post('fullName'),
				'username' => strtolower($this->input->post('username')),
				'email' => strtolower($this->input->post('email')),
				'telepon' => $this->input->post('telepon'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
			];
			if ($this->member->insertRecord($data)) {
				$this->session->set_flashdata('success', 'Register berhasil,silahkan login');
				redirect(site_url('member/register'));
			}else{
				$this->session->set_flashdata('error', 'register gagal');
				redirect(site_url('member/register'));
			}

		}
	}

	public function changeProfile()
	{
		if ($this->session->userdata('login') != TRUE) {
			$this->session->set_flashdata('error','anda harus login dulu');
			redirect(site_url('member/login'));
		}
		$this->form_validation->set_rules('fullName', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[member.email]');
		$this->form_validation->set_rules('telepon', 'telepon', 'trim|required');
		$id = $this->session->userdata('id');
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'change Profile',
				'isi' => 'client/profile_edit',
				'data' => $this->member->getRecord($id)
			];
			$this->load->view('client/home', $data);
		} else {
			$data = [
				'fullName' => $this->input->post('fullName'),
				'username' => strtolower($this->input->post('username')),
				'email' => strtolower($this->input->post('email')),
				'telepon' => $this->input->post('telepon'),
			];
			if ($this->member->updateRecord($id,$data)) {
				$this->session->set_flashdata('success', 'success updated profile');
				redirect(site_url('member/change/profile'));
			}else{
				$this->session->set_flashdata('error', 'gagal update');
				redirect(site_url('member/change/profile'));
			}

		}
	}

public function changePassword()
	{
		if ($this->session->userdata('login') != TRUE) {
			$this->session->set_flashdata('error','anda harus login dulu');
			redirect(site_url('member/login'));
		}
		$this->form_validation->set_rules('old_password', 'old_password', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
		$id = $this->session->userdata('id');
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Change Profile',
				'isi' => 'client/profile_edit',
				'data' => $this->member->getRecord($id)
			];
			$this->load->view('client/home', $data);
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
				redirect(site_url('member/change/profile'));
				
			}else{
				$this->session->set_flashdata('error', 'password lama salah');
				redirect(site_url('member/change/profile'));
			}

		}
	}

	public function login()
	{
		if ($this->session->userdata('login') > 0) {
			redirect(site_url(''));
		}  
		$this->form_validation->set_rules('userEmail', 'data', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Member Register',
				'isi' => 'client/login'
			];
			$this->load->view('client/home', $data);
		} else {
			$userEmail = $this->input->post('userEmail');
			$password = $this->input->post('password');

			$cekUser = $this->member->getRecordById($userEmail,0);

			$userData = $cekUser->row_array();
			if ($cekUser->num_rows()) {
				if (password_verify($password, $userData['password'])) {
					$sesData['id'] = $userData['id'];
					$sesData['username'] = $userData['username'];
					
					
					$sesData['login'] = TRUE;
					$this->session->set_userdata( $sesData );
					$this->session->set_flashdata('success', 'Login Berhail');
					redirect(site_url());
					
				}else{
					$this->session->set_flashdata('error', 'Username atau password salah1');
					redirect(site_url('member/login'));
				}
			}else{
				$this->session->set_flashdata('error', 'Username atau password salah');
				redirect(site_url('member/login'));
			}

		}
	}

	public function logout()
    {
        $data = ['id','login','username','adminLogin'];

        $this->session->set_userdata($data);
        $this->session->sess_destroy();
        $this->session->set_flashdata('success','logout berhasil');
        redirect(site_url('member/login'));
    }

}

/* End of file Member.php */
/* Location: ./application/controllers/Member.php */