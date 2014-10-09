<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Neighborhood extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 */
	public function search($neighborhood)
	{
		$this->load->helper('url');

		$data['base'] = base_url();
		$data['site'] = site_url();
		$data['neighborhood'] = $neighborhood;
		
		$this->load->database();
		$this->load->model('Neighborhood_model');
		$data['total_rows'] = $this->Neighborhood_model->get_total_count($neighborhood);
		if(empty($data['total_rows']) || $data['total_rows'] == 'noresult'){
			return false; exit;
		}

		$this->load->view('neighborhood/index', $data);
	}	
	


	function search_results($neighborhood,$limit = 18, $offset = 0){
		$limit = 15;
		$this->load->helper('property_image_helper');
		$this->load->helper('url');
		$this->load->library(array('form_validation','pagination'));

		$data['base'] = base_url();
		$data['site'] = site_url();
		
		$this->load->database();
		$this->load->model('Neighborhood_model');
		
		$last = $this->uri->total_segments();
		
		$config['base_url'] = '';
		$config['per_page'] = 15;
		$config['anchor_class'] = 'class="pgn_search_results"';
		$config['uri_segment'] = $last;

		$this->form_validation->set_rules('property_type', 'location', 'trim|xss_clean');				
		// $this->form_validation->run()
		if (1) {

			$this->data['total_rows'] = $config['total_rows'] = $this->Neighborhood_model->get_data($neighborhood,1, $limit,$offset);
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links();	
			
			$this->data['properties'] = $this->Neighborhood_model->get_data($neighborhood,0, $limit,$offset);
									
			$return['result'] = $this->load->view( 'neighborhood/search_results', $this->data,true);
			echo json_encode($return);
		   
		   
		} else {
			// Form Validation Failed...
			$return['status'] = 'error';
			$return['message'] = validation_errors();
		  	echo json_encode($return);
		}

	}	
	
	function get_results_count($neighborhood){
		$this->load->database();
        $this->load->model('Neighborhood_model');

		$return['total_count'] = $this->Neighborhood_model->get_total_count($neighborhood);
		if($return['total_count'] != 'error'){
			$return['total_count'] = number_format($return['total_count'], 0, ".", ",");
		}
		echo json_encode($return);
	}
	

}

/* End of file Neighborhood.php */
/* Location: ./application/controllers/neighborhood.php */

?>