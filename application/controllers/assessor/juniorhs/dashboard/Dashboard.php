<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('assessor/juniorhs/Juniorhigh_model', 'jhsdb');
	}

	public function Index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('assessor/juniorhs/dashboard/index');
		$this->load->view('templates/footer');
	}

	public function Get_jhs_table_data()
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

	public function View_student($uniq_id)
	{
		$data = array(
			"stud_info" => $this->jhsdb->get_student_info($uniq_id),
			"fees" => $this->jhsdb->get_school_fees(),
			"discounts" => $this->jhsdb->get_discounts(),
			"assessmentInfo" => $this->jhsdb->get_assessment_info($uniq_id)
		);

		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('assessor/juniorhs/dashboard/view_student', $data);
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
			$result = $this->jhsdb->get_tuition_fee();
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
}