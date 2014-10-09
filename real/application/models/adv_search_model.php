<?php

class Adv_search_model extends CI_Model
{

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

    function county_lookup($county) {
		$county = strtolower($county);
		switch ($county) {

			case 'pinellas county':
				$county_id = 39;
				break;

			case 'hillsborough county':
				$county_id = 22;
				break;

			case 'pasco county':
				$county_id = 38;
				break;

			default:
				$county_id = 0;
				break;
		}
		return $county_id;
	}

	function city_lookup($city) {
		$city = strtolower($city);
		switch ($city) {
			case 'apollo beach':
				$city_id = 1;
				break;
			
			case 'brandon':
				$city_id = 2;
				break;

			case 'dover':
				$city_id = 3;
				break;

			case 'gibsonton':
				$city_id = 4;
				break;

			case 'lakeland':
				$city_id = 5;
				break;

			case 'lithia':
				$city_id = 6;

			case 'lutz':
				$city_id = 7;
				break;

			case 'mulberry':
				$city_id = 8;
				break;

			case 'odessa':
				$city_id = 9;
				break;

			case 'plant city':
				$city_id = 10;
				break;

			case 'riverview':
				$city_id = 11;
				break;

			case 'ruskin':
				$city_id = 12;
				break;

			case 'seffner':
				$city_id = 13;
				break;

			case 'sun city center':
				$city_id = 14;
				break;

			case 'tampa':
				$city_id = 16;
				break;

			case 'temple terrace':
				$city_id = 17;
				break;

			case 'thonotosassa':
				$city_id = 18;
				break;

			case 'valrico':
				$city_id = 19;
				break;

			case 'wimauma':
				$city_id = 20;
				break;

			case 'zephyrhills':
				$city_id = 21;
				break;

			case 'aripeka':
				$city_id = 22;
				break;

			case 'bayonet point':
				$city_id = 23;
				break;

			case 'brooksville':
				$city_id = 24;
				break;

			case 'dade city':
				$city_id = 25;
				break;

			case 'holiday':
				$city_id = 26;
				break;

			case 'hudson':
				$city_id = 27;
				break;

			case 'kathleen':
				$city_id = 28;
				break;

			case 'land o lakes':
				$city_id = 29;
				break;

			case 'lutz':
				$city_id = 30;
				break;

			case 'new port richey':
				$city_id = 31;
				break;

			case 'odessa':
				$city_id = 32;
				break;

			case 'pasco':
				$city_id = 33;
				break;

			case 'port richey':
				$city_id = 34;
				break;

			case 'san antonio':
				$city_id = 35;
				break;

			case 'spring hill':
				$city_id = 36;
				break;

			case 'trinity':
				$city_id = 37;
				break;

			case 'wesley chapel':
				$city_id = 38;
				break;

			case 'belleair':
				$city_id = 40;
				break;

			case 'belleair beach':
				$city_id = 41;
				break;

			case 'belleair bluffs':
				$city_id = 42;
				break;

			case 'clearwater':
				$city_id = 43;
				break;

			case 'clearwater beach':
				$city_id = 44;
				break;

			case 'crystal beach':
				$city_id = 45;
				break;

			case 'dunedin':
				$city_id = 46;
				break;

			case 'gulfport':
				$city_id = 47;
				break;

			case 'indian rocks beach':
				$city_id = 48;
				break;

			case 'indian shores':
				$city_id = 49;
				break;

			case 'kenneth city':
				$city_id = 50;
				break;

			case 'largo':
				$city_id = 51;
				break;

			case 'madeira beach':
				$city_id = 52;
				break;

			case 'new port richey':
				$city_id = 53;
				break;

			case 'north redington beach':
				$city_id = 54;
				break;

			case 'oldsmar':
				$city_id = 55;
				break;

			case 'palm harbor':
				$city_id = 56;
				break;

			case 'pinellas park':
				$city_id = 57;
				break;

			case 'redington beach':
				$city_id = 58;
				break;

			case 'redington shores':
				$city_id = 59;
				break;

			case 'safety harbor':
				$city_id = 60;
				break;

			case 'seminole':
				$city_id = 61;
				break;

			case 'south pasadena':
				$city_id = 62;
				break;

			case 'st. pete beach':
				$city_id = 63;
				break;

			case 'st pete beach':
				$city_id = 63;
				break;

			case 'saint pete beach':
				$city_id = 63;
				break;

			case 'st. petersburg':
				$city_id = 64;
				break;

			case 'st petersburg':
				$city_id = 64;
				break;

			case 'saint petersburg':
				$city_id = 64;
				break;

			case 'tarpon springs':
				$city_id = 65;
				break;

			case 'tierra verde':
				$city_id = 66;
				break;

			case 'treasure island':
				$city_id = 67;
				break;

			case 'belleair shore':
				$city_id = 68;
				break;

			default:
				$city_id = 0;
				break;
		}
		return $city_id;
	}

    
    /**
     * simple search results for listings
     *
     * @access	public
     * @return	array  result of the search criteria
     */
    
	function simple_get_data($offset = 0) {
				
		// First see if the data already loaded - no need to make 2 calls to the API
		if ((is_null($this->property_data['count'])) and (is_null($this->property_data['data']))) {
			$search_category = 'all';
			$location = (($this->input->post('location')) != '') ? $this->input->post('location') : '';
	
			$results = json_decode(
				$this->curl->simple_get(
					$this->config->item('scapi_url') 
					. '&function=' . 'getdata'
					. '&membership_id=' . MEMBERSHIP_ID 
					. '&category=' . $search_category 
					. '&location=' . urlencode($location)
					. '&lat=0'
					. '&lng=0'
					. '&radius=80' 
					. '&limit=' . STANDARD_SEARCH_LIMIT
					. '&offset=' . $offset
				), 
				true
			);
			
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

    
    /**
     * advance search results for listings
     *
     * @access	public
     * @return	array  result of the search criteria
     */
    
    function get_data($offset = 0) {
  		// First see if the data already loaded - no need to make 2 calls to the API
		if ((is_null($this->property_data['count'])) and (is_null($this->property_data['data']))) {
		
			$search_category = 'all';
			
			// RSH 7/29/14 - Why is this here?  Why was for_rent category removed??
			/* if ($search_category == 'for_rent') {
				$search_category = '';
			} */
			
			/*if ($this->input->post('latitude') != '') {
				$lat = $this->input->post('latitude');
			} else {
				$lat = !empty($latLong['latitude']) ? $latLong['latitude'] : 0;
			}
			
			if ($this->input->post('longitude') != '') {
				$lng = $this->input->post('longitude');
			} else {
				$lng = !empty($latLong['longitude']) ? $latLong['longitude'] : 0;
			}

			$sort_by = 'list_price'; $sort_order = 'desc';
			if ($this->input->post('sort_order') != '') {
				$sort_order = $this->input->post('sort_order');
				$sort_arr = explode('/',$sort_order);		//e.g list_price/asc
				list($sort_by, $sort_order) = $sort_arr;
			}

			$radius = (($this->input->post('radius')) != '') ? $this->input->post('radius') : 1;	*/
			
			// Get the advanced conditions
			$advanced_condtions = $this->advanced_where_conditions();

			if (!empty($lat) && !empty($lng)) {
				
				/*$results = json_decode(
					$this->curl->simple_get(
						$this->config->item('scapi_url') 
							. '&function=' . 'getdata'
							. '&membership_id=' . $membership_id
							. '&category=' . $search_category 
							. '&lat=' . $lat
							. '&lng=' . $lng						
							. '&radius=' . $radius
							. (($advanced_condtions) ? $advanced_condtions : '') 
							. '&get_count=' . $get_count 
							. '&sort=' . $sort_by
							. '&sort_dir=' . $sort_order								
							. '&limit=' . $limit 
							. '&offset=' . $offset
						), 
					true
				);*/
				
			} else {
			
				/*echo $this->config->item('scapi_url') 
							. '&function=' . 'getdata'
							. '&membership_id=' . MEMBERSHIP_ID
							. '&category=' . $search_category 
							. '&lat=0' 
							. '&lng=0' 
							. '&radius=80'
							. (($advanced_condtions) ? $advanced_condtions : '')
							. '&limit=' . STANDARD_SEARCH_LIMIT 
							. '&offset=' . $offset;
							 exit;*/
				
				$results = json_decode(
					$this->curl->simple_get(
						$this->config->item('scapi_url') 
							. '&function=' . 'getdata'
							. '&membership_id=' . MEMBERSHIP_ID
							. '&category=' . $search_category 
							. '&lat=0' 
							. '&lng=0' 
							. '&radius=80'
							. (($advanced_condtions) ? $advanced_condtions : '')
							. '&limit=' . STANDARD_SEARCH_LIMIT 
							. '&offset=' . $offset
						), 
					true
				);
						
			}
			
			if ($results) {
				$this->property_data['count'] = $results['count'];
				$this->property_data['data'] = $results['data'];
			} else {
				$this->property_data['count'] = 0;
				$this->property_data['data'] = array();
			}
			
		}
		
		return $this->property_data;
    }
	
    // Build query string
    function advanced_where_conditions() {
		$url  = ''; 	

		$property_type = (($this->input->post('formType')) != '') ? $this->input->post('formType') : 'Residential';

		if (!empty($property_type)) {
		    $url.= '&pro_type=' . $property_type;
		}
		
		$pro_style_string = (($this->input->post('pro_style')) != '') ? $this->input->post('pro_style') : '';
		
		if (is_array($pro_style_string)) {
			$pro_style_string = implode(',',$pro_style_string);
		}

		if (!empty($pro_style_string)) {
		    $url.= '&pro_style=' . urlencode($pro_style_string);
		}

		//property status
		$status = (($this->input->post('propStatus')) != '') ? $this->input->post('propStatus') : '';

		if (!empty($status)) {
		    $url.= '&status=' . urlencode(implode(',',$status));
		}
		
		$remarks = (($this->input->post('Remarks')) != '') ? $this->input->post('Remarks') : '';
		if (!empty($remarks)) {
		    $url.= "&remarks=" . urlencode($remarks);
		}		

		$sqft_liv_area = (($this->input->post('sqft_liv_area')) != '') ? $this->input->post('sqft_liv_area') : 0;

		if (!empty($sqft_liv_area)) {
		    $url.= "&sqft_liv_area=" . $sqft_liv_area;
		}

		$num_beds = (($this->input->post('num_beds')) != '') ? $this->input->post('num_beds') : 0;

		if (!empty($num_beds)) {
		    $url.= "&num_beds=" . $num_beds;
		}

		$num_fbaths = (($this->input->post('num_fbaths')) != '') ? $this->input->post('num_fbaths') : 0;

		if (!empty($num_fbaths)) {
		    $url.= "&num_fbaths=" . $num_fbaths;
		}

		$year_built = (($this->input->post('year_built')) != '') ? $this->input->post('year_built') : 0;

		if (!empty($year_built)) {
		    $url.= "&year_built=" . $year_built;
		}


		$lease_rate_min = (($this->input->post('lease_rate_min')) != '') ? $this->input->post('lease_rate_min') : 0;
		$price_min = (($this->input->post('price_min')) != '') ? $this->input->post('price_min') : 0;
		$price_min_text = (($this->input->post('price_min_text')) != '') ? $this->input->post('price_min_text') : 0;

		if (!empty($lease_rate_min) && empty($price_min) && empty($price_min_text)) {
		    $url.= "&price_min=" . $lease_rate_min;
		}elseif(empty($price_min) && !empty($price_min_text) && empty($lease_rate_min)) {
			$url.= "&price_min=" . $price_min_text;
		}elseif(!empty($price_min) && empty($price_min_text) && empty($lease_rate_min)) {
			$url.= "&price_min=" . $price_min;
		}

		$lease_rate_max = (($this->input->post('lease_rate_max')) != '') ? $this->input->post('lease_rate_max') : 0;
		$price_max = (($this->input->post('price_max')) != '') ? $this->input->post('price_max') : 0;
		$price_max_text = (($this->input->post('price_max_text')) != '') ? $this->input->post('price_max_text') : 0;

		if (!empty($lease_rate_max) && empty($price_max)  && empty($price_max_text)) {
		    $url.= "&price_max=" . $lease_rate_max;
		}elseif (!empty($price_max) && empty($price_max_text) && empty($lease_rate_max)) {
		    $url.= "&price_max=" . $price_max;
		}elseif(empty($price_max) && !empty($price_max_text) && empty($lease_rate_max)) {
		    $url.= "&price_max=" . $price_max_text;		
		}

		//echo $url; exit;

		$location_select = (($this->input->post('location-select')) != '') ? $this->input->post('location-select') : 'rad-city';

		$location_city = (($this->input->post('location_city')) != '') ? $this->input->post('location_city') : '';

		if (!empty($location_city) && $location_select == 'rad-city') {
		    $url.= "&location=" . urlencode($location_city);
		}


		$zip_code = (($this->input->post('zip_code')) != '') ? $this->input->post('zip_code') : '';

		if (!empty($zip_code) && $location_select == 'rad-zip') {
		    $url.= "&location=" . $zip_code;
		}

		$counties = (($this->input->post('county_id')) != '') ? $this->input->post('county_id') : '';
		
		if (!empty($counties) && $location_select == 'rad-county') {
	          $url.= '&county_multy=' . urlencode(implode(',',$counties));
		}

		$Elem_SchoolEQ = (($this->input->post('Elem_SchoolEQ')) != '') ? $this->input->post('Elem_SchoolEQ') : '';
		
		if (!empty($Elem_SchoolEQ) && is_array($Elem_SchoolEQ)) {
	          $url.= '&e_school=' . urlencode(implode(',',$Elem_SchoolEQ));
		}
		

		$Elem_SchoolEQ = (($this->input->post('Elem_SchoolEQ')) != '') ? $this->input->post('Elem_SchoolEQ') : '';
		if (!empty($Elem_SchoolEQ) && is_array($Elem_SchoolEQ)) {
	          $url.= '&e_school=' . urlencode(implode(',',$Elem_SchoolEQ));
		}
		

		$Middle_School = (($this->input->post('Middle_School')) != '') ? $this->input->post('Middle_School') : '';
		if (!empty($Middle_School) && is_array($Middle_School)) {
	          $url.= '&m_school=' . urlencode(implode(',',$Middle_School));
		}				

		$High_School = (($this->input->post('High_School')) != '') ? $this->input->post('High_School') : '';
		if (!empty($High_School) && is_array($High_School)) {
	          $url.= '&h_school=' . urlencode(implode(',',$High_School));
		}
		
		$WaterView = (($this->input->post('WaterView')) != '') ? $this->input->post('WaterView') : NULL;
		if (isset($WaterView) && $WaterView == 'Yes') {
	          $url.= '&waterview=1';
		}elseif( (isset($WaterView) && $WaterView == 'No') ){
		      $url.= '&waterview=0';
		}		
		
		$WaterExtrasBit = (($this->input->post('WaterExtrasBit')) != '') ? $this->input->post('WaterExtrasBit') : NULL;
		if (isset($WaterExtrasBit) && $WaterExtrasBit == 'Yes') {
	          $url.= '&water_extras=1';
		}elseif( (isset($WaterExtrasBit) && $WaterExtrasBit == 'No') ){
		      $url.= '&water_extras=0';
		}

		/*$waterfront = (($this->input->post('waterfront')) != '') ? $this->input->post('waterfront') : NULL;
		if (isset($waterfront) && $waterfront == 'Yes') {
	          $url.= '&water_extras=1';
		}elseif( (isset($waterfront) && $waterfront == 'No') ){
		      $url.= '&water_extras=0';
		}*/		

		$Pets = (($this->input->post('Pets')) != '') ? $this->input->post('Pets') : NULL;
		if (isset($Pets) && $Pets == 'Yes') {
	          $url.= '&pets_allowed=1';
		}

		$MinFloors = (($this->input->post('MinFloors')) != '') ? $this->input->post('MinFloors') : NULL;
		if (!empty($MinFloors)) {
	          $url.= '&num_fl='.$MinFloors;
		}	
		
		$unitFloors = (($this->input->post('unitFloors')) != '') ? $this->input->post('unitFloors') : NULL;
		if (!empty($unitFloors)) {
	          $url.= '&single_story='.$unitFloors;
		}				
		
		$community_features = (($this->input->post('community_features')) != '') ? $this->input->post('community_features') : '';
		if (!empty($community_features) && is_array($community_features)) {
	          $url.= '&community_f=' . urlencode(implode(',',$community_features));
		}

		$feeCondoMaintenanceFrequency = (($this->input->post('feeCondoMaintenanceFrequency')) != '') ? $this->input->post('feeCondoMaintenanceFrequency') : '';
		if (!empty($feeCondoMaintenanceFrequency) && is_array($feeCondoMaintenanceFrequency)) {
	          $url.= '&condo_f=' . urlencode(implode(',',$feeCondoMaintenanceFrequency));
		}	
		
		$HOA_Frequency = (($this->input->post('HOA_Frequency')) != '') ? $this->input->post('HOA_Frequency') : '';
		if (!empty($HOA_Frequency) && is_array($HOA_Frequency)) {
	          $url.= '&hoa_f=' . urlencode(implode(',',$HOA_Frequency));
		}	

		$HOA_Mandatory = (($this->input->post('HOA_Mandatory')) != '') ? $this->input->post('HOA_Mandatory') : '';
		if (!empty($HOA_Mandatory) && is_array($HOA_Mandatory)) {
	          $url.= '&hoa_c=' . urlencode(implode(',',$HOA_Mandatory));
		}						
		
		$cdd = (($this->input->post('CDD')) != '') ? $this->input->post('CDD') : NULL;
		if (isset($cdd) && $cdd == 'Yes') {
	          $url.= '&cdd=1';
		}elseif( (isset($cdd) && $cdd == 'No') ){
		      $url.= '&cdd=0';
		}	

		$GreenCertDesc = (($this->input->post('GreenCertDesc')) != '') ? $this->input->post('GreenCertDesc') : NULL;
		if (isset($GreenCertDesc) && $GreenCertDesc == 'Yes') {
	          $url.= '&green=1';
		}	
		
		$GreenLand = (($this->input->post('GreenLand')) != '') ? $this->input->post('GreenLand') : '';
		if (!empty($GreenLand) && is_array($GreenLand)) {
	          $url.= '&green_l=' . urlencode(implode(',',$GreenLand));
		}			

		$GreenWater = (($this->input->post('GreenWater')) != '') ? $this->input->post('GreenWater') : '';
		if (!empty($GreenWater) && is_array($GreenWater)) {
	          $url.= '&green_wf=' . urlencode(implode(',',$GreenWater));
		}	
		
		$disaster_mitigation = (($this->input->post('disaster_mitigation')) != '') ? $this->input->post('disaster_mitigation') : '';
		if (!empty($disaster_mitigation) && is_array($disaster_mitigation)) {
	          $url.= '&disaster_m=' . urlencode(implode(',',$disaster_mitigation));
		}	
		
		$AirQualityIndoor = (($this->input->post('AirQualityIndoor')) != '') ? $this->input->post('AirQualityIndoor') : '';
		if (!empty($AirQualityIndoor) && is_array($AirQualityIndoor)) {
	          $url.= '&indoor_a=' . urlencode(implode(',',$AirQualityIndoor));
		}	
		
		$InteriorLayout = (($this->input->post('InteriorLayout')) != '') ? $this->input->post('InteriorLayout') : '';
		if (!empty($InteriorLayout) && is_array($InteriorLayout)) {
	          $url.= '&interior_f=' . urlencode(implode(',',$InteriorLayout));
		}		
		
		$KitchenFeatures = (($this->input->post('KitchenFeatures')) != '') ? $this->input->post('KitchenFeatures') : '';
		if (!empty($KitchenFeatures) && is_array($KitchenFeatures)) {
	          $url.= '&kitchen_f=' . urlencode(implode(',',$KitchenFeatures));
		}		
		
		$Appliances = (($this->input->post('Appliances')) != '') ? $this->input->post('Appliances') : '';
		if (!empty($Appliances) && is_array($Appliances)) {
	          $url.= '&equipment_a=' . urlencode(implode(',',$Appliances));
		}

		$cooling_description = (($this->input->post('cooling_description')) != '') ? $this->input->post('cooling_description') : '';
		if (!empty($cooling_description) && is_array($cooling_description)) {
	          $url.= '&cooling_d=' . urlencode(implode(',',$cooling_description));
		}		

		$FireplaceBit = (($this->input->post('FireplaceBit')) != '') ? $this->input->post('FireplaceBit') : NULL;
		if (isset($FireplaceBit) && $FireplaceBit == 'Yes') {
	          $url.= '&fireplace=1';
		}
		
		$utilitiesIncluded = (($this->input->post('utilitiesIncluded')) != '') ? $this->input->post('utilitiesIncluded') : NULL;
		if (!empty($utilitiesIncluded) && is_array($utilitiesIncluded)) {
	          $url.= '&utilities=' . urlencode(implode(',',$utilitiesIncluded));
		}		

		$HeatDescML = (($this->input->post('HeatDescML')) != '') ? $this->input->post('HeatDescML') : NULL;
		if (!empty($HeatDescML) && is_array($HeatDescML)) {
	          $url.= '&heating_d=' . urlencode(implode(',',$HeatDescML));
		}		
		
		$PoolDesc = (($this->input->post('PoolDesc')) != '') ? $this->input->post('PoolDesc') : NULL;
		if (!empty($PoolDesc) && is_array($PoolDesc)) {
	          $url.= '&pool_d=' . urlencode(implode(',',$PoolDesc));
		}				

		$ExtFeatures = (($this->input->post('ExtFeatures')) != '') ? $this->input->post('ExtFeatures') : NULL;
		if (!empty($ExtFeatures) && is_array($ExtFeatures)) {
	          $url.= '&exterior_f=' . urlencode(implode(',',$ExtFeatures));
		}				
		
		$GarageDesc = (($this->input->post('GarageDesc')) != '') ? $this->input->post('GarageDesc') : NULL;
		if (!empty($GarageDesc) && is_array($GarageDesc)) {
	          $url.= '&garage_d=' . urlencode(implode(',',$GarageDesc));
		}	
							
		$StyleArch = (($this->input->post('StyleArch')) != '') ? $this->input->post('StyleArch') : NULL;
		if (!empty($StyleArch) && is_array($StyleArch)) {
	          $url.= '&arch_s=' . urlencode(implode(',',$StyleArch));
		}	


		$LongTermBit = (($this->input->post('LongTermBit')) != '') ? $this->input->post('LongTermBit') : NULL;
		if (isset($LongTermBit) && $LongTermBit == 'Yes') {
	          $url.= '&long_t=1';
		}elseif( (isset($LongTermBit) && $LongTermBit == 'No') ){
		      $url.= '&long_t=0';
		}

							
		$LeaseTermsDesc = (($this->input->post('LeaseTermsDesc')) != '') ? $this->input->post('LeaseTermsDesc') : NULL;
		if (!empty($LeaseTermsDesc) && is_array($LeaseTermsDesc)) {
	          $url.= '&lease_t=' . urlencode(implode(',',$LeaseTermsDesc));
		}	
		
		
		$RoadFrontageDescription = (($this->input->post('RoadFrontageDescription')) != '') ? $this->input->post('RoadFrontageDescription') : '';
		if (!empty($RoadFrontageDescription)) {
		    $url.= "&road_f=" . urlencode($RoadFrontageDescription);
		}
		

		$FenceDesc = (($this->input->post('FenceDesc')) != '') ? $this->input->post('FenceDesc') : NULL;
		if (!empty($FenceDesc) && is_array($FenceDesc)) {
	          $url.= '&fences=' . urlencode(implode(',',$FenceDesc));
		}			
		
		
		$SidewalksBit = (($this->input->post('SidewalksBit')) != '') ? $this->input->post('SidewalksBit') : NULL;
		if (isset($SidewalksBit) && $SidewalksBit == 'Yes') {
	          $url.= '&sidewalk=1';
		}elseif( (isset($SidewalksBit) && $SidewalksBit == 'No') ){
		      $url.= '&sidewalk=0';
		}
		
		
		$photo_virtual_tour = (($this->input->post('photo_virtual_tour')) != '') ? $this->input->post('photo_virtual_tour') : NULL;
		if (isset($photo_virtual_tour) && $photo_virtual_tour == '1') {
	          $url.= '&media=1';
		}	
	
		//echo $url; exit;
		return $url;
    }
    
    /**
     * exclusive results for listings
     *
     * @access	public
     * @return	array result of the no criteria
     */
    
    function exclusive_get_data() {
        
        $this->db->select("rets_properties.`sysid`, rets_properties.`1`,rets_properties.`32`,rets_properties.`46`,rets_properties.`49`,rets_properties.`175`,rets_properties.`176`,rets_properties.`178`,rets_properties.`2294`,

       rets_properties.`2302`,rets_properties.`2304`,rets_properties.`2368`,rets_properties.`2622`");
        
        $this->db->from('rets_properties');
        $this->db->where("rets_properties.`178` <> 'Sold'");
        $this->db->where("(`17` = '261525539')");
        
        $query = $this->db->get();
        
        $ret = $query->num_rows() ? $query->result_array() : false;
        
        if ($ret == "") {
            $ret = "noresult";
        }
        
        return $ret;
    }
    
    /*function simple_get_data($get_count = 0, $limit = 15, $offset = 0) {
        
        correct one copied from savvycard
        http://idx.savvycard.com/index.php/v1/Properties.json?apiKey=savvycard&function=getdata&membership_id=20&category=all&property_type=&location=Miami&lat=0&lng=0&radius=1&get_count=1&limit=15&offset=0
        
        $location = (($this->input->post('AddressAndLoc')) != '') ? $this->input->post('AddressAndLoc') : '';
        $url = 'http://idx.savvycard.com/index.php/v1/Properties.json?apiKey=16e40183a6bf51c2cc1ec233db091c8b7a4d147d&function=getdata&membership_id=20&category=for_sale&property_type=&location=' . urlencode($location) . '&lat=0&lng=0&radius=20&get_count=' . $get_count . '&limit=' . $limit . '&offset=' . $offset . '';
        $results = json_decode(file_get_contents($url));
        
        try {
            
            if ($results) {
                if (empty($get_count)) {
                    $ret = $results->data;
                } else {
                    $ret = $results->count;
                }
            } else {
                $ret = "noresult";
            }
        }
        catch(Exception $e) {
            
            $ret = "error";
            
            error_log($e);
        }
        
        return $ret;
        print_r ($ret);
        exit();
    }*/
    
    function check_data_info($sysid) {
        $this->db->select('*');
        $this->db->from('rets_properties');
        $this->db->where('sysid', $sysid);
        
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    function save_data_info($saveAll) {
        
        $this->db->insert('rets_properties', $saveAll);
    }
    function save_img_url($save_img) {
        
        $this->db->insert('image_urls', $save_img);
    }
	
	function get_mlsids_data($mlsids_string){

		//$mlsids_string = 'T2614428,T2613661,T2604978,T2607596';

		$results = json_decode(
						$this->curl->simple_get(
							$this->config->item('scapi_url') 
								. '&function=' . 'getdata'
								. '&membership_id=' . MEMBERSHIP_ID
								. '&category=all' 
								. '&mls_number=' . urlencode($mlsids_string)
								. '&lat=0' 
								. '&lng=0' 
								. '&radius=80'
								. '&limit=500' 
								. '&offset=0'
							), 
						true
					);

		if( $results == "" ) { $results = "no-result"; }

		return $results;

	}	
	
	
	private function initCurl()
	{
		$this->config->load('scapi');
		$this->load->library('curl');
	}	

}
?>