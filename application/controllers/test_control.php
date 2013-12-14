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
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
    }

    function login() {
        $this->load->view('login/login_view');
        $this->load->database();
        $this->load->model('Patient');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|valid_email|max_length[20]');
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
        if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
            $this->load->view('login/login_view');
        } else {
            $form_data = array(
                'email' => set_value('email')
            );
            $this->db->select('id , nom, prenom, email')->from('patients')->where('email', $form_data['email'])->limit(1);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                foreach ($query->result('Patient') as $row) {
                    $this->session->set_userdata(array(
                        'user_id' => $row->id,
                        'user_name' => $row->nom,
                        'user_prenom' => $row->prenom,
                        'user_mail' => $row->email
                    ));
                }
            }
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('test_control');
    }

    function index() {

        echo 'rrrr ';
        $this->load->view('reserv/header_view');

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
