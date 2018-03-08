<?php
	class Confirm extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			session_start(); 
			$this->load->model('model_confirm');
			$this->load->model('model_service');
			$this->load->model('model_customer');
			if(!$this->session->userdata('adminname'))
				redirect('auth');
		}
		
		function index()
		{
			$datacontent['url'] 			= "confirm/index";
			$datacontent['confirm'] 		= $this->model_confirm->select();
			$mekanik = get_combobox("SELECT inIDMekanik,chNamaMekanik from mmekanik where inIDMekanik IN (select inIDMekanik from tserviceh where inIDMekanik IS NOT NULL and (loStatus = 'Closed' or loStatus = 'Cancel'))", "inIDMekanik", "chNamaMekanik","Pilih Mekanik");
			$datacontent['mekanik']			= $mekanik;
			$this->load->view('cmsadm/menu/confirm/index',$datacontent);
		}

		function detail($id,$status)
		{
			$datacontent['id'] 			= $id;
			$datacontent['status'] 		= $status;
			$datacontent['detail'] 		= $this->model_confirm->detail($id);

			$this->load->view('cmsadm/menu/confirm/detail',$datacontent);
		}

		function actionconfirm($id,$idcust)
		{
			$data = array(
				'loStatus'	    	=> 'Confirm',
				'inIDMekanik'	    => $this->input->post('cmbMekanik'),
				'dtUpdateDate'		=> date('Y-m-d H:i:s'),
				'chUserUpdate'		=> $this->session->userdata('adminname'),	
			);
			$email 					= $this->model_customer->get_customer($idcust);
			$noservice 				= $this->model_service->get_service($id);
			$this->model_confirm->update($id,$data);
			$this->send_mail($email['chEmail'],$email['chCustomerName'],$noservice['0']['chNoMotor'],
				$noservice['0']['daServiceDate'],$noservice['0']['chTime'],$noservice['0']['chProblem']);
			redirect('confirm/');  
		} 
	 	function send_mail($email,$nama,$motor,$tanggal,$jam,$problem) { 

		$ci = get_instance();
		$ci->load->library('email');
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://smtp.gmail.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "cs.bengkelservice@gmail.com"; 
		$config['smtp_pass'] = "admin1234567890";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";

		$ci->email->initialize($config);

	 	$ci->email->from('cs.bengkelservice@gmail.com', 'Bengkel Jaya Makmur'); 
	    $ci->email->to($email);
	    $ci->email->subject('Konfirmasi Booking Service Sepeda Motor'); 
	    $message = "Booking service sepeda motor anda sudah kami konfirmasi, dengan detail sebagai berikut :";
	    $message .= "<br />";
	    $message .= "Nama     : ".$nama;
	    $message .= "<br />";
	    $message .= "No Motor     : ".$motor;
	    $message .= "<br />";
	    $message .= "Tanggal     : ".$tanggal;
	    $message .= "<br />";
	    $message .= "Jam     : ".$jam;
	    $message .= "<br />";
	    $message .= "Keluhan     : ".$problem;
	    $message .= "<br /><br /><br />";
	    $message .= "Mohon datang 30 Menit sebelum jam yang telah ditentukan";
	    $ci->email->message($message);
	    $ci->email->send();
	  	} 
	}
?>