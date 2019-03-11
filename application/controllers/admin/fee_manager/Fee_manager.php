<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Fee_manager extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/fee_manager/Fee_manager_model', 'feedb');
	}

	public function Index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('admin/fee_manager/index');
		$this->load->view('templates/footer');
	}

	public function Get_fee_table()
	{
		if ($this->input->is_ajax_request())
		{
			if ($this->input->get('id'))
			{
				$result = $this->feedb->get_fee_table($this->input->get('id'));
			}
			else
			{
				$result = $this->feedb->get_fee_table();
			}

			echo $result;
		}
		else
		{
			exit('No direct script access allowed.');
		}
	}

	public function Get_grade_levels()
	{
		if ($this->input->is_ajax_request())
		{
			$result = $this->feedb->get_grade_levels();
			echo $result;
		}
		else
		{
			exit('No direct script access allowed.');
		}
	}

	// public function Check_feecode()
	// {
	// 	if ($this->input->is_ajax_request())
	// 	{
	// 		$fcode = $this->input->get('fcode');
	// 		$result = $this->feedb->check_feecode($fcode);
	// 		if ($result == TRUE)
	// 		{
	// 			$this->output->set_status_header(200);
	// 		}
	// 		else
	// 		{
	// 			$this->output->set_status_header(404);
	// 		}
	// 	}
	// 	else
	// 	{
	// 		exit('No direct script access allowed!');
	// 	}
	// }

	public function Create_new_fee()
	{
		if ($this->input->is_ajax_request())
		{
			$result = $this->feedb->create_new_fee();
			echo $result;
		}
		else
		{
			exit('No direct script access allowed!');
		}
	}
}