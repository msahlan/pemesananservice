<?php
	class model_sparepart extends CI_Model 
	{
		protected $_table = 'msparepart';
		function __construct()
		{
			parent::__construct();
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
		function get_sparepart($categoryid)
		{
			$query   = $this->db->get_where($this->_table, array('inIDSparepart' => $categoryid));
			return $query->row_array();
		}

		function update($id, $data)
	    {
			$this->db->where('inIDSparepart', $id);
			$this->db->update($this->_table, $data); 
		}
		
		function delete($data)
		{
			$this->db->delete($this->_table, array('inIDSparepart' => $data)); 
		}

	}
?>
