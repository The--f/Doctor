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

    function index() {
        $this->load->view('back_office/login_admin');
    }

    function configurations() {
        $output = $this->grocery_crud->render();
        $this->_example_output($output);
    }

    function _example_output($output = null) {
        //$this->load->view('main/header');
        $this->load->view('grocery_view', $output);
    }

    function adminlogin() {
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
        $admin_name = $this->db->query('select value from configurations where name = "admin_user"')->row()->value;
        $admin_pass = $this->db->query('select value from configurations where name = "admin_pass"')->row()->value;
        $this->form_validation->set_rules('user_name', 'User Name', 'required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|xss_clean|max_length[8]');
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
        //*****************************

        //******************************
        if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
            $this->load->view('back_office/login_admin');
        } else { // passed validation proceed to post success logic
            if (($admin_name == $this->input->post('user_name')) && ($admin_pass == $this->input->post('password'))) {

                redirect('adminlogin/success');   // or whatever logic needs to occur
            } else {
                echo 'login faiileeed ';
            }



        }
    }

}
