<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of backoffice_control
 *
 * @author Feker
 */
class backoffice_control extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('grocery_CRUD');
    }

    function configurations() {
        $output = $this->grocery_crud->render();

        $this->_example_output($output);
    }

    function _example_output($output = null) {
        //$this->load->view('main/header');
        $this->load->view('grocery_view', $output);
    }

}
