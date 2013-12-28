<html>
    
    <head>
        <title>Acceuil</title>
        <!-- Bootstrap -->
        <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet" >
        <link href="<?php echo base_url()?>css/bootstrap-responsive.min.css" rel="stylesheet" >
        <link href="<?php echo base_url()?>css/styles.css" rel="stylesheet" >
        <link href="<?php echo base_url()?>/DT_bootstrap.css" rel="stylesheet" >
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
    echo '<a href="' . base_url() . 'calander"> Reserve a meeting  </a>';
    echo '</li>';
    echo '<li>';
    echo '<a href="' . base_url() . 'reservations"> My reservations  </a>';
    echo '</li>';
    echo '<li>';
    echo '<a href="' . base_url() . 'admin"> Administration  </a>';
    echo '</li>';
    ?>
                    </ul>
</div>
</div>
        </div>
</body>
</html>