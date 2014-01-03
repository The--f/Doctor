<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Patient
 *
 * @author dell
 */
class Patient extends CI_Model {

    var $id;
    var $nom;
    var $prenom;
    var $email;

    //put your code here
     function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper('form');
    }
    /**
     * function InsertPatient()
     *
     * insert given patient Data into database
     * @param $data - array
     * @return Bool - TRUE or FALSE
     */
    function insertPatient($nomP, $prenomP, $emailP) {

        $data = array('nom'=>$nomP, 'prenom'=>$prenomP,'email'=>$emailP);

         $this->db->insert('Patients', $data);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    //TODO: search for Patients based on email
    function findPatient_mail($needle_mail) {
        return $this->db->get_where('patients', array('email' => $needle_mail));
    }

    function findPatient_id($needle_id) {
        return $this->db->get_where('patients', array('id' => $needle_id));
    }

    function List_All() {
        return ($this->db->get('patients'));
    }

    function GetAutocomplete($options = array()) {
        $this->db->select('email');
        $this->db->like('email', $options['keyword']);
        $query = $this->db->get('patients');
        return $query->result();
    }

    function isEmailExist($email) {
    $this->db->select('id');
    $this->db->from('patients');
    $this->db->where('email', $email);
    $query = $this->db->get('Patients');

    if ($query->num_rows() > 0) {
        return true;
    } else {
        return false;
    }
}

}
