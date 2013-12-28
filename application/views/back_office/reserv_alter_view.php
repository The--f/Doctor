<?php

/**
 *
 * @author Feker
 */
if ($confirm_ocupation) {
    foreach ($confirm_ocupation as $key => $value) {
        echo ($value ? 'confirmed ' : 'not confirmed');
        echo ("occupation on :   ");
        echo ("<br>");
        echo $day;
        echo ("/");
        echo $month;
        echo ("/");
        echo $year;
        echo (" at  : " . $key . " : 00 ");
        echo ("<br>");
    }
 }
 echo '<br/>';
 if ($new_time) {
    foreach ($new_time as $key => $value) {
    echo "Appointment moved from :" . $old_time[$key] . "to : " . $value . "<br>";
}
}


echo '<a href="' . base_url() . '" > home </a>';
?>
