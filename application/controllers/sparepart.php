<?php
	class Sparepart extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			session_start(); 
			$this->load->model('model_sparepart');
			$this->load->model('model_service');
			$this->load->library('fpdf');
			if(!$this->session->userdata('adminname'))
				redirect('auth');
		}
		
		function index()
		{
			$datacontent['url'] 			= "sparepart/index";
			$datacontent['sparepart'] 		= $this->model_sparepart->select();
			$this->load->view('cmsadm/menu/sparepart/index',$datacontent);
		}

		function add()
		{
			$datacontent['url'] 		= "sparepart/index";
			$datacontent['action'] 		= 'add';		
			$this->load->view('cmsadm/menu/sparepart/add',$datacontent);
		}

		function actionadd()
		{
			if ($this->input->post('txtOngkosPasang') != "")
			{
				$ongkos = $this->input->post('txtOngkosPasang');
			}
			else
			{
				$ongkos = '0';
			}

			$data = array(
				'chNamaSparepart'    	=> $this->input->post('txtNamaSparepart'),
				'chDescription'     	=> $this->input->post('txtDescription'),
				'inStock'    			=> $this->input->post('txtStock'),
				'chKdSparepart'    	=> $this->input->post('txtKdSparepart'),
				'inHarga'    			=> $this->input->post('txtHarga'),
				'inOngkosPasang'    	=> $ongkos,
				'dtCreateDate'			=> date('Y-m-d H:i:s'),
				'chUserCreate'			=> $this->session->userdata('adminname'),	
			);
			
			$this->model_sparepart->add($data);
			redirect('sparepart/');  
		}
		
		function edit($id)
		{
			$datacontent['url'] 		= "sparepart/index";
			$datacontent['action'] 		= 'edit';
			$datacontent['data'] 		= $this->model_sparepart->get_sparepart($id);

			$this->load->view('cmsadm/menu/sparepart/edit',$datacontent);
		}	
		
		function actionedit()
		{
			if ($this->input->post('txtOngkosPasang') != "")
			{
				$ongkos = $this->input->post('txtOngkosPasang');
			}
			else
			{
				$ongkos = '0';
			}

			$data = array(
				'chNamaSparepart'    	=> $this->input->post('txtNamaSparepart'),
				'chDescription'     	=> $this->input->post('txtDescription'),
				'inStock'    			=> $this->input->post('txtStock'),
				'chKdSparepart'    	=> $this->input->post('txtKdSparepart'),
				'inHarga'    			=> $this->input->post('txtHarga'),
				'inOngkosPasang'    	=> $ongkos,
				'dtUpdateDate'			=> date('Y-m-d H:i:s'),
				'chUserUpdate'			=> $this->session->userdata('adminname'),	
			);
			
			$this->model_sparepart->update($this->input->post('inIDSparepart'),$data);
			redirect('sparepart/'); 
		}
		function delete($id)
		{
			$datacontent['url'] 		= "sparepart/index";
			$datacontent['action'] 		= 'delete';
			$datacontent['data'] 		= $this->model_sparepart->get_member($id);
			$this->load->view('cmsadm/menu/sparepart/delete',$datacontent);
		}
	
		function actiondelete($id)
		{
			$this->model_sparepart->delete($id);
			redirect('sparepart/');  
		} 

		function getStock($id)
	    {
	        $datacontent['data'] 		= $this->model_sparepart->get_sparepart($id);
	        echo $datacontent["data"]["inStock"];
	    }
	    function getHarga($id,$noservice)
	    {
	    	$dataService 		= $this->model_service->get_service($noservice);
	        $dataSparepart	 	= $this->model_sparepart->get_sparepart($id);

	        if ($dataService["0"]["loType"] == 'Offline')
	        	echo $dataSparepart["inHarga"];
	        else
				echo $dataSparepart["inHargaBooking"];
	    }
	    function getOngkos($id)
	    {
	        $datacontent['data'] 		= $this->model_sparepart->get_sparepart($id);
	        echo $datacontent["data"]["inOngkosPasang"];
	    }
	    function reportstock()
		{
			$datacontent['report'] 		= $this->model_sparepart->select();
	        $this->load->view('cmsadm/menu/sparepart/reportstock',$datacontent);
		}
		function viewreport()
		{
			$datacontent['report'] 		= $this->model_sparepart->select();
	        $this->load->view('cmsadm/menu/sparepart/viewreport',$datacontent);
		}
	}
?>
