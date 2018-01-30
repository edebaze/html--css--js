<?php

    if(session_id() == '') session_start();


    if(isset($_POST['titre'])) {

        $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);

        // On récupère le titre
        $titre = $_POST['titre'];

        $statement = 'SELECT * FROM t_articles WHERE titre = "'. $titre . '"';

        $data = $bdd->query($statement);

        modifierArticle($data);

    }


    echo '<button id="retour-button"> <<- Retour aux articles</button>';




    // FUNCTION


// MODIFIER ARTICLE

function modifierArticle($data) {
    $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);

    while ($article = $data->fetch() ){

        // AFFICHAGE DU MESSAGE
        echo '<form class="article" id="form-modif-article" method="POST" action="../php/modifArticle.php"> ';
        echo '    <input type="text" name="articleId" class="modif-articleId" value="'.$article['idT_ARTICLES'].'">';
        echo '    <input type="text" class="modif-titre" name="titre" value="'. $article['titre'].'"> ' ;
        echo       afficherCategoriesCheckbox();
        echo '     statut : ' . statutButton($article['statut']);
        echo '    <textarea class="Contenu" name="contenu"> ' . $article['contenu'] . '</textarea>';
        echo '    <input type="submit" value="Enregistrer les modifications">';
        echo '</form>';
    }
}




// Afficher Catégories Miniature

function afficherArticleMiniature($data, $auteur = false) {
    $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);

    while ($article = $data->fetch() ){

        // AFFICHAGE DU MESSAGE
        echo '<div class="article-miniature ';
        classerCategories($article['idT_ARTICLES']);
        echo '">';
        echo '    <div class="Titre">' . $article['titre'] . '</div>';

        if($auteur) {
            echo ' <div class="autre"> auteur : ' . findAuthor($article['idT_ARTICLES'],$bdd) . '</div>';
        } else {
            echo ' <div class="autre">' . statut($article['statut']) . '</div>';
        }

        echo '</div>';
    }
}



// STATUT

function statut($statut) {

    // STATUT REDIGE
    if ($statut == 'redige') {
        return '<div style="color: green;">'. $statut .'</div>';
    }


    // STATUT BROUILLON
    if ($statut == 'brouillon') {
        return '<div style="color: darkorange;">'. $statut .'</div>';
    }

    // STATUT CACHE
    if ($statut == 'cache') {
        return '<div style="color: red;">'. $statut .'</div>';
    }
}


// CONTENU

function contenu($var, $max) {
    // On récupère la chaine de caractère sous forme de tableau de mots
    $contenu = explode(" ", $var);

    // On test que notre tableau contienne plus de mots que notre maximum à afficher
    if($max > count($contenu)) {
        $max = count($contenu);
    }

    // On affiche les $max premiers messages
    for($i=0; $i<$max; $i++) {
        echo ' ' . $contenu[$i];
    }

    // On ouvre la balise <span> qui cachera notre contenu
    echo '<span class="contenu-inactif">';

    // On affiche le reste du tableau
    if($max < count($contenu)) {
        for($i=$max; $i<count($contenu); $i++) {
            echo ' ' . $contenu[$i];
        }
    }

    // On ferme la balise <span>
    echo '</span>';
}


// FIND AUTHOR

function findAuthor($idarticle , $db){
    $req = $db -> prepare('SELECT * FROM `t_users`left join t_articles_has_t_users on idT_USERS = t_users_id_user WHERE t_articles_id_article = ?');
    $req -> execute([$idarticle]);
    $row = $req -> fetch();
    return $row['pseudo'];
}




// Afficher Catégories Checkbox

function afficherCategoriesCheckbox() {
    $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);

    $reqStatement = '
                SELECT *
                FROM t_categories
            ';

    $requete = $bdd->query($reqStatement);


    // On affiche la catégorie

    echo '<div class="categories">';

    while($categorie = $requete->fetch()) {
        echo '<input type="checkbox" id="'.$categorie['categorie'].'" name="categorie[]" value="'.$categorie['categorie'].'">
              <label for="'.$categorie['categorie'].'">'.$categorie['categorie'].'</label>
        ';
    }

    echo '</div><br>';

}





// Classer Catégories

function classerCategories($articleId) {
    $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);

    $reqStatement = '
                        SELECT *
                        FROM t_categories
                        INNER JOIN t_categories_has_t_articles ON t_categories.idT_CATEGORIES  = t_categories_has_t_articles.T_CATEGORIES_idT_CATEGORIES
                        WHERE t_categories_has_t_articles.T_ARTICLES_idT_ARTICLES	 = ' . $articleId . '
                    ';

    $requete = $bdd->query($reqStatement);


    // On affiche la catégorie

    while($categorie = $requete->fetch()) {
        echo ' ' . $categorie['categorie'] . ' ';
    }

}



// Statut Button

function statutButton($statut) {
    $echo = '
        <select name="statut" class="statut-btn">
            <option value="redige">Redige</option>
            <option value="brouillon">Brouillon</option>
            <option value="cache">Cache</option>                      
        </select>
     ';

    return $echo;
}



?>



<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript permet d'utiliser les fonctionalité avancer de bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>



<!-- INTEGRATION DE POPUP.JS -->
<script src="../js/retourButton.js"></script>




