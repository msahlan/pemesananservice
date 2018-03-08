<?php
	class model_user extends CI_Model 
	{
		protected $_table = 'muser';
		function __construct()
		{
			parent::__construct();
		}
		 
		public function checkDuplicate($id) {
		    $this->db->select('chUsername');
		    $this->db->where('chUsername', $id);
		    $result = $this->db->get('muser');
		    return (bool) $result->num_rows();
		}

		function select($limit=100,$offset=0)
	    {
			$query = $this->db->get($this->_table, $limit, $offset);
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

	    function get_role(){
	    	$query = $this->db->select('*')
	    		->from('muser')
	    		->where('chLevel', 'administrator')
	    		->get();

	    	// $query = $this->db->get();         
			return $query->result_array ();  
	    }

		function get_user($categoryid)
		{
			$query   = $this->db->get_where($this->_table, array('chUsername' => $categoryid));
			return $query->row_array();
		}

		function update($id, $data)
	    {
			$this->db->where('inIDUser', $id);
			$this->db->update($this->_table, $data); 
		}
		
		function delete($data)
		{
			$this->db->delete($this->_table, array('inIDUser' => $data)); 
		}

	}
?>
