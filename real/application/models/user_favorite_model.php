<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_favorite_model extends CI_Model {

	private $property_data = array();
 
    public function __construct() {
        
        parent::__construct();
		$this->load->library('geocode');
		$this->initCurl();  
		
		$this->property_data['count'] = null;
		$this->property_data['data'] = null;
    }

	function get_favs($user_id){
	
		$this->db->select('user_fav_categories.*');
        $this->db->from('user_fav_categories');
        $this->db->where('user_fav_categories.user_id', $user_id);

        $query = $this->db->get();

		$user_fav_cats = $query->num_rows() ? $query->result() : '';
		
		if(empty($user_fav_cats)){
			return 0;
		}
		
        foreach($user_fav_cats as $cat){
			
			$cat_favs = $this->get_user_fav_data($cat->id);
			//print_r($cat_favs); exit;
	
			$cat->user_favorites = array();
			if(!empty($cat_favs)){
				foreach($cat_favs as $key=>$cat_fav){
					$cat->user_favorites[$key] = $cat_fav; 
					$property_data = $this->get_mls_property_data($cat_fav['mls_id']);
					$cat->user_favorites[$key]['property'] = !empty($property_data['data'][0])?$property_data['data'][0]:array();
				}
			}
		}
		//print_r($user_fav_cats); 
		//exit;
		return $user_fav_cats ? $user_fav_cats : 0;
	
	}
	
	function get_user_fav_data($cat_id){
	
		$this->db->select('user_favorites.*');
        $this->db->from('user_favorites');
        $this->db->where('user_favorites.user_fav_category_id', $cat_id);

        $query = $this->db->get();
		
        return $query->num_rows() ? $query->result_array() : false;
	}
	function get_mls_property_data($mls_id){
		
		$results = json_decode(
						$this->curl->simple_get(
							$this->config->item('scapi_url') 
								. '&function=' . 'getdata'
								. '&membership_id=' . MEMBERSHIP_ID
								. '&category=all' 
								. '&mls_number=' . urlencode($mls_id)
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
	function save_cat_description($cat_id){
		$this->db->where('id', $cat_id);
        $this->db->update('user_fav_categories', array('description' => $this->input->post('cat_description') ));
        return $this->db->affected_rows();
	}

	function delete_category($cat_id){
		// Make sure this user has rights to this card.
		$query = $this->db->get_where('user_fav_categories', array('id' => $cat_id, 'user_id' => get_field('id')));
		
		if ($query->num_rows() > 0) {

			$this->db->delete('user_fav_categories', array('id' => $cat_id));
			if ($this->db->affected_rows() == 1) {
				$this->db->delete('user_favorites', array('user_fav_category_id' => $cat_id));
				return 1;
			}
		}
		else {
			return 'Access denied.';
		}
	}	

	function save_fav_notes($fav_id){
		$this->db->where('id', $fav_id);
        $this->db->update('user_favorites', array('notes' => $this->input->post('fav_notes') ));
        return $this->db->affected_rows();
	}

	function add_cat_name(){
        $this->db->insert('user_fav_categories', array('name' => $this->input->post('cat_name'),'user_id'=> get_field('id') ));
		$last_id = $this->db->insert_id();
        if(!empty($last_id)){
			return 1;
		}else{
			return 0;
		}
	}
	
	function add_user_notes($mls_id){

		$user_id = get_field('id');
		$user_notes_id = $this->get_notes_id($mls_id);
		$affected = 0;
		if(!empty($user_notes_id)){
			if($user_notes_id == 'Same'){
				$affected = 1;
			}else{
				$this->db->where('id', $user_notes_id);
			    $this->db->update('user_notes', array('notes' => $this->input->post('user_notes') ));
        		$affected = $this->db->affected_rows();
			}
		}else{
			$this->db->insert('user_notes', array('user_notes.notes' => $this->input->post('user_notes'),'user_notes.mls_id'=> $mls_id,'user_notes.user_id'=> $user_id ));
			$affected = $this->db->insert_id();
		}

        if(!empty($affected)){
			return 'Saved';
		}else{
			return 'Error saving notes.';

		}
		exit;
	}

	

	function get_notes_id($mls_id){

		$user_id = get_field('id');
		$this->db->select('*');
        $this->db->from('user_notes');
        $this->db->where('user_notes.user_id', $user_id );
        $this->db->where('user_notes.mls_id',  $mls_id);		
        $query_note = $this->db->get();

     	$result = 0;
		if ($query_note->num_rows() == 1) {
          $row = $query_note->row();
          $result = $row->id;
		  $posted_notes = $this->input->post('user_notes');

		  if($posted_notes == $row->notes)
		  	$result = 'Same';

        }
		return $result; 

	}

	function get_user_categories(){
		$user_id = get_field('id');
		$this->db->select('user_fav_categories.*');
        $this->db->from('user_fav_categories');
        $this->db->where('user_fav_categories.user_id', $user_id);

        $query = $this->db->get();

		$user_fav_cats = $query->num_rows() ? $query->result_array() : '';
	
		//if empty then add a default category by the name of Favorites 
		if(empty($user_fav_cats)){
		  $this->db->insert('user_fav_categories', array('name' => 'Favorites','user_id'=> get_field('id') ));
		  $last_id = $this->db->insert_id();
  		  $user_fav_cats = array(array('id'=>$last_id,'name' => 'Favorites'));
		}
			
		return $user_fav_cats ? $user_fav_cats : 0;
	}
	
	function change_category($favid,$catid){
		$data = array(
				   'user_fav_category_id' => $catid
				);	
		$this->db->where('id', $favid);
		if($this->db->update('user_favorites', $data)){
			return true;
		}else{
		
			return false;
		}
		exit;
	}

	function save_user_favorite($mls_id){
		$user_id = get_field('id');
		
		$this->db->insert('user_favorites', array('user_favorites.user_id' => $user_id,
													'user_favorites.mls_id'=> $mls_id,
													'user_favorites.user_fav_category_id'=> $this->input->post('fav_category'),
													'user_favorites.notes'=> $this->input->post('fav_notes')
												));
		$affected = $this->db->insert_id();
		return !empty($affected)?'Successfully added to favorites.':'Error saving data.';
		exit;
	}

	function remove_user_fav_id($fav_id){
		$user_id = get_field('id');
		
		// Make sure this user has rights to this card.
		$query = $this->db->get_where('user_favorites', array('id' => $fav_id, 'user_id' => get_field('id')));

		if ($query->num_rows() > 0) {

			$this->db->delete('user_favorites', array('id' => $fav_id, 'user_id' => get_field('id')));
			return 'Property removed from favorites successfully.';

		}else {
			return 'Access denied.';
		}
	}
	


	function remove_user_fav($mls_id){
		$user_id = get_field('id');
		
		// Make sure this user has rights to this card.
		$query = $this->db->get_where('user_favorites', array('mls_id' => $mls_id, 'user_id' => get_field('id')));

		if ($query->num_rows() > 0) {

			$this->db->delete('user_favorites', array('mls_id' => $mls_id, 'user_id' => get_field('id')));
			return 'Property removed from favorites successfully.';

		}else {
			return 'Access denied.';
		}
	}
	
	private function initCurl()
	{
		$this->config->load('scapi');
		$this->load->library('curl');
	}	
	
}

?>
