<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TestInsert
 *
 * @author dell
 */
class TestInsert extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Patient');
    }

    function index() {
        $this->form_validation->set_rules('nom', 'Nom', 'required|trim|max_length[20]');
        $this->form_validation->set_rules('prenom', 'Prenom', 'required|trim|max_length[20]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[20]');

        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

        if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
            $this->load->view('TestInsert/formview');
        } else { // passed validation proceed to post success logic
            // build array for the model

            $form_data = array(
                'nom' => set_value('nom'),
                'prenom' => set_value('prenom'),
                'email' => set_value('email')
            );
            //TODO: Search for the user before inserting :
            //  if not found  then :
            // run insert model to write data to db


            if ($this->Patient->insertPatient($form_data['nom'], $form_data ['prenom'], $form_data ['email']) == TRUE) { // the information has therefore been successfully saved in the db
                redirect('TestInsert/success');   // or whatever logic needs to occur
            } else {
                echo 'An error occurred saving your information. Please try again later';
                // Or whatever error handling is necessary
            }
        }
    }

    function success() {
        echo 'this form has been successfully submitted with all validation being passed. All messages or logic here. Please note
			sessions have not been used and would need to be added in to suit your app';
    }
}

?>
