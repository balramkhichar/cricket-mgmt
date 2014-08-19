<?php
/**
 * 
 */
class Upload_model extends CI_Model
{
	function insert_player($player_name)
	{
		$query = $this->db->query('select * from tbl_player where player_name="'.$player_name.'"');
		$row = $query->num_rows();
		
		if($row>0)
		{
			$result = $query->result();
			return $result[0]->player_id;
		}
		else
		{
			$query = $this->db->query('insert into tbl_player (player_name, player_status) VALUES ("'.$player_name.'", 1)');
			return $this->db->insert_id();
		}
	}
	
	function insert_player_details($player_id, $data)
	{		
		$player_data = array(
			'player_id' 		=> $player_id,
			'runs_scored'		=> $data[1],
			'against'			=> $data[2],
			'batting_position'	=> $data[3],
			'innings'			=> $data[4],
			'venue'				=> $data[5],
			'venue_type'		=> $data[6],
			'match_date'		=> $data[7],
			'result' 			=> $data[8]
			 );
		
			$this->db->insert('tbl_player_data', $player_data);
			return 1;
	}
}

?>