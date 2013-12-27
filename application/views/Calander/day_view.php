<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $day . '/' . $month . '/' . $year; ?>  </title>
    </head>
    <body>
        <form action="<?php echo site_url('add_reserv'); ?>" method="post" >
            <input type="hidden" name="day" value="<?php echo $day; ?>" >
            <input type="hidden" name="month" value="<?php echo $month; ?>" >
            <input type="hidden" name="year" value="<?php echo $year; ?>" >
            <?php
        foreach ($hour as $hour_number => $taken_or_not) {
    echo '<input type="radio" name="hour" value="' . $hour_number .
              ( $taken_or_not ? '"' : '"disabled=TRUE"' ) . '" /> ' . $hour_number . '<t> : 00  <br/>';
}
            ?>
            <input type="submit" value="confirm" name="confirm"/>
            <input type="button" onclick="history.back();" value="Back">
        </form>
    </body>
</html>
