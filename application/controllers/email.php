<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of email
 *
 * @author dell
 */
class Email extends CI_Controller {
    //put your code here
    function __construct()
    {
        parent::__construct();
        $this->load->driver('session');
    }
    function SendingMail()
    {
        $config = Array(
          'protocol' => 'smtp',
          'smtp_host' => 'smtp.googlemail.com',
          'smtp_port' => 25,
          'smtp_user' => 'doctorreservation@gmail.com',
          'smtp_pass' => 'doctor123456789'
        );
        $usermail = $this->session->get('user_mail');
        $username = $this->session->get('user_name');
        $this->load->library('email', $config);
        $this->email->set_newline('\r\n');
        $this->email->from('doctorreservation@gmail.com');
        $this->email->to($usermail);
        $this->email->subject('test');
        $this->email->message('test'.$username);
        $path = $this->config->item('server_root');
        $file = $path.'./attachments/test.txt';
        $this->email->attach($file);
        $this->email->initialize($config);
        if($this->email->send())
        {
            echo 'success';
        }
        else
        {
            show_error($this->email->print_debugger());
        }
    }
}

?>
