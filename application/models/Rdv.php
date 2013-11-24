<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of rdv
 *  la classe rendez vous est une plage horaire occupée ou bien par le patient : reservation
 *      ou par le docteur : occupation
 * @author Feker
 */
class Rdv extends CI_Model {
    protected $date_time_start;

    function __construct() {
        parent::__construct();
        $current_date_time = TRUE;
       
    }

}
