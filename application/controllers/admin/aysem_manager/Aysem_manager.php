<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Aysem_manager extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/aysem_manager/Aysem_model', 'aysem');
	}

	public function Index()
	{
		$status = 1;
		$data = array(
			"acadYear" => $this->aysem->get_acad_year(),
			"activeAcadYear" => $this->aysem->get_acad_year($status),
			"semester" => $this->aysem->get_semester(),
			"activeSemester" => $this->aysem->get_semester($status),
		);

		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('admin/aysem_manager/index', $data);
		$this->load->view('templates/footer');
	}

	public function Update_acadyear()
	{
		if($this->input->is_ajax_request())
		{
			if($this->aysem->update_acadyear())
			{
				$this->output->set_status_header(200);
				$obj = (object)array('acadYear' => $this->input->post('acadYear'));
				echo json_encode($obj);
			}
			else
			{
				$this->output->set_status_header(500);
			}
		}
		else
		{
			exit('No direct script access allowed');
		}
	}

	public function Update_semester()
	{
		if($this->input->is_ajax_request())
		{
			if($this->aysem->update_semester())
			{
				$this->output->set_status_header(200);
				$obj = (object)array('semester' => $this->input->post('semester'));
				echo json_encode($obj);
			}
			else
			{
				$this->output->set_status_header(500);
			}
		}
		else
		{
			exit('No direct script access allowed');
		}
	}
}