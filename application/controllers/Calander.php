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
        $this->load->library('calendar');
        $month_number = date("m");
        $year_number = date("Y");
    }

    // this is a full month  linked calander for testing
    // need to get the full  days and ommit their links 
    function view_calander($month_number, $year_number) {

        $data = array(
            3 => 'add_reserv/6/3',
            7 => 'add_reserv/6/7',
            13 => 'add_reserv/6/13',
            26 => 'add_reserv/6/26'
        );
        echo $this->calendar->generate(2013, 6, $data);

        $this->load->view('test/testview');
    }

}
