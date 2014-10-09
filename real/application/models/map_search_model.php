<?php

class Map_search_model extends CI_Model {

	private $property_data = array();
 
    public function __construct() {
        
        parent::__construct();
		$this->load->library('geocode');
		$this->initCurl();  
		
		$this->property_data['count'] = null;
		$this->property_data['data'] = null;
    }
	
	public function load_model($model)
	{
		$this->load->model(array($model));
	}

	/**
	 * search results for listings
	 *
	 * @access	public
	 * @return	array  result of the search criteria
	 */
	function get_data($latLong=0, $coords=0){
		// First see if the data already loaded - no need to make 2 calls to the API
		if ((is_null($this->property_data['count'])) and (is_null($this->property_data['data']))) {
		
			$search_category = (($this->input->post('search_category')) != '') ? $this->input->post('search_category') : 'for_sale';	
			$property_type = '';
			
			if($search_category == 'for_rent'){
				$property_type = 'Residential Rental';
			}
			
			$location = (($this->input->post('location')) != '') ? $this->input->post('location') : '';
				
			$part = (($this->input->post('part')) != '') ? ($this->input->post('part')) : "0";
			$offset = $part * MAP_SEARCH_LIMIT;
		
			$radius = (($this->input->post('radius')) != '') ? $this->input->post('radius') : 1;	
			
			$advanced_condtions = $this->advanced_where_conditions();
			
			if ((!empty($latLong['lat']) && !empty($latLong['lng']) )) {
			
				/*echo $this->config->item('scapi_url') 
							. '&function=' . 'getdata'
							. '&membership_id=' . MEMBERSHIP_ID
							. '&category=' . $search_category 
							. '&property_type=' . urlencode($property_type)						
							. '&lat=' . $latLong['lat']
							. '&lng=' . $latLong['lng']					
							. '&radius=' . $radius
							. (($advanced_condtions) ? $advanced_condtions : '') 
							. '&limit=' . MAP_SEARCH_LIMIT 
							. '&offset=' . $offset;
						exit;*/
			
				$results = json_decode(
					$this->curl->simple_get(
						$this->config->item('scapi_url') 
							. '&function=' . 'getdata'
							. '&membership_id=' . MEMBERSHIP_ID
							. '&category=' . $search_category 
							. '&property_type=' . urlencode($property_type)						
							. '&lat=' . $latLong['lat']
							. '&lng=' . $latLong['lng']					
							. '&radius=' . $radius
							. (($advanced_condtions) ? $advanced_condtions : '') 
							. '&limit=' . MAP_SEARCH_LIMIT 
							. '&offset=' . $offset
						), 
					true
				);	
			
			}elseif(!empty($coords)) {
												
				$results = json_decode(
					$this->curl->simple_get(
						$this->config->item('scapi_url') 
							. '&function=' . 'getdata'
							. '&membership_id=' . MEMBERSHIP_ID
							. '&category=' . $search_category 
							. '&property_type=' . urlencode($property_type)						
							. '&lat=0'
							. '&lng=0'							
							. (($advanced_condtions) ? $advanced_condtions : '') 
							. '&poligonal=' . urlencode($coords)
							. '&limit=' . MAP_SEARCH_LIMIT 
							. '&offset=' . $offset
						), 
					true
				);	
				
			}else {		    	
							
				$results = json_decode(
					$this->curl->simple_get(
						$this->config->item('scapi_url') 
						. '&function=' . 'getdata'
						. '&membership_id=' . MEMBERSHIP_ID 
						. '&category=' . $search_category 
						. '&property_type=' . urlencode($property_type)								
						. '&location=' . urlencode($location)
						. '&lat=0' 
						. '&lng=0' 
						. '&radius=50' 
						. (($advanced_condtions) ? $advanced_condtions : '') 
						. '&limit=' . MAP_SEARCH_LIMIT
						. '&offset=' . $offset
					), 
					true
				);

			}
			
			if (!empty($results['count'])) {
				$this->property_data['count'] = $results['count'];
				$this->property_data['data'] = $results['data'];
			} else {
				$this->property_data['count'] = 0;
				$this->property_data['data'] = 'noresult';
			}
						
		}
		
		return $this->property_data;
	}


	private function advanced_where_conditions()
	{
	
		//search_category will take into effect only if its value is 'for_rent'
		$search_category = (($this->input->post('search_category')) != '') ? $this->input->post('search_category') : 'for_sale';	
	
		$result = '';
		
		$property_type = (($this->input->post('property_type')) != '') ? $this->input->post('property_type') : '';
		
		//if search_category is for_rent then consider it as property type rather as search category
		if ($search_category == 'for_rent') {
			$result .= '&property_type=' . urlencode('Residential Rental');
		} else {
			if (is_array($property_type) && !empty($property_type)) {
				// Create a | delimited string
				$where_string = '';
				foreach($property_type as $type){
					$where_string .= $type . '|';
				}
				$where_string = substr($where_string, 0, -1);
				$result .= '&property_type=' . urlencode($where_string);
	
			} elseif (!empty($property_type)) {
				$result .= '&property_type=' . urlencode($property_type);
			}
		}
				
		$price_min = (($this->input->post('price_min')) != '') ? $this->input->post('price_min') : 0;
		$price_max = (($this->input->post('price_max')) != '') ? $this->input->post('price_max') : 0;
		
		if (!empty($price_min)) {
		 $result .= '&price_min=' . $price_min;
		}
		
		if (!empty($price_max)) {
		 $result .= '&price_max=' . $price_max;
		}
		
		$beds_min = (($this->input->post('beds_min')) != '') ? $this->input->post('beds_min') : 0;
		if (!empty($beds_min)) {
			$result .= '&num_beds=' . $beds_min;
		}
		
		$baths_min = (($this->input->post('baths_min')) != '') ? $this->input->post('baths_min') : 0;		
		if (!empty($baths_min)) {
			$result .= '&num_fbaths=' . $baths_min;
		}
		
		
		return (strlen($result) > 0) ? $result : false;
	}	
	
	
	function getImages($sysid = 0)
    {
	
		if(empty($sysid)){
			$sysid = (($this->input->get('sysid')) != '') ? ($this->input->get('sysid')) : "0";
		}

        $result = json_decode(
            $this->curl->simple_get(
                $this->config->item('scapi_url')
                . '&function=photos'
                . '&field_value=' . $sysid
                . '&membership_id=' . MEMBERSHIP_ID
            )
            ,
            true
        );

        if (json_last_error() == JSON_ERROR_NONE && !is_null($result) && is_array($result)) {
            return $result;
        } else {
            return "noresult";
        }
    }
	
	

	private function initCurl()
	{
		$this->config->load('scapi');
		$this->load->library('curl');
	}	

}



?>