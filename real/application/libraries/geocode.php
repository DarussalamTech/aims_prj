<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class geocode {

	private $curl;
	
	function __construct() {
		$this->curl = curl_init();
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
	}
	
	function __destruct() {
		curl_close($this->curl); 
	}

	/**
	 * Geocode a passed address
	 * $address: string
     * @return array with status and error message or lat/lng 
	*/
	function lookup($address){
	 
		$address = str_replace (" ", "+", urlencode($address));
		$details_url = "http://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "&sensor=false";

		curl_setopt($this->curl, CURLOPT_URL, $details_url);
		$response = json_decode(curl_exec($this->curl), true);
	 
		// If Status Code is ZERO_RESULTS, OVER_QUERY_LIMIT, REQUEST_DENIED or INVALID_REQUEST
		if ($response['status'] != 'OK') {
			return array('status' => $response['status'], 
				'message' => "Failed to geocode " . $address . " - Received status " . $response['status'] 
			);
		}
	 
		$geometry = $response['results'][0]['geometry'];
	 
		return array('status' => true,
			'latitude' => $geometry['location']['lat'],
			'longitude' => $geometry['location']['lng']
		);
	}
}