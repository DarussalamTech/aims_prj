<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exclusive_listing extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 */
	 
	function index(){
		global $_REQUEST;
		$this->load->helper('url');
		$this->data['base'] = base_url();
		$this->load->database();
		$this->load->helper('property_image_helper');
        $this->load->model('Adv_search_model');
		
		$last = $this->uri->total_segments();
		
		$config['base_url'] = '';
		$config['anchor_class'] = 'class="pgn_search_results"';
		$config['uri_segment'] = $last;
		$this->data['properties'] = $this->Adv_search_model->exclusive_get_data();
		if(isset($_REQUEST['formobile']) && $_REQUEST['formobile']==1)
		$this->load->view('advanced/exclusive_search_results1', $this->data);
		else
		$this->load->view('advanced/exclusive_search_results', $this->data);		
	}
	
	
	function wordpress_test(){
		$this->data['properties'] = 'hi';
		$this->load->view('wordpress_view', $this->data);
	}
	
}
?>