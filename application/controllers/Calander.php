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
        $prefs = array( 'show_next_prev' => TRUE, 'next_prev_url' => site_url('calander'));
        $this->load->library('calendar', $prefs);
//        $this->load->library('calendar');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Reservation');
        $month_number = date("m");
        $year_number = date("Y");
    }

    // this is a full month  linked calander for testing
    // need to get the full days and ommit their links
    function view_calander($year, $month) {
        $this->month_number = date("m");
        $this->year_number = date("Y");
        if (($month == '0') || ($year == NULL )) {
            $month = $this->month_number;
            $year = $this->year_number;
        }
        $data = array();
        $number_of_days = date("t", mktime(0, 0, 0, $month, 1, $year));
        //$number_of_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        for ($day = 1; $day < $number_of_days + 1; $day++) {
            $data[$day] = site_url('calander/day') . '/' . $year . '/' . $month . '/' . $day;
        }
        echo $this->calendar->generate($year, $month, $data);
        $this->load->view('Calander/testview');
    }

    function view_day($y, $m, $d) {
        $data = array(
            'year' => $y,
            'month' => $m,
            'day' => $d
        );
        for ($i = 9; $i < 12; $i++) {
            $data ['hour'][$i] = TRUE;
        }
        for ($i = 14; $i < 18; $i++) {
            $data ['hour'][$i] = TRUE;
        }
        $this->load->view('Calander/day_view', $data);
    }

}
