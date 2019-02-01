<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Account_manager extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/account_manager/Account_manager_model', 'actdb');
	}

	public function Index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('admin/account_manager/index');
		$this->load->view('templates/footer');
	}

	public function Get_account_table_data()
	{
		if ($this->input->is_ajax_request())
		{
			$result = $this->actdb->get_account_table_data();
			echo $result;
		}
		else
		{
			exit('No direct script access allowed!');
		}
	}

	public function New_account()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('admin/account_manager/new_account');
		$this->load->view('templates/footer');
	}

	public function Get_account_roles()
	{
		if ($this->input->is_ajax_request())
		{
			$result = $this->actdb->get_account_roles();
			echo $result;
		}
		else
		{
			exit('No direct script access allowed!');
		}
	}

	public function Register_account()
	{
		if ($this->input->is_ajax_request())
		{
			$result = $this->actdb->register_account();
			echo $result;
		}
		else
		{
			exit('No direct script access allowed!');
		}
	}

	public function Check_username()
	{
		if ($this->input->is_ajax_request())
		{
			$uname = $this->input->get('uname');
			$result = $this->actdb->check_username($uname);
			if ($result == TRUE)
			{
				$this->output->set_status_header(200);
			}
			else
			{
				$this->output->set_status_header(404);
			}
		}
		else
		{
			exit('No direct script access allowed!');
		}
	}
}