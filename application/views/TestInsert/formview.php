<html>
<link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet" >
        <link href="<?php echo base_url()?>css/bootstrap-responsive.min.css" rel="stylesheet" >
        <link href="<?php echo base_url()?>css/styles.css" rel="stylesheet" >
        <meta charset="UTF-8">
        <title>Sign In</title>
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

$attributes = array('class' => 'container', 'id' => 'a');
echo form_open('TestInsert', $attributes);
?>

                                    <p>
    <label for="focusedInput"><h3>Nom <span class="required">*</span></h3></label>
<?php echo form_error('nom'); ?>
    <div class="control-group">
<div class="controls">
    <input id="focusedInput" class ="input-xlarge focused" type="text" name="nom" maxlength="20" value="<?php echo set_value('nom'); ?>" />
</div></div></p>

<p>
    <label for="prenom"><h3>Prenom <span class="required">*</span></h3></label>
<?php echo form_error('prenom'); ?>
    <div class="control-group">
<div class="controls">
    <input id="prenom" type="text" class ="input-xlarge focused" name="prenom" maxlength="20" value="<?php echo set_value('prenom'); ?>"  autocomplete="off"/>
</div></div></p>

<p>
    <label for="email"><h3>Email <span class="required">*</span></h3></label>
<?php echo form_error('email'); ?>
     <div class="control-group">
<div class="controls">
    <br /><input id="email" type="text" class ="input-xlarge focused" name="email" maxlength="40" value="<?php echo set_value('email'); ?>" autocomplete="off" />
</div></div></p>


<p>
    <div class="form-actions">


    <input type="button" class="btn btn-large" onclick="history.back();" value="Back">
    <?php $style = array('class' => 'btn btn-large btn-primary');
              echo form_submit('submit', 'Submit' ,"class = 'btn btn-large btn-primary'");?>
</div>
</p>

<?php echo form_close(); ?>
                                </div>

                                </div>
                            </div>
        </div>
                        </div> </div> </div> </div>

    </body>
</html>



</body>
</html>