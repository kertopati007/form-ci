<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
		is_login();
  }

	public function index () {
		// $this->load->view('admin/dashboard');
		$this->template->load('admin/template_cms', 'admin/dashboard');
	}
}
