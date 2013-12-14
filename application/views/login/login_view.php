<?php
// Change the css classes to suit your needs

$attributes = array('class' => '', 'id' => '');
echo form_open('test_control/login', $attributes);
?>

<p>
    <label for="email">Email <span class="required">*</span></label>
<?php echo form_error('email'); ?>
    <br /><input id="email" type="text" name="email" maxlength="20" value="<?php echo set_value('email'); ?>"  />
</p>


<p>
<?php echo form_submit('submit', 'Submit'); ?>
</p>

<?php echo form_close(); ?>

