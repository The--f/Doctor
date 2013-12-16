<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of autocomplete_model
 *
 * @author dell
 */
class Autocomplete_Model extends CI_Model
{
     public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->db->limit('5');  
    }
    function GetAutocomplete($options = array())
    {
	    $this->db->select('email');
	    $this->db->like('email', $options['keyword']);
   		$query = $this->db->get('patients');
		return $query->result();
    }
}

?>
