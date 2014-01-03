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
        $crud->set_relation('patient_id', 'patients', '{nom}   {prenom} ');
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
        //$this->load->view('main/header');
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
            $this->load->helper('file');
            $Calander_template = read_file('./application/views/Calander/calander_template.php');
            $prefs = array(
                'show_next_prev' => TRUE,
                'next_prev_url' => site_url('admin/calander'),
                'day_type' => 'short',
                'template' => $Calander_template
            );
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
            $calender_data = array();
            $number_of_days = date("t", mktime(0, 0, 0, $month, $day, $year));
            if (mktime(0, 0, 0, $month, $day, $year) < mktime(0, 0, 0, date("n"), 1, date("Y"))) {
                $calender_data = NULL;
            } else {
                for ($day = 1; $day < $number_of_days + 1; $day++) {
                    $calender_data[$day] = site_url('admin/day') . '/' . $year . '/' . $month . '/' . $day;
                }
                $weekly_day_off_list = explode(",", $this->db->query('select value from configurations where name = "weekly_day_off"')->row()->value);
                for ($day = 1; $day < $number_of_days + 1; $day++) {
                    if (in_array(date('N', mktime(0, 0, 0, $month, $day, $year)), $weekly_day_off_list)) {
                        $calender_data[$day] = NULL;
                    }
                }
            }
            //$this->load->view('main/header');
            //$this->load->view('main/menu');
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
            'mails' => array(),
            'hidden_hours' => array(),
                'ids' => array()
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
                $day_data ['hidden_hours'][intval(date("H", strtotime($reserv->date_time_start)))] = intval(date("H", strtotime($reserv->date_time_start)));
                $day_data ['names'][intval(date("H", strtotime($reserv->date_time_start)))] = $reserv->nom . ' ' . $reserv->prenom;
                $day_data ['mails'][intval(date("H", strtotime($reserv->date_time_start)))] = $reserv->email;
                $day_data ['ids'][intval(date("H", strtotime($reserv->date_time_start)))] = $reserv->patient_id;
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
        $hidden_hours = $this->input->post('hidden_hours');
        $ids = $this->input->post('ids');
        $patient_name = $this->session->userdata('user_name');
        $patient_mail = $this->session->userdata('user_mail');
        $data = array(
            'day' => $day,
            'month' => $month,
            'year' => $year,
            'patient_name' => $patient_name,
            'patient_mail' => $patient_mail,
            'confirm_ocupation' => array(),
            'new_time' => array(),
            'old_time' => array()
        );
        if ($occupation) {
            foreach ($occupation as $key => $value) {
                if ($this->Reservation->insertReservation(
                        date('Y-m-d H:i:s', mktime($value, 0, 0, $month, $day, $year)), $this->session->userdata('user_id'))) {
                    $data ['confirm_ocupation'][$value] = TRUE;
                } else {
                    $data ['confirm_ocupation'][$value] = FALSE;
                }
            }
        }
        if ($reschedule) {
            $hours_to_reschedule = array_diff($hidden_hours, $reschedule);
            $this->load->database();
            $this->load->library('session');
            $this->load->model('Reservation');
            $visit_start = $this->db->query('select value from configurations where name = "visit_strt"')->row()->value;
            $visit_end = $this->db->query('select value from configurations where name = "visit_end"')->row()->value;
            $lunch_break_start = $this->db->query('select value from configurations where name = "lnch_brk_start"')->row()->value;
            $lunch_break_end = $this->db->query('select value from configurations where name = "lnch_brk_end"')->row()->value;
            $max_nbr_visit = $this->db->query('select value from configurations where name = "max_nbr_visit"')->row()->value;
            foreach ($hours_to_reschedule as $hour) {
                $i = 0;
                $query_result = NULL;
                $day_data = array();
                $day_emptyspots = array();
                // Now find a day with an empty slot
                $time = mktime($hour + 1, 0, 0, $month, $day - 1, $year);
                // find a day with an empty spot
                while ($time = strtotime('+1 day', $time)) {
                    $query_result = $this->Reservation->findReservations_per_day(date("Y", $time), date("n", $time), date("j", $time));
                    if ($query_result->num_rows() < $max_nbr_visit) {
                            break;
                    }
                }
                // Now find an empty spot in this  day :
                foreach ($query_result->result('Reservation') as $reserv) {
                    $day_data [intval(date("H", strtotime($reserv->date_time_start)))] = intval(date("H", strtotime($reserv->date_time_start)));
                }
                for ($h = $visit_start; $h < $lunch_break_start; $h++) { $day_emptyspots [$h] = $h; }
                for ($h = $lunch_break_end; $h < $visit_end; $h++) {   $day_emptyspots [$h] = $h;  }
                $day_emptyspots = array_diff($day_emptyspots, $day_data);
                // finally an empty spot

                $new_date = date('Y-m-d H:i:s', mktime(current($day_emptyspots), 0, 0, date("n", $time), date("j", $time), date("Y", $time)));
                if ($this->Reservation->insertReservation($new_date, $ids[$i])) {
                    $data['new_time'][$hour] = $new_date;
                    $data['old_time'][$hour] = date('Y-m-d H:i:s', mktime($hour, 0, 0, $month, $day, $year));
                }
                $i++;
            }
        }

        $this->load->view('main/header');
        $this->load->view('back_office/reserv_alter_view', $data);
    }

    function send_reschdule_mail($new_date, $user_id) {
        $usermail = $this->session->userdata('user_mail');
        $username = $this->session->userdata('user_name');
        $this->load->database();
        $this->db->query('select value from configurations where name = "admin_user"')->row()->value;
        $doctor_name = "الدكتور حكيم ";
        $mail_message = "Hello " . $username . "\n\tWe are glad to confirm your "
                . "appointment with your doctor Mr" . $doctor_name . "\nReservation on :"
                . $day . "/" . $month . "/" . $year . " at : " . $hour . " : 00 \n"
                . "Please try to be on time\n\nSincerely," . $doctor_name . "\n";
        $mail_subject = "Meeting with " . $doctor_name . ":" . $day . "/" . $month . "/" . $year . " " . $hour . ":00 \n";
        $config = Array(
            'protocol' => $this->db->query('select value from configurations where name = "mail_protocol"')->row()->value,
            'smtp_host' => $this->db->query('select value from configurations where name = "mail_host"')->row()->value,
            'smtp_port' => $this->db->query('select value from configurations where name = "mail_port"')->row()->value,
            'smtp_user' => $this->db->query('select value from configurations where name = "mail_user_name"')->row()->value,
            'smtp_pass' => $this->db->query('select value from configurations where name = "mail_password"')->row()->value,
            'smtp_timeout' => 7,
            'charset' => 'utf-8'
        );
        $this->load->library('email', $config);
        //$this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->From('doctorreservation@gmail.com');
        $this->email->to($usermail);
        $this->email->subject($mail_subject);
        $this->email->message($mail_message);
//        $path = $this->config->item('server_root');
//        $file = $path . './attachments/test.txt';
//        $this->email->attach($file);

        if ($this->email->send()) {
            return 'success';
        } else {
            show_error($this->email->print_debugger());
        }
    }

}
