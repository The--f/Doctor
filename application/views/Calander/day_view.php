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
        <?php
        echo form_open('add_reserv/add', '', array('day' => $day, 'month' => $month, 'year' => $year));
        foreach ($hour as $hour_number => $taken_or_not) {
            echo '<input type="radio" name="hour" value="' . $hour_number .
            ( $taken_or_not ? '"' : '"disabled=TRUE"' ) . '" /> ' . $hour_number . ': 00  <br/>';
        }
            echo form_submit('submit', 'confirm');
             echo form_close();
        ?>
            <input type="button" onclick="history.back();" value="Back">
    </body>
</html>
