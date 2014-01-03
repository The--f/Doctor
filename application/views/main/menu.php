<!DOCTYPE html>
<!-- aghorbel@mciss.tn -->
<html>
    <head>
        <title>Acceuil</title>
        <!-- Bootstrap -->
        <link type="text/css" href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet" >
        <link type="text/css"href="<?php echo base_url() ?>css/bootstrap-responsive.min.css" rel="stylesheet" >
        <link type="text/css"href="<?php echo base_url() ?>css/styles.css" rel="stylesheet" >
        <link type="text/css" href="<?php echo base_url() ?>/DT_bootstrap.css" rel="stylesheet" >
        <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.10.2.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    </a>
                    <?php echo '<a class ="brand"  href="#">DoctoReservation</a> '; ?>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <?php
                                echo '<li>';
                                echo '<a href="' . base_url() . 'admin"> Administration  </a>';
                                echo '</li>';
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span3" id="sidebar">
                <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                    <?php
    echo '<li>';
    echo '<a href="' . base_url() . '" >Home</a>';
echo '</li>';
    echo '<li>';
    echo '<a href ="#" onclick="show(\'calander\');">Reserve Meeting </a>';
echo '</li>';
echo '<li>';
echo '<a href="#"  onclick="show(\'reservations\');"> My reservations  </a>';
echo '</li>';
echo ($loged ? '<li><a href="' . site_url('logout') . '">logged in as ' . $username . ' (logout)</a></li>' : '<li><a href="#"   onclick="show(\'login\');"  > login </a></li>' );
?>
                </ul>
            </div>
            <div class="span9" id="content">
                <div class="row" >
                    <!-- block -->
                    <div class="block"  id="box_clear"  style="min-height: fit-content ;min-width: fit-content;" >
                        <div class="navbar navbar-inner block-header">
                                <div class="text-primary pull-left" id="iframetitle" >Home</div>
                            </div>
                        <div class="block-content collapse in"  name="if_c" id="iframecontainer" style="min-height : 100%; min-width: 100%">
                            <iframe  name="iframe"  style="min-height : 100%; min-width: 100%" id="iframe" seamless="on"></iframe>
                        </div>
                    </div>
                    <!-- /block -->
                </div>
            </div>
        </div>
    </div>
    </body>
</html>