<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>List All Patient </title>
    </head>
    <body>
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
    </body>
</html>
