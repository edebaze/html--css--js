<?php

    include_once 'functions/functions.php';

    if(session_id() == '') session_start();

    $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);


    if(isset($_POST['categorie'])) {
        
        include_once 'afficheArticleCategorie.php';

    } else {

        include_once 'afficheAllArticles.php';

    }


    include_once 'script.php';


