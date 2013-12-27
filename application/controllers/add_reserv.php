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
        $this->load->helper('date');
        $this->load->library('session');
        $this->load->helper('url');
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
        if (mktime($hour, 0, 0, $month, $day, $year) > mktime(date("H"), 0, 0, date("n"), date("j"), date("Y"))) {
                if ($this->Reservation->insertReservation(
                            date('Y-m-d H:i:s', mktime($hour, 0, 0, $month, $day, $year)), $this->session->userdata('user_id'))) {
                $data ['confirm'] = TRUE;
                //echo 'conf';
            } else {
                $data ['confirm'] = FALSE;
            }
        } else {
            $data ['confirm'] = FALSE;
            redirect(site_url('calander'));
        }
        $this->load->view('main/header');
        $this->load->view('add_reserv/reserv_add_view', $data);
    }

}
?>