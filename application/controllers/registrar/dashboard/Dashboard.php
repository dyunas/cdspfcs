<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('registrar/dashboard/Dashboard_model', 'dashdb');
	}

	public function Index()
	{
		$status = 1;
		$data = array(
			"acadYear" => $this->glob->get_acad_year(),
			"activeAcadYear" => $this->glob->get_acad_year($status),
			"semester" => $this->glob->get_semester(),
			"activeSemester" => $this->glob->get_semester($status),
			"totalNumberOfStudents" => $this->glob->get_total_number_student()
		);

		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('registrar/dashboard/index', $data);
		$this->load->view('templates/footer');
	}

	public function Get_student_distribution()
	{
		if ($this->input->is_ajax_request())
		{
			$result = $this->glob->get_total_number_student();
			if ($result)
			{
				$this->output->set_status_header(200);
				echo json_encode($result);
			}
			else {
				$this->output->set_status_header(500);
			}
		}
		else
		{
			exit('No direct script access allowed.');
		}
	}

	public function Get_yearly_student_total()
	{
		if ($this->input->is_ajax_request())
		{
			$result = $this->glob->get_yearly_student_total();
			if ($result)
			{
				$this->output->set_status_header(200);
				echo json_encode($result);
			}
			else {
				$this->output->set_status_header(500);
			}
		}
		else
		{
			exit('No direct script access allowed.');
		}
	}
}
