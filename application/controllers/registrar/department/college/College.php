<?php defined('BASEPATH') OR exit('No direct script access allowed');

class College extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('registrar/department/College_model', 'coldb');
	}

	public function Index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('registrar/department/college/index');
		$this->load->view('templates/footer');
	}

	public function New_student()
	{
		$data = array(
			"acad_yr" => $this->glob->get_acad_year()
		);

		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('registrar/department/college/new_student', $data);
		$this->load->view('templates/footer');
	}

	public function Register_student()
	{
		if ($this->input->is_ajax_request())
		{
			if ($this->coldb->register_student())
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

	public function Get_student_course()
	{
		if ($this->input->is_ajax_request())
		{
			$result = $this->coldb->get_student_course();
			echo $result;
		}
		else
		{
			exit('No direct script access allowed');
		}
	}

	public function Get_course_years()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->get('id');
			$result = $this->coldb->get_course_years($id);
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
			"stud_info" => $this->coldb->get_student_info($uniq_id),
			"fees" 			=> $this->coldb->get_school_fees(),
			"assessmentInfo" => $this->coldb->get_assessment_info($uniq_id),
			"discounts" => $this->coldb->get_discounts(),
		);

		$data['paymentHistory'] = $this->glob->get_payment_history($uniq_id);

		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('registrar/department/college/view_student', $data);
		$this->load->view('templates/footer');
	}

	public function Get_tuition_fee()
	{
		if ($this->input->is_ajax_request())
		{
			$result = $this->coldb->get_tuition_fee();
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

	public function Get_thesis_fee()
	{
		if ($this->input->is_ajax_request())
		{
			$result = $this->coldb->get_thesis_fee();
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
			if ($this->coldb->insert_student_assessment_info())
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
			$result = $this->coldb->get_assessment_details($id, $assessmentID);

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

	public function Upload_avatar()
	{
		if ($this->input->is_ajax_request())
		{
			$config['upload_path']    = './assets/uploads/avatars/';
      $config['file_name']      = uniqid().'.jpg';
      $config['allowed_types']  = 'jpg|jpeg';
      $config['max_size']       = '0';
      $config['max_width']      = '0';
      $config['max_height']     = '0';

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('avatar'))
      {
        $file = $this->upload->data();
        // $path = './assets/uploads/avatar/';
        // unlink($path.$this->input->post('oldAva'));

        if ($this->coldb->upload_avatar($file['file_name']))
        {
        	$this->output->set_status_header(200);
        	echo json_encode(true);
        }
        else
        {
      	  $this->output->set_status_header(500);
      	  $error = $this->upload->display_errors();
        	echo json_encode($error);
        }
      }
      else
      {
        $this->output->set_status_header(500);
        $error = $this->upload->display_errors();
      	echo json_encode($error);
      }
		}
		else
		{
			exti('No direct script access allowed');
		}
	}
}
