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
echo ($confirm ? 'confirmed ' : 'not confirmed');
echo '  reservation for : ';
echo $patient_name;
echo '<br>';
echo ("Reservation on :   ");
echo ("<br>");
echo $year;
echo ("/");
echo $month;
echo ("/");
echo $day;
echo ("<br>");
echo (" at  : " . $hour . " : 00 ");
?>
