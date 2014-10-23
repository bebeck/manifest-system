<?php

class Customers_model extends CI_Model {
	
	function get_customer_id($address = null, $type = null) {
		$address = $this->removing_tags_excel($address);
		
		$CUSTOMER = $this->check_speeling_address($address, $type);
		if($CUSTOMER) {
			return $CUSTOMER->CUST_ID;
		} else {
			return $address;
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
			$QUERY .= "CUST.FULL_ADDRESS LIKE '% ".$array[$i]."%'";
			if($i < count($i)-1) $QUERY .= " OR ";
		}
	}

	function removing_tags_excel($address) {
		return trim(str_ireplace('_x000D_', ' ', $address));
	}

}

?>