<?php

class Manifest_model extends CI_Model {

	function insert_new_file($data = null) {
		$this->db->insert('file_upload',$data);
	}

	function insert_new_manifest_details($data = null) {
		$this->db->insert('manifest_details',$data);
		return $this->db->insert_id();
	}

	function insert_new_data($data = null) {
		$this->db->insert('manifest_data',$data);
	}

	function get_manifest_data(){
		$get = $this->db->get('manifest_data');
		if($get->num_rows() > 0) return $get->result();
		else return false;
	}

	function get_filtering_data($start = null,$limit,$where) {

		$query = "
			SELECT
				F. NAME,
				D.*
			FROM
				file_upload F
			JOIN manifest_details MD ON MD.file_id = F.file_id
			JOIN manifest_data D ON D.manifest_id = MD.manifest_id ";
		
		if(count($where) > 0) $query .= " WHERE ";
		if(isset($where['file'])) $query .= "F.file_id = '".$where['file']."'";
		if(isset($where['status'])) $query .= "AND D.status = '".$where['status']."'";

		if(is_numeric($start)) $query .= "LIMIT ".$start.",".$limit."

		";

		$get = $this->db->query($query);
		if($get->num_rows() > 0) return $get->result();
		else return false;
	}

	function list_file(){
		$get = $this->db->get('file_upload');
		if($get->num_rows() > 0) return $get->result();
		else return false;
	}

	function get_count_file(){
		$get = $this->db->count_all('file_upload');
		$get = $get + 1;
		$len = strlen($get);
		switch ($len) {
			case '1':
				return '0000' . $get;
				break;
			case '2':
				return '000' . $get;
				break;
			case '3':
				return '00' . $get;
				break;
			case '4':
				return '0' . $get;
				break;			
			default:
				return $get;
				break;
		}
	}
}
?>