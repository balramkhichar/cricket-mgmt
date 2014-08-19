<?php
/**
 * 
 */
class Search_model extends CI_Model
{
	function get_players()
	{
		$query = $this->db->query('select * from tbl_player where player_status=1 order by player_name asc');
		return $query->result();
	}
	
	function get_against()
	{
		$query = $this->db->query('select distinct against from tbl_player_data order by against asc');
		return $query->result();
	}
	
	function get_venue()
	{
		$query = $this->db->query('select distinct venue from tbl_player_data order by venue asc');
		return $query->result();
	}
	
	function get_count()
	{
		$query = $this->db->query('select count(*) as data_count from tbl_player_data');
		$result = $query->result();
		return $result[0]->data_count;
	}
	
	function get_players_data()
	{
		$query = $this->db->query('select * from tbl_player as a
								   join tbl_player_data as b on a.player_id = b.player_id
								   where a.player_status=1 order by runs_scored desc limit 10');
		return $query->result();
	}
	
	function get_players_data_sorted()
	{
		$sort_by = $this->input->post('sort_by');
		$query = $this->db->query('select * from tbl_player as a
								   join tbl_player_data as b on a.player_id = b.player_id
								   where a.player_status=1 order by '.$sort_by.' desc limit 10');
		return $query->result();
	}
	
	function get_players_data_more()
	{
		$page = $this->input->post('pageno');
		
		$sort_by = $this->input->post('sort_by');
		
		$limit = ((int)$page -1)*10;
		
		$query = $this->db->query('select * from tbl_player as a
								   join tbl_player_data as b on a.player_id = b.player_id
								   where a.player_status=1 order by '.$sort_by.' desc limit '.$limit.',10');
		return $query->result();;
	}
}

?>