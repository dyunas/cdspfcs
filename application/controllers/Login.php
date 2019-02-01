<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login/Login_model', 'login');
	}

	public function Index()
	{
		if ($this->session->userdata('is_in'))
		{
			switch($this->session->userdata('role'))
			{
				case 1:
					redirect('admin/dashboard');
				break;
				case 2:
					redirect('registrar/dashboard');
				break;
				case 3:
					redirect('assessor/elementary/dashboard');
				break;
				case 4:
					redirect('assessor/juniorhs/dashboard');
				break;
				case 5:
					redirect('assessor/seniorhs/dashboard');
				break;
				case 6:
					redirect('cashier/dashboard');
				break;
				case 7:
					redirect('finance/dashboard');
				break;
				default:
				break;
			}
		}
		else
		{
			$this->load->view('templates/header');
			$this->load->view('login/index');
			$this->load->view('templates/footer');
		}
	}

	public function Authenticate()
	{
		if ($this->login->check_user_credentials())
		{
			switch($this->session->userdata('role'))
			{
				case 1:
					redirect('admin/dashboard');
				break;
				case 2:
					redirect('registrar/dashboard');
				break;
				case 3:
					redirect('assessor/elementary/dashboard');
				break;
				case 4:
					redirect('assessor/juniorhs/dashboard');
				break;
				case 5:
					redirect('assessor/seniorhs/dashboard');
				break;
				case 6:
					redirect('cashier/dashboard');
				break;
				case 7:
					redirect('finance/dashboard');
				break;
				default:
				break;
			}
		}
		else
		{
			$this->load->view('templates/header');
			$this->load->view('login/index');
			$this->load->view('templates/footer');
			// redirect(site_url('login'));
		}
	}

	public function Logout()
	{
		// Logs the user out
		if ($this->login->Log_out())
		{
			// If the user successfully logs' out redirect the page to cpanel-admin/login
			redirect(site_url('login'));
		}
	}
}
