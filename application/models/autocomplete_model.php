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
    function GetAutocomplete($options = array())
    {
	    $this->db->select('nom');
	    $this->db->like('nom', $options['keyword'], 'after');
   		$query = $this->db->get('patients');
		return $query->result();
    }
}

?>
