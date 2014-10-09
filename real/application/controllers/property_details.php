<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Property_details extends CI_Controller {


    function __construct() {
        parent::__construct();
    }


	/**
	 * Index Page for this controller.
	 *
	 */
	 
	function index($mls){	
		$this->load->helper('url');
		$this->data['base'] = base_url();
		$this->load->database();
		$this->load->helper('property_image_helper');
        $this->load->model('property_model');
        $this->load->model('map_search_model');		
				
		//mls property details
		$this->data['property_details'] = $this->property_model->get_property_details($mls);
		//print_r($this->data['property_details']); exit;
		$location = $this->property_model->get_lat_long($this->data['property_details']['sysid']);
		
		$this->data['lat'] =	$location[0]['latitude'];
		$this->data['lng'] =	$location[0]['longitude'];

		//setting title and description
		$this->data['page_title'] = '';
		if(!empty($this->data['property_details']["address"])){
			$this->data['page_title'] = $this->data['property_details']["address"].', ';
		}	
		$this->data['page_title'] .= $this->data['property_details']["city_name"].', '.$this->data['property_details']["rets_state"].' '.$this->data['property_details']["zip_code"];
		$this->data['page_description'] = !empty($this->data['property_details']["remarks"])?$this->data['property_details']["remarks"]:'';

		//mls property images
		$this->data['rets_images'] = $this->map_search_model->getImages($this->data['property_details']['sysid']);
		
		//nearby properties
		//$this->data['nearby_properties'] = $this->property_model->get_nearby_properties($mls,$this->data['property_details'][0]['1'],$this->data['property_details'][0]['latitude'],$this->data['property_details'][0]['longitude']);

		//recently viewed
		$this->load->model('Adv_search_model');
		$mlsid_cookie_string = $this->get_cookie_ids($mls);
		$this->data['recently_viewed'] =  $this->Adv_search_model->get_mlsids_data($mlsid_cookie_string);
		//print_r($this->data['recently_viewed']); exit;
		$this->data['logged_in'] = 0;
	    if ($this->auth->try_session_login()){
       		$this->data['logged_in'] = 1;
			//check if property is fav
			$this->data['is_fav'] = $this->property_model->get_is_fav($mls);
			
			//get property notes
			$this->data['prop_notes'] = $this->property_model->get_user_notes($mls);
			
		}

		 $this->load->view('advanced/property_details_view',$this->data);
	}

	
	function nearby_properties(){
		$this->load->database();
		$this->load->helper('property_image_helper');
        $this->load->model('property_model');
	
		$mls = $this->input->post('mls');
		$property_type = $this->input->post('p_type');
		$latitude = $this->input->post('latitude');
		$longitude = $this->input->post('longitude');				
		
		$this->data['nearby_properties'] = $this->property_model->get_nearby_properties($mls,$property_type,$latitude,$longitude);
		echo $this->load->view( 'mixed/nearby_properties_view', $this->data,true);
		exit;
	
	}
	
	
	function get_cookie_ids($current_sysid){
	
		//Recently Viewed ids
		$cookieValue = !empty($_COOKIE['mlsids_cookie'])?$_COOKIE['mlsids_cookie']:$current_sysid;
		$cookie_arr = explode(' ',$cookieValue);
		$recently_viewed_ids = array_unique($cookie_arr);
		foreach($recently_viewed_ids as $key=>$sysid){
			if($sysid == 'undefined'){
				unset($recently_viewed_ids[$key]);
			}
		}
		//print_r($recently_viewed_ids);exit;
		//$recently_viewed_ids = array(38655853 , 32868149); 
		
		$recently_viewed_str = implode(',',$recently_viewed_ids);
		
		return $recently_viewed_str; 
	
	}
	
	function add_to_favorite($mls_id){
	
		$this->load->helper('url');
		$this->data['base'] = base_url();
        $this->load->model('User_favorite_model');
		
	    if ($this->auth->try_session_login()){
       		$this->data['logged_in'] = 1;
			$this->data['mls_id'] = $mls_id;
			$this->data['categories'] = $this->User_favorite_model->get_user_categories();
		}else{
			$this->data['logged_in'] = 0;
		}
		
		$this->load->view('mixed/add_to_favorite', $this->data);
	}
	
	function remove_from_favorite($mls_id){
		$this->load->helper('url');
		$this->data['base'] = base_url();
        $this->load->model('User_favorite_model');
	
	    if ($this->auth->try_session_login()){
       		$this->data['logged_in'] = 1;
			$this->data['mls_id'] = $mls_id;
			$this->data['message'] = $this->User_favorite_model->remove_user_fav($mls_id);	
		}else{
			$this->data['logged_in'] = 0;
			$this->data['message'] = 'Please login to remove property from favorite.';
		}
		
		$this->load->view('mixed/remove_from_favorite', $this->data);
	
	}
	

}
?>