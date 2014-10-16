<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Manifest extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		if($this->session->userdata('login') != TRUE) redirect(base_url());

		$this->set_layout(null);
	}
	
	function upload() {
		if($this->session->userdata('login') != TRUE) redirect(base_url());
		$data = array();
		$this->set_layout('manifest/upload',$data);		
	}

	function verify() {
		$file_id = $_GET['file_id'];

		$where['file'] = $file_id;
		$where['status'] = 'verification';
		$data = array('manifest' => $this->manifest_model->get_filtering_data(null,null,$where));
		$this->set_layout('manifest/verify',$data);
	}
	
	function data() {
		if($this->session->userdata('login') != TRUE) redirect(base_url());

		$data = array('manifest_data' => $this->manifest_model->get_manifest_data(), 'list_file' => $this->manifest_model->list_file());
		$this->set_layout('manifest/data',$data);
	}

	function ajax($method = null) {
		if($this->session->userdata('login') != TRUE) redirect(base_url());

		switch ($method) {
			case 'get':
				$page = $_GET['page'];
				$limit = 50;
				$start = ($page - 1) * $limit;

				$where = array();
				if(isset($_GET['file']) && !empty($_GET['file'])) $where['file']  = $_GET['file'];

				$data_ = array('manifest' => $this->manifest_model->get_filtering_data($start,$limit,$where));
				$data__ = array('total_row' => count($this->manifest_model->get_filtering_data(null,null,$where)), 'page' => $page, 'limit' => $limit);

				$manifest_html = $this->load->view('manifest/get_html_data',$data_,true);
				$pagination_html = $this->load->view('manifest/get_html_pagination',$data__,true);
				echo json_encode(array('data' => $manifest_html, 'pagination', 'pagination' => $pagination_html));
			break;

			case 'upload':
				include PATH_APP . 'libraries/PHPExcel/IOFactory.php';

				if(count($_POST) > 0) {
					$file_name = $_POST['file_name'];
					
					$file_id = 'F' . $this->manifest_model->get_count_file();
					$file['file_id']		= $file_id;
					$file['date']			= date('Y-m-d H:i:s');
					$file['name']			= $file_name;
					$file['user']			= '12313';
					$this->manifest_model->insert_new_file($file);

					$details['file_id']		= $file_id;
					$details['consign_to']	= $_POST['consign_to'];
					$details['mawb_no']		= $_POST['mawb_no'];
					$details['flight_no']	= $_POST['flight_no'];
					$details['flight_from']	= $_POST['flight_from'];
					$details['flight_to']	= $_POST['flight_to'];
					$details_id = $this->manifest_model->insert_new_manifest_details($details);
					
					
					$inputFileName = PATH_ATTACH . $file_name;
					$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
					$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
					
					$header = array();
					foreach ($sheetData[1] as $key => $value) {
						if($value) $header[strtolower(trim(str_ireplace(' ', '_', $value)))] = $key;
					}
					unset($sheetData[1]);

					$no = 1;
					foreach ($sheetData as $key => $value) {
						if(!empty($value[$header['no']])) {
							$shipper 	= $this->customers_model->get($value[$header['shipper']], 'shipper');
							$cnee 		= $this->customers_model->get($value[$header['cnee']], 'consignee');

							$mapping[$no]['file_id'] 		= $file_id;
							$mapping[$no]['manifest_id'] 	= $details_id;
							$mapping[$no]['no'] 			= $value[$header['no']];
							$mapping[$no]['hawb_no'] 		= $value[$header['hawb_no']];
							$mapping[$no]['shipper'] 		= $value[$header['shipper']];
							$mapping[$no]['cnee'] 			= $value[$header['cnee']];
							$mapping[$no]['pkg'] 			= $value[$header['pkg']];
							$mapping[$no]['description'] 	= $value[$header['description']];
							$mapping[$no]['pcs'] 			= $value[$header['pcs']];
							$mapping[$no]['kg']				= $value[$header['kg']];
							$mapping[$no]['value'] 			= $value[$header['value']];
							$mapping[$no]['pp']				= $value[$header['pp']];
							$mapping[$no]['cc']				= $value[$header['cc']];
							$mapping[$no]['remarks'] 		= $value[$header['remarks']];
							$mapping[$no]['status']			= 'verification';
							$this->manifest_model->insert_new_data($mapping[$no]);
							$no++;
						}
					}
					echo json_encode(array('redirect' => site_url('manifest/verify?file_id=' . $file_id)));
				}
			break;

			case 'fileupload':
				error_reporting(E_ALL | E_STRICT);
				include PATH_APP . 'libraries/UploadHandler.php';
				$upload_handler = new UploadHandler();
			break;
			
			default:
				# code...
				break;
		}
	}
}