<div id="header">
<?php
    echo '<a href="' . base_url() . '">home</a> ';
    echo '<br>';
?>
    <div id="login" >
        <?php
        if (!$this->session->userdata('user_name')) {
            echo 'not logged in ';
}
        if ($this->session->userdata('user_name')) {
                    echo 'logged in as ' . $this->session->userdata('user_name');
                    echo '<a href="' . site_url('logout') . '">logout</a>';
} else {
                  echo '<a href="' . site_url('login') . '"> login </a>';
}
        ?>
    </div>
</div>