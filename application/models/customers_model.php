<?php

class Customers_model extends CI_Model {
	
	function get_customer($address = null, $type = null) {
		$CUSTOMER = $this->check_speeling_address($address, $type);
		if($CUSTOMER) {
			return $CUSTOMER;
		} else {
			$return = $address . '
				<div class="btn-group btn-group-xs">
	                <button type="button" class="btn btn-default add-customer">Add Customer</button>
	            </div>
			';
			return $return;
		}
	}

	function check_speeling_address($address,$type){
		$array = explode(' ', $address);
		$QUERY = "
			SELECT
				*
			FROM
				(
					SELECT
						CONCAT(
							CUST. NAME,
							' ',
							CUST.PHONE,
							' ',
							CUST.PHONE,
							' ',
							CUST.FAX,
							' ',
							CUST.EMAIL,
							' ',
							CUST.COUNTRY
						)AS FULL_ADDRESS
					FROM
						CUSTOMER_TABLE CUST
				)CUST
			WHERE
		";
		for ($i=0;$i<=count($array)-1;$i++) {
			$QUERY .= "CUST.FULL_ADDRESS LIKE '% ".substr('/','',$array[$i])."%'";
			$QUERY .= " OR ";
		}
		$QUERY = substr($QUERY, 0,-4);
		$get = $this->db->query($QUERY);
		if($get->num_rows() > 0) {
			return $get->result();
		} else return FALSE;
	}
}

?>