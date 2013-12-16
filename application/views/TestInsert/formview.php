<!DOCTYPE html>
<html>
    <head>    
        <link rel="stylesheet" href="../css/style.css">
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