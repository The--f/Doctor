<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Calander
 *
 * @author Feker
 */
class Calander extends CI_Controller {

    var $month_number;
    var $year_number;

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('date');
        $prefs = array( 'show_next_prev' => TRUE, 'next_prev_url' => site_url('calander'));
        $this->load->library('calendar', $prefs);
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Reservation');
        $month_number = date("m");
        $year_number = date("Y");
    }

    // this is a full month  linked calander for testing
    // need to get the full days and ommit their links
    function view_calander($year, $month) {
        //LOGIN TEST :
        if (!$this->session->userdata('user_name')) {
            redirect('main_control');
        }
        $this->month_number = date("m");
        $this->year_number = date("Y");
        if (($month == '0') || ($year == NULL )) {
            $month = $this->month_number;
            $year = $this->year_number;
        }
        $day = 1;
        $calender_data = array();
        $number_of_days = date("t", mktime(0, 0, 0, $month, $day, $year));
        if (mktime(0, 0, 0, $month, $day, $year) < mktime(0, 0, 0, date("n"), 1, date("Y"))) {
            $calender_data = NULL;
        } else {
            for ($day = date("j"); $day < $number_of_days; $day++) {
                // a working day is empty per se
                $calender_data[$day] = site_url('calander/day') . '/' . $year . '/' . $month . '/' . $day;
            }
            for ($day = intval(date("j")); $day < $number_of_days; $day++) {
                $query_result = $this->Reservation->findReservations_per_day($year, $month, $day);
                if ($query_result->num_rows() == 7) {
                    //except some full days
                    $calender_data[$day] = NULL;
                }
            }
        }

        $this->load->view('main/header');
        $this->load->view('main/menu');
        echo $this->calendar->generate($year, $month, $calender_data);

    }

    function view_day($y, $m, $d) {
        if (!$this->session->userdata('user_name')) {
            redirect('main_control');
        }
        $day_data = array(
            'year' => $y,
            'month' => $m,
            'day' => $d
        );
        // a day is empty per se
        for ($i = 9; $i < 12; $i++) {
            $day_data ['hour'][$i] = TRUE;
        }
        for ($i = 14; $i < 18; $i++) {
            $day_data ['hour'][$i] = TRUE;
        }
        $query_result = $this->Reservation->findReservations_per_day($y, $m, $d);
        foreach ($query_result->result('Reservation') as $reserv) {
            $day_data ['hour'][intval(date("H", strtotime($reserv->date_time_start)))] = FALSE;
        }
        $this->load->view('main/header');
        $this->load->view('Calander/day_view', $day_data);
    }

}
