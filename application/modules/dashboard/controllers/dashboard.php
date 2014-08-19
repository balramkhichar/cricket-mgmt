<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Dashboard extends MX_Controller
{
	function index()
	{
		$this->load->model('dashboard_model');
		$data['players'] = $this->dashboard_model->get_players();
		$this->load->view('dashboard', $data);
	}
}

?>