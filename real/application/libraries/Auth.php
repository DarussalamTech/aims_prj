<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth {

    var $CI;
    
    public function __construct() {
        $this->CI = & get_instance();
        log_message('debug', 'Authorization class initialized.');

        $this->CI->load->database();
        $this->CI->load->library('session');
    }

    /**
     * Attempt to login using the given condition
     *
     * Accepts an associative array as input, containing login condition
     * Example: $this->auth->try_login(array('email'=>$email, 'password'=>dohash($password)))
     *
     * @access	public
     * @param	array	login conditions
     * @return	boolean
     */
    function try_login($condition = array()) {
        $this->CI->db->select('id');
        $query = $this->CI->db->get_where('users', $condition, 1, 0);
        if ($query->num_rows != 1) {
            return FALSE;
        } else {
            $row = $query->row();
            $this->CI->session->set_userdata(array('id' => $row->id));
            return TRUE;
        }
    }

    /**
     * Attempt to login using session stored information
     *
     * Example: $this->auth->try_session_login()
     *
     * @access	public
     * @return	boolean
     */
    function try_session_login() {
        if ($this->CI->session->userdata('id')) {
            $query = $this->CI->db->query('SELECT COUNT(*) AS total FROM users WHERE id = ' . $this->CI->session->userdata('id'));
            $row = $query->row();
            if ($row->total != 1) {
                // Bad session - kill it
                $this->logout();
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }

    /**
     * Logs a user out
     *
     * Example: $this->erkanaauth->logout()
     *
     * @access	public
     * @return	void
     */
    function logout() {
        $this->CI->session->set_userdata(array('id' => FALSE));
    }

    /**
     * Returns a field from the user's table for the logged in user
     *
     * Example: $this->erkanaauth->getField('username')
     *
     * @access	public
     * @param	string	field to return
     * @return	string
     */
    function get_field($field = '') {
        $this->CI->db->select($field);
        $query = $this->CI->db->get_where('users', array('id' => $this->CI->session->userdata('id')), 1, 0);
        if ($query->num_rows() == 1) {
            $row = $query->row();
            return $row->$field;
        }
    }

    /**
     * Returns the user's role
     *
     * Example: $this->erkanaauth->getRole()
     *
     * @access	public
     * @return	string
     */
    function get_role() {
        $this->CI->db->select('roles.name');
        $this->CI->db->JOIN('roles', 'users.role_id = roles.id');
        $query = $this->CI->db->get_where('users', array('users.id' => $this->CI->session->userdata('id')), 1, 0);
        if ($query->num_rows() == 1) {
            $row = $query->row();
            return $row->name;
        }
    }

}

?>