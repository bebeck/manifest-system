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
		$this->db->join('MANIFEST_DATA_TABLE D','D.FILE_ID = F.FILE_ID');
		$this->db->where('D.STATUS','VALID');
		$this->db->group_by('F.FILE_ID');
		$get = $this->db->get('MANIFEST_FILE_TABLE F');
		return $get->result();
	}

	function get_by_file_id($file_id) {
		$this->db->where('FILE_ID',$file_id);
		$get = $this->db->get('MANIFEST_FILE_TABLE');
		if($get->num_rows() > 0) return $get->row();
		else return false;
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

	function set_status_data($file_id,$status) {
		$this->db->where('FILE_ID',$file_id);
		$this->db->set('STATUS',$status);
		$this->db->update('MANIFEST_DATA_TABLE');
	}

	function get_header_format(){
		$header = array('no','hawb_no','shipper','consignee','pkg','description','pcs','kg','value','pp','cc','remarks');
		return $header;
	}

	function get_by_data_id($data_id){
		$this->db->where('DATA_ID',$data_id);
		$get = $this->db->get('MANIFEST_DATA_TABLE');
		return $get->row();
	}

	function set_data_customer($cust_id,$data_id,$type) {
		$this->db->set($type,$cust_id);
		$this->db->where('DATA_ID',$data_id);
		$this->db->update('MANIFEST_DATA_TABLE');
	}

	function check_valid_status($DATA_ID) {
		$this->db->where('DATA_ID',$DATA_ID);
		$DATA = $this->db->get('MANIFEST_DATA_TABLE');
		$status = 0;

		$this->db->where('reference_id',$DATA->row()->SHIPPER);
		$get = $this->db->get('customer_table');
		if($get->num_rows() > 0) $status++;

		$this->db->where('reference_id',$DATA->row()->CONSIGNEE);
		$get = $this->db->get('customer_table');
		if($get->num_rows() > 0) $status++;

		return $status;
	}
}
?>