<html>
<head>
   <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet" >
        <link href="<?php echo base_url()?>css/bootstrap-responsive.min.css" rel="stylesheet" >
        <link href="<?php echo base_url()?>css/styles.css" rel="stylesheet" >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Doct'Reservation</title>
 
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo base_url()?>css/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
	$(function() {
		$( "#idEmail" ).autocomplete({
			source: function(request, response) {
				$.ajax({ url: "<?php echo site_url('autocomplete/suggestions'); ?>",
				data: { term: $("#idEmail").val()},
				dataType: "json",
				type: "POST",
				success: function(data){
					response(data);
				}
			});
		},
		minLength: 2
		});
	});
});
</script>
</head>
<body>
    
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
                                <div class="muted pull-left">Sign In</div>
                            </div>
                            <div class="block-content collapse in">
                           
<?php
// Change the css classes to suit your needs

$attributes = array('class' => 'form-signin');
echo form_open('main_control/login', $attributes);
?>
       
    <h2 class="form-signin-heading">Email <span class="required">*</span></h2></label>
<?php echo form_error('email'); ?>
    <br/><input id = "idEmail" name ="email" class="input-block-level"  maxlength="30" value="<?php echo set_value('email'); ?>"  />
<br>
   

<p>
<?php
$style = array('class' => 'btn btn-large btn-primary');
echo '<center>'.form_submit('submit', 'Submit' ,"class = 'btn btn-large btn-primary'").'</center>'; ?>
</p>
<?php echo form_close(); ?>
   
    </div>

                                </div>
                            </div>
        </div>
                        </div> </div> </div> </div>
</body>
</html>


