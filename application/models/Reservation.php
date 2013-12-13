<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Reservation
 *
 * @author Feker
 */
class Reservation extends CI_Model {

    protected $date_time_start;
    protected $Patient;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertReservation($datetime, $lenght, $Patient_id) {

        $data = array('date_time_start' => $datetime, 'patient' => $Patient_id);
        $this->db->insert('Reservation', $data);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    //TODO: search for Reservtions based on Patient
    function findPatient($needle_patient_id) {
        $this->db->get_where('Reservation', array('patient' => $needle_patient_id));
    }

    function List_All() {
        return ($this->db->get('Reservation'));
    }

}
