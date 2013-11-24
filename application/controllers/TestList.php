<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TestList
 *
 * @author Feker
 */
class TestList extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Patient');
    }

    function index() {
        $result = $this->Patient->List_All();
        $data = array('result' => $result);
        $this->load->view("TestList/ListView", $data);
    }

}
