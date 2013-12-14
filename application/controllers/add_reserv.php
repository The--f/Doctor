<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of add_reserv
 *
 * @author Feker
 */
class add_reserv extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Reservation');
    }

    function add() {
        $year = $this->input->post('year');
        $month = $this->input->post('month');
        $day =$this->input->post('day');
        $hour = $this->input->post('hour');
        $patient_name = $this->session->userdata('user_name');
        $patient_mail = $this->session->userdata('user_mail');
        $data = array(
            'day' => $day,
            'month' => $month,
            'year' => $year,
            'hour' => $hour,
            'patient_name' => $patient_name,
            'patient_mail' => $patient_mail
        );
        if ($this->Reservation->insertReservation(
                date('Y-m-d H:i:s', mktime($hour, 0, 0, $month, $day, $year)), $this->session->userdata('user_id'))
        ) {
            $data ['confirm'] = TRUE;
        } else {
            $data ['confirm'] = FALSE;
          }
        $this->load->view("header");
        $this->load->view("test/reserv_add_view", $data);
    }

}
