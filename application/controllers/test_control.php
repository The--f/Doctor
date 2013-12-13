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
    }

    function index() {

          // for testing reason a user is logged in by default
        $this->session->set_userdata( array (
            'user_id' => 7,
            'user_name' => 'feker',
            'user_mail' => 'mail@feker.com'
        ));
        echo 'logged as ' . $this->session->userdata('user_name');
        echo ("*****<br>");
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
