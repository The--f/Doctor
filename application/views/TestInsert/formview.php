<!DOCTYPE html>
<html>
    <head>    
        <link rel="stylesheet" href="../css/style.css">
        <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
        <script type="text/javascript">
$(document).ready(function() {
	$(function() {
		$( "#idnom" ).autocomplete({
			source: function(request, response) {
				$.ajax({ url: "<?php echo site_url('autocomplete/suggestions'); ?>",
				data: { term: $("#nom").val()},
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
    <div class="container">
        <section class="register">
            <h1>Enregister Vous </h1>


    <?php
// Change the css classes to suit your needs

$attributes = array('class' => 'container', 'id' => 'a');
echo form_open('TestInsert', $attributes);
?>

<p>
    <label for="nom">Nom <span class="required">*</span></label>
<?php echo form_error('nom'); ?>
    <br /><input id="idnom" type="text" name="nom" maxlength="20" value="<?php echo set_value('nom'); ?>" />
</p>

<p>
    <label for="prenom">Prenom <span class="required">*</span></label>
<?php echo form_error('prenom'); ?>
    <br /><input id="prenom" type="text" name="prenom" maxlength="20" value="<?php echo set_value('prenom'); ?>"  autocomplete="off"/>
</p>

<p>
    <label for="email">Email <span class="required">*</span></label>
<?php echo form_error('email'); ?>
    <br /><input id="email" type="text" name="email" maxlength="20" value="<?php echo set_value('email'); ?>" autocomplete="off" />
</p>


<p>
<?php echo form_submit('submit', 'Submit'); ?>
</p>

<?php echo form_close(); ?>

</body>
</html>