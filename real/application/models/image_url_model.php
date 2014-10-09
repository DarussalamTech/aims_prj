<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Image_url_model extends CI_Model {

    /**
    * Constructor
    * @access   public
    */
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

	/**
	* property images of a specific sysId 
	*
	* @access	public
	* @return	array  result of the specific sysId 
	*/
	function property_images($sysId) {

		$this->db->select('image_urls.url');
        $this->db->from('image_urls');
		$this->db->where("image_urls.sysid = $sysId");
		$this->db->order_by("sequence", "asc"); 
		try {       

			$query = $this->db->get();
			
			$ret = ($query->num_rows() > 0) ? $query->result_array() : false;
			
        } catch (Exception $e) {
        	$ret = "error";
            error_log($e);
        }

	    return $ret;

	}

	/**
	* first property image of a specific sysId 
	*
	* @access	public
	* @return	array  result of the specific sysId 
	*/	
	function get_first_image($sysId){
	
		$this->db->select('image_urls.url');
        $this->db->from('image_urls');
		$this->db->where("image_urls.sysid = $sysId");
		$this->db->where("image_urls.sequence = 1");
		$this->db->limit(1,0);
		try {       

			$query = $this->db->get();
			
			$ret = ($query->num_rows() > 0) ? $query->row()->url : false;			
			
        } catch (Exception $e) {
        	$ret = "error";
            error_log($e);
        }

	    return $ret;

	}

}