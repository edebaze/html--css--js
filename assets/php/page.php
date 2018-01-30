<?php

    if(session_id() == "") session_start();

    // Partie "Requête"
    $cnx = new PDO('mysql:host=localhost;dbname=blog2;charset=utf8', 'root', '');

    $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
    $limite = 5;


    $debut = ($page - 1) * $limite;
    /* Ne pas oublier d'adapter notre requête */
    $query = 'SELECT SQL_CALC_FOUND_ROWS * FROM `t_articles` ORDER BY dateHeure DESC LIMIT :limite OFFSET :debut';
    $query = $cnx->prepare($query);
    $query->bindValue('debut', $debut, PDO::PARAM_INT);
    $query->bindValue('limite', $limite, PDO::PARAM_INT);
    $query->execute();

    $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);
    $data = $bdd->query('SELECT * FROM t_articles ORDER BY idT_ARTICLES DESC');


    while ($article = $query->fetch() ){
        // AFFICHAGE DU MESSAGE
        echo '<div class="article">';
        echo '    <div class="Titre"> <a class="articleId">#<span>'.$article['idT_ARTICLES'].'</span></a> ' . $article['titre'] . '</div>';
        echo '    <div class="autre">';
        echo 'statut : ' . $article['statut'] . ' auteur : ' . findAuthor($article['idT_ARTICLES'],$bdd) . '<br>' .  '  date : ' . $article['dateHeure'];
        echo '    </div>';
        echo '<br>';
        echo '    <div class="commenter">';
        echo '         <button class="btn-commenter btn-5 pop-up-button-sign-in">Commenter !</button>';
        echo '    </div>';
        echo '    <div class="voir">';
        echo '         <button class="btn-voir btn-5">+</button>';
        echo '    </div>';
        echo '<br>';
        echo '    <div class="Contenu"> ';
                        contenu($article['contenu'], 70);
        echo '    </div>';
        echo '<br>';
        echo '<div class="fb-share-button" data-href="http://localhost/html-css-js/Projet%20Groupe/Blog%20emilie/BLOG/assets/php/main.php?page=<?php echo $page; ?>"  data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2Fhtml-css-js%2FProjet%2520Groupe%2FBlog%2520emilie%2FBLOG%2Fassets%2Fphp%2Fmain.php%23&amp;src=sdkpreparse">Partager</a></div>';

        echo '</div>';
    }

    /* Ici on récupère le nombre d'éléments total. Comme c'est une requête, il ne
     * faut pas oublier qu'on ne récupère pas directement le nombre.
     * De plus, comme la requête ne contient aucune donnée client pour fonctionner,
     * on peut l'exécuter ainsi directement */
    $resultFoundRows = $cnx->query('SELECT found_rows()');
    /* On doit extraire le nombre du jeu de résultat */
    $nombredElementsTotal = $resultFoundRows->fetchColumn();


    // Partie "Liens"
    /* On calcule le nombre de pages */
    $nombreDePages = ceil($nombredElementsTotal / $limite);

    /* Si on est sur la première page, on n'a pas besoin d'afficher de lien
     * vers la précédente. On va donc l'afficher que si on est sur une autre
     * page que la première */
    if ($page > 1):
        ?><a href="?page=<?php echo $page - 1; ?>">Page précédente</a> — <?php
    endif;

    /* On va effectuer une boucle autant de fois que l'on a de pages */
    for ($i = 1; $i <= $nombreDePages; $i++):
        ?><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a> <?php
    endfor;

    /* Avec le nombre total de pages, on peut aussi masquer le lien
     * vers la page suivante quand on est sur la dernière */
    if ($page < $nombreDePages):
        ?>— <a href="?page=<?php echo $page + 1; ?>">Page suivante</a><?php
    endif;






                    // FUNCTIONS //

    function findAuthor($idarticle , $db){
        $req = $db -> prepare('SELECT * FROM `t_users`left join t_articles_has_t_users on idT_USERS = t_users_id_user WHERE t_articles_id_article = ?');
        $req -> execute([$idarticle]);
        $row = $req -> fetch();
        return $row['pseudo'];
    }


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
?>