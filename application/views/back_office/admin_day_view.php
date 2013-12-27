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
        <br><?php echo $day . '/' . $month . '/' . $year; ?>  <br>
        <?php
        form_open('admin/add_occupation', '', array('day' => $day, 'month' => $month, 'year' => $year));
        foreach ($hour as $hour_number => $taken_or_not) {
    echo '<input type="checkbox" name="' . ( $taken_or_not ? 'occupation[]' : 'reschedule[]' ) . '" value="' . $hour_number .
    ( $taken_or_not ? '"' : '"checked=TRUE' ) . ' /> ' . $hour_number . ' : 00 ' .
    ( $taken_or_not ? '' : '==>' . $names[$hour_number] . ' (' . $mails[$hour_number] . ')') . '<br/>';
            }
          ?>

            <input type="button" onclick="history.back();" value="Back">

            <?php
            echo form_submit('submit', 'confirm');
            echo form_close();
            ?>
            </body>
</html>
