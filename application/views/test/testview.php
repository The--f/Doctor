<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of testview
 *
 * @author Feker
 */
echo ("This is test view ");
echo 'logged as ' . $this->session->userdata('user_name');
echo ('<a href="list">list</a>');
echo ("<br>");
echo ('<a href="insert">insert</a>')
?>
