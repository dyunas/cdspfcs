<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Elementary extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('registrar/department/Elementary_model', 'elemdb');
	}

	public function Index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('registrar/department/elementary/index');
		$this->load->view('templates/footer');
	}

	public function New_student()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('registrar/department/elementary/new_student');
		$this->load->view('templates/footer');
	}

	public function Register_student()
	{
		if ($this->input->is_ajax_request())
		{
			if ($this->elemdb->register_student())
			{
				// var_dump($this->input->post());
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
}
