
<div id="header"> <div id="login" >
        <?php
        if (!$this->session->userdata('user_name')) {
            echo 'not logged in ';
}
        if ($this->session->userdata('user_name')) {
                    echo 'logged in as ' . $this->session->userdata('user_name');
                    echo '<a href="logout">logout</a>';
        } else {
    echo '<a href="login"> login </a>';
            }
        ?>
    </div>
</div>