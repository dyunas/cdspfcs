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
			if ($this->session->userdata('role') == 'registrar')
			{
				redirect('registrar/dashboard');
			}
			elseif ($this->session->userdata('role') == 'cashier')
			{
				redirect();
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
			if ($this->session->userdata('role') == '2')
			{
				redirect('registrar/dashboard');
			}
			elseif ($this->session->userdata('role') == '3')
			{
				redirect();
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
