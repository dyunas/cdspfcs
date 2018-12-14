<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Junior_high_school extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('registrar/department/Junior_high_school_model', 'jhsdb');
	}

	public function Index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('registrar/department/juniorhs/index');
		$this->load->view('templates/footer');
	}

	public function New_student()
	{
		$data = array(
			"acad_yr" => $this->glob->get_acad_year()
		);

		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('registrar/department/juniorhs/new_student', $data);
		$this->load->view('templates/footer');
	}

	public function Register_student()
	{
		if ($this->input->is_ajax_request())
		{
			// var_dump($this->input->post());
			if ($this->jhsdb->register_student())
			{
				
				echo json_encode(true);
			}
			else
			{
				echo json_encode(false);
			}
		}
		else
		{
			exit('No direct script access allowed');
		}
	}

	public function Get_elem_table_data()
	{
		if ($this->input->is_ajax_request())
		{
			$result = $this->jhsdb->get_jhs_table_data();
			echo $result;
		}
		else
		{
			exit('No direct script access allowed');
		}
	}
}
