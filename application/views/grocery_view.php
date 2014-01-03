<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet" >
        <link href="<?php echo base_url()?>css/bootstrap-responsive.min.css" rel="stylesheet" >
        <link href="<?php echo base_url()?>css/styles.css" rel="stylesheet" >
        <meta charset="utf-8" />
        <script type="text/javascript" >
            $(document).ready(function (){
                $(".ftitle").html("HELLO");
            });
        </script>
        <title>My Reservations</title>

        <?php foreach ($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />

        <?php endforeach; ?>
        <?php foreach ($js_files as $file): ?>

            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>

        <style type='text/css'>
            body
            {
                font-family: Arial;
                font-size: 14px;
            }
            a {
                color: blue;
                text-decoration: none;
                font-size: 14px;
            }
            a:hover
            {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div style="min-height: fit-content ">
            <br>
            <?php echo $output; ?>
            <br>
        </div>
    </body>
</html>