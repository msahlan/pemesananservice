<?php
class model_administrator extends CI_Model 
{
	protected $_table = 'muser';
	function __construct()
	{
		parent::__construct();
	}
	 
	function select(){
		$this->db->select('*');
		$this->db->from('muser');
		$query = $this->db->get();

		return $query->result_array();
	}
	
	public function checkValid($user,$password) {
	    $this->db->select('chUsername');
	    $this->db->where('chUsername', $user);
	    $this->db->where('chPassword', base64_encode(sha1($password, true)));
	    $result = $this->db->get('muser');
	    return (bool) $result->num_rows();
	}

	public function checkLevel($user,$password) {
	    $this->db->select('chLevel');
	    $this->db->where('chUsername', $user);
	    $this->db->where('chPassword', base64_encode(sha1($password, true)));
	    $query 	= $this->db->get('muser');
	    $result = $query->row_array();
	    if ($result['chLevel'] == 'Customer')
	    	return false;
	    else
	    	return true;
	}

	function authenticate($name) 
	{
		$query    = $this->db->get_where($this->_table, array('chUsername' => $name));
		$result   = $query->row_array();
		
		return $result;
	}
	
	function authenticate2($password) 
	{
		$query    = $this->db->get_where($this->_table, array('chPassword' => $password));
		$result   = $query->row_array();
		
		return $result;
	}
	function add($data)
    {
        $this->db->insert($this->_table, $data);
    }
	
	function get_administrator($adminid)
	{
		$query   = $this->db->get_where($this->_table, array('id' => $adminid));
		return $query->row_array();
	}
	
	function update($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update($this->_table, $data); 
	}
	
	function delete($data)
	{
		$this->db->delete($this->_table, array('id' => $data)); 
	}
	
	function count_administrator()
	{
		return $this->db->count_all_results();
	}
	
	 function list_administrator($limit = 20, $offset = 0, $sort = array())
    {
		if(! empty($sort))
            $this->db->order_by($sort['field']);
        $query  = $this->db->get($this->_table, $limit, $offset);

        return $query->result_array();
	}
}
?>
