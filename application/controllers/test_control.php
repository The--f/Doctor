<?php

/**
 * Description of test_control
 * un simple controlleur pour test
 *
 * @author Feker
 */
class test_control extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Patient');
    }

    function index() {


       $this->session->set_userdata( array (
        'user_id' => 7,
        'user_name' => 'feker',
        'user_mail' => ''
        ));
        echo date("Y");
        echo date("m");
        echo date("d");
        echo '<a href="list">List</a> ';
        echo '<br>';
        echo '<a href="calander"> Calender </a>';
        echo ('<br>');
        echo '<a href="list">insert</a> ';
    }



    function error($errnumber) {
        echo ' an 404 error occured ' . $errnumber;
    }

}
