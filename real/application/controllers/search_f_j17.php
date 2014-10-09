<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 */
	public function index()
	{
		$this->load->helper('url');
		$data['base'] = base_url();
		$data['site'] = site_url();
				
		$this->load->database();
        $this->load->model('Adv_search_model');
		$data['total_count'] = $this->Adv_search_model->get_total_count();

		$this->load->view('advanced/search', $data);
	}
	
	function get_results_count(){
		$this->load->database();
        $this->load->model('Adv_search_model');

		$return['total_count'] = $this->Adv_search_model->get_total_count();
		if($return['total_count'] != 'error'){
			$return['total_count'] = number_format($return['total_count'], 0, ".", ",");
		}
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
	public function simple_search($limit = 15, $offset = 0) {

		$this->load->helper('url');
		$this->data['base'] = base_url();		
		$this->data['search_form'] = 'SimpleSearchForm';		
		
		$this->load->database();

		$this->load->library('pagination');
        $this->load->library('form_validation');
		$this->load->helper('property_image_helper');
        $this->load->model('Adv_search_model');
		$latLong = '';

		$last = $this->uri->total_segments();
		
		$config['base_url'] = '';
		$config['per_page'] = 15;
		$config['anchor_class'] = 'class="pgn_search_results"';
		$config['uri_segment'] = $last;
		//$config['num_links'] = 5;
		
	    $this->form_validation->set_rules('AddressAndLoc', 'location', 'trim|xss_clean');				

        if ($this->form_validation->run()) {

			$this->data['total_rows'] = $config['total_rows'] = $test = $this->Adv_search_model->simple_get_data(1, $limit,$offset);
			//print_r($test);
			// exit();
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links();	
			
			$this->data['properties'] = $properties =$this->Adv_search_model->simple_get_data(0, $limit,$offset);
			//print_r($properties);
			 //exit();				
			$return['result'] = $this->load->view( 'advanced/search_results', $this->data,true);
            echo json_encode($return);
        } else {
            // Form Validation Failed...
            $return['status'] = 'error';
            $return['message'] = validation_errors();
            echo json_encode($return);
        }

    }
	
	public function advance_search($limit = 15, $offset = 0) {
		$this->load->helper('url');
		$this->data['base'] = base_url();		
		$this->data['search_form'] = 'AdvancedSearchForm';		
		$this->load->database();

		$this->load->library('pagination');
        $this->load->library('form_validation');
		$this->load->helper('property_image_helper');
        $this->load->model('Adv_search_model');
		$latLong = '';

		$last = $this->uri->total_segments();
		
		$config['base_url'] = '';
		$config['per_page'] = 15;
		$config['anchor_class'] = 'class="pgn_search_results"';
		$config['uri_segment'] = $last;
		//$config['num_links'] = 5;
		
        //if ($this->form_validation->run()) {

			$this->data['total_rows'] = $config['total_rows'] = $this->Adv_search_model->get_data(1, $limit,$offset);
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links();	

			$this->data['properties'] = $this->Adv_search_model->get_data(0, $limit,$offset);
			//var_dump($this->data['properties']); exit;
			$return['result'] = $this->load->view( 'advanced/search_results', $this->data,true);
            echo json_encode($return);
        /*} else {
            // Form Validation Failed...
            $return['status'] = 'error';
            $return['message'] = validation_errors();
            echo json_encode($return);
        }*/
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */