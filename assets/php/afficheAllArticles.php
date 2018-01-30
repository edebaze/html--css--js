<?php

    include_once 'functions/functions.php';

// Partie "Requête"

$bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);
$data = $bdd->query('SELECT * FROM t_articles ORDER BY idT_ARTICLES DESC');



     // ---------------------------------------------- //

     //            AFFICHAGE DE L'ARTICLE              //

                 afficherArticle($data);

    // -----------------------------------------------  //

?>



