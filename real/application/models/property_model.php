<?php



class property_model extends CI_Model {



	function get_data($id) {

		$query = "SELECT * FROM `rets_property_1` WHERE `sysid` = '" . htmlspecialchars($id) . "'"; 

		try {       
			$query = $this->db->query($query);

			$ret = "";

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

	function get_property_details($mls){

		$ret = json_decode(
					$this->curl->simple_get(
						$this->config->item('scapi_url') 
							. '&function=' . 'property'
							. '&membership_id=' . MEMBERSHIP_ID
							. '&field=ml_num' 
							. '&field_value=' . $mls
						), 
					true
				);	

		return $ret;
	
	}

	function get_lat_long($sysid) {

		$url = "http://idx.savvycard.com/index.php/v1/Properties.json?apiKey=savvycard&function=properties&membership_id=20&field_value=" . $sysid;

		$ret = json_decode(file_get_contents($url), true);

		return $ret; 
	}
	
	function get_cookie_properties($ids_string){
	

		// $this->db->select("rets_properties.`sysid`,rets_properties.`1`,rets_properties.`19`,rets_properties.`32`,rets_properties.`46`,rets_properties.`49`,rets_properties.`55`,rets_properties.`165`,rets_properties.`175`,
		//				rets_properties.`176`,rets_properties.`178`,rets_properties.`475`,rets_properties.`486`,rets_properties.`491`,rets_properties.`896`,rets_properties.`1726`,
		//				rets_properties.`2294`,	rets_properties.`2296`,rets_properties.`2302`,rets_properties.`2304`,rets_properties.`2368`,rets_properties.`2346`,rets_properties.`3187`,rets_properties.latitude,rets_properties.longitude");

		//$this->db->from('rets_properties');
		//$this->db->where("rets_properties.`sysid`  IN ($ids_string)");
		//$this->db->where("rets_properties.`178` <> 'Sold'");
		

		//try {       

		//	$query = $this->db->get();

		//	$ret = $query->num_rows() ? $query->result_array() : false;       

		//	if( $ret == "" ) { $ret = "noresult"; }


		//} catch (Exception $e) {

			$ret = "error";

		//	error_log($e);

		//}

		return $ret;


	
	}
	
	function get_nearby_properties($mls,$property_type,$lat,$lng){
	
		$this->db->select("rets_properties.`sysid`,rets_properties.`1`,rets_properties.`32`,rets_properties.`46`,rets_properties.`49`,rets_properties.`175`,rets_properties.`176`,rets_properties.`178`,rets_properties.`2294`,
				   rets_properties.`2302`,rets_properties.`2304`,rets_properties.`2368`,rets_properties.`2346`,
				   ( 3959 * acos( cos( radians($lat) ) * cos( radians( rets_properties.latitude ) ) * cos( radians( rets_properties.longitude ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( rets_properties.latitude ) ) ) ) AS distance ");

		$this->db->from('rets_properties');
		//$this->db->where("`178` <> 'Sold'");
		$this->db->where("rets_properties.`178`  = 'Active'");
		$this->db->where("rets_properties.`175`  <> '$mls'");
		$this->db->where("rets_properties.`1`  <> '$property_type'");
		
		$this->db->having('distance < 20'); 

		$this->db->order_by("distance", "ASC"); 


		 $this->db->limit(12);
		

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
	
	function get_property_images($sysid){
	
		// $this->db->select("image_urls.*");

		// $this->db->from('image_urls');

		// $this->db->where("image_urls.`sysid` = $sysid");

		// try {       

		// 	$query = $this->db->get();

		// 	$ret = $query->num_rows() ? $query->result_array() : false;       

		// 	if( $ret == "" ) { $ret = "noresult"; }


		// } catch (Exception $e) {

		 	$ret = "error";

		// 	error_log($e);

		// }

		return $ret;

	}
	
	function get_user_notes($mlsId){
		$user_id = get_field('id');
		$this->db->select('notes');
        $this->db->from('user_notes');
        $this->db->where('user_notes.user_id', $user_id );
        $this->db->where('user_notes.mls_id',  $mlsId);		

        $query_note = $this->db->get();
		
		$result = 0;
		if ($query_note->num_rows() == 1) {
          $row = $query_note->row();
          $result = $row->notes;
        }
		return $result; 
	
	}
	
	function get_is_fav($mls_id){
		$user_id = get_field('id');
		$this->db->select('*');
        $this->db->from('user_favorites');
        $this->db->where('user_favorites.user_id', $user_id );
        $this->db->where('user_favorites.mls_id',  $mls_id);		

        $query = $this->db->get();
		$result = $query->num_rows();
		if (!empty($result)) {
		  return 1;
        }else{
		  return 0;
		}
		exit;
	
	}	
	
	
	
	function get_property_address($mls){
	
		  $this->db->select("rets_properties.`49`");
		
		  $this->db->from('rets_properties');
		  $this->db->where("rets_properties.`178` <> 'Sold'");		
		  $this->db->where("rets_properties.`175`  = '$mls'");
		
		   $this->db->limit(1);
		
		  try {       
		
		   $query = $this->db->get();
		
		   $ret = $query->num_rows() ? $query->result_array() : false;
		   if( $ret == "" ) { $ret = "noresult"; }
		
		
		  } catch (Exception $e) {
		
		   $ret = "error";
		
		   error_log($e);
		
		  }
		
		  return $ret[0];
	 }
	

}



?>