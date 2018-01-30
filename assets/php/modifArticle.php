<?php

    session_start();
    $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);

    // RECUPERATION DES VARIABLES
    $column = $_POST['column'];
    $value = $_POST['value'];
    $articleId = $_POST['articleId'];


    // UPDATE
    for($i=0; $i<count($column); $i++) {
        // Initialisation du statement
        $statement = updateArticle($column[$i], $value[$i], $articleId);

        // Execution du statement
        $req->execute($statement);
    }







            //  -- FUNCTIONS --  //

    include_once './functions/functions.php';


    // UPDATE STATEMENT

    function updateArticle($column, $value, $articleId) {
        $statement = '
                UPDATE t_articles
                SET '.$column.' = "'.$value.'"
                WHERE idT_ARTICLES = '.$articleId.'
        ';

        return $statement;
    }