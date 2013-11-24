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
        }

    function add() {
        $this->load->view("test/testviewnb2");
    }

}
