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

    function add($year, $month, $day) {
        $data = array('day' => $day,
            'month' => $month,
            'year' => $year,
            'day' => $day,
            'patient' => $this->session->userdata('user_name')
        );
        $dt = date('Y-m-d H:i:s', mktime(0, 0, 0, $month, $day, $year));
        echo 'DT  = ' . $dt . '<br>';
        if ($this->Reservation->insertReservation(
                        date('Y-m-d H:i:s', mktime(0, 0, 0, $month, $day, $year)), $this->session->userdata('user_id'))
        ) {
            $data ['confirm'] = TRUE;
        } else {
            $data ['confirm'] = FALSE;
        }
        $this->load->view("test/reserv_add_view", $data);
    }

}
