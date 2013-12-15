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
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('grocery_CRUD');
    }

    function patients() {
        $this->grocery_crud->set_table('patients');
        $output = $this->grocery_crud->render();
        $this->_example_output($output);
    }

    function _example_output($output = null) {
        if (!$this->session->userdata('user_name')) {
            redirect('main_control');
        }
        $this->load->view('main/header');
        $this->load->view('grocery_view', $output);
    }

}
