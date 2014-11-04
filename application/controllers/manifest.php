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
		if(!isset($_GET['file_id'])) {
			$where = array('D.status' => 'NOT VERIFIED');
			$data = array('list_file' => $this->manifest_model->get_filtering_data(null,null,$where,'F.FILE_NAME'));
			$this->set_layout('manifest/verification_all',$data);
		} else {
			$file_id = $_GET['file_id'];
			$where = array('F.file_id' => $file_id);
			$data = array('file' => $this->manifest_model->get_by_file_id($file_id), 'list_data' => $this->manifest_model->get_filtering_data(null,null,$where));
			$this->set_layout('manifest/verification_file',$data);			
		}
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
				if(isset($_GET['file_name']) && !empty($_GET['file_name'])) $where['F.file_id']  = $_GET['file_name'];
				if(isset($_GET['date']) && !empty($_GET['date'])) $where['F.created_date']  = $_GET['date'];

				$data_ = array('manifest' => $this->manifest_model->get_filtering_data($start,$limit,$where));
				$data__ = array('total_row' => count($this->manifest_model->get_filtering_data(null,null,$where)), 'page' => $page, 'limit' => $limit);

				$manifest_html = $this->load->view('manifest/get_html_data',$data_,true);
				$pagination_html = $this->load->view('manifest/get_html_pagination',$data__,true);
				echo json_encode(array('data' => $manifest_html, 'pagination', 'pagination' => $pagination_html));
			break;

			case 'upload':
				include PATH_APP . 'libraries/PHPExcel/IOFactory.php';
				$status = ''; $message = ''; $redirect = '';

				$config['allowed_types'] = '*';
				$config['upload_path'] = PATH_ATTACH;
				$this->load->library('upload', $config);

				if ($this->upload->do_upload()) {
					$file_data = $this->upload->data();

					if(count($_POST) > 0) {
						$file['file_id']		= 'FILE' . date('ymdhis') . $this->manifest_model->file_new_id();
						$file['file_name'] 		= $file_data['file_name'];
						$file['consign_to'] 	= $_POST['consign_to'];
						$file['flight_from'] 	= $_POST['flight_from'];
						$file['flight_to'] 		= $_POST['flight_to'];
						$file['mawb_no'] 		= $_POST['mawb_no'];
						$this->manifest_model->file_insert_new($file);

						$inputFileName = PATH_ATTACH . $file_data['file_name'];
						$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
						$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
						
						$header_format = $this->manifest_model->get_header_format();
						$header = array();
						foreach ($sheetData[1] as $key => $value) {
							$value = strtolower(trim(str_ireplace(' ', '_', $value)));
							if(strlen($value) > 0) {
								if(in_array($value, $header_format)) $header[$value] = $key;
							}
						}
						unset($sheetData[1]);

						if(count($header_format) == count($header)) {
							$no = 1;
							foreach ($sheetData as $key => $value) {
								if(!empty($value[$header['no']])) {
									$mapping[$no]['data_id'] 		= 'THS' . date('ymdhis') . $this->manifest_model->data_new_id();
									$mapping[$no]['file_id'] 		= $file['file_id'];
									$mapping[$no]['data_no'] 		= $value[$header['no']];
									$mapping[$no]['hawb_no'] 		= $value[$header['hawb_no']];
									$mapping[$no]['shipper'] 		= $this->tools->remove_tags_excel($value[$header['shipper']]);
									$mapping[$no]['consignee'] 		= $this->tools->remove_tags_excel($value[$header['consignee']]);
									$mapping[$no]['pkg'] 			= $value[$header['pkg']];
									$mapping[$no]['description'] 	= $value[$header['description']];
									$mapping[$no]['pcs'] 			= $value[$header['pcs']];
									$mapping[$no]['kg']				= $value[$header['kg']];
									$mapping[$no]['value'] 			= $value[$header['value']];
									$mapping[$no]['prepaid']		= $value[$header['pp']];
									$mapping[$no]['collect']		= $value[$header['cc']];
									$mapping[$no]['remarks'] 		= $value[$header['remarks']];
									$mapping[$no]['status']			= 'NOT VERIFIED';
									$mapping[$no]['created_date']	= date('Y-m-d h:i:s');
									$mapping[$no]['last_update']	= date('Y-m-d h:i:s');
									$mapping[$no]['user_id']		= $this->session->userdata('user_id');
									
									$this->manifest_model->data_insert_new($mapping[$no]);
									$no++;
								}
							}
							$redirect = site_url('manifest/verification?file_id=' . $file['file_id']);
						} else {
							$status = 'error';
							$message = 'Format header incorrect, please check and try again';
						}
					}
				} else {
					$status = 'error';
					$message = $this->upload->display_errors();
				}
				echo json_encode(array('status' => $status, 'message' => $message, 'redirect' => $redirect));
			break;
		case 'get_data':
			$data_id = $_POST['data_id'];
			$data = $this->manifest_model->get_by_data_id($data_id);
			echo json_encode($data);
			break;

		case 'verification':
			$file_id = $_POST['file_id'];
			$this->manifest_model->set_status_data($file_id,'VALID');
			break;
			
			default:
				# code...
				break;
		}
	}
}