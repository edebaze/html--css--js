<?php

        session_start();


        // Partie "Requête"
        $bdd = new PDO('mysql:host=localhost;dbname=blog2;charset=utf8', 'root', '');

        if ($_POST['newMdp'] == $_POST['newMdpVerif']) {
            $pass = $_POST['mdp'];

            $statement = 'UPDATE t_users SET MDP="'.$_POST['newMdp'].'" WHERE idT_USERS =' . $_SESSION['userId'];

            $req = $bdd->query($statement);

        }

         header('Location: ../html/admin.php');

?>