<html>

    <head>
        <title>Acceuil</title>
        <!-- Bootstrap -->
        <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet" >
        <link href="<?php echo base_url()?>css/bootstrap-responsive.min.css" rel="stylesheet" >
        <link href="<?php echo base_url()?>css/styles.css" rel="stylesheet" >
        <link href="<?php echo base_url() ?>/DT_bootstrap.css" rel="stylesheet" >
       <script type="text/javascript" >
            function show(path){
                document.getElementById('iframetitle').innerHTML = 'Home > '+ path;
                document.getElementById('iframe').setAttribute("src", path) ;
            }
            function show_calander(){
                document.getElementById('iframetitle').innerHTML = 'Home > Calander';
                document.getElementById('iframe').setAttribute("src","calander") ;
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
echo '<a href="' . base_url() . 'admin/configurations">configure</a> ';
echo '</li>';
echo '<li>';
echo '<a href="' . base_url() . 'admin/calander"> show meetings </a>';
echo '</li>';
echo '<li>';
echo '<a href="' . base_url() . 'admin/patients">List patients</a> ';
echo '</li>';
echo '<li>';
echo '<a href="' . base_url() . 'admin/reservation">List reservations</a> ';
echo '</li>';
echo '<li>';
echo '<a href="' . base_url() . 'logout">logout</a> ';
echo '</li>';
?>

                    </ul>
</div>
                <div class="span9" id="content">
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left" id="oldtitle" >Administration</div>
                                <div class="muted pull-left"   id="iframetitle" style="display: none"> Choose Day </div>
                                <div name="iframe_container" id="iframecontainer" style="display: none">
                                    <iframe name="iframe"  style="width: 100%; height: 50%;" seamless="false" src="<?php echo base_url() . 'calander'; ?>"
                                </div>
                            </div>
                            </div>
        </div>
        </div>  </div> </div> </div>
</body>
</html>
