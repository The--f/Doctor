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
        <div class="container-fluid">
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <?php echo '<a class ="brand"  href="#">DoctoReservation</a> '; ?>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <?php
                                    if (!$this->session->userdata('user_name')) {
                                        
}
                                                if ($this->session->userdata('user_name')) {
                                                            echo 'logged in as ' . $this->session->userdata('user_name');
                                                            echo '<a class="dropdown-toggle"  href="' . site_url('logout') . '">logout</a>';
                                        } else {
                                                          echo '<a class="dropdown-toggle" href="' . site_url('login') . '"> login </a>';
                                        }
                                ?>
                                
                </div>
            </div></div></div>
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">

    <?php
    echo '<li>';
    echo '<a href="' . base_url() . '">home</a> ';
    echo '</li>';
    echo '<li>';
    echo '<a href="' . base_url() . 'calander"> Reserve a meeting  </a>';
    echo '</li>';
    echo '<li>';
    echo '<a href="' . base_url() . 'reservations"> My reservations  </a>';
    echo '</li>';
    echo '<li>';
    echo '<a href="' . base_url() . 'admin"> Administration  </a>';
    echo '</li>';
    ?>
                    </ul>
</div>

        <div class="span9" id="content">
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Sign In</div></div>
                                <div class="block-content collapse in">
                                
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

                                </div>
                            </div>
        </div>
                        </div> </div> </div> </div>
        
    </body>
</html>
