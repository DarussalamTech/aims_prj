<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class New_construction extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 */
	public function search()
	{
		$this->load->helper('url');

		$data['base'] = base_url();
		$data['site'] = site_url();
		
		$this->load->database();
		$this->load->model('New_construction_model');
		$data['total_rows'] = $this->New_construction_model->get_total_count();
		if(empty($data['total_rows']) || $data['total_rows'] == 'noresult'){
			return false; exit;
		}

		$this->load->view('new_construction/index', $data);
	}	
	


	function search_results($limit = 18, $offset = 0){
		$this->load->helper('property_image_helper');
		$this->load->helper('url');
		$this->load->library(array('form_validation','pagination'));

		$data['base'] = base_url();
		$data['site'] = site_url();
		
		$this->load->database();
		$this->load->model('New_construction_model');
		
		$last = $this->uri->total_segments();
		
		$config['base_url'] = '';
		$config['per_page'] = 15;
		$config['anchor_class'] = 'class="pgn_search_results"';
		$config['uri_segment'] = $last;

		$this->form_validation->set_rules('property_type', 'location', 'trim|xss_clean');				
		// $this->form_validation->run()
		if (1) {

			$this->data['total_rows'] = $config['total_rows'] = $this->New_construction_model->get_data(1, $limit,$offset);
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links();	
			
			$this->data['properties'] = $this->New_construction_model->get_data(0, $limit,$offset);
									
			$return['result'] = $this->load->view( 'new_construction/search_results', $this->data,true);
			echo json_encode($return);
		   
		   
		} else {
			// Form Validation Failed...
			$return['status'] = 'error';
			$return['message'] = validation_errors();
		  	echo json_encode($return);
		}

	}	
	
	function get_results_count(){
		$this->load->database();
        $this->load->model('New_construction_model');

		$return['total_count'] = $this->New_construction_model->get_total_count();
		if($return['total_count'] != 'error'){
			$return['total_count'] = number_format($return['total_count'], 0, ".", ",");
		}
		echo json_encode($return);
	}
	

}

/* End of file new_construction.php */
/* Location: ./application/controllers/new_construction.php */

?>