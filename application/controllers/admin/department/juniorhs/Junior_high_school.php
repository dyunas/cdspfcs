<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Junior_high_school extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/department/juniorhs/Junior_high_model', 'jhsdb');
	}

	public function Index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('admin/departments/juniorhs/index');
		$this->load->view('templates/footer');
	}

	public function View_student($studID)
	{
		$data = array(
			"stud_info" => $this->jhsdb->get_student_info($studID),
			"discounts" => $this->jhsdb->get_discounts(),
			"assessmentInfo" => $this->jhsdb->get_assessment_info($studID)
		);

		$data["fees"] = $this->jhsdb->get_school_fees($data["stud_info"]->stud_grade_lvl);
		$data["paymentHistory"] = $this->glob->get_payment_history($studID);

		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('admin/departments/juniorhs/view_student', $data);
		$this->load->view('templates/footer');
	}

	public function Get_discount_amount()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->get('id');
			$result = $this->jhsdb->get_discounts($id);
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
			$gradeLevel = $this->input->get('gradeLevel');
			$result = $this->jhsdb->get_tuition_fee($gradeLevel);
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
			if ($this->jhsdb->insert_student_assessment_info())
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
			$result = $this->jhsdb->get_assessment_details($id, $assessmentID);

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
			$result = $this->jhsdb->check_fee_row($id, $assessmentID);
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