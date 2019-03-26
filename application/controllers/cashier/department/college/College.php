<?php defined('BASEPATH') OR exit('No direct script access allowed');
class College extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('cashier/college/College_model', 'coldb');
	}

	public function Index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('cashier/departments/college/index');
		$this->load->view('templates/footer');
	}

	public function View_student($studID)
	{
		$data = array(
			"stud_info" 		 => $this->coldb->get_student_info($studID),
			"assessmentInfo" => $this->coldb->get_assessment_info($studID),
			"fees"					 => $this->coldb->get_school_fees(),
			"paymentHistory" => $this->glob->get_payment_history($studID)
		);

		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('cashier/departments/college/view_student', $data);
		$this->load->view('templates/footer');
	}

	public function Get_col_table_data()
	{
		if ($this->input->is_ajax_request())
		{
			$result = $this->coldb->get_col_table_data();
			echo $result;
		}
		else
		{
			exit('No direct script access allowed');
		}
	}

	public function Get_discount_amount()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->get('id');
			$result = $this->coldb->get_discounts($id);
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
			$result = $this->coldb->get_assessment_details($id, $assessmentID);

			echo json_encode($result);
		}
		else
		{
			exit('No direct script access allowed');
		}
	}

	public function Get_payables_info()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->get('id');
			$assessmentID = $this->input->get('assessmentID');
			$result = $this->coldb->get_payables_details($id, $assessmentID);

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
			$result = $this->coldb->check_fee_row($id, $assessmentID);
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
			if ($this->coldb->process_payment())
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