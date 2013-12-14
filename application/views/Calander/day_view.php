<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>day </title>
    </head>
    <body>
        <form action="add_reserv" method="post" >
            <input type="hidden" name="day" value="<?php echo $day; ?>" >
            <input type="hidden" name="month" value="<?php echo $month; ?>" >
            <input type="hidden" name="year" value="<?php echo $year; ?>" >
            <?php
        foreach ($hour as $key => $value) {
             echo ($value ? '<input type="radio" name="hour" /> ' : 'taken') . $key . '<t> : 00  <br/>';
        }
            ?>
            <input type="submit" value="confirm" name="confirm"/>
            </form>
    </body>
</html>
