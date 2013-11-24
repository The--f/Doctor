<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Classe de doctor = administrateur
 *
 *
 * @author Feker
 */
class Doctor extends CI_Model {

    var $password;
    var $username;
    function __construct() {
        parent::__construct();
        $this->db->load();
    }

    function change_password($old_pass, $new_pass) {

    }

}
