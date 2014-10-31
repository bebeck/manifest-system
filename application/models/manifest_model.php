<?php

class Manifest_model extends CI_Model {


	#FILE MANIFEST ->
	function file_new_id(){
		$get = $this->db->count_all('manifest_file_table');
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

	function file_insert_new($file){
		$this->db->insert('manifest_file_table',$file);
	}

	function get_file() {
		$this->db->join('manifest_data_table D','D.file_id = F.file_id');
		$this->db->where('D.status','VALID');
		$this->db->group_by('F.file_id');
		$get = $this->db->get('manifest_file_table F');
		return $get->result();
	}

	function get_by_file_id($file_id) {
		$this->db->where('file_id',$file_id);
		$get = $this->db->get('manifest_file_table');
		if($get->num_rows() > 0) return $get->row();
		else return false;
	}


	#DATA MANIFEST ->
	function data_new_id(){
		$get = $this->db->count_all('manifest_data_table');
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
		$this->db->insert('manifest_data_table',$data);
	}

	function get_filtering_data($start = null,$limit = null,$where,$group_by = false) {
		$this->db->select('F.file_name, D.*');
		$this->db->join('manifest_data_table D', 'D.FILE_ID = F.FILE_ID');
		foreach ($where as $key => $value) { 
			if(is_array($value)) $this->db->where_in($key,$value); else $this->db->where($key,$value); 
		}
		if(is_numeric($start)) $this->db->limit($limit,$start);
		if($group_by != false) $this->db->group_by($group_by);
		$get = $this->db->get('manifest_file_table F');

		if($get->num_rows() > 0) return $get->result();
		else return false;
	}

	function count_not_verified(){
		$QUERY = "
			SELECT * FROM manifest_data_table D
			WHERE D.status = 'NOT VERIFIED'
			GROUP BY D.file_id
		";
		$get = $this->db->query($QUERY);
		return $get->num_rows();
	}

	function set_status_data($file_id,$status) {
		$this->db->where('file_id',$file_id);
		$this->db->set('status',$status);
		$this->db->update('manifest_data_table');
	}

	function get_header_format(){
		$header = array('no','hawb_no','shipper','consignee','pkg','description','pcs','kg','value','pp','cc','remarks');
		return $header;
	}

	function get_by_data_id($data_id){
		$this->db->where('DATA_ID',$data_id);
		$get = $this->db->get('manifest_data_table');
		return $get->row();
	}

	function set_data_customer($cust_id,$data_id,$type) {
		$this->db->set($type,$cust_id);
		$this->db->where('data_id',$data_id);
		$this->db->update('manifest_data_table');
	}

	function check_valid_status($DATA_ID) {
		$this->db->where('data_id',$DATA_ID);
		$DATA = $this->db->get('manifest_data_table');
		$status = 0;

		$this->db->where('reference_id',$DATA->row()->shipper);
		$get = $this->db->get('customer_table');
		if($get->num_rows() > 0) $status++;

		$this->db->where('reference_id',$DATA->row()->consignee);
		$get = $this->db->get('customer_table');
		if($get->num_rows() > 0) $status++;

		return $status;
	}

}
?>