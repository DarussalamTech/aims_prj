<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 */
         public function __construct() {
        parent::__construct();
        
    }
         
	public function index()
	{
		$this->load->helper('url');
		$data['base'] = base_url();
		$data['site'] = site_url();
				
		$this->load->database();
        $this->load->model('Adv_search_model');

		$properties = $this->Adv_search_model->get_data();
		$data['total_count'] = $properties['count']; 
		if ($this->auth->try_session_login()){
       		$data['logged_in'] = 1;
		}

		$data['wordpress_search'] = 0;
		$data['wordpress_location_city'] = '';
		if(!empty($_GET['location_city'])){
			$data['wordpress_location_city'] = $_GET['location_city'];
			$data['wordpress_search'] = 1;   
		} 
		
		$data['wordpress_price_min'] = '';
		if(!empty($_GET['price_min'])){
			$data['wordpress_price_min'] = $_GET['price_min'];
			$data['wordpress_search'] = 1;   
		}
        
		$data['wordpress_price_max'] = '';
		if(!empty($_GET['price_max'])){
			$data['wordpress_price_max'] = $_GET['price_max'];
			$data['wordpress_search'] = 1;   
		}
		
		$data['wordpress_num_beds'] = '';
		if(!empty($_GET['num_beds'])){
			$data['wordpress_num_beds'] = $_GET['num_beds'];
			$data['wordpress_search'] = 1;   
		}

        $data['wordpress_num_fbaths'] = '';
		if(!empty($_GET['num_fbaths'])){
			$data['wordpress_num_fbaths'] = $_GET['num_fbaths'];
			$data['wordpress_search'] = 1;   
		}
		
		$data['wordpress_sqft_liv_area'] = '';
		if(!empty($_GET['sqft_liv_area'])){
			$data['wordpress_sqft_liv_area'] = $_GET['sqft_liv_area'];
			$data['wordpress_search'] = 1;   
		}
		
		$this->load->view('advanced/search', $data);
	}
	
	function get_results_count(){
        $this->load->model('Adv_search_model');

		$properties = $this->Adv_search_model->get_data();
		$return['total_count'] = $properties['count']; 
		
		echo json_encode($return);
	}
	
	public function changeType($type){
		$this->load->helper('url');
		$data['base'] = base_url();
		$data['site'] = site_url();
		$type = strtolower($type);
		$this->load->view('advanced/'.$type, $data);
	}
	
	
	/**
	* The simple_search function is for simple search.
	*
	* @access	public
	* @return	json Echos json data
	*/
	 public function simple_search($offset = 0) {

		$this->load->helper('url');
		$this->data['base'] = base_url();	
		$this->data['search_form'] = 'SimpleSearchForm';		

		$this->load->library('pagination');
        $this->load->library('form_validation');
		$this->load->helper('property_image_helper');
        $this->load->model('Adv_search_model');

		$last = $this->uri->total_segments();		
		$config['base_url'] = '';
		$config['per_page'] = STANDARD_SEARCH_LIMIT;
		$config['anchor_class'] = 'class="pgn_search_results"';
        $config['uri_segment'] = $last;
		
		$properties = $this->Adv_search_model->simple_get_data($offset);
		$this->data['total_rows'] = $config['total_rows'] = $properties['count']; 
		
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links();	
		
		$this->data['properties'] = $properties['data'];

		$return['result'] = $this->load->view( 'advanced/search_results_for_adv_j21', $this->data,true);
		echo json_encode($return);

    }

	public function advance_search($offset = 0) {
		$this->load->helper('url');
		$this->data['base'] = base_url();	
		$this->data['search_form'] = 'AdvancedSearchForm';		

		$this->load->library('pagination');
        $this->load->library('form_validation');
		$this->load->helper('property_image_helper');
        $this->load->model('Adv_search_model');
		$latLong = '';

		$last = $this->uri->total_segments();
		$config['base_url'] = '';
		$config['per_page'] = STANDARD_SEARCH_LIMIT;
		$config['anchor_class'] = 'class="pgn_search_results"';
		$config['uri_segment'] = $last;

		$properties = $this->Adv_search_model->get_data($offset);
		//print_r($properties); exit;
		$this->data['total_rows'] = $config['total_rows'] = $properties['count']; 
		
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links();	

		$this->data['properties'] = $properties['data'];
		// var_dump($this->data['properties']); exit;
		$return['result'] = $this->load->view( 'advanced/search_results_for_adv_j21', $this->data,true);
		echo json_encode($return);
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
