<?php

    session_start();


    // INITIALISATION DES INFORMATIONS
    $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);
    $userId = $_SESSION['userId'];
    $titre = $_POST['titre'];
    $content = $_POST['content'];



    /////////////////////////////////
    // TRAITEMENT DES INFORMATIONS //
    /////////////////////////////////



    // GESTION DE T_CONTACTADMIN

    // Insertion de la demande dans t_contactadmin
    $req = $bdd->prepare('INSERT INTO t_contactadmin(titre, content, T_USERS_idT_USERS) VALUES(:titre, :content, :t_users_idt_users)');
    $req->execute(array(
        't_users_idt_users' => $userId,
        'titre' => $titre,
        'content' => $content,
    ));


    echo 'Votre message a été envoyé avec succès';


?>