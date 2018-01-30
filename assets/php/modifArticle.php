<?php

    session_start();
    $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);

    // RECUPERATION DES VARIABLES
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $categories = $_POST['categorie'];
    $articleId = $_POST['articleId'];
    $statut = $_POST['statut'];



                        // UPDATE TITRE

        // Initialisation du statement
        $statement = updateArticle('titre', $titre, $articleId);

        // Execution du statement
        $bdd->query($statement);





                        // UPDATE CONTENU

        // Initialisation du statement
        $statement = updateArticle('contenu', $contenu, $articleId);

        // Execution du statement
        $bdd->query($statement);




                        // UPDATE STATUT

        // Initialisation du statement
        $statement = updateArticle('statut', $statut, $articleId);

        // Execution du statement
        $bdd->query($statement);





                        // UPDATE CATEGORIE


        // Initialisation du statement delete
        $statement = 'DELETE FROM `t_categories_has_t_articles`
                      WHERE T_ARTICLES_idT_ARTICLES = '. $articleId;

        // Execution du statement
        $bdd->query($statement);




        // GESTION DE T_CATEGORIES

        // Initialisation de $i
        $i = 0;

        // On parcourt notre tableau $_POST['categorie']
        foreach($_POST['categorie'] as $valeur)
        {
            // On récupère la catégorie sélectionnée
            $categorie[$i] = $valeur;


            // On va chercher l'id de la catégorie dans t_categories
            // On ouvre une requète dans la bdd
            $req = $bdd->query('SELECT * FROM t_categories');

            // On effectue une boucle pour parcourir notre table (t_categories)
            while ($donnees = $req->fetch()) {
                // On test lorsque la catégorie envoyée est égale à une de nos catégories
                if($categorie[$i] == $donnees['categorie']) {
                    // On récupère son ID
                    $categorieId[$i] = $donnees['idT_CATEGORIES'];
                }
            }

            $i += 1;
        }




        // GESTION DE T_CATEGORIES_HAS_T_ARTICLES

        // On parcourt notre tableau $categorie[]
        for ($i = 0; $i<count($categorieId); $i++) {
            // Insertion de $articleId et $categorieId dans T_CATEGORIES_HAS_T_ARTICLES
            $req = $bdd->prepare('INSERT INTO t_categories_has_t_articles (T_CATEGORIES_idT_CATEGORIES, T_ARTICLES_idT_ARTICLES) VALUES(:val1, :val2)');
            $req->execute(array(
                'val1' => $categorieId[$i],
                'val2' => $articleId,
            ));

            // DEBUG : echo '<br> Liaison de : ' . $articleId . ' avec ' . $categorieId[$i];
        }





        header('Location: ../html/admin.php#mesArticles');









            //  -- FUNCTIONS --  //

    include_once './functions/functions.php';


    // UPDATE ARTICLE

    function updateArticle($column, $value, $articleId) {
        $statement = '
                UPDATE t_articles
                SET '.$column.' = "'.$value.'"
                WHERE idT_ARTICLES = '.$articleId.'
        ';

        return $statement;
    }



    // UPDATE CATEGORIE (_HAS_ARTICLES)

    function updateCategorie($categorie, $value, $articleId) {
        $statement = '
                    UPDATE t_categorie
                    SET '.$categorie.' = "'.$value.'"
                    WHERE idT_ARTICLES = '.$articleId.'
            ';

        return $statement;
    }
