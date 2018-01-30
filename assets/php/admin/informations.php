<?php

    $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);

    // TRAITEMENT DE DONNEES

    // Statement
    $statement = 'SELECT * FROM t_users WHERE idT_USERS = ' . $_SESSION['userId'];

    // Requète
    $req = $bdd->query($statement);

    // Fetch
    $user = $req->fetch();


    // AFFICHAGE DU MESSAGE
    echo '
        <div class="informations">
            <div class="user-pseudo">'.$user['pseudo'].'</div>
            <div class="user-email">'.$user['email'].'</div>
            <div class="user-mdp">'.$user['MDP'].' <a href="#mdp">Changer le mot de passe</a></div>
            <button class="btn-blog">Retour au Blog</button>
    
            <button class="btn-delete">DELETE YOUR ACCOUNT</button>
        </div>
    ';

?>


<script src="../js/btnDelet.js"></script>


