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
<body id ="login">
    <div class="container">
<?php
// Change the css classes to suit your needs

$attributes = array('class' => 'form-signin');
echo form_open('main_control/login', $attributes);
?>
       
    <h2 class="form-signin-heading">Email <span class="required">*</span></h2></label>
<?php echo form_error('email'); ?>
    <br/><input id = "idEmail" class="input-block-level"  maxlength="30" value="<?php echo set_value('email'); ?>"  />
<br>
   

<p>
<?php
$style = array('class' => 'btn btn-large btn-primary');
echo '<center>'.form_submit('submit', 'Submit' ,"class = 'btn btn-large btn-primary'").'</center>'; ?>
</p>
<?php echo form_close(); ?>
    </form>
    </div>
    
</body>
</html>


