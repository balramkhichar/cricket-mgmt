<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Search extends MX_Controller
{
	function index()
	{
		$this->load->model('search_model');
		$data['players'] 			= $this->search_model->get_players();
		$data['against'] 			= $this->search_model->get_against();
		$data['venues'] 			= $this->search_model->get_venue();
		$data['player_plus_data']	= $this->search_model->get_players_data();
		$data['count'] 				= $this->search_model->get_count();
		$this->load->view('search', $data);
	}
	
	function pagination()
	{
		$this->load->model('search_model');
		$data['player_plus_data'] = $this->search_model->get_players_data_more();
		
		foreach($data['player_plus_data'] as $player_data){?>
		  	<tr>
            <td><?php echo $player_data->player_name;?></td>
            <td><?php echo $player_data->runs_scored;?></td>
            <td><?php echo $player_data->against;?></td>
            <td><?php echo $player_data->batting_position;?></td>
            <td><?php echo $player_data->innings;?></td>
            <td><?php echo $player_data->venue;?></td>
            <td><?php echo $player_data->venue_type;?></td>
            <td><?php echo $player_data->match_date;?></td>
            <td><?php echo $player_data->result;?></td>
            </tr>
		  <?php }
		
	}
	
	function sortby()
	{
		$this->load->model('search_model');
		$data['player_plus_data'] = $this->search_model->get_players_data_sorted();
		
		foreach($data['player_plus_data'] as $player_data){?>
		  	<tr>
            <td><?php echo $player_data->player_name;?></td>
            <td><?php echo $player_data->runs_scored;?></td>
            <td><?php echo $player_data->against;?></td>
            <td><?php echo $player_data->batting_position;?></td>
            <td><?php echo $player_data->innings;?></td>
            <td><?php echo $player_data->venue;?></td>
            <td><?php echo $player_data->venue_type;?></td>
            <td><?php echo $player_data->match_date;?></td>
            <td><?php echo $player_data->result;?></td>
            </tr>
		  <?php }
	}
}

?>