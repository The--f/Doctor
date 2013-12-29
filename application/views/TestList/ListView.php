<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>List All Patient </title>
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

        <div class="span9" id="content">
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Sign In</div>
                            </div>
                            <div class="block-content collapse in">
                           
<table border ="3px">
            <th>Nom</th><th>Prenom</th><th>Mail</th>
            <?php
            foreach ($result->result_array() as $row) {
                echo '<tr><td>' . $row['nom'] . '</td>'
                . '<td>' . $row['prenom'] . '</td>'
                . '<td>' . $row['email'] . '</td></tr>';
            }
            ?>
        </table>
        <a href="./../"> Retour </a>
   
    </div>

                                </div>
                            </div>
        </div>
                        </div> </div> </div> </div>
        
    </body>
</html>
