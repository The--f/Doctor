<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of test_control
 * un simple controlleur pour test
 *
 * @author Feker
 */
class test_control extends CI_Controller {
   function index() {
        $this->load->library('calendar');


        $data = array(
            3 => '/add_reserv/3',
            7 => '/add_reserv/3',
            13 => '/add_reserv/3',
            26 => '/add_reserv/3'
        );
        echo $this->calendar->generate(2013, 6, $data);

        //$this->load->view('test/testview');
    }

}
