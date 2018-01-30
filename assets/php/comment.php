<?php

    session_start();


    // INITIALISATION DES INFORMATIONS
    $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);
    $userId = $_SESSION['userId'];
    $commentaire = $_POST['commentaire'];
    $articleId = $_POST['articleId'];
    $affichage = 1;



                         /////////////////////////////////
                        // TRAITEMENT DES INFORMATIONS //
                       /////////////////////////////////



            // GESTION DE T_COMMENTAIRES

        // Insertion du commentaire dans t_commentaires
        $req = $bdd->prepare('INSERT INTO t_commentaires(T_USERS_idT_USERS, commentaire, T_ARTICLES_idT_ARTICLES, affichage) VALUES(:t_users_idt_users, :commentaire, :t_articles_idT_articles, :affichage)');
        $req->execute(array(
            't_users_idt_users' => $userId,
            'commentaire' => $commentaire,
            't_articles_idT_articles' => $articleId,
            'affichage' => $affichage,

        ));



         // header('Location: ./main.php');