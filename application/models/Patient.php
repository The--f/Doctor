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
    function findPatient($needle_mail) {
        $this->db->get_where('patients', array('email' => $needle_mail));
    }

    function List_All() {
        return ($this->db->get('patients'));
    }

}
