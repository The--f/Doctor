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
        $this->load->model('Reservation');
        $this->load->model('Patient');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
    }

    function index() {
        $admin_username = $this->db->query('select value from configurations where name = "admin_user"')->row()->value;
        if (($this->session->userdata('user_name') != $admin_username)) {
            redirect('admin/adminlogin');
        } else {
            $this->load->view('back_office/menu_admin');
        }
    }

    function reservation() {
        $crud = new grocery_CRUD();
        $crud->columns('patient_id', 'date_time_start');
        $crud->display_as('patient_id', 'Nom');
        $crud->display_as('date_time_start', 'Date');
        $crud->set_relation('patient_id', 'patients', '{nom} {prenom} ( {email} )');
        $crud->unset_add();
        $crud->unset_texteditor();
        $output = $crud->render();
        $this->_example_output($output);
    }

    function patients() {
        $crud = new grocery_CRUD();
        $crud->required_fields('nom', 'prenom', 'email');
        $crud->where('id !=', 1);
        $output = $crud->render();
        $this->_example_output($output);
    }

    function configurations() {
        $crud = new grocery_CRUD();
        $crud->columns('comment', 'value');
        $crud->fields('comment', 'value');
        $crud->field_type('comment', 'readonly');
        $crud->display_as('comment', 'Explication');
        $crud->unset_add();
        $crud->unset_delete();
        $crud->unset_texteditor();
        $output = $crud->render();
        $this->_example_output($output);
    }
    function _example_output($output = null) {
        $this->load->view('main/header');
        $this->load->view('grocery_view', $output);
    }



    function adminlogin() {
        $admin_name = $this->db->query('select value from configurations where name = "admin_user"')->row()->value;
        $admin_pass = $this->db->query('select value from configurations where name = "admin_pass"')->row()->value;
        $admin_id = 1;
        $this->form_validation->set_rules('user_name', 'User Name', 'required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|xss_clean|max_length[8]');
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
        if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
            $this->load->view('back_office/login_admin');
        } else { // passed validation proceed to post success logic
            if (($admin_name == $this->input->post('user_name')) && ($admin_pass == $this->input->post('password'))) {
                $this->session->set_userdata(array(
                    'user_id' => $admin_id,
                    'user_name' => $admin_name,
                    'user_prenom' => $admin_name,
                    'user_mail' => '',
                ));
                redirect('admin/index');
            } else {
                redirect('admin/adminlogin');
            }
        }
    }

        function calander($year, $month) {
        //LOGIN TEST :
        $admin_username = $this->db->query('select value from configurations where name = "admin_user"')->row()->value;
        if (($this->session->userdata('user_name') != $admin_username)) {
           redirect('admin/adminlogin');
        } else {
            $this->load->helper('url');
            $this->load->helper('date');
            $prefs = array('show_next_prev' => TRUE, 'next_prev_url' => site_url('calander'));
            $this->load->library('calendar', $prefs);
            $this->load->library('session');
            $this->load->database();
            $this->load->model('Reservation');
            $this->month_number = date("m");
            $this->year_number = date("Y");
            if (($month == '0') || ($year == NULL )) {
                $month = $this->month_number;
                $year = $this->year_number;
            }
            $day = date("j");
            // TODO : get the weekly day of rest from configuration and ommit it --Done
            $weekly_day_off = $this->db->query('select value from configurations where name = "weekly_day_off"')->row()->value;
            $calender_data = array();
            $number_of_days = date("t", mktime(0, 0, 0, $month, $day, $year));
            if (mktime(0, 0, 0, $month, $day, $year) < mktime(0, 0, 0, date("n"), 1, date("Y"))) {
                $calender_data = NULL;
            } else {
                for ($day = 1; $day < $number_of_days + 1; $day++) {
                    $calender_data[$day] = site_url('admin/day') . '/' . $year . '/' . $month . '/' . $day;
                }
                for ($day = 1; $day < $number_of_days + 1; $day++) {
                    if (date('N', mktime(0, 0, 0, $month, $day, $year)) == $weekly_day_off) {
                        $calender_data[$day] = NULL;
                    }
                }
            }
            $this->load->view('main/header');
            $this->load->view('main/menu');
            echo $this->calendar->generate($year, $month, $calender_data);
        }
    }

    function day($y, $m, $d) {
        $admin_username = $this->db->query('select value from configurations where name = "admin_user"')->row()->value;
        if (($this->session->userdata('user_name') != $admin_username))
        {
            redirect('admin/adminlogin');
        } else {
            $day_data = array(
            'year' => $y,
            'month' => $m,
            'day' => $d,
            'names' => array(),
            'mails' => array()
            );
        // Get the starting time and the lunch break time from configuration
        $visit_start = $this->db->query('select value from configurations where name = "visit_strt"')->row()->value;
        $visit_end = $this->db->query('select value from configurations where name = "visit_end"')->row()->value;
        $lunch_break_start = $this->db->query('select value from configurations where name = "lnch_brk_start"')->row()->value;
        $lunch_break_end = $this->db->query('select value from configurations where name = "lnch_brk_end"')->row()->value;
        $day_data['now'] = date("Y/m/j H:j:s ", mktime());
        // a day is empty per se
        for ($i = $visit_start; $i < $lunch_break_start; $i++) {
            $day_data ['hour'][$i] = TRUE;
        }
        for ($i = $lunch_break_end; $i <= $visit_end; $i++) {
            $day_data ['hour'][$i] = TRUE;
        }
        $query_result = $this->Reservation->findReservations_per_day($y, $m, $d);
            foreach ($query_result->result() as $reserv) {
                $day_data ['hour'][intval(date("H", strtotime($reserv->date_time_start)))] = FALSE;
                $day_data ['names'][intval(date("H", strtotime($reserv->date_time_start)))] = $reserv->nom . ' ' . $reserv->prenom;
                $day_data ['mails'][intval(date("H", strtotime($reserv->date_time_start)))] = $reserv->email;
            }
        $this->load->view('main/header');
        $this->load->view('back_office/admin_day_view', $day_data);
        }
    }

    function add_occupation() {
        $year = $this->input->post('year');
        $month = $this->input->post('month');
        $day = $this->input->post('day');
        $occupation = $this->input->post('occupation');
        $reschedule = $this->input->post('reschedule');
        $patient_name = $this->session->userdata('user_name');
        $patient_mail = $this->session->userdata('user_mail');
        $data = array(
            'day' => $day,
            'month' => $month,
            'year' => $year,
            'patient_name' => $patient_name,
            'patient_mail' => $patient_mail,
            'occupation' => $occupation
        );
        foreach ($occupation as $key => $value) {
            if ($this->Reservation->insertReservation(
                date('Y-m-d H:i:s', mktime($value, 0, 0, $month, $day, $year)), $this->session->userdata('user_id'))) {
                $data ['confirm'] = TRUE;
            } else {
                $data ['confirm'] = FALSE;
            }
        }
        $this->load->view('main/header');
        $this->load->view('back_office/reserv_add_view', $data);
    }

}
