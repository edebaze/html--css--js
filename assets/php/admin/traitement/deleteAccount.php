<?php

    session_start();

    if(isset($_POST['test'])) {
        if ($_POST['test']) {

            $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);

            $statement = '
                        UPDATE t_users
                        SET affiche = 0
                        WHERE idT_USERS = '. $_SESSION['userId'] .'
                  ';

            $req = $bdd->query($statement);


        }
    }