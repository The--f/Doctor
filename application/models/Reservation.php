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

   var $date_time_start;
    var $lenght;
    var $Patient;
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function insertReservation($date_time, $Patient_id, $len = 1) {

        $data = array(
            'date_time_start' => $date_time,
            'patient_id' => $Patient_id,
            'lenght' => $len
            );   
        if ($this->db->affected_rows() == '1') {
            return TRUE;
            redirect('./email/SendingMail', 'location');
        } else {
            return FALSE;
        }
    }

    //TODO: search for Reservtions based on Patient
    function findReservation_patient($needle_patient_id) {
        $this->db->get_where('Reservation', array('patient' => $needle_patient_id));
    }

    function findReservations_per_day($year, $month, $day) {
         $this->db->select()->from('reservation')->like(
                'date_time_start', date('Y-m-d', mktime(0, 0, 0, $month, $day, $year)));
        $query = $this->db->get();
        return ($query);
    }

    function findReservations_per_month($year, $month) {
        $this->db->select()->from('reservation')->like(
                'date_time_start', date('Y-m', mktime(0, 0, 0, $month, 1, $year)));
        $query = $this->db->get();
        return ($query);
    }

    function List_All() {
        return ($this->db->get('Reservation'));
    }

}
