<?php

class Customers_model extends CI_Model {
	
	function get_customer($address = null, $type = null) {
		$CUSTOMER = $this->check_speeling_address($address, $type);
		return $CUSTOMER;
	}
	
	function save_customer($data)
	{
		
		$this->db->insert('customer_table',$data);	
		
	}
	
	function get_data($type){
		
		$this->db->where('type', $type);
		$query = $this->db->get('customer_table');
		return $query->result();
		
		
		
	}
	
	function getuser($UserId)
	{
		$this->db->where('cust_id',$UserId);
		$query = $this->db->get('customer_table');
		return $query->row();
	}
	
	
	
	function customer_new_id(){
		$get = $this->db->count_all('customer_table');
		$get = $get + 1;
		$len = strlen($get);
			switch ($len) {
			case '1': return 'THS0000' . $get; break;
			case '2': return 'THS000' . $get; break;
			case '3': return 'THS00' . $get; break;
			case '4': return 'THS0' . $get; break;   
			default: return $get; break;
			}
	}
	

	function check_speeling_address($address,$type){
		$array = explode(' ',$address);
		$QUERY = "
			SELECT
				*
			FROM
				(
					SELECT
						CUST.cust_id,
						CUST.name,
						CUST.address,
						CUST.country,
						CONCAT(
							CUST. name,
							' ',
							CUST.address,
							' ',
							CUST.phone,
							' ',
							CUST.email,
							' ',
							CUST.country
						)AS FULL_ADDRESS
					FROM
						CUSTOMER_TABLE CUST
				)CUST
			WHERE
		";
		for ($i=0;$i<=count($array)-1;$i++) {
			if(trim($array[$i])) {
				$QUERY .= "CUST.FULL_ADDRESS LIKE '%".trim(strip_tags(str_ireplace(array(',','/',"'"),'',trim($array[$i]))))."%'";
				$QUERY .= " OR ";
			}
		}
		$QUERY = substr($QUERY, 0, -4);
		$get = $this->db->query($QUERY);
		if($get->num_rows() > 0) {
			$similar['percent'] = array();
			foreach ($get->result() as $key => $value) {
				similar_text($value->FULL_ADDRESS, $address, $percent);
				if($percent > 90) {
					$similar['percent'][] = $percent;
					$similar['cust_id'][] = $value->cust_id;
				}

				if(count($similar['percent']) > 0) {
					$this->db->where_in('cust_id',$similar['cust_id']);
					$get = $this->db->get('customer_table');
					if($get->num_rows() > 0) return $get->result();
					else return FALSE;
				} else return FALSE;
			}
		} else return FALSE;
	}
}

?>