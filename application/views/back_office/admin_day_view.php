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
        echo form_open('admin/add_occupation', '', array('day' => $day, 'month' => $month, 'year' => $year, 'hidden_hours' => $hidden_hours, 'ids' => $ids));
foreach ($hour as $hour_number => $is_empty) {
                echo '<input type="checkbox" name="' . ( $is_empty ? 'occupation[]' : 'reschedule[]' ) . '" value="' . $hour_number . '"' .
                        ( $is_empty ? '' : 'checked=TRUE' ) . ' /> ' . $hour_number . ' : 00 ' .
                        ( $is_empty ? '' : '==>' . $names[$hour_number] . ' (' . $mails[$hour_number] . ')') . '<br/>';
}
          ?>

            <input type="button" onclick="history.back();" value="Back">

            <?php
            echo form_submit('submit', 'confirm');
            echo form_close();
            ?>
            </body>
</html>
