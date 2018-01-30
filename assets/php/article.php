<?php

session_start();
$bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);


// INITIALISATION VARIABLES GLOBALES
$i = 0;
$categorie = array();
$categorieId = array();




                     // //////////////////////////////  //
                    // DEBUT DE LA GESTION DES DONNEES //
                   // //////////////////////////////  //


if(isset($_POST['titre']) && isset($_POST['contenu'])) {

    if(!testExist('titre')) {


                // GESTION DE T_ARTICLES

        // Insertion de l'article dans t_articles
        $req = $bdd->prepare('INSERT INTO t_articles(titre, contenu, affichage, statut, ID_USER) VALUES(:titre, :contenu, :affichage, :statut, :ID_USER)');
        $req->execute(array(
            'titre' => $_POST['titre'],
            'contenu' => $_POST['contenu'],
            'affichage' => 1,
            'statut' => 'redige',
            'ID_USER' => $_SESSION['userId'],

        ));

        // On récupère l'id de l'article envoyé
        $articleId = $bdd->lastInsertId();





                // GESTION DE T_ARTICLES_HAS_T_USERS

        // Insertion de l'article dans t_articles
        $req = $bdd->prepare('INSERT INTO t_articles_has_t_users(T_ARTICLES_ID_ARTICLE, T_USERS_ID_USER, T_USERS_T_ROLES_ID_ROLE) VALUES(:val1, :val2, :val3)');
        $req->execute(array(
            'val1' => $articleId,
            'val2' => $_SESSION['userId'],
            'val3' => 2,
        ));




                // GESTION DE T_CATEGORIES

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



        // On affiche le succès de l'insertion de l'article
        $_SESSION['success'] = true;

    }

}




       header('Location: ./main.php');




// FONCTION TESTEXIST()
function testExist($var) {
    $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);
    $data = $bdd->query('SELECT * FROM t_articles');

    $test = false;

    while ($user = $data->fetch()) {
        if($user[$var] == $_POST[$var]) {
            $test = true;
        }
    }

    return $test;
}

?>
