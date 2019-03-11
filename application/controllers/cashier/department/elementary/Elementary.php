<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Elementary extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('cashier/elementary/Elementary_model', 'elemCashierdb');
	}

	public function Index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('cashier/departments/elementary/index');
		$this->load->view('templates/footer');
	}

	public function View_student($studID)
	{
		$data = array(
			"stud_info" => $this->elemCashierdb->get_student_info($studID),
			"assessmentInfo" => $this->elemCashierdb->get_assessment_info($studID)
		);

		$data["fees"] = $this->elemCashierdb->get_school_fees($data["stud_info"]->stud_grade_lvl);

		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('cashier/departments/elementary/view_student', $data);
		$this->load->view('templates/footer');
	}

	public function Get_discount_amount()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->get('id');
			$result = $this->elemCashierdb->get_discounts($id);
			echo $result;
		}
		else
		{
			exit('No direct script access allowed');
		}
	}

	public function Get_assessment_info()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->get('id');
			$assessmentID = $this->input->get('assessmentID');
			$result = $this->elemCashierdb->get_assessment_details($id, $assessmentID);

			echo json_encode($result);
		}
		else
		{
			exit('No direct script access allowed');
		}
	}

	public function Check_fee_row()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->get('id');
			$assessmentID = $this->input->get('assessmentID');
			$result = $this->elemCashierdb->check_fee_row($id, $assessmentID);
			echo json_encode($result);
		}
		else
		{
			exit('No direct script access allowed');
		}
	}

	public function Process_payment()
	{
		if ($this->input->is_ajax_request())
		{
			print_r($this->input->post());
		}
		else
		{
			exit('No direct script access allowed');
		}
	}
}