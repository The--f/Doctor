<?php


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of add_reserv
 *
 * @author Feker
 */
class add_reserv extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('date');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Reservation');
    }

    function add() {
        $year = $this->input->post('year');
        $month = $this->input->post('month');
        $day =$this->input->post('day');
        $hour = $this->input->post('hour');
        $patient_name = $this->session->userdata('user_name');
        $patient_mail = $this->session->userdata('user_mail');
        $data = array(
            'day' => $day,
            'month' => $month,
            'year' => $year,
            'hour' => $hour,
            'patient_name' => $patient_name,
            'patient_mail' => $patient_mail
        );
        if (mktime($hour, 0, 0, $month, $day, $year) > mktime(date("H"), 0, 0, date("n"), date("j"), date("Y"))) {
                if ($this->Reservation->insertReservation(
                            date('Y-m-d H:i:s', mktime($hour, 0, 0, $month, $day, $year)), $this->session->userdata('user_id'))) {
                $data ['confirm'] = TRUE;
                $data['mail'] = $this->send_confirmation_mail($year, $month, $day, $hour);
            } else {
                $data ['confirm'] = FALSE;
            }
        } else {
            $data ['confirm'] = FALSE;
            redirect(site_url('calander'));
        }
        $this->load->view('main/header');
        $this->load->view('add_reserv/reserv_add_view', $data);
    }
    function send_confirmation_mail($year, $month, $day, $hour) {
            $usermail = $this->session->userdata('user_mail');
        $username = $this->session->userdata('user_name');
        $doctor_name = "الدكتور حكيم ";
        $mail_message = "Hello " . $username . "\n\tWe are glad to confirm your "
                . "appointment with your doctor Mr" . $doctor_name . "\nReservation on :"
                . $day . "/" . $month . "/" . $year . " at : " . $hour . " : 00 \n"
                . "Please try to be on time\n\nSincerely," . $doctor_name . "\n";
        $mail_subject = "Meeting with " . $doctor_name . ":" . $day . "/" . $month . "/" . $year . " " . $hour . ":00 \n";
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'doctorreservation@gmail.com',
            'smtp_pass' => 'doctor123456789',
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
?>