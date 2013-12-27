<?php

/**
 * Description of main_control
 * un simple controlleur pour test
 *
 * @author Feker
 */
class main_control extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('grocery_CRUD');
        $this->load->library('session');
    }

    function login() {
        $this->load->database();
        $this->load->model('Patient');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|valid_email|max_length[30]');
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
        if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
            $this->load->view('login/login_view');
        } else {
            $form_data = array(
                'email' => set_value('email')
            );
            $this->db->select('id , nom, prenom, email')->from('patients')->where('email', $form_data['email'])->limit(1);
            $query = $this->db->get();
            if ($query->num_rows() == 1) {
                foreach ($query->result('Patient') as $row) {
                    $this->session->set_userdata(array(
                        'user_id' => $row->id,
                        'user_name' => $row->nom,
                        'user_prenom' => $row->prenom,
                        'user_mail' => $row->email
                    ));
                }

                redirect('main_control');
            }
            else
                redirect ('TestInsert');
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('main_control');
    }

    function index() {
        $this->load->database();
        $admin_username = $this->db->query('select value from configurations where name = "admin_user"')->row()->value;
        if (($this->session->userdata('user_name') == $admin_username)) {
            redirect('admin/index');
        } else {
            $this->load->view('main/header');
            $this->load->view('main/menu');
        }
    }

    function reservations() {
        $crud = new grocery_CRUD();
        $crud->set_table('reservation');
        $crud->columns('patient_id', 'date_time_start');
        $crud->where('patient_id', $this->session->userdata('user_id'));
        $crud->display_as('patient_id', 'Nom');
        $crud->display_as('date_time_start', 'Date');
        $crud->set_relation('patient_id', 'patients', '{nom} {prenom} ( {email} )');
        $crud->unset_add();
        $crud->unset_texteditor();
        $crud->unset_read();
        $crud->unset_delete();
        $crud->unset_edit();
        $crud->unset_export();
        $crud->unset_print();
        $output = $crud->render();
        $this->_example_output($output);
    }

    function _example_output($output = null) {
        $this->load->view('main/header');
        $this->load->view('grocery_view', $output);
    }

    function error($errnumber) {
        echo ' an 404 error occured ' . $errnumber;
    }

}
