<?php
    $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);

    $statement = '
                    SELECT *
                    FROM t_commentaires
                    WHERE T_USERS_idT_USERS = ' . $_SESSION['userId'] . '
                    ORDER BY idT_COMMENTAIRES DESC
                ';

    $req = $bdd->query($statement);

    while($data = $req->fetch()) {
        echo '<div class="comment-content">';
        echo '    <div class="comment-info"><div class="comment-user">'. $data['date'] . ' </div> : </div>';
        echo '    <a class="commentaire">  '. $data['commentaire'] .'</a>';
        echo '</div>';
        echo '<br><br><br><br><br>';
    }

?>