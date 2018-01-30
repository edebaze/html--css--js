<?php
$bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);

$statement = '
                    SELECT *
                    FROM t_commentaires
                    WHERE T_USERS_idT_USERS = ' . $_SESSION['userId'] . '
                    ORDER BY idT_COMMENTAIRES DESC
                ';

$req = $bdd->query($statement);

$i = 0;
$nbrComment = countMyShit2('t_commentaires', 'T_USERS_idT_USERS');

while($data = $req->fetch()) {

    $i++;

    // ECHO DES COMMENTAIRES

    echo '<div class="comment-content';
        addClassCacher2($i, 1, 3, $nbrComment);
    echo '">';
    echo '    <div class="comment-info"><div class="comment-user">'. $data['date'] . ' </div> : </div>';
    echo '    <a class="commentaire">  '. $data['commentaire'] .'</a>';
    echo '</div>';
    echo '<br>';

}



// ECHO BUTTON

echo '<div class="zone-button-comment">

                    <button class="prev-button-comment"><<- PREV</button>
                    <button class="next-button-comment">NEXT ->></button>

                </div>';






        // FUNCTIONS



// COUNT MY SHIT 2

function countMyShit2($table, $where, $table2 = null) {

    // On ouvre notre bdd
    $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);




    if($table2 != null) { // TRAITEMENT JOINT

        $statement = '
                      SELECT COUNT(*) 
                      FROM '.$table.' 
                      INNER JOIN '.$table2.' ON '.$table.'.idT_ARTICLES = '.$table2.'.T_ARTICLES_idT_ARTICLES
                      WHERE '.$table.'.'.$where.' = ' . $_SESSION['userId'];


    } else { // TRAITEMENT SIMPLE

        // On établie notre statement
        $statement = 'SELECT COUNT(*) FROM '.$table.' WHERE '.$where.' = ' . $_SESSION['userId'] ;

    }



    // On effectue une requète dans notre bdd
    $req = $bdd->query($statement);

    // On récupère notre nombre d'articles
    $echo = $req->fetch()['COUNT(*)'];

    // On affiche le nombre d'articles
    return $echo;

}


// ADD CLASS CACHER 2

function addClassCacher2($i, $debut, $limite, $nbrComment) {


    if($limite > $nbrComment) {
        $limite = $nbrComment;
    }


    // PREV TEST
    if(0 < $i && $i < $debut) {
        echo ' prev-comment';
    }

    // ACTIF
    if($debut <= $i && $i <= $limite) {
        echo ' actif-comment';
    }

    // NEXT TEST
    if($limite < $i && ($i <= $limite + 3  &&  $i < $nbrComment)) {
        echo ' next-comment';
    }
}



?>


<script src="../js/adminButtonContact.js"></script>
