<html>
    <head>
        <link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet" >
        <script type="text/javascript" src="<?php echo base_url() ?>css/jquery.min.js"></script>
        <script>
            function close_div(){
                $('#msg').fadeOut(2, function() {
                        window.top.location.reload();
                });
            }
        </script>
    </head>
    <body>
        <div  id="msg" class="alert alert-success">
            <a class="close" data-dismiss="alert" onclick="close_div();" >x</a>
            <strong>Success!</strong>You have successfully done it.
        </div>
    </body>
</html>

