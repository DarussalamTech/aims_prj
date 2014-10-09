<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Account_model extends CI_Model {

    function get_user_data($id) {
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->num_rows() ? $query->row() : false;
    }
    
    function get_email_from_hash($hash) {
        $this->db->select('email');
        $this->db->where('MD5(CONCAT(id,email))', $hash);
        $query = $this->db->get('users');
        return $query->num_rows() ? $query->row() : false;
    }
    
    function get_forgot_password_hash($email) {
        $this->db->select('MD5(CONCAT(id,email)) AS hash', FALSE);
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        //echo $this->db->last_query();
        return $query->num_rows() ? $query->row() : false;
    }
    
    function check_forgot_password_hash($hash) {
        $this->db->select('id');
        $this->db->from('users');
        $this->db->where('MD5(CONCAT(id,email))', $hash);
        return $this->db->count_all_results();
    }
    
    function update_password($email, $data) {
        $this->db->where('email', $email);
        $this->db->update('users', $data);
    }
    
    function insert($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    
    function update($id, $table, $data) {
        $this->db->where('id', $id);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }
    
	function check_dupe_email($email) {
        $this->db->select('email');
        $this->db->from('users');
        $this->db->where('email', $email);
        return $this->db->count_all_results();
    }
	
    /**
     * Gets a row
     * @param  array $where Example: array('id' => 123)
     * @return Result object or false
     */
    function get($where) {
        $query = $this->db->get_where('users', $where);
        //echo $this->db->last_query();
        return $query->num_rows() ? $query->result() : false;
    }

}
