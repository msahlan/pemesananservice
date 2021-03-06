<?php
	class Progress extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			session_start(); 
			$this->load->model('model_progress');
			$this->load->model('model_service');
			$this->load->model('model_customer');
			if(!$this->session->userdata('adminname'))
				redirect('auth');
		}
		
		function index()
		{
			$datacontent['url'] 			= "progress/index";
			$datacontent['progress'] 		= $this->model_progress->select();
			$this->load->view('cmsadm/menu/progress/index',$datacontent);
		}

		function detail($id,$status)
		{
			$datacontent['id'] 			= $id;
			$datacontent['status'] 		= $status;
			$datacontent['detail'] 		= $this->model_progress->detail($id);

			$this->load->view('cmsadm/menu/progress/detail',$datacontent);
		}

		function actionprogress($id,$idcust)
		{
			$data = array(
				'loStatus'	    	=> 'OnProgress',
				'dtUpdateDate'		=> date('Y-m-d H:i:s'),
				'chUserUpdate'		=> $this->session->userdata('adminname'),	
			);
			$email 					= $this->model_customer->get_customer($idcust);
			$noservice 				= $this->model_service->get_service($id);
			$this->model_progress->update($id,$data);
			$this->send_mail($email['chEmail'],$email['chCustomerName'],$noservice['0']['chNoMotor'],
				$noservice['0']['daServiceDate'],$noservice['0']['chTime'],$noservice['0']['chProblem']);
			redirect('progress/');  
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
	    $ci->email->subject('Pengerjaan Service Sepeda Motor'); 
	    $message = "Booking service sepeda motor anda sedang dalam proses pengerjaan, dengan detail sebagai berikut :";
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
	    $ci->email->message($message);
	    $ci->email->send();
	  	} 
	}
?>