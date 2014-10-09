<?php



class Adv_search_model extends CI_Model {





	/**

	 * get the totoal number of records

	 *

	 * @access	public

	 * @return	number of the search results

	 */

	function get_total_count(){

		

		$count = 0;

		

		$conditions = $this->where_conditions();

		foreach($conditions as $condition){

			$this->db->where($condition);

		}

			

		$this->db->from('rets_properties');

		$this->db->where("rets_properties.`178` <> 'Sold'");

		try {       

			$count = $this->db->count_all_results();

			

			return $count;

			

		} catch (Exception $e) {

			$ret = "error";

			error_log($e);

		}



		return $ret;

	

	}

	

	/**

	 * simple search results for listings

	 *

	 * @access	public

	 * @return	array  result of the search criteria

	 */

	  function simple_get_dataa($get_count = 0,$limit=15,$offset=0){



		$location= (($this->input->post('AddressAndLoc')) != '') ? $this->input->post('AddressAndLoc') : '';	

		$this->db->select(" rets_properties.`sysid`, rets_properties.`1`,rets_properties.`32`,rets_properties.`46`,rets_properties.`49`,rets_properties.`175`,rets_properties.`176`,rets_properties.`178`,rets_properties.`2294`,

				   rets_properties.`2302`,rets_properties.`2304`,rets_properties.`2368`,rets_properties.`2622`");

		$this->db->from('rets_properties');
		$this->db->where("rets_properties.`178` <> 'Sold'");
		$this->db->where("(rets_properties.`46` LIKE '$location' OR rets_properties.`49` LIKE '$location' OR rets_properties.`175` LIKE '$location' OR rets_properties.`2302` LIKE '$location' OR rets_properties.`2304` LIKE '$location')");



		if(empty($get_count)){

			$this->db->limit($limit, $offset);

		}

		

		try {       

			$query = $this->db->get();



			if(empty($get_count)){

				$ret = $query->num_rows() ? $query->result_array() : false;       

				if( $ret == "" ) { $ret = "noresult"; }

			}else{

				$ret = $query->num_rows();

			}

			

			

		} catch (Exception $e) {

			$ret = "error";

			error_log($e);

		}



		return $ret;



	

	}   

	

	/**

	 * advance search results for listings

	 *

	 * @access	public

	 * @return	array  result of the search criteria

	 */

	function get_data($get_count = 0,$limit=15,$offset=0){



		$this->db->select(" rets_properties.`sysid`, rets_properties.`1`,rets_properties.`32`,rets_properties.`46`,rets_properties.`49`,rets_properties.`175`,rets_properties.`176`,rets_properties.`178`,rets_properties.`2294`,

				   rets_properties.`2302`,rets_properties.`2304`,rets_properties.`2368`,rets_properties.`2622`");

		$this->db->from('rets_properties');

		$this->db->where("rets_properties.`178` <> 'Sold'");

		$conditions = $this->where_conditions();

		//print_r($conditions); exit;

		foreach($conditions as $condition){

			$this->db->where($condition);

		}			

		

		if(empty($get_count)){

			$this->db->limit($limit, $offset);

		}

		

		try {       

			$query = $this->db->get();



			if(empty($get_count)){

				$ret = $query->num_rows() ? $query->result_array() : false;       

				if( $ret == "" ) { $ret = "noresult"; }

			}else{

				$ret = $query->num_rows();

			}

			

			

		} catch (Exception $e) {

			$ret = "error";

			error_log($e);

		}



		return $ret;



	

	}

	

	function where_conditions(){

	

		$where = array();



		$property_type = (($this->input->post('formType')) != '') ? $this->input->post('formType') : 'Residential';



		$where[] = "rets_properties.`1` = '$property_type'";



		

		$SubTypeDesc = (($this->input->post('SubTypeDesc')) != '') ? $this->input->post('SubTypeDesc') : 0;		

		/*if (!empty($SubTypeDesc)) {

			$where[] = "rets_properties.`1349` LIKE '%$SubTypeDesc%'";  //for residential and income

		}*/

		if (!empty($SubTypeDesc[0])) {

			$SubTypeDesc_string = implode("','",$SubTypeDesc);

			$where[] = "rets_properties.`1349` in ('$SubTypeDesc_string')"; //for residential and income

		}



		$SubTypeDesc_commercial= (($this->input->post('SubTypeDesc_commercial')) != '') ? $this->input->post('SubTypeDesc_commercial') : 0;		

		if (!empty($SubTypeDesc_commercial[0])) {

			$commercial_string = implode("','",$SubTypeDesc_commercial);

			$where[] = "rets_properties.`77` in ('$commercial_string')"; //for commericial

		}



		$SubTypeDesc_land= (($this->input->post('SubTypeDesc_land')) != '') ? $this->input->post('SubTypeDesc_land') : 0;		

		if (!empty($SubTypeDesc_land[0])) {

			$land_string = implode("','",$SubTypeDesc_land);

			$where[] = "rets_properties.`1764` in ('$land_string')"; //for land

		}

		//property status
		$propStatus = (($this->input->post('propStatus')) != '') ? $this->input->post('propStatus') : 0;		
		
		if (!empty($propStatus[0])) {

			$propStatus_string = implode("','",$propStatus);
			$where[] = "rets_properties.`178` in ('$propStatus_string')"; 
		}

		$Min_SqftTotal= (($this->input->post('Min_SqftTotal')) != '') ? $this->input->post('Min_SqftTotal') : 0;		

		if (!empty($Min_SqftTotal)) {

			$where[] = "rets_properties.`80` > $Min_SqftTotal"; 

		}

		

		$Max_SqftTotal= (($this->input->post('Max_SqftTotal')) != '') ? $this->input->post('Max_SqftTotal') : 0;		

		if (!empty($Max_SqftTotal)) {

			$where[] = "rets_properties.`80` < $Max_SqftTotal"; 

		}



		$beds_min= (($this->input->post('MinBeds')) != '') ? $this->input->post('MinBeds') : 0;

		if (!empty($beds_min)) {

			$where[] = "rets_properties.`32` > $beds_min";

		}



		$baths_min= (($this->input->post('BathroomsFull')) != '') ? $this->input->post('BathroomsFull') : 0;		

		if (!empty($baths_min)) {

			$where[] = "rets_properties.`2294` > $baths_min"; //Fbaths

		}

		

		$Year_Built= (($this->input->post('Year_Built')) != '') ? $this->input->post('Year_Built') : 0;		

		if (!empty($Year_Built)) {

			$where[] = "rets_properties.`55` > '$Year_Built'"; 

		}



		$Year_Built_Max= (($this->input->post('Year_Built_Max')) != '') ? $this->input->post('Year_Built_Max') : 0;		

		if (!empty($Year_Built_Max)) {

			$where[] = "rets_properties.`55` < '$Year_Built_Max'"; 

		}



		$price_min = (($this->input->post('Min_Price')) != '') ? $this->input->post('Min_Price') : 0;

		if (!empty($price_min)) {

			$where[1000] = "rets_properties.`176` > $price_min";

		}



		$price_max= (($this->input->post('Max_Price')) != '') ? $this->input->post('Max_Price') : 0;

		if (!empty($price_max)) {

			$where[2000] = "rets_properties.`176` < $price_max";

		}



		$price_min2 = (($this->input->post('Min_Price2')) != '') ? $this->input->post('Min_Price2') : 0;

		if (!empty($price_min2)) {	

			unset($where[1000]);

			$where[1000] = "rets_properties.`176` > $price_min2";

		}



		$price_max2 = (($this->input->post('Max_Price2')) != '') ? $this->input->post('Max_Price2') : 0;

		if (!empty($price_max2)) {

			unset($where[2000]);

			$where[2000] = "rets_properties.`176` < $price_max2";

		}

		

		$Remarks= (($this->input->post('Remarks')) != '') ? $this->input->post('Remarks') : '';		

		if (!empty($Remarks)) {

			$where[] = "rets_properties.`3187` LIKE '%$Remarks%'";

		}



		$location_select = (($this->input->post('location-select')) != '') ? $this->input->post('location-select') : 'rad-city';



		$CityLI= (($this->input->post('CityLI')) != '') ? $this->input->post('CityLI') : '';		

		if (!empty($CityLI) && $location_select == 'rad-city') {

			$where[] = "rets_properties.`2302` LIKE '%$CityLI%'";

		}		

		

		$Zip_Code= (($this->input->post('Zip_Code')) != '') ? $this->input->post('Zip_Code') : '';		

		if (!empty($Zip_Code) && $location_select == 'rad-zip') {

			$where[] = "rets_properties.`46` = '$Zip_Code'";

		}	

		

		$county= (($this->input->post('county[]')) != '') ? $this->input->post('county[]') : '';		

		if (!empty($county) && $location_select == 'rad-county') {



		}

		

		$Elem_SchoolEQ= (($this->input->post('Elem_SchoolEQ')) != '') ? $this->input->post('Elem_SchoolEQ') : '';		

		if (!empty($Elem_SchoolEQ)) {

			$elem_string = implode("','",$Elem_SchoolEQ);

			$where[] = "rets_properties.`567` in ('$elem_string')";

		}

		

		$Middle_School= (($this->input->post('Middle_School')) != '') ? $this->input->post('Middle_School') : '';		

		if (!empty($Middle_School)) {

			$middle_string = implode("','",$Middle_School);

			$where[] = "rets_properties.`595` in ('$middle_string')";

		}

		

		$High_School= (($this->input->post('High_School')) != '') ? $this->input->post('High_School') : '';		

		if (!empty($High_School)) {

			$high_string = implode("','",$High_School);

			$where[] = "rets_properties.`590` in ('$high_string')";

		}

		

		$WaterAccess= (($this->input->post('WaterAccess')) != '') ? $this->input->post('WaterAccess') : '';		

		if (!empty($WaterAccess)) {

			$where[] = "rets_properties.`3063` = '$WaterAccess'";

		}	



		$WaterView= (($this->input->post('WaterView')) != '') ? $this->input->post('WaterView') : '';		

		if (!empty($WaterView)) {

			$where[] = "rets_properties.`3064` = '$WaterView'";

		}	

		

		$WaterfrontProperty= (($this->input->post('WaterfrontProperty')) != '') ? $this->input->post('WaterfrontProperty') : '';		

		if (!empty($WaterfrontProperty)) {

			$where[] = "rets_properties.`3065` = '$WaterfrontProperty'";

		}	

		

		$WaterExtrasBit= (($this->input->post('WaterExtrasBit')) != '') ? $this->input->post('WaterExtrasBit') : '';		

		if (!empty($WaterExtrasBit)) {

			$where[] = "rets_properties.`3066` = '$WaterExtrasBit'";

		}	

		

		$ComplexUnits = (($this->input->post('ComplexUnits')) != '') ? $this->input->post('ComplexUnits') : 0;

		if (!empty($ComplexUnits)) {

			$where[] = "rets_properties.`709` > $ComplexUnits";

		}



		$ComplexUnitsMax= (($this->input->post('ComplexUnitsMax')) != '') ? $this->input->post('ComplexUnitsMax') : 0;

		if (!empty($ComplexUnitsMax)) {

			$where[] = "rets_properties.`709` < $ComplexUnitsMax";

		}

		

		$MinBuildings = (($this->input->post('MinBuildings')) != '') ? $this->input->post('MinBuildings') : 0;

		if (!empty($MinBuildings)) {

			$where[] = "rets_properties.`858` > $MinBuildings";

		}



		$MaxBuildings= (($this->input->post('MaxBuildings')) != '') ? $this->input->post('MaxBuildings') : 0;

		if (!empty($MaxBuildings)) {

			$where[] = "rets_properties.`858` < $MaxBuildings";

		}

		

		$LeaseRateMin = (($this->input->post('LeaseRateMin')) != '') ? $this->input->post('LeaseRateMin') : 0;

		if (!empty($LeaseRateMin)) {

			$where[] = "rets_properties.`2308` > $LeaseRateMin";

		}



		$LeaseRateMax= (($this->input->post('LeaseRateMax')) != '') ? $this->input->post('LeaseRateMax') : 0;

		if (!empty($LeaseRateMax)) {

			$where[] = "rets_properties.`2308` < $LeaseRateMax";

		}

		

		//Additional Property Details

		$Pets= (($this->input->post('Pets')) != '') ? $this->input->post('Pets') : '';		

		if (!empty($Pets)) {

				$where[] = "rets_properties.`3075` = '$Pets'";

		}

		

		$HousingOlderPersons= (($this->input->post('HousingOlderPersons')) != '') ? $this->input->post('HousingOlderPersons') : '';

		if (!empty($HousingOlderPersons)) {

			$older_string = implode(",",$HousingOlderPersons);

			$where[] = "rets_properties.`3036` like '%$older_string%'";

		}

		

		$MinFloors = (($this->input->post('MinFloors')) != '') ? $this->input->post('MinFloors') : 0;

		if (!empty($MinFloors)) {	

			$where[] = "rets_properties.`432` > $MinFloors";

		}

		

		$unitFloors = (($this->input->post('unitFloors')) != '') ? $this->input->post('unitFloors') : 0;

		if (!empty($unitFloors)) {	

			$where[] = "rets_properties.`2803` > $unitFloors";

		}

		

		$CondoUnitLevelMin = (($this->input->post('CondoUnitLevelMin')) != '') ? $this->input->post('CondoUnitLevelMin') : 0;

		if (!empty($CondoUnitLevelMin)) {	

			$where[] = "rets_properties.`2791` > $CondoUnitLevelMin";

		}

		

		$community_features= (($this->input->post('community_features')) != '') ? $this->input->post('community_features') : '';		

		if (!empty($community_features)) {

			$community_string = implode(",",$community_features);

			$where[] = "rets_properties.`1328` like '%$community_string%'";

		}

		

		$Subdivision = (($this->input->post('Subdivision')) != '') ? $this->input->post('Subdivision') : '';

		if (!empty($Subdivision)) {	

			$where[] = "rets_properties.`2314` 	LIKE '%$Subdivision%'";

		}

		

		$feeCondoMaintenanceFrequency = (($this->input->post('feeCondoMaintenanceFrequency')) != '') ? $this->input->post('feeCondoMaintenanceFrequency') : '';

		if (!empty($feeCondoMaintenanceFrequency)) {	

			$where[] = "rets_properties.`3190` = '$feeCondoMaintenanceFrequency'";

		}

		

		$HOA_Frequency = (($this->input->post('HOA_Frequency')) != '') ? $this->input->post('HOA_Frequency') : '';

		if (!empty($HOA_Frequency)) {	

			$where[] = "rets_properties.`2901` = '$HOA_Frequency'";

		}

		

		$HOA_Mandatory = (($this->input->post('HOA_Mandatory')) != '') ? $this->input->post('HOA_Mandatory') : '';

		if (!empty($HOA_Mandatory)) {	

			$where[] = "rets_properties.`3074` = '$HOA_Mandatory'";

		}



		$CDD = (($this->input->post('CDD')) != '') ? $this->input->post('CDD') : '';

		if (!empty($CDD)) {	

			$where[] = "rets_properties.`2795` = '$CDD'";

		}

		

		$GreenCertDesc= (($this->input->post('GreenCertDesc')) != '') ? $this->input->post('GreenCertDesc') : '';		

		if (!empty($GreenCertDesc)) {

			$green_string = implode("','",$GreenCertDesc);

			$where[] = "rets_properties.`3015` in ('$green_string')";

		}

		

		$GreenLand= (($this->input->post('GreenLand')) != '') ? $this->input->post('GreenLand') : '';

		if (!empty($GreenLand)) {

			$land_string = implode("','",$GreenLand);

			$where[] = "rets_properties.`3192` in ('$land_string')";

		}

		

		$GreenWater= (($this->input->post('GreenWater')) != '') ? $this->input->post('GreenWater') : '';

		if (!empty($GreenWater)) {

			$water_string = implode("','",$GreenWater);

			$where[] = "rets_properties.`3183` in ('$water_string')";

		}

		

		$disaster_mitigation= (($this->input->post('disaster_mitigation')) != '') ? $this->input->post('disaster_mitigation') : '';

		if (!empty($disaster_mitigation)) {

			$disaster_string = implode(",",$disaster_mitigation);

			$where[] = "rets_properties.`3193` like '%$disaster_string%'";

		}

		

		$AirQualityIndoor= (($this->input->post('AirQualityIndoor')) != '') ? $this->input->post('AirQualityIndoor') : '';

		if (!empty($AirQualityIndoor)) {

			$quality_string = implode(",",$AirQualityIndoor);

			$where[] = "rets_properties.`3191` like '%$quality_string%'";

		}

		

		$LongTermBit = (($this->input->post('LongTermBit')) != '') ? $this->input->post('LongTermBit') : '';

		if (!empty($LongTermBit)) {	

			$where[] = "rets_properties.`1248` = '$LongTermBit'";

		}

		

		$Complex_Community_Name= (($this->input->post('Complex_Community_Name')) != '') ? $this->input->post('Complex_Community_Name') : '';

		if (!empty($LeaseRateMax)) {

			$where[] = "rets_properties.`2316` LIKE '%$Complex_Community_Name%'";

		}

		

		//Interior

		

		$RoadFrontageDescription = (($this->input->post('RoadFrontageDescription')) != '') ? $this->input->post('RoadFrontageDescription') : '';

		if (!empty($RoadFrontageDescription)) {	

			$where[] = "rets_properties.`384` = '$RoadFrontageDescription'";

		}

		

		$FenceDesc= (($this->input->post('FenceDesc')) != '') ? $this->input->post('FenceDesc') : '';

		if (!empty($FenceDesc)) {

			$fence_string = implode(",",$FenceDesc);

			$where[] = "rets_properties.`2134` like '%$fence_string%'";

		}

		

		$InteriorLayout= (($this->input->post('InteriorLayout')) != '') ? $this->input->post('InteriorLayout') : '';

		if (!empty($InteriorLayout)) {

			$interior_string = implode(",",$InteriorLayout);

			$where[] = "rets_properties.`895` like '%$interior_string%'";

		}

		

		$KitchenFeatures= (($this->input->post('KitchenFeatures')) != '') ? $this->input->post('KitchenFeatures') : '';

		if (!empty($KitchenFeatures)) {

			$kitchen_string = implode("','",$KitchenFeatures);

			$where[] = "rets_properties.`897` in ('$kitchen_string')";

		}

		

		$Appliances= (($this->input->post('Appliances')) != '') ? $this->input->post('Appliances') : '';

		if (!empty($Appliances)) {

			$appliances_string = implode(",",$Appliances);

			$where[] = "rets_properties.`898` like '%$appliances_string%'";

		}

		

		$cooling_description= (($this->input->post('cooling_description')) != '') ? $this->input->post('cooling_description') : '';

		if (!empty($cooling_description)) {

			$cooling_string = implode(",",$cooling_description);

			$where[] = "rets_properties.`487` like '%$cooling_string%'";

		}

		

		$utilitiesIncluded= (($this->input->post('utilitiesIncluded')) != '') ? $this->input->post('utilitiesIncluded') : '';

		if (!empty($utilitiesIncluded)) {

			$utility_string = implode(",",$utilitiesIncluded);

			$where[] = "rets_properties.`475` like '%$utility_string%'";

		}

		

		$HeatDescML= (($this->input->post('HeatDescML')) != '') ? $this->input->post('HeatDescML') : '';

		if (!empty($HeatDescML)) {

			$heat_string = implode(",",$HeatDescML);

			$where[] = "rets_properties.`486` like '%$utility_string%'";

		}

		

		$FireplaceBit = (($this->input->post('FireplaceBit')) != '') ? $this->input->post('FireplaceBit') : '';

		if (!empty($FireplaceBit)) {	

			$where[] = "rets_properties.`2801` = '$FireplaceBit'";

		}



		//Exterior

		$PoolDesc = (($this->input->post('PoolDesc')) != '') ? $this->input->post('PoolDesc') : '';

		if (!empty($PoolDesc)) {	

			$where[] = "rets_properties.`3186` LIKE '%$PoolDesc%'";

		}

		

		$ExtFeatures= (($this->input->post('ExtFeatures')) != '') ? $this->input->post('ExtFeatures') : '';

		if (!empty($ExtFeatures)) {

			$exterior_string = implode(",",$ExtFeatures);

			$where[] = "rets_properties.`904` like '%$exterior_string%'";

		}

		

		$GarageDesc= (($this->input->post('GarageDesc')) != '') ? $this->input->post('GarageDesc') : '';

		if (!empty($GarageDesc)) {

			$garage_string = implode("','",$GarageDesc);

			$where[] = "rets_properties.`2805` in ('$garage_string')";

		}

		

		$StyleArch= (($this->input->post('StyleArch')) != '') ? $this->input->post('StyleArch') : '';

		if (!empty($StyleArch)) {

			$style_string = implode("','",$StyleArch);

			$where[] = "rets_properties.`886` in ('$style_string')";

		}

		

		$RoofDesc= (($this->input->post('RoofDesc')) != '') ? $this->input->post('RoofDesc') : '';

		if (!empty($RoofDesc)) {

			$roof_string = implode(",",$RoofDesc);

			$where[] = "rets_properties.`490` like '%$roof_string%'";

		}

		

		$Construction= (($this->input->post('Construction')) != '') ? $this->input->post('Construction') : '';

		if (!empty($Construction)) {

			$construction_string = implode(",",$Construction);

			$where[] = "rets_properties.`488` like '%$construction_string%'";

		}

		

		$SidewalksBit = (($this->input->post('SidewalksBit')) != '') ? $this->input->post('SidewalksBit') : '';

		if (!empty($SidewalksBit)) {	

			$where[] = "rets_properties.`2836` = '$SidewalksBit'";

		}

		//Search Filters

		

		



		return $where;

	}

	

	

	/**

	* exclusive results for listings

	*

	* @access	public

	* @return	array result of the no criteria

	*/

	function exclusive_get_data(){



		$this->db->select("rets_properties.`sysid`, rets_properties.`1`,rets_properties.`32`,rets_properties.`46`,rets_properties.`49`,rets_properties.`175`,rets_properties.`176`,rets_properties.`178`,rets_properties.`2294`,

       rets_properties.`2302`,rets_properties.`2304`,rets_properties.`2368`,rets_properties.`2622`");

		$this->db->from('rets_properties');
		$this->db->where("rets_properties.`178` <> 'Sold'");
		$this->db->where("(`17` = '261525539')");



		$query = $this->db->get();

		$ret = $query->num_rows() ? $query->result_array() : false;

		if( $ret == "" ) { $ret = "noresult"; }

		return $ret;

	}

	








function simple_get_data($get_count = 0,$limit=15,$offset=0){

//correct one copied from savvycard
//http://idx.savvycard.com/index.php/v1/Properties.json?apiKey=savvycard&function=getdata&membership_id=20&category=all&property_type=&location=Miami&lat=0&lng=0&radius=1&get_count=1&limit=15&offset=0

$location= (($this->input->post('AddressAndLoc')) != '') ? $this->input->post('AddressAndLoc') : ''; 
$url = 'http://idx.savvycard.com/index.php/v1/Properties.json?apiKey=16e40183a6bf51c2cc1ec233db091c8b7a4d147d&function=getdata&membership_id=20&category=for_sale&property_type=&location='.urlencode($location).'&lat=0&lng=0&radius=20&get_count='. $get_count.'&limit='.$limit.'&offset='.$offset.'';
$results = json_decode(file_get_contents($url));


try {       


if ($results) {
if(empty($get_count)){
$ret = $results->data; 
}else{
$ret = $results->count;
}
} else {
$ret = "noresult"; 
}


} catch (Exception $e) {

$ret = "error";

error_log($e);

}

return $ret;

//print_r ($ret);
//exit();




}


}


?>