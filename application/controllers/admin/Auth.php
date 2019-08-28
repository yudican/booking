<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_member','member');
	}

	public function index()
	{
		if ($this->session->userdata('adminLogin') > 0) {
			redirect(site_url('dashboard/login'));
		}  
		$this->form_validation->set_rules('userEmail', 'data', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/login');
		} else {
			$userEmail = $this->input->post('userEmail');
			$password = $this->input->post('password');

			$cekUser = $this->member->getRecordById($userEmail,1);

			$userData = $cekUser->row_array();
			if ($cekUser->num_rows()) {
				if (password_verify($password, $userData['password'])) {
					$sesData['uid'] = $userData['id'];
					$sesData['username'] = $userData['username'];
					
					
					$sesData['adminLogin'] = TRUE;
					$this->session->set_userdata( $sesData );
					$this->session->set_flashdata('success', 'Login Berhail');
					redirect(site_url('dashboard'));
					
				}else{
					$this->session->set_flashdata('error', 'Username atau password salah');
					redirect(site_url('dashboard/login'));
				}
			}else{
				$this->session->set_flashdata('error', 'Username atau password salah');
				redirect(site_url('dashboard/login'));
			}

		}
	}

	public function logout()
    {
        $data = ['uid','username','adminLogin'];

        $this->session->set_userdata($data);
        $this->session->sess_destroy();
        $this->session->set_flashdata('success','logout berhasil');
        redirect(site_url('dashboard/login'));
    }

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */