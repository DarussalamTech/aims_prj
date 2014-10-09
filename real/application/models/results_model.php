<?php







class results_model extends CI_Model {



	public $resnum = 30;







	function get_data_old($limit = 1, $offset = 0) {







        $beds = (($this->input->get('beds')) != '') ? ($this->input->get('beds')) : "0";



        $baths = (($this->input->get('baths')) != '') ? $this->input->get('baths') : "0";



        $priceMin = (($this->input->get('priceMin')) != '') ? $this->input->get('priceMin') : "0";



        $priceMax = (($this->input->get('priceMax')) != '') ? $this->input->get('priceMax') : "99999999";  



        $propertyType = (($this->input->get('propertyType')) != '') ? "'".$this->input->get('propertyType')."'" : 0;           



        $loc = (($this->input->get('loc')) != '') ? "'".$this->input->get('loc')."'" : 0;   



        $part = (($this->input->get('pt')) != '') ? ($this->input->get('pt')) : "0";







		$offset = $part * $this->resnum;







        //geo



        $radius = (($this->input->get('radius')) != '') ? $this->input->get('radius') : "10000000";



        $lat = (($this->input->get('lat')) != '') ? $this->input->get('lat') : "0";



        $lng = (($this->input->get('lng')) != '') ? $this->input->get('lng') : "0";



        



        if( $lat == 0 || $lng == 0) {



        	$radius = 10000000;



        }



        $ret = '';



        $zip = '';







		try {  







	        $amountTotal = $this->db->query("SELECT `sysid` FROM `rets_properties`");







			$num = $amountTotal->num_rows();  







			if($this->isZip($loc)) {



				$zip = " AND `46` IN (" .$this->isZip($loc) . ")";



				$limit = $this->resnum;







				$where = " WHERE `1` = $propertyType". $zip ." /*AND `2294` > $baths AND 



										`32` >  $beds*/ AND 



										`176` > $priceMin AND `176` < $priceMax LIMIT $offset, $limit";







				$property_query = "SELECT * FROM `rets_properties`" . $where;



				$query = $this->db->query($property_query);



				foreach ($query->result_array() as $row) {



					$ret[] = $row;



				}



			} else {







				$i = 0;



				$ret = "";



				for($a = 0; $a < $num ; $a++) {







					if( $i == $this->resnum) break;







					$start = $offset + $a;



					$where = " WHERE `1` = $propertyType /*AND `2294` > $baths AND 



											`32` >  $beds*/ AND 



											`176` > $priceMin AND `176` < $priceMax LIMIT $start, $limit";







					$property_query = "SELECT * FROM `rets_properties`" . $where;







					$query = $this->db->query($property_query);



					$row = $query->result_array();



					if(!$row[0]) continue;



					$row = $row[0];



					



					if( $this->distance($lat, $lng, $row["latitude"], $row["longitude"]) < $radius ) {



						$ret[] = $row;



						$i++;



					}



					



				}



			}







			if( $ret == "" ) { $ret = "noresult"; }







        } catch (Exception $e) {



        	$ret = "error";



            error_log($e);



        }







	    return json_encode($ret);



	}





	/**

	 * search results for listings

	 *

	 * @access	public

	 * @return	array  result of the search criteria

	 */

	function get_data($latLong, $get_count = 0){

		

		$limit = $this->resnum;

		

		if($this->input->post('lat') != ''){

			$lat = $this->input->post('lat');

		}else{

			$lat = !empty($latLong['lat'])?$latLong['lat']:0;

		}

		

		if($this->input->post('lng') != ''){

			$lng = $this->input->post('lng');

		}else{

			$lng = !empty($latLong['lng'])?$latLong['lng']:0;

		}



        $radius = (($this->input->post('radius')) != '') ? $this->input->post('radius') : 1;	



        $part = (($this->input->post('part')) != '') ? ($this->input->post('part')) : "0";

		$offset = $part * $this->resnum;





		//sysid,32,46,49,165,175,176,421,2294,3187,2302,2304,2368,2346,images

		if(!empty($lat) && !empty($lng)){

			//if latitude and longitude information is available then first search on lat/long information

			//Here's the SQL statement that will find the closest 20 locations that are within a radius of required miles to the $lat, $lng coordinate. It calculates the distance based on the latitude/longitude of that row and the target latitude/longitude, and then asks for only rows where the distance value is less than 25, orders the whole query by distance, and limits it to 20 results. To search by kilometers instead of miles, replace 3959 with 6371. 

			$this->db->select("rets_properties.sysid,rets_properties.`32`,rets_properties.`46`,rets_properties.`49`,rets_properties.`165`,rets_properties.`175`,

			rets_properties.`176`,rets_properties.`178`,rets_properties.`421`,rets_properties.`2294`,rets_properties.`3187`,rets_properties.`2302`,

			rets_properties.`2304`,rets_properties.`2368`,rets_properties.`2346`,rets_properties.`images`,rets_properties.`latitude`,rets_properties.`longitude`,

			( 3959 * acos( cos( radians($lat) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( latitude ) ) ) ) AS distance ");

			$this->db->from('rets_properties');

		    $this->db->where("rets_properties.`178` <> 'Sold'");					

			$this->db->where("(geocoded <> 0 OR latitude != '' OR longitude !='')");			

			$this->db->having("distance < $radius"); 

			$this->db->order_by("distance", "asc"); 

			

		}else{

		

			$location= (($this->input->post('loc')) != '') ? $this->input->post('loc') : '';	

			$this->db->select("rets_properties.sysid,rets_properties.`32`,rets_properties.`46`,rets_properties.`49`,rets_properties.`165`,rets_properties.`175`,

			rets_properties.`176`,rets_properties.`178`,rets_properties.`421`,rets_properties.`2294`,rets_properties.`3187`,rets_properties.`2302`,

			rets_properties.`2304`,rets_properties.`2368`,rets_properties.`2346`,rets_properties.`images`,rets_properties.`latitude`,rets_properties.`longitude`,	

			( 3959 * acos( cos( radians($lat) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( latitude ) ) ) ) AS distance ");

			$this->db->from('rets_properties');

		  	$this->db->where("rets_properties.`178` <> 'Sold'");					

			$this->db->where("(geocoded <> 0 OR latitude != '' OR longitude !='')");

			$this->db->where("(rets_properties.`46` LIKE '$location' OR rets_properties.`49` LIKE '$location' OR rets_properties.`2302` LIKE '$location' OR rets_properties.`2304` LIKE '$location')");

			

		}

		

		$conditions = $this->where_conditions();

		

		

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







	function distance($lat1, $lon1, $lat2, $lon2) {



		$theta = $lon1 - $lon2;



		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));



		$dist = acos($dist);



		$dist = rad2deg($dist);



		$miles = $dist * 60 * 1.1515;







		return $miles;



	}











	function getImages() {







		$sysid = (($this->input->get('sysid')) != '') ? ($this->input->get('sysid')) : "0";



		$query = "SELECT * FROM `image_urls` WHERE sysid = " . $sysid;







		try {       







			$query = $this->db->query($query);







			$ret = "";



			$i = 0;



			foreach ($query->result_array() as $row)



			{				



				$ret[] = $row;



			}







			if( $ret == "" ) { $ret = "noresult"; }







        } catch (Exception $e) {



        	$ret = "error";



            error_log($e);



        }







	    return json_encode($ret);



	}







	function isZip($loc) {



		$zip = "/[0-9]{5}/";



		preg_match_all($zip, $loc, $matches);



		return implode(",", $matches[0]);



	}





	function where_conditions(){

	

		$where = array();



		$property_type = (($this->input->post('propertyType')) != '') ? $this->input->post('propertyType') : 'Residential';



		$where[] = "rets_properties.`1` LIKE '$property_type'";



		$property_style_Residential= (($this->input->post('property_style_Residential')) != '') ? $this->input->post('property_style_Residential') : 0;		

		

		if (!empty($property_style_Residential)) {

			$property_style_Residential_string = implode("','",$property_style_Residential);

			$where[] = "rets_properties.`1349` in ('$property_style_Residential_string')";

		}



		$property_style_Income= (($this->input->post('property_style_Income')) != '') ? $this->input->post('property_style_Income') : 0;		

		if (!empty($property_style_Income)) {

			$property_style_Income_string = implode("','",$property_style_Income);

			$where[] = "rets_properties.`1349` in ('$property_style_Income_string')";

		}

		

		$property_style_Vacant= (($this->input->post('property_style_Vacant-Land')) != '') ? $this->input->post('property_style_Vacant-Land') : 0;		

		if (!empty($property_style_Vacant)) {

			$property_style_Vacant_string = implode("','",$property_style_Vacant);	

			$where[] = "rets_properties.`1764` in ('$property_style_Vacant_string')";					

		}

		

		$property_style_Commercial= (($this->input->post('property_style_Commercial')) != '') ? $this->input->post('property_style_Commercial') : 0;		

		if (!empty($property_style_Commercial)) {

			$property_style_Commercial_string = implode("','",$property_style_Commercial);	

			$where[] = "rets_properties.`77` in ('$property_style_Commercial_string')";					

		}



		$price_min = (($this->input->post('priceMin')) != '') ? $this->input->post('priceMin') : 0;

		if (!empty($price_min)) {

			$where[] = "rets_properties.`176` > $price_min";

		}



		$price_max= (($this->input->post('priceMax')) != '') ? $this->input->post('priceMax') : 0;

		if (!empty($price_max)) {

			$where[] = "rets_properties.`176` < $price_max";

		}



		$beds_min= (($this->input->post('beds')) != '') ? $this->input->post('beds') : 0;

		if (!empty($beds_min)) {

			$where[] = "rets_properties.`32` > $beds_min";

		}



		$baths_min= (($this->input->post('baths')) != '') ? $this->input->post('baths') : 0;		

		if (!empty($baths_min)) {

			$where[] = "rets_properties.`2294` > $baths_min"; //Fbaths

		}

		

	

		return $where;

	}



	/**

	 * search results for sysids

	 *

	 * @access	public

	 * @return	array  result of the search criteria

	 */

	function get_sysids_data($sysid_string){

		

		$this->db->select("rets_properties.*");

		$this->db->from('rets_properties');

		$this->db->where("rets_properties.`178` <> 'Sold'");				

		$this->db->where("(rets_properties.`sysid` IN ($sysid_string))");

		

		try {       

			$query = $this->db->get();

			$ret = $query->num_rows() ? $query->result_array() : false;       

			if( $ret == "" ) { $ret = "noresult"; }

			   

		} catch (Exception $e) {

			$ret = "error";

			error_log($e);

		}



		return $ret;

	}

	



	/**

	 * search results for polygon

	 *

	 * @access	public

	 * @return	array  result of the search criteria

	 */

	function get_data_polygon($poly_pt_string, $get_count = 0){

		

		$limit = $this->resnum;

		

        $part = (($this->input->post('part')) != '') ? ($this->input->post('part')) : "0";



		$offset = $part * $this->resnum;



		

		$this->db->select("rets_properties.sysid,rets_properties.`32`,rets_properties.`46`,rets_properties.`49`,rets_properties.`165`,rets_properties.`175`,

							rets_properties.`176`,rets_properties.`178`,rets_properties.`421`,rets_properties.`2294`,rets_properties.`3187`,rets_properties.`2302`,

							rets_properties.`2304`,rets_properties.`2368`,rets_properties.`2346`,rets_properties.`images`,rets_properties.`latitude`,rets_properties.`longitude`, AsText( `coords` )");

		$this->db->from('rets_properties');

		$this->db->where("rets_properties.`178` <> 'Sold'");		

		$this->db->where("(geocoded <> 0 OR latitude != '' OR longitude !='')");			

		//$this->db->where("myWithin(PointFromText( concat( 'POINT(', latitude, ' ', longitude, ')' ) ), PolyFromText( 'POLYGON(($poly_pt_string))' ) ) = 1 ");

		$this->db->where("Contains( GeomFromText( 'POLYGON(( $poly_pt_string ))' ) , coords )");

		

		$conditions = $this->where_conditions();

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







}







?>