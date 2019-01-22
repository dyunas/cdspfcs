<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function Index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('admin/dashboard/index');
		$this->load->view('templates/footer');
	}
}