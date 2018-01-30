<?php
    session_start();
    $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);
?>


<h2 class="header"><span class="icon"></span>Dashboard</h2>


<div class="monitor">
    <h4>Right Now</h4>
    <div class="clearfix">
        <ul class="content">
            <li>content</li>
            <li class="articles"><span class="count"><?php $articleId = countMyShit('t_articles', 'ID_USER');?></span><a href="../../html/admin.php/#mesArticles">articles</a></li>
            <li class="comments-article"><span class="count"><?php countMyShit('t_commentaires', 'T_USERS_idT_USERS') ?></span><a href="">commentaires articles</a></li>
        </ul>
        <ul class="discussions">
            <li>discussions</li>
            <li class="comments"><span class="count"><?php countMyShit('t_articles', 'ID_USER', 't_commentaires') ?></span><a href="">commentaires</a></li>
            <li class="approved"><span class="count">319</span><a href="">approved</a></li>
        </ul>
    </div>
</div>









<?php






                    // FUNCTIONS






// COUNT MY SHIT

    function countMyShit($table, $where, $table2 = null) {

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
        echo $echo;

    }

?>