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

	function verification() {
		$where['FILE_ID'] = $_GET['FILE_ID'];
		$where['status'] = 'NOT VERIFIED';
		$data = array('manifest' => $this->manifest_model->get_filtering_data(null,null,$where));
		$this->set_layout('manifest/verification',$data);
	}
	
	function data() {
		if($this->session->userdata('login') != TRUE) redirect(base_url());

		$data = array('list_file' => $this->manifest_model->get_file());
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

				$config['allowed_types'] = '*';
				$config['upload_path'] = PATH_ATTACH;
				$this->load->library('upload', $config);

				if ($this->upload->do_upload()) {
					$FILE_DATA = $this->upload->data();

					if(count($_POST) > 0) {
						$file_name 		= $FILE_DATA['file_name'];
						$consign_to 	= $_POST['consign_to'];
						$flight_from 	= $_POST['flight_from'];
						$flight_to 		= $_POST['flight_to'];
						$mawb_no 		= $_POST['mawb_no'];

						//Insert New FIle
						$FILE_ID = $this->manifest_model->file_insert_new($file_name,$consign_to,$mawb_no,$flight_from,$flight_to);

						$inputFileName = PATH_ATTACH . $file_name;
						$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
						$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
						
						$header = array();
						foreach ($sheetData[1] as $key => $value) { if($value) $header[strtolower(trim(str_ireplace(' ', '_', $value)))] = $key; }
						unset($sheetData[1]);

						$no = 1;
						foreach ($sheetData as $key => $value) {
							if(!empty($value[$header['no']])) {
								#$shipper 	= $this->customers_model->get($value[$header['shipper']], 'SHIPPER');
								#$consignee	= $this->customers_model->get($value[$header['cnee']], 'CONSIGNEE');

								$mapping[$no]['DATA_ID'] 		= 'THS' . date('ymdhis') . $this->manifest_model->data_new_id();
								$mapping[$no]['FILE_ID'] 		= $FILE_ID;
								$mapping[$no]['DATA_NO'] 		= $value[$header['no']];
								$mapping[$no]['HAWB_NO'] 		= $value[$header['hawb_no']];
								$mapping[$no]['SHIPPER'] 		= $this->tools->remove_tags_excel($value[$header['shipper']]);
								$mapping[$no]['CONSIGNEE'] 		= $this->tools->remove_tags_excel($value[$header['cnee']]);
								$mapping[$no]['PKG'] 			= $value[$header['pkg']];
								$mapping[$no]['DESCRIPTION'] 	= $value[$header['description']];
								$mapping[$no]['PCS'] 			= $value[$header['pcs']];
								$mapping[$no]['KG']				= $value[$header['kg']];
								$mapping[$no]['VALUE'] 			= $value[$header['value']];
								$mapping[$no]['PREPAID']		= $value[$header['pp']];
								$mapping[$no]['COLLECT']		= $value[$header['cc']];
								$mapping[$no]['REMARKS'] 		= $value[$header['remarks']];
								$mapping[$no]['STATUS']			= 'NOT VERIFIED';
								$mapping[$no]['CREATE_DATE']	= date('Y-m-d h:i:s');
								$mapping[$no]['LAST_UPDATE']	= date('Y-m-d h:i:s');
								$mapping[$no]['USER_ID']		= $this->session->userdata('user_id');
								
								$this->manifest_model->data_insert_new($mapping[$no]);
								$no++;
							}
						}
						echo json_encode(array('redirect' => site_url('manifest/verification?FILE_ID=' . $FILE_ID)));
					}
				} else {
					echo json_encode(array('status' => 'error', 'message' => $this->upload->display_errors()));
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