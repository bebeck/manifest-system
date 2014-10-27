<?php

class Manifest_model extends CI_Model {


	#FILE MANIFEST ->
	function file_new_id(){
		$get = $this->db->count_all('MANIFEST_FILE_TABLE');
		$get = $get + 1;
		$len = strlen($get);
		switch ($len) {
			case '1': return '0000' . $get; break;
			case '2': return '000' . $get; break;
			case '3': return '00' . $get; break;
			case '4': return '0' . $get; break;			
			default: return $get; break;
		}
	}

	function file_insert_new($file_name,$consign_to,$mawb_no,$flight_from,$flight_to){
		$FILE_ID = 'FILE-' . date('ymdhis') . $this->file_new_id();
		$row = array(
			'FILE_ID'		=> $FILE_ID,
			'FILE_NAME'		=> $file_name,
			'CONSIGN_TO'	=> $consign_to,
			'MAWB_NO'		=> $mawb_no,
			'FLIGHT_FROM'	=> $flight_from,
			'FLIGHT_TO'		=> $flight_to,
			'CREATE_DATE'	=> date('Y-m-d h:i:s'),
			'LAST_UPDATE'	=> date('Y-m-d h:i:s'),
			'USER_ID'		=> $this->session->userdata('user_id')
			);

		$this->db->insert('MANIFEST_FILE_TABLE',$row);
		return $FILE_ID;
	}

	function get_file() {
		$get = $this->db->get('MANIFEST_FILE_TABLE');
		return $get->result();
	}



	#DATA MANIFEST ->
	function data_new_id(){
		$get = $this->db->count_all('MANIFEST_DATA_TABLE');
		$get = $get + 1;
		$len = strlen($get);
		switch ($len) {
			case '1': return '0000' . $get; break;
			case '2': return '000' . $get; break;
			case '3': return '00' . $get; break;
			case '4': return '0' . $get; break;			
			default: return $get; break;
		}
	}

	function data_insert_new($data) {
		$this->db->insert('MANIFEST_DATA_TABLE',$data);
	}

	function get_filtering_data($start = null,$limit = null,$where,$group_by = false) {
		$this->db->select('F.FILE_NAME, D.*');
		$this->db->join('MANIFEST_DATA_TABLE D', 'D.FILE_ID = F.FILE_ID');
		foreach ($where as $key => $value) { 
			if(is_array($value)) $this->db->where_in($key,$value); else $this->db->where($key,$value); 
		}
		if(is_numeric($start)) $this->db->limit($limit,$start);
		if($group_by != false) $this->db->group_by($group_by);
		$get = $this->db->get('MANIFEST_FILE_TABLE F');

		if($get->num_rows() > 0) return $get->result();
		else return false;
	}

	function count_not_verified(){
		$QUERY = "
			SELECT * FROM MANIFEST_DATA_TABLE MDT
			WHERE STATUS = 'NOT VERIFIED'
			GROUP BY MDT.FILE_ID
		";
		$get = $this->db->query($QUERY);
		return $get->num_rows();
	}
}
?>