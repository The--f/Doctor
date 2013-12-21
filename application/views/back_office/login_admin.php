<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // Change the css classes to suit your needs

        $attributes = array('class' => '', 'id' => '');
        echo form_open('admin/adminlogin', $attributes);
        ?>
        <p>
            <label for="user_name">User Name <span class="required">*</span></label>
<?php echo form_error('user_name'); ?>
            <br /><input id="user_name" type="text" name="user_name"  value="<?php echo set_value('user_name'); ?>"  />
        </p>

        <p>
            <label for="password">Password <span class="required">*</span></label>
<?php echo form_error('password'); ?>
            <br /><input id="password" type="password" name="password" maxlength="admin_pass" value="<?php echo set_value('password'); ?>"  />
        </p>


        <p>
        <?php echo form_submit('submit', 'Submit'); ?>
        </p>

<?php echo form_close(); ?>






    </body>
</html>
