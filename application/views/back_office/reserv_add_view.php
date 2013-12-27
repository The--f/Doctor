<?php

/**
 *
 * @author Feker
 */
echo ($confirm ? 'confirmed ' : 'not confirmed');
echo ("occupation on :   ");
echo ("<br>");
echo $day;
echo ("/");
echo $month;
echo ("/");
echo $year;
echo ("<br>");
foreach ($occupation as $hour) {
    echo (" at  : " . $hour . " : 00 ");
}
echo '<br/>';
echo '<a href="' . base_url() . '" > home </a>';
?>
