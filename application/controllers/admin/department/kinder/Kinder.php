<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Kinder extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/department/kinder/Kinder_model', 'kinderdb');
	}

	public function Index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('admin/departments/kinder/index');
		$this->load->view('templates/footer');
	}

	public function View_student($studID)
	{
		$data = array(
			"stud_info" => $this->kinderdb->get_student_info($studID),
			"discounts" => $this->kinderdb->get_discounts(),
			"assessmentInfo" => $this->kinderdb->get_assessment_info($studID),
		);

		$data["fees"] = $this->kinderdb->get_school_fees($data["stud_info"]->stud_grade_lvl);
		$data["paymentHistory"] = $this->glob->get_payment_history($studID);

		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('admin/departments/kinder/view_student', $data);
		$this->load->view('templates/footer');
	}

	public function Get_discount_amount()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->get('id');
			$result = $this->kinderdb->get_discounts($id);
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
			$feeFor = $this->input->get('gradeLevel');
			$result = $this->kinderdb->get_tuition_fee($feeFor);
			echo $result;
		}
		else
		{
			exit('No direct script access allowed');
		}
	}

	public function Add_assessment()
	{
		if ($this->input->is_ajax_request())
		{
			if ($this->kinderdb->insert_student_assessment_info())
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

	public function Get_assessment_info()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->get('id');
			$assessmentID = $this->input->get('assessmentID');
			$result = $this->kinderdb->get_assessment_details($id, $assessmentID);

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
			$result = $this->kinderdb->check_fee_row($id, $assessmentID);
			echo json_encode($result);
		}
		else
		{
			exit('No direct script access allowed');
		}
	}

	public function Get_payment_history()
	{
		if ($this->input->is_ajax_request())
		{
			$orNum = $this->input->get('orNum');
			$result = $this->glob->get_payment_history_dtls($orNum);
			echo $result;
		}
		else
		{
			exit('No direct script access allowed');
		}
	}
}