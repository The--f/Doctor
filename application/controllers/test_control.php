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
       echo "index_test  ";
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
