<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('assessor/elementary/Elementary_model', 'elemdb');
	}

	public function Index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('assessor/elementary/dashboard/index');
		$this->load->view('templates/footer');
	}

	public function Get_elem_table_data()
	{
		if ($this->input->is_ajax_request())
		{
			$result = $this->elemdb->get_elem_table_data();
			echo $result;
		}
		else
		{
			exit('No direct script access allowed');
		}
	}

	public function View_student($uniq_id)
	{
		$data = array(
			"stud_info" => $this->elemdb->get_student_info($uniq_id),
			"fees" => $this->elemdb->get_school_fees(),
			"discounts" => $this->elemdb->get_discounts()
		);

		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('assessor/elementary/dashboard/view_student', $data);
		$this->load->view('templates/footer');
	}

	public function Get_discount_amount()
	{
		if ($this->input->is_ajax_request())
		{
			$code = $this->input->get('id');
			$result = $this->elemdb->get_discounts($code);
			echo $result;
		}
		else
		{
			exit('No direct script access allowed');
		}
	}

	public function Get_tuition_fee()
	{
		if ($this->input->is_ajax_request())
		{
			$result = $this->elemdb->get_tuition_fee();
			echo $result;
		}
		else
		{
			exit('No direct script access allowed');
		}
	}
}