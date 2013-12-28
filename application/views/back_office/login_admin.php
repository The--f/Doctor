<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet" >
        <link href="<?php echo base_url()?>css/bootstrap-responsive.min.css" rel="stylesheet" >
        <link href="<?php echo base_url()?>css/styles.css" rel="stylesheet" >
        <meta charset="UTF-8">
        <title> ACCES ADMINISTRATEUR</title>
    </head>
    <body id ="login">
        <div class="container">
        <?php
        // Change the css classes to suit your needs

        $attributes = array('class' => 'form-signin');
        echo form_open('admin/adminlogin', $attributes);
        ?>
        <p>
            <label for="user_name"><h2 class="form-signin-heading">User Name <span class="required">*</span></h2></label>
<?php echo form_error('user_name'); ?>
            <br /><input id="user_name"  class="input-block-level" type="text" name="user_name" autocomplete="off" value="<?php echo set_value('user_name'); ?>"  />
        </p>
        <p>
            <label for="password"><h2 class="form-signin-heading">Password <span class="required">*</span></h2></label>
<?php echo form_error('password'); ?>
            <br /><input id="password" class="input-block-level" type="password" name="password" maxlength="admin_pass" value="<?php echo set_value('password'); ?>"  />
        </p>
        <p>
        <?php $style = array('class' => 'btn btn-large btn-primary');
              echo '<center>'.form_submit('submit', 'Submit' ,"class = 'btn btn-large btn-primary'").'</center>';?>
        </p>
<?php echo form_close(); ?>
        </div>
    </body>
</html>
