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

	public function Check_lrn()
	{
		if ($this->input->is_ajax_request())
		{
			if ($this->jhsdb->check_stud_lrn($this->input->get('LRN')))
			{
				$this->output->set_status_header(200);
				return json_encode(true);
			}
			else
			{
				$this->output->set_status_header(500);
			}
		}
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

	public function Edit_student($uniq_id)
	{
		$data = array(
			"stud_info" => $this->jhsdb->get_student_info($uniq_id)
		);

		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('registrar/department/juniorhs/edit_student', $data);
		$this->load->view('templates/footer');
	}

	public function Update_student_admission_status()
	{
		if ($this->input->is_ajax_request())
		{
			if ($this->jhsdb->update_student_admission_status())
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

	public function Update_student()
	{
		if ($this->input->is_ajax_request())
		{
			if ($this->jhsdb->update_student())
			{
				echo json_encode($this->input->post('LRN'));
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
			"discounts" => $this->jhsdb->get_discounts(),
			"assessmentInfo" => $this->jhsdb->get_assessment_info($uniq_id),
			"acad_yr" => $this->glob->get_acad_year()
		);

		$data["paymentHistory"] = $this->glob->get_payment_history($data['stud_info']->stud_lrn);

		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('registrar/department/juniorhs/view_student', $data);
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

        if ($this->jhsdb->upload_avatar($file['file_name']))
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
