<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path


class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Auth_m', 'auth');
	}

	public function index()

	{
		$this->load->helper('url');
		$this->load->view('auth/login');
	}
	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$query = $this->auth->login($post);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$params = array(
					'userid'     => $row->id,
				);
				$this->session->set_userdata($params);
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('error', 'Login Gagal');
				redirect('login');
			}
		}
	}

	public function logout()
    {
        $params = array('userid');
        $this->session->unset_userdata($params);
        redirect('/');
    }
}


/* End of file AdminController.php */
/* Location: ./application/controllers/AdminController.php */
