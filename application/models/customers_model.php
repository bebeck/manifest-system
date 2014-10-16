<?php

class Customers_model extends CI_Model {
	
	function get($address = null, $type = null) {
		$this->db->where('LOWER(address)',strtolower($address));
		$this->db->where('LOWER(type)',strtolower($type));
		$get = $this->db->get('customer');
		if($get->num_rows() > 0) {
			return $get->row('cust_id');
		} else {
			$new_id = 'CST' .  $this->get_count_record();
			$new_record = array('cust_id' => $new_id, 'address' => $address, 'type' => $type);
			$this->db->insert('customer',$new_record);
			return $new_id;
		}
	}

	function get_filtering_data($start = null,$limit,$where) {

		$query = "
			SELECT * FROM customer C ";
		
		if(count($where) > 0) $query .= " WHERE ";
		if(isset($where['type'])) $query .= "C.type = '".$where['type']."'";

		if(is_numeric($start)) $query .= "LIMIT ".$start.",".$limit."

		";

		$get = $this->db->query($query);
		if($get->num_rows() > 0) return $get->result();
		else return false;
	}

	function get_count_record(){
		$get = $this->db->count_all('customer');
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