<html>

    <head>
        <title>Accedddduil</title>
        <!-- Bootstrap -->
        <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet" >
        <link href="<?php echo base_url()?>css/bootstrap-responsive.min.css" rel="stylesheet" >
        <link href="<?php echo base_url()?>css/styles.css" rel="stylesheet" >
        <link href="<?php echo base_url() ?>/DT_bootstrap.css" rel="stylesheet" >
        <script type="text/javascript" >
        function show(path){
        document.getElementById('iframetitle').innerHTML = 'Home > '+ path;
        document.getElementById('iframe').setAttribute("src", path) ;
        document.getElementById('iframecontainer').setAttribute("style", " overflow: hidden; width: 100%;") ;
        //                style=" overflow: hidden; width: 100%;"
       }
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
                            <li class="dropdown"></li>
                    </div>
            </div></div></div>
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">

   <?php
echo '<li>';
echo '<a href ="#" onclick="show(\'configurations\');">configure</a> ';
                        echo '</li>';
echo '<li>';
echo '<a href ="#" onclick="show(\'calander\')"> show meetings </a>';
echo '</li>';
echo '<li>';
echo '<a href="#" onclick="show(\'patients\');">List patients</a> ';
echo '</li>';
echo '<li>';
echo '<a href="#" onclick="show(\'reservation\');">List reservations</a> ';
echo '</li>';
echo '<li>';
echo '<a href="' . base_url() . 'logout">logout</a>';
echo '</li>';
                        ?>

                    </ul>
</div>
                <div class="span9" id="content">
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"   id="iframetitle"> Choose Day </div>
                            </div>
                            <div class="block-content collapse in"  name="iframe_container" id="iframecontainer" >
                                <iframe name="iframe" id="iframe" style="width: 100%; height: 50%;" seamless="false" src="<?php echo base_url() . 'calander'; ?>" ></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </body>
</html>
