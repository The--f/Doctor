
<html>
    <head>    
        <link rel="stylesheet" href="../css/style.css">
        <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
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
<p>
<?php
// Change the css classes to suit your needs

$attributes = array('class' => '', 'id' => '');
echo form_open('main_control/login', $attributes);
?>
    <label for="email">Email <span class="required">*</span></label>
<?php echo form_error('email'); ?>
    <br/><input id="idEmail" type="text" name="email" maxlength="50" value="<?php echo set_value('email'); ?>"  />
</p>


<p>
<?php echo form_submit('submit', 'Submit'); ?>
</p>
<?php echo form_close(); ?>
</body>
</html>


