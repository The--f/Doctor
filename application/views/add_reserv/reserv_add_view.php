<?php

/**
 *
 * @author Feker
 */
echo ($confirm ? 'confirmed ' : 'not confirmed');
echo '  reservation for : ';
echo $patient_name;
echo '<br>';
echo ("Reservation on :   ");
echo ("<br>");
echo $day;
echo ("/");
echo $month;
echo ("/");
echo $year;
echo ("<br>");
echo (" at  : " . $hour . " : 00 ");
echo '<br/>';
echo '<a href="' . base_url() . '" > home </a>';
?>
