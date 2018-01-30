<?php
    session_start();
    $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);

    $statement = '
                SELECT *
                FROM t_commentaires
                LEFT JOIN t_users ON t_commentaires.T_USERS_idT_USERS = t_users.idT_USERS
                WHERE t_commentaires.T_ARTICLES_idT_ARTICLES = ' . $_POST['articleId'] . '
                ORDER BY t_commentaires.idT_COMMENTAIRES ASC
            ';

    $req = $bdd->query($statement);

    while($data = $req->fetch()) {
        echo '<div class="comment-content">';
        echo '    <div class="comment-info"><div class="comment-user">'. $data['pseudo'] . ' </div> : </div>';
        echo '    <a class="commentaire">  '. $data['commentaire'] .'</a>';
        echo '</div>';
    }

    ?>

