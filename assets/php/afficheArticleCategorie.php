    <?php

        if(session_id() == '') session_start();

        $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);


        // On parcours un tableau d'affichage des catégories
        for($i=0; $i<count($_POST['categorie']); $i++) {

                /* ----------------------------------
                ||        Première "Requête"        ||
                 ---------------------------------- */

            $statement = '
                    SELECT *
                    FROM t_categories
                    WHERE t_categories.categorie = \''. $_POST['categorie'][$i].'\'';


            $req = $bdd->query($statement);


            while($categorie = $req->fetch()) {

                /* ----------------------------------
                ||        Seconde "Requête"        ||
                 ---------------------------------- */
                $dataStatement = '
                    SELECT *
                    FROM t_categories_has_t_articles
                    INNER JOIN t_articles ON t_categories_has_t_articles.T_ARTICLES_idT_ARTICLES = t_articles.idT_ARTICLES
                    WHERE t_categories_has_t_articles.T_CATEGORIES_idT_CATEGORIES = '. $categorie['idT_CATEGORIES'] .'
                ';


                $data = $bdd->query($dataStatement);



                // ---------------------------------------------- //

                //            AFFICHAGE DE L'ARTICLE              //

                            afficherArticle($data);

                // -----------------------------------------------  //


            }
        }



?>