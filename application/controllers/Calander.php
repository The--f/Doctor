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
        $this->load->helper('form');
        $prefs = array( 'show_next_prev' => TRUE, 'next_prev_url' => site_url('calander'));
        $this->load->library('calendar', $prefs);
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Reservation');

        $month_number = date("m");
        $year_number = date("Y");
    }

    // this is a full month  linked calander for testing
    // need to get the full days and ommit their links  --Done
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
        $day = date("j");
        // TODO : get the weekly day of rest from configuration and ommit it
        $calender_data = array();
        $number_of_days = date("t", mktime(0, 0, 0, $month, $day, $year));
        $weekly_day_off_list = explode(",", $this->db->query('select value from configurations where name = "weekly_day_off"')->row()->value);
        $max_nbr_visit = $this->db->query('select value from configurations where name = "max_nbr_visit"')->row()->value;
        $start = ( $month == date('m') ? intval(date("j")) : 1 );
        if (mktime(0, 0, 0, $month, $day, $year) < mktime(0, 0, 0, date("n"), 1, date("Y"))) {
            $calender_data = NULL;
        } else {

            for ($day = $start; $day < $number_of_days + 1; $day++) {
                // a working day is empty per se
                $calender_data[$day] = site_url('calander/day') . '/' . $year . '/' . $month . '/' . $day;
            }
            for ($day = $start; $day < $number_of_days + 1; $day++) {
               $query_result = $this->Reservation->findReservations_per_day($year, $month, $day);
                if ($query_result->num_rows() == $max_nbr_visit) {
                    $calender_data[$day] = NULL;
                }
            }
            for ($day = $start; $day < $number_of_days + 1; $day++) {
                if (in_array(date('N', mktime(0, 0, 0, $month, $day, $year)), $weekly_day_off_list)) {
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
        // Get the starting time and the lunch break time from configuration
        $visit_start = $this->db->query('select value from configurations where name = "visit_strt"')->row()->value;
        $visit_end = $this->db->query('select value from configurations where name = "visit_end"')->row()->value;
        $lunch_break_start = $this->db->query('select value from configurations where name = "lnch_brk_start"')->row()->value;
        $lunch_break_end = $this->db->query('select value from configurations where name = "lnch_brk_end"')->row()->value;
        $day_data['now'] = date("Y/m/j H:j:s ", mktime());
        // a day is empty per se
        for ($i = $visit_start; $i < $lunch_break_start; $i++) {
            $day_data ['hour'][$i] = TRUE;
        }
        for ($i = $lunch_break_end; $i <= $visit_end; $i++) {
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
