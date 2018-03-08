<?php
	class Service extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			session_start(); 
			$this->load->model('model_service');
			$this->load->model('model_sparepart');
			$this->load->model('model_jenisservice');
			$this->load->library('form_validation');
			if(!$this->session->userdata('adminname'))
				redirect('auth');
		}
		
		public function check_duplicate() {
		    return $this->model_service->checkDuplicate($this->input->post('txtNoService'),
		    	$this->input->post('cmbSparepart')) == false;
		}

		function index()
		{
			$datacontent['url'] 			= "service/index";
			$datacontent['service'] 		= $this->model_service->select();
			$this->load->view('cmsadm/menu/service/index',$datacontent);
		}

		function detail($id,$status)
		{
			$datacontent['id'] 			= $id;
			$datacontent['status'] 		= $status;
			$datacontent['detail'] 		= $this->model_service->detail($id);

			$this->load->view('cmsadm/menu/service/detail',$datacontent);
		}

		function add()
		{
			$datacontent['url'] 		= "service/index";
			$datacontent['action'] 		= 'add';		
			$customer = get_combobox("SELECT inIDCustomer, chCustomerName from mcustomer order by chCustomerName asc", "inIDCustomer", "chCustomerName","Pilih Customer");
			$platno = array ();
			$mekanik = get_combobox("SELECT inIDMekanik, chNamaMekanik from mmekanik order by chNamaMekanik asc", "inIDMekanik", "chNamaMekanik","Pilih Mekanik");
			$jeniservice = get_combobox("SELECT inIDJenisService, chJenisService from mjenisservice order by chJenisService asc", "inIDJenisService", "chJenisService","Pilih Jenis Service");
			$datacontent = array('customer'			=> $customer,
								 'jenisservice'		=> $jeniservice,
								 'platno'			=> $platno,
								 'mekanik'			=> $mekanik,);
			$this->load->view('cmsadm/menu/service/add',$datacontent);
		}

		function adddetail($noservice,$status)
		{
			$datacontent['url'] 		= "service/index";
			$datacontent['action'] 		= 'add';	
			$sparepart = get_combobox("SELECT inIDSparepart, chNamaSparepart from msparepart order by chNamaSparepart asc", "inIDSparepart", "chNamaSparepart","Pilih Sparepart");
			$datacontent = array('sparepart'		=> $sparepart);
			$datacontent['noservice'] 	= $noservice;		
			$datacontent['status'] 		= $status;		
			$datacontent['reset'] 		= TRUE;
			$this->load->view('cmsadm/menu/service/adddetail',$datacontent);
		}

		function actionadd()
		{
			$autonumber 				= $this->model_service->autonumber();
			$datacontent['jenis'] 		= $this->model_jenisservice->get_jenisservice($this->input->post('cmbJenisService'));
			$data = array(
				'chNoService'    	    => $autonumber,
				'inIDCustomer'    		=> $this->input->post('cmbCustomer'),
				'inIDJenisService'    	=> $this->input->post('cmbJenisService'),
				'inIDMekanik'    		=> $this->input->post('cmbMekanik'),
				'chNoMotor'    			=> $this->input->post('cmbPlatNomor'),
				'chTime'    			=> $this->input->post('dpTime'),
				'daServiceDate'    		=> $this->input->post('txtTglService'),
				'chProblem'    			=> $this->input->post('txtKeluhan'),
				'loStatus'    			=> 'Confirm',
				'loType'				=> 'Offline',
				'inTotalHarga'			=> $datacontent['jenis']['inHarga'],
				'dtCreateDate'			=> date('Y-m-d H:i:s'),
				'chUserCreate'			=> $this->session->userdata('adminname'),	
			);
			
			$this->model_service->add($data);
			redirect('service/');  
		}

		function actionadddetail($noservice,$status)
		{
			$this->form_validation->set_rules('inIDSparepart', 'Sparepart', 'callback_check_duplicate');
    		$this->form_validation->set_message('check_duplicate', 'Sparepart already exists');
    		if ($this->form_validation->run()) {

				$data = array(
					'chNoService'    	    => $noservice,
					'inIDSparepart'    		=> $this->input->post('cmbSparepart'),
					'inQty'    				=> $this->input->post('txtQty'),
					'inSubTotalHarga'		=> ($this->input->post('txtQty') * $this->input->post('txtHarga')) + 
												$this->input->post('txtOngkosPasang'),
					'dtCreateDate'			=> date('Y-m-d H:i:s'),
					'chUserCreate'			=> $this->session->userdata('adminname'),	
				);
				$dataStock = array(
					'inIDSparepart'    		=> $this->input->post('cmbSparepart'),
					'inStock'    			=> $this->input->post('txtStock') - $this->input->post('txtQty'),
					'dtUpdateDate'			=> date('Y-m-d H:i:s'),
					'chUserUpdate'			=> $this->session->userdata('adminname'),
				);
				
				$this->model_service->adddetail($data);
				$this->model_sparepart->update($this->input->post('cmbSparepart'),$dataStock);

				//update total harga header
				//$datacontent 				= $this->model_service->get_subtotal($noservice);
				$datacontent 				= $this->model_service->get_itemsubtotal($noservice,
											  $this->input->post('cmbSparepart'));
    			$dataTotal					= $this->model_service->get_service($noservice);
				$dataHeader = array(
					'chNoService'    		=> $noservice,
					'inTotalHarga'    		=> $dataTotal['0']['inTotalHarga'] + $datacontent['inSubTotalHarga'],
					'dtUpdateDate'			=> date('Y-m-d H:i:s'),
					'chUserUpdate'			=> $this->session->userdata('adminname'),
				);

				$this->model_service->update($noservice,$dataHeader);
				//--------------------------------------------------------------------------------------------------
				redirect('service/detail/'.$noservice.'/'.$status);  
			}
			else
			{
				$sparepart = get_combobox("SELECT inIDSparepart, chNamaSparepart from msparepart order by chNamaSparepart asc", "inIDSparepart", "chNamaSparepart","Pilih Sparepart");
				$data = array('sparepart'		=> $sparepart);
				$data['inIDSparepart'] 			= $this->input->post('cmbSparepart');
				$data['inQty'] 					= $this->input->post('txtQty');	
				$data['inStock'] 				= $this->input->post('txtStock');	
				$data['inHarga'] 				= $this->input->post('txtHarga');	
				$data['inOngkosPasang'] 		= $this->input->post('txtOngkosPasang');	
				$data['noservice'] 				= $noservice;
				$data['status'] 				= $status;
				$data['reset'] 					= FALSE;
				$this->load->view('cmsadm/menu/service/adddetail',$data);
			}
		}
		
		function edit($id,$status)
		{
			$datacontent['url'] 					= "service/index";
			$datacontent['action'] 					= 'edit';
			$datamotor			 					= $this->model_service->get_service($id);
			$customer = get_combobox("SELECT inIDCustomer, chCustomerName from mcustomer order by chCustomerName asc", "inIDCustomer", "chCustomerName","Pilih Customer");
			$query = sprintf("SELECT chNoMotor from mcustmotor where inIDCustomer = '%s' order by chNoMotor asc", $datamotor['0']['inIDCustomer']); 
			$mekanik = get_combobox("SELECT inIDMekanik, chNamaMekanik from mmekanik order by chNamaMekanik asc", "inIDMekanik", "chNamaMekanik","Pilih Mekanik");
			$platno = get_combobox($query, "chNoMotor", "chNoMotor","Pilih Motor");
			$jeniservice = get_combobox("SELECT inIDJenisService, chJenisService from mjenisservice order by chJenisService asc", "inIDJenisService", "chJenisService","Pilih Jenis Service");
			$datacontent = array('customer'			=> $customer,
								 'jenisservice'		=> $jeniservice,
								 'platno'			=> $platno,
								 'mekanik'			=> $mekanik,
								 );
			$datacontent['data'] 					= $this->model_service->get_service($id);
			$datacontent['dataJenis'] 				= $this->model_jenisservice->get_jenisservice
													  ($datacontent['data']['0']['inIDJenisService']);
		  	$datacontent['noservice'] 				= $id;
		  	$datacontent['status'] 					= $status;
			$this->load->view('cmsadm/menu/service/edit',$datacontent);
		}	

		function editdetail($noservice,$idsparepart,$status,$type)
		{
			$datacontent['url'] 			= "service/index";
			$datacontent['action'] 			= 'add';	
			$sparepart = get_combobox("SELECT inIDSparepart, chNamaSparepart from msparepart order by chNamaSparepart asc", "inIDSparepart", "chNamaSparepart","Pilih Sparepart");
			$datacontent = array('sparepart'		=> $sparepart);
			$datacontent['noservice'] 		= $noservice;		
			$datacontent['idsparepart']	 	= $idsparepart;		
			$datacontent['status'] 			= $status;	
			$datacontent['type'] 			= $type;	
			$datacontent['dataSparepart'] 	= $this->model_sparepart->get_sparepart($idsparepart);	
			$datacontent['data'] 			= $this->model_service->detail($noservice);
			$this->load->view('cmsadm/menu/service/editdetail',$datacontent);
		}
		
		function actionedit($noservice)
		{
			//update total harga header
			$datacontent 				= $this->model_service->get_subtotal($noservice);
			$dataJenis					= $this->model_jenisservice->get_jenisservice($this->input->post('cmbJenisService'));
			$dataService				= $this->model_service->get_service($noservice);
			if($datacontent['inSubTotalHarga'] == "")
				$subtotal = 0;
			else
				$subtotal = $datacontent['inSubTotalHarga'];

			if ($dataService['0']['loType'] == "Offline")
				$harga = $dataJenis['inHarga'];
			else
				$harga = $dataJenis['inHargaBooking'];

			$data = array(
				'chNoService'    		=> $noservice,
				'inIDJenisService'    	=> $this->input->post('cmbJenisService'),
				'inIDMekanik'    		=> $this->input->post('cmbMekanik'),
				'chNoMotor'		    	=> $this->input->post('cmbPlatNomor'),
				'chTime'    			=> $this->input->post('dpTime'),
				'daServiceDate'    		=> $this->input->post('txtTglService'),
				'chProblem'    			=> $this->input->post('txtKeluhan'),
				'inTotalHarga'    		=> $harga + $subtotal,
				'dtUpdateDate'			=> date('Y-m-d H:i:s'),
				'chUserUpdate'			=> $this->session->userdata('adminname'),
			);
			$this->model_service->update($noservice,$data);
			//--------------------------------------------------------------------------------------------------
			redirect('service/'); 
		}

		function actioneditdetail($noservice,$idsparepart,$status)
		{
			$data = array(
				'chNoService'    	    => $noservice,
				'inIDSparepart'    		=> $idsparepart,
				'inQty'    				=> $this->input->post('txtQty'),
				'inSubTotalHarga'		=> ($this->input->post('txtQty') * $this->input->post('txtHarga')) + 
											$this->input->post('txtOngkosPasang'),
				'dtUpdateDate'			=> date('Y-m-d H:i:s'),
				'chUserUpdate'			=> $this->session->userdata('adminname'),
			);
			$dataStock = array(
				'inIDSparepart'    		=> $idsparepart,
				'inStock'    			=> ($this->input->post('txtStock') + $this->input->post('txtQtyOld')) -
										    $this->input->post('txtQty'),
				'dtUpdateDate'			=> date('Y-m-d H:i:s'),
				'chUserUpdate'			=> $this->session->userdata('adminname'),
			);
			
			$this->model_service->updatedetail($noservice,$idsparepart,$data);
			$this->model_sparepart->update($idsparepart,$dataStock);

			//update total harga header
			$datacontent 				= $this->model_service->get_subtotal($noservice);
			$dataTotal					= $this->model_service->get_service($noservice);
			$dataJenis					= $this->model_jenisservice->get_jenisservice($dataTotal['0']['inIDJenisService']);

			if ($dataTotal['0']['loType'] == "Offline")
				$harga = $dataJenis['inHarga'];
			else
				$harga = $dataJenis['inHargaBooking'];

			$dataHeader = array(
				'chNoService'    		=> $noservice,
				'inTotalHarga'    		=> $harga + $datacontent['inSubTotalHarga'],
				'dtUpdateDate'			=> date('Y-m-d H:i:s'),
				'chUserUpdate'			=> $this->session->userdata('adminname'),
			);
			$this->model_service->update($noservice,$dataHeader);
			//--------------------------------------------------------------------------------------------------
			redirect('service/detail/'.$noservice.'/'.$status);   
		}
	
		function actiondelete($noservice,$idsparepart,$status,$qty)
		{
			//update total harga header
			//$datacontent 				= $this->model_service->get_subtotal($noservice);
			$datacontent 				= $this->model_service->get_itemsubtotal($noservice,$idsparepart);
			$dataTotal					= $this->model_service->get_service($noservice);
			$dataHeader = array(
				'chNoService'    		=> $noservice,
				'inTotalHarga'    		=> $dataTotal['0']['inTotalHarga'] - $datacontent['inSubTotalHarga'],
				'dtUpdateDate'			=> date('Y-m-d H:i:s'),
				'chUserUpdate'			=> $this->session->userdata('adminname'),
			);

			$this->model_service->update($noservice,$dataHeader);
			//--------------------------------------------------------------------------------------------------

			$this->model_service->delete($noservice,$idsparepart);
			$datacontent['data'] 		= $this->model_sparepart->get_sparepart($idsparepart);
			$stock 						= $datacontent['data']['inStock'];
			//update stock
			$data = array(
				'inIDSparepart'    		=> $idsparepart,
				'inStock'    			=> $stock + $qty,
				'dtUpdateDate'			=> date('Y-m-d H:i:s'),
				'chUserUpdate'			=> $this->session->userdata('adminname'),	
			);
			$this->model_sparepart->update($idsparepart,$data);
			//-----------------------------------------------------------------------
			redirect('service/detail/'.$noservice.'/'.$status);  
		} 
		function getBooking()
	    {
	        $datacontent 		= $this->model_service->getBooking();
	        echo $datacontent;
	    }
	    function reportservice()
		{
			$datacontent['report'] 		= $this->model_service->select();
	        $this->load->view('cmsadm/menu/service/report',$datacontent);
		}
		function viewreport()
		{
			$datacontent['report'] 		= $this->model_service->getreport($this->input->post('txtTglFrom'),$this->input->post('txtTglTo'));
			$datacontent['from']		= $this->input->post('txtTglFrom');
			$datacontent['to']			= $this->input->post('txtTglTo');
	        $this->load->view('cmsadm/menu/service/viewreport',$datacontent);
		}
		function report($from,$to)
		{
			$this->load->library('mpdf/mpdf');
			$mpdf=new mPDF('utf-8','Legal','','','5','5','5','5','5','5','P'); 
			//$mpdf->useOnlyCoreFonts = true;
			$mpdf->SetProtection(array('print'));
			$mpdf->SetAuthor("Hendz");
			$arrReport = $this->model_service->getreport($from,$to);
			$data = array('report' 		=> $arrReport);
			$html = $this->load->view('cmsadm/menu/service/reportservice', $data, true);
			$filename = "reportservice";
			$this->mpdf->WriteHTML($html);
			$this->mpdf->Output();
		}
	}
?>
