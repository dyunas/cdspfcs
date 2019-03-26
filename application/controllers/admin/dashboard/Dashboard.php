<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/dashboard/Dashboard_model', 'dashdb');
	}

	public function Index()
	{
		$status = 1;
		$data = array(
			"acadYear" => $this->dashdb->get_acad_year(),
			"activeAcadYear" => $this->dashdb->get_acad_year($status),
			"semester" => $this->dashdb->get_semester(),
			"activeSemester" => $this->dashdb->get_semester($status),
		);

		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('admin/dashboard/index', $data);
		$this->load->view('templates/footer');
	}
}