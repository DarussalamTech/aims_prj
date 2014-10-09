<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class results extends CI_Controller {



	public function index()

	{

		$this->load->helper('url');

		$this->load->database();

		$data['base'] = base_url();

		$this->load->model('results_model');		

		$data['get'] = $this->results_model->get_data();

		$this->load->view('results', $data);

	}



	public function view($id){

		$this->load->helper('url');

		$this->load->database();

		

		$data['base'] = base_url();

		$this->load->model('property_model');

		$data['get'] = $this->property_model->get_data($id);

		$this->load->view('property', $data);

	}



	public function getinfo(){

		$this->load->helper('url');

		$this->load->database();

		$data['base'] = base_url();

		$this->load->model('Map_search_model');

		$latLong = '';

		//if search near me image is not clicked then get latitude longitude
		if(	( $this->input->post('latitude') == '' || $this->input->post('longitude') == '' ) && $this->input->post('location') != '' ){
			$latLong = $this->google_text_search($this->input->post('location'));
		}

		$data['get_results'] =  $this->Map_search_model->get_data($latLong, 0);
		$data['results'] = $data['get_results']['data'];

		$total_records = $data['get_results']['count']; 
		$data['pages'] = ceil($total_records/MAP_SEARCH_LIMIT); 

		echo json_encode($data);

	}



	public function getImages(){

		$this->load->helper('url');

		$this->load->database();

		$data['base'] = base_url();

		$this->load->model('Map_search_model');

		$data['get'] = $this->Map_search_model->getImages();

		echo json_encode($data['get']);


	}

	

	

	function google_text_search($location){

		$api_key = 'AIzaSyBBLxjLSgvOYT2Okq8UA2xWtqyHftGnA3Q'; //Nasir's key

		header('Content-type: application/json');

		$filename = "https://maps.googleapis.com/maps/api/place/textsearch/json?" .

		  "query=" . urlencode($location).

		  "&sensor=false".

		  "&key=".$api_key;

		$result = file_get_contents($filename);

		$result_array = json_decode($result, TRUE);

		$latLong = array();

		$latLong['lat'] = !empty($result_array['results'][0]['geometry']['location']['lat'])?$result_array['results'][0]['geometry']['location']['lat']:'';

		$latLong['lng'] = !empty($result_array['results'][0]['geometry']['location']['lng'])?$result_array['results'][0]['geometry']['location']['lng']:'';		

		return $latLong;
		
		exit;

	}

	

	function get_demographics(){

		

		$this->load->library('form_validation');

		$this->form_validation->set_rules('zip_code', 'zip_code', 'required|numeric|trim|xss_clean');



		$result = array();

		if($this->form_validation->run())

        {

			$zip_code = $this->input->post('zip_code');

		

			header('Content-type: application/json');

			$filename = "http://api.census.gov/data/2010/sf1?get=P012I001,P012B001,P012H001,P012D001,P012E001,P012C001,P012F001,P0120002,P0120026,P0010001,H00010001,H0120001&for=zip+code+tabulation+area:$zip_code&in=state:12&key=85123a482710a53cd93858901b7f86a3336bb3ef";

			

			$file_contents = file_get_contents($filename);

				

			$result_array = json_decode($file_contents, TRUE);



			if(!empty($result_array)){

				$values = array();

				$i = 0;

				foreach($result_array[0] as $key=>$val){

					if($val == 'state' || $val == 'zip code tabulation area' ){

						continue;

					}

					$values[$val] = $result_array[1][$i];

					$i++;

				}

			}



            $result['status'] = 'passed';

            $result['msg'] = $values;

            echo json_encode($result);

        }

        else

        {

            $result['status'] = 'failed';

            $result['msg'] = validation_errors();

            echo json_encode($result);

        }

	}

	

	function recently_viewed(){
		$mlsids = $this->input->post('mlsids');
		$result = array();
		$result['status'] = 'no-result';
		if(!empty($mlsids)){
			$result['status'] = 'passed';
			$mlsid_arr = explode(' ',$mlsids);
			$mlsid_arr = array_unique($mlsid_arr);

			foreach($mlsid_arr as $key=>$mlsid){
				if($mlsid == 'undefined'){
					unset($mlsid_arr[$key]);
				}
			}
			$this->load->database();
			$this->load->model('Adv_search_model');
			if(!empty($mlsid_arr)){
				
				$mlsid_string = implode(',',$mlsid_arr);

				$result['msg'] = $this->Adv_search_model->get_mlsids_data($mlsid_string);
				if($result['msg'] == 'no-result'){
				   $result['status'] = 'no-result';					
				}else{
					$result['msg'] = $result['msg']['data'];
				}
			}else{				
			   $result['status'] = 'no-result';
			}
		}
	    echo json_encode($result);
	}
	

	function check(){	

		$vertices_x = array(37.628134, 37.629867, 37.62324, 37.622424);    // x-coordinates of the vertices of the polygon

		

		$vertices_y = array(-77.458334,-77.449021,-77.445416,-77.457819); // y-coordinates of the vertices of the polygon

		

		$points_polygon = count($vertices_x) - 1;  // number vertices - zero-based array

		

		$longitude_x = 37.628131;  // x-coordinate of the point to test

		

		$latitude_y = -77.458332;    // y-coordinate of the point to test

		

		if ($this->is_in_polygon($points_polygon, $vertices_x, $vertices_y, $longitude_x, $latitude_y)) {

			echo "Is in polygon!";

		}else {

			echo "Is not in polygon";

		}

		exit;

	}	



	function is_in_polygon($points_polygon, $vertices_x, $vertices_y, $longitude_x, $latitude_y)



	{



		$i = $j = $c = 0;



		for ($i = 0, $j = $points_polygon ; $i < $points_polygon; $j = $i++) {



			if ((($vertices_y[$i] > $latitude_y != ($vertices_y[$j] > $latitude_y)) && ($longitude_x < ($vertices_x[$j] - $vertices_x[$i]) * ($latitude_y - $vertices_y[$i]) / ($vertices_y[$j] - $vertices_y[$i]) + $vertices_x[$i])))



				$c = !$c;



		}



		return $c;



	}



	

	function search_in_polygon(){

		$this->load->helper('url');
		$this->load->database();
		$data['base'] = base_url();
		$this->load->model('Map_search_model');

		$coards  = $this->input->post('overlays_points');
		
		/*$coards = urlencode($coards); 
		$coards = str_replace("%2C+", ",%20", $coards);
		$coards = str_replace("%2C", ",", $coards);*/
		
		$data['get_results'] =  $this->Map_search_model->get_data(0, $coards);

		$data['results'] = $data['get_results']['data'];

		$total_records = $data['get_results']['count']; 
		$data['pages'] = ceil($total_records/MAP_SEARCH_LIMIT); 
	
		echo json_encode($data);

		exit;

	}	

	

	function get_polygon_zoom_array($overly_arr){

		$first = 0; $first_zoom_pt = array();
		foreach($overly_arr as $poly_pt){

						
			$pts = explode(', ',$poly_pt);
			
			foreach($pts as $k=>$p){
				$pts[$k] = (float)$p;
			}
			
			$for_zoom_to_polygon[] = $pts;

			if($first == 0){
				$first_zoom_pt[] = $pts;
			}
			
			$first++;
		}
		
		$for_zoom_to_polygon =  array(array(array_merge($for_zoom_to_polygon, $first_zoom_pt)));

		return $for_zoom_to_polygon;
	}

	

}



/* End of file results.php */

/* Location: ./application/controllers/results.php */