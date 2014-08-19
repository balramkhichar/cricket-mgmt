<?php
/**
 * 
 */
class Dashboard_model extends CI_Model
{
	function get_players()
	{
		$query = $this->db->query('select * from tbl_player where player_status=1 order by player_name asc');
		return $query->result();
	}
}

?>