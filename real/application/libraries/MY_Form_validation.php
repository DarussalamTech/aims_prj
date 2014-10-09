<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Alpha-numeric with underscores and dashes
     *
     * @access	public
     * @param	string
     * @return	bool
     */
    
    function alpha_dash_space($str) {
        return (!preg_match("/^([-a-z0-9_-\s])+$/i", $str)) ? FALSE : TRUE;
    }
    
    /**
     * Alpha-numeric with underscores, dashes, and spaces
     *
     * @access	public
     * @param	string
     * @return	bool
     */
    
    function alpha_numeric_dash_space_comma_period($str) {
        return (!preg_match("/^([-a-z0-9,._-\s])+$/i", $str)) ? FALSE : TRUE;
    }
    
    /**
     * Numeric with parentheses, dashes, periods and spaces
     *
     * @access	public
     * @param	string
     * @return	bool
     */
    function numeric_parens_dash_period_space($str) {
        return (!preg_match("/^([0-9.-\s\(\)])+$/i", $str)) ? FALSE : TRUE;
    }
    
    /**
     * Alpha-numeric with underscores and dashes
     *
     * @access	public
     * @param	string
     * @return	bool
     */
    
    function alpha_numeric_dash_period($str) {
        return (!preg_match("/^([-a-z0-9._-])+$/i", $str)) ? FALSE : TRUE;
    }
    
    /**
     * Validates a URL
     *
     * @access	public
     * @param	string
     * @return	bool
     */
    
    function valid_url($str){
    	return (filter_var($str, FILTER_VALIDATE_URL) === FALSE) ? FALSE : TRUE;
    }
    
    /**
     * Test for HTML tags in the string, if so, send false
     *
     * @access	public
     * @param	string
     * @return	bool
     */
    
    function no_html($str) {
    	return (trim($str) == trim(strip_tags($str))) ? TRUE : FALSE;
    }
    
    /**
	 * Validation function to make sure the user didn't enter a vanity URL that they've already used on another card.
	 *
	 * @access    public
	 * @param     string     the vanity url for the card
	 * @param     integer    the card id
	 * @return    bool       false if the name is already in use, true otherwise
	 */
	public function vanity_url_check($name, $card_id) {
		$CI =& get_instance();
		$CI->load->model('cardbuilder_model');
		return ($CI->cardbuilder_model->check_vanity_url($name, $card_id)) ? FALSE : TRUE;
	}

}
?>