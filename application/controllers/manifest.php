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
	
	function current_rate(){
		$from = "TWD";
		$to = "IDR";
		$amount = 321;
		$url = "http://www.exchangerate-api.com/".$from."/".$to."/".$amount."?k=API_KEY";
		$result = file_get_contents($url);
		echo $result;
	}

	function data() {
		if($this->session->userdata('login') != TRUE) redirect(base_url());

		$data = array('list_file' => $this->manifest_model->get_file(), 'list_shipper' => $this->customers_model->get_list('shipper'), 'list_consignee' => $this->customers_model->get_list('consignee'));
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
				if(isset($_GET['date']) && !empty($_GET['date'])) $where['LEFT(F.created_date,10)']  = $_GET['date'];
				if(isset($_GET['shipper']) && !empty($_GET['shipper'])) $where['D.shipper']  = $_GET['shipper'];
				if(isset($_GET['consignee']) && !empty($_GET['consignee'])) $where['D.consignee']  = $_GET['consignee'];

				$where['D.status'] = 'VALID';

				$data_ = array('manifest' => $this->manifest_model->get_filtering_data($start,$limit,$where));
				$data__ = array('total_row' => count($this->manifest_model->get_filtering_data(null,null,$where)), 'page' => $page, 'limit' => $limit);

				$manifest_html = $this->load->view('manifest/get_html_data',$data_,true);
				$pagination_html = $this->load->view('manifest/get_html_pagination',$data__,true);
				echo json_encode(array('data' => $manifest_html, 'pagination', 'pagination' => $pagination_html));
			break;

			case 'upload':
				if(strtolower($_POST['manifest_type']) == 'import') {
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
							$file['created_date'] 	= date('Y-m-d h:i:s');
							$file['user_id']	 	= $this->session->userdata('user_id');
							$file['mawb_no'] 		= $_POST['mawb_no'];
							$file['gross_weight'] 	= $_POST['gross_weight'];
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
										$new_data_id = 'THS' . date('ymdhis') . $this->manifest_model->data_new_id();
										$rand_data_id = str_shuffle($new_data_id.time());

										$mapping[$no]['data_id'] 		= $new_data_id;
										$mapping[$no]['file_id'] 		= $file['file_id'];
										$mapping[$no]['data_no'] 		= $value[$header['no']];
										$mapping[$no]['hawb_no'] 		= $value[$header['hawb_no']];
										$mapping[$no]['shipper'] 		= $this->tools->remove_tags_excel($value[$header['shipper']]);
										$mapping[$no]['consignee'] 		= $this->tools->remove_tags_excel($value[$header['consignee']]);
										$mapping[$no]['pkg'] 			= $value[$header['pkg']];
										$mapping[$no]['description'] 	= $value[$header['description']];
										$mapping[$no]['pcs'] 			= $value[$header['pcs']];
										$mapping[$no]['kg']				= $this->tools->rounded($value[$header['kg']]);
										$mapping[$no]['value'] 			= $value[$header['value']];
										$mapping[$no]['prepaid']		= $value[$header['pp']];
										$mapping[$no]['collect']		= $value[$header['cc']];
										$mapping[$no]['remarks'] 		= $value[$header['remarks']];
										$mapping[$no]['status']			= 'NOT VERIFIED';
										$mapping[$no]['nt_kurs']		= $this->tools->get_kurs();
										$mapping[$no]['created_date']	= date('Y-m-d h:i:s');
										$mapping[$no]['last_update']	= date('Y-m-d h:i:s');
										$mapping[$no]['user_id']		= $this->session->userdata('user_id');
										$mapping[$no]['status_payment']		= 'UNPAID';
										$mapping[$no]['status_delivery']	= 'PENDING';
										$mapping[$no]['other_charge_tata']	= $value[$header['other_charge_tata']];
										$mapping[$no]['other_charge_pml']	= $value[$header['other_charge_pml']];
										$mapping[$no]['mawb_type']			= $value[$header['mawb_type']];
										$mapping[$no]['rand_data_id']		= $rand_data_id;
										$this->manifest_model->data_insert_new($mapping[$no]);
										$this->qr_code->generate($new_data_id,base_url().'tracking/'.$rand_data_id);
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
				} else if(strtolower($_POST['manifest_type']) == 'export') {
					echo 'test';
				}
			break;

		case 'update':
			$data_id = $_POST['data_id'];
			$mapping['hawb_no'] 		= $_POST['hawb_no'];
			$mapping['pkg'] 			= $_POST['pkg'];
			$mapping['description'] 	= $_POST['description'];
			$mapping['pcs'] 			= $_POST['pcs'];
			$mapping['kg']				= $_POST['kg'];
			$mapping['value'] 			= $_POST['value'];
			$mapping['prepaid']			= $_POST['prepaid'];
			$mapping['collect']			= $_POST['collect'];
			$mapping['other_charge_tata'] 	= $_POST['other_charge_tata'];
			$mapping['other_charge_pml'] 	= $_POST['other_charge_pml'];
			$this->manifest_model->data_update($mapping,$data_id);
			echo json_encode(array('data_id'=>$data_id));
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

	function modal($method = null){
		switch ($method) {
			case 'details':
				$data_id = $_GET['data_id'];

				$data['data'] = $this->manifest_model->get_by_data_id($data_id);
				$this->set_modal('manifest/details',$data);
				break;
			
			case 'edit':
				$data_id = $_GET['data_id'];

				$data['data'] = $this->manifest_model->get_by_data_id($data_id);
				$this->set_modal('manifest/edit',$data);
				break;
			default:
				# code...
				break;
		}
	}
}