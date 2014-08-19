<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Upload extends MX_Controller
{
	function index()
	{
		$data['success_flag'] = 0;
		$this->load->view('upload', $data);
	}
	
	function insert()
	{			
		$file = $_FILES['csv']['tmp_name']; 
		$player_name	= mysql_real_escape_string($this->input->post('player_name'));
		
		if ($_FILES['csv']['size'] > 0)
		{ 
			$file = $_FILES['csv']['tmp_name']; 
			$handle = fopen($file,"r"); 
			$skip_first_row = 1;
			
			//insert player details first in tbl_player
			$this->load->model('upload_model');
			$player_id = $this->upload_model->insert_player($player_name);
			
			//insert player data in tbl_player_data
			while ($data = fgetcsv($handle,1000,",","'"))
			{ 
				//$num = count($data);
				
				if($skip_first_row==1)
				{
					$skip_first_row=0;
				}
				else
				{
					$this->load->model('upload_model');
					$res = $this->upload_model->insert_player_details($player_id, $data);
				}
			}
			
			if($res==1)
			{
				$data['success_flag'] = 1;
				$this->load->view('upload', $data);
			}
			else
			{
				$data['success_flag'] = 2;
				$this->load->view('upload', $data);
			}
		}
	}
}

?>