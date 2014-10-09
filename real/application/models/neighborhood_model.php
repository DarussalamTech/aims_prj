<?php

class Neighborhood_model extends CI_Model {

/**
	 * get the records for neighborhood
	 *
	 * @access	public
	 * @return	number of the search results
	 */
	function get_total_count($neighborhood){
		
		$this->db->select('polygon_cords');
		$query = $this->db->get_where('neighborhoods', array('neighborhood_slug' => $neighborhood));

        $polygon = $query->num_rows() ? $query->row() : false;

		if($polygon === false){
			return "noresult";
		}
		//var_dump($polygon);
		$neighbor_cords = unserialize($polygon->polygon_cords);
		//var_dump($neighbor_cords);exit;
		$this->db->select("rets_properties.sysid,rets_properties.`32`,rets_properties.`46`,rets_properties.`49`,rets_properties.`165`,rets_properties.`175`,
							rets_properties.`176`,rets_properties.`178`,rets_properties.`421`,rets_properties.`2294`,rets_properties.`3187`,rets_properties.`2302`,
							rets_properties.`2304`,rets_properties.`2368`,rets_properties.`2346`,rets_properties.`images`,rets_properties.`latitude`,rets_properties.`longitude`, AsText( `coords` )");
		$this->db->from('rets_properties');
		$this->db->where("rets_properties.`178` <> 'Sold'");	
		$this->db->where("geocoded <> 0");			

		foreach($neighbor_cords as $cords){
			//$this->db->where("myWithin(PointFromText( concat( 'POINT(', latitude, ' ', longitude, ')' ) ), PolyFromText( 'POLYGON(($cords))' ) ) = 1 ");
			$this->db->where("Contains( GeomFromText( 'POLYGON(( $cords ))' ) , coords )");
		}
	
		$conditions = $this->where_conditions();
		//print_r($conditions);exit();
		foreach($conditions as $condition){
			$this->db->where($condition);
		}			
	
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
	 * get the records for neighborhood
	 *
	 * @access	public
	 * @return	number of the search results
	 */
	function get_data($neighborhood,$get_count = 0,$limit=18,$offset=0){
		
		$this->db->select('polygon_cords');
		$query = $this->db->get_where('neighborhoods', array('neighborhood_slug' => $neighborhood));

        $polygon = $query->num_rows() ? $query->row() : false;

		if($polygon === false){
			return "noresult";
		}
		
		$neighbor_cords = unserialize($polygon->polygon_cords);

		

		$this->db->select("rets_properties.sysid,rets_properties.`32`,rets_properties.`46`,rets_properties.`49`,rets_properties.`165`,rets_properties.`175`,
							rets_properties.`176`,rets_properties.`178`,rets_properties.`421`,rets_properties.`2294`,rets_properties.`3187`,rets_properties.`2302`,
							rets_properties.`2304`,rets_properties.`2368`,rets_properties.`2346`,rets_properties.`images`,rets_properties.`latitude`,rets_properties.`longitude`, AsText( `coords` )");
		$this->db->from('rets_properties');
		$this->db->where("rets_properties.`178` <> 'Sold'");
		$this->db->where("geocoded <> 0");

		foreach($neighbor_cords as $cords){
			//$this->db->where("myWithin(PointFromText( concat( 'POINT(', latitude, ' ', longitude, ')' ) ), PolyFromText( 'POLYGON(($cords))' ) ) = 1 ");
			$this->db->where("Contains( GeomFromText( 'POLYGON(( $cords ))' ) , coords )");
		}
		
		$conditions = $this->where_conditions();
		//print_r($conditions);exit();
		foreach($conditions as $condition){
			$this->db->where($condition);
		}		
	
		if(empty($get_count)){
			$this->db->limit($limit, $offset);
			$this->db->order_by('`112`', 'desc');			
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

		$property_type = (($this->input->post('property_type')) != '') ? $this->input->post('property_type') : 'Residential';

		
		if (!empty($property_type)) {
			$where[] = "rets_properties.`1` = '$property_type'";
		}
		
		$SubTypeDesc= (($this->input->post('SubTypeDesc')) != '') ? $this->input->post('SubTypeDesc') : 0;		
		if (!empty($SubTypeDesc[0])) {
			$SubTypeDesc_string = implode("','",$SubTypeDesc);
			$where[] = "rets_properties.`1349` in ('$SubTypeDesc_string')"; //for residential and income
		}
		
		
		$SubTypeDesc_commercial= $this->input->post('SubTypeDesc_commercial');
		if (!empty($SubTypeDesc_commercial[0])) {
			$commercial_string = implode("','",$SubTypeDesc_commercial);
			$where[] = "rets_properties.`77` in ('$commercial_string')"; //for commericial
		}

		$SubTypeDesc_land= (($this->input->post('SubTypeDesc_land')) != '') ? $this->input->post('SubTypeDesc_land') : 0;		
		if (!empty($SubTypeDesc_land[0])) {
			$land_string = implode("','",$SubTypeDesc_land);
			$where[] = "rets_properties.`1764` in ('$land_string')"; //for land
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
			unsert($where[1000]);
			$where[1000] = "rets_properties.`176` > $price_min2";
		}

		$price_max2 = (($this->input->post('Max_Price2')) != '') ? $this->input->post('Max_Price2') : 0;
		if (!empty($price_max2)) {
			unsert($where[2000]);
			$where[2000] = "rets_properties.`176` < $price_max2";
		}
		
		$Remarks= (($this->input->post('Remarks')) != '') ? $this->input->post('Remarks') : '';		
		if (!empty($Remarks)) {
			$where[] = "rets_properties.`3187` LIKE '%$Remarks%'";
		}

		return $where;
	}
	
	

}