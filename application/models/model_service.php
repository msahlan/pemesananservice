<?php
	class model_service extends CI_Model 
	{
		protected $_table = 'tserviceh';
		protected $_table1 = 'tserviced';
		function __construct()
		{
			parent::__construct();
		}
		 
		public function checkDuplicate($id,$idsparepart) {
		    $this->db->select('inIDsparepart');
		    $this->db->where('chNoService', $id);
		    $this->db->where('inIDsparepart', $idsparepart);
		    $result = $this->db->get('tserviced');
		    return (bool) $result->num_rows();
		}

		public function getBooking() {
		    $this->db->select('chNoService');
		    $this->db->where('loStatus', 'Booking');
		    $result = $this->db->get('tserviceh');
		    return $result->num_rows();
		}

		function select()
	    {
			$this->db->select('*');
			$this->db->from('tserviceh');
			$this->db->join('mcustomer', 'tserviceh.inIDCustomer = mcustomer.inIDCustomer');
			$this->db->join('mjenisservice', 'tserviceh.inIDJenisService = mjenisservice.inIDJenisService');
			$query = $this->db->get();
			return $query->result_array();
		}
		function getreport($from,$to)
		{
			$this->db->select('*');
			$this->db->from('tserviceh');
			$this->db->join('mcustomer', 'tserviceh.inIDCustomer = mcustomer.inIDCustomer');
			$this->db->join('mjenisservice', 'tserviceh.inIDJenisService = mjenisservice.inIDJenisService');
			$this->db->where('tserviceh.daServiceDate BETWEEN "'. date('Y-m-d', strtotime($from)). '" and "'. date('Y-m-d', strtotime($to)).'"');
			$query = $this->db->get();
			return $query->result_array();
		}
		function selectall($id="",$limit=100,$offset=0,$sort = array())
	    {
			if(! empty($sort))
            $this->db->order_by($sort['field']);
            $query = $this->db->get($this->_table, $limit, $offset);
			return $query->result_array();
		}
		
		function add($data)
	    {
	        $this->db->insert($this->_table, $data);
	    }

	    function adddetail($data)
	    {
	        $this->db->insert($this->_table1, $data);
	    }

	    function detail($id)
	    {
			$this->db->select('*');
			$this->db->from('tserviced');
			$this->db->join('msparepart', 'tserviced.inIDSparepart = msparepart.inIDSparepart');
			$this->db->join('tserviceh', 'tserviceh.chNoService = tserviced.chNoService');

			$this->db->where('tserviced.chNoService', $id);
			$query = $this->db->get();
			return $query->result_array();
		}

		function get_service($id)
		{
			$this->db->select('*');
			$this->db->from('tserviceh');
			$this->db->join('mcustomer', 'tserviceh.inIDCustomer = mcustomer.inIDCustomer');
			$this->db->join('mjenisservice', 'tserviceh.inIDJenisService = mjenisservice.inIDJenisService');

			$this->db->where('tserviceh.chNoService', $id);
			$query = $this->db->get();
			return $query->result_array();

		}

		function get_subtotal($noservice)
		{
			$this->db->select('SUM(inSubTotalHarga) as inSubTotalHarga');
			$this->db->where('chNoService',$noservice);
			$query=$this->db->get('tserviced');
			$result = $query->row_array();
			return $result;
		}

		function get_itemsubtotal($noservice,$idsparepart)
		{
			$this->db->select('inSubTotalHarga');
			$this->db->where('chNoService',$noservice);
			$this->db->where('inIDSparepart',$idsparepart);
			$query=$this->db->get('tserviced');
			$result = $query->row_array();
			return $result;
		}

		function update($id, $data)
	    {
			$this->db->where('chNoService', $id);
			$this->db->update($this->_table, $data); 
		}
		
		function updatedetail($id, $idsparepart, $data)
	    {
			$this->db->where('chNoService', $id);
			$this->db->where('inIDSparepart', $idsparepart);
			$this->db->update($this->_table1, $data); 
		}
		
		function delete($noservice,$idsparepart)
		{
			$this->db->delete($this->_table1, array('chNoService' => $noservice,'inIDSparepart' => $idsparepart)); 
		}

		function autonumber() 
	   	{
		  $tahun = date("Y");
		  $bulan = date("m");
		  $hari = date("d");
		  $kode = 'SRV';
		  $query = $this->db->query("SELECT MAX(chNoService) as max_id FROM tserviceh"); 
		  $row = $query->row_array();
		  $max_id = $row['max_id']; 
		  $max_id1 =(int) substr($max_id,11,5);
		  
		  if($max_id1 == 99999)
		  	$max_id1 = 0;
		  else
		  	$max_id1 = $max_id1;
		  
		  $counter = $max_id1 + 1;
		  
		  $autonumber = $kode.$tahun.$bulan.$hari.sprintf("%05s",$counter);
		  return $autonumber;
	 	}
	}
?>
