<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Daily_collection extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/reports/Daily_collection_model', 'dailydb');
	}

	public function Index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('admin/reports/daily/index');
		$this->load->view('templates/footer');
	}

	public function Get_daily_collection()
	{
		if ($this->input->is_ajax_request())
		{
			if ($result = $this->dailydb->get_daily_collection())
			{
				echo json_encode($result);
			}
			else
			{
				echo json_encode(false);
			}
		}
		else
		{
			$this->output->set_status_header(500);
		}
	}
}