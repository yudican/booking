<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
			'title' => 'Dashboard',
			'isi'	=> 'admin/home',
			'news' => $this->db->get('newsTable')->num_rows(),
			'partner' => $this->db->get('partnerTable')->num_rows(),
			'member' => $this->db->get_where('member',['level' => 0])->num_rows()
		];

		$this->load->view('index', $data);
	}

	public function upload()
    {
      $allowedExts = array("gif", "jpeg", "jpg", "png", "blob","svg","ico");

      // Get filename.
      $temp = explode(".", $_FILES["file"]["name"]);
      
      // Get extension.
      $extension = end($temp);
      
      // An image check is being done in the editor but it is best to
      // check that again on the server side.
      // Do not use $_FILES["file"]["type"] as it can be easily forged.
      $finfo = finfo_open(FILEINFO_MIME_TYPE);
      $mime = finfo_file($finfo, $_FILES["file"]["tmp_name"]);
      
      if ((($mime == "image/gif")
      || ($mime == "image/jpeg")
      || ($mime == "image/pjpeg")
      || ($mime == "image/x-png")
      || ($mime == "image/png"))
      && in_array(strtolower($extension), $allowedExts)) {
          // Generate new random name.
          $name = sha1(microtime()) . "." . $extension;
      
          // Save file in the uploads folder.
          move_uploaded_file($_FILES["file"]["tmp_name"], getcwd() . "/upload/" . $name);
      
          // Generate response.
          $response = new StdClass;
          $response->link = site_url('upload/') . $name;
          echo stripslashes(json_encode($response));
      }
    }

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/Dashboard.php */