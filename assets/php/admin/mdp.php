<h2 class="header">users</h2>
<section>

    <?php




    // Partie "Requête"
    $cnx = new PDO('mysql:host=localhost;dbname=blog2;charset=utf8', 'root', '');

    if(isset($_SESSION['pseudo']) AND isset($_POST['pass']) AND isset($_POST['NewMail']) AND isset($_POST['NewMailVerif']))
    {
        $pass_hache=sha1($_POST['pass']);

        $req=$bdd->prepare('SELECT id FROM t_users WHERE pseudo = ? AND mdp= ?');
        $req->execute(array($_SESSION['pseudo'],$pass_hache));
        $resultat=$req->fetch();

        if(!$resultat)
        {
            echo 'mauvais mot de passe';
        }
        elseif (empty($_POST['NewPass']))
        {
            echo 'Le nouveau mot de passe n\'a pas été renseigné.';
        }
        elseif ($_POST['NewPass'] != $_POST['NewPassVerif'])
        {
            echo 'Les mots de passe ne coresspondent pas.';
        }
        else
        {
            $new_pass_hache=sha1($_POST['NewPass']);
            $req=$bdd->prepare('UPDATE t_users SET mdp=? WHERE id=?');
            $req->execute(array($new_pass_hache,$_SESSION['id']));
            $req->closeCursor();
            echo 'Le mot de passe a été changé.';
        }
    }
    ?>
    <article>
        <h4>Changez votre mot de passe</h4>
        <form method='post'>
            <ul>
                <li>
                    <label for='pass'>Votre ancien mot de passe</label><br/>
                    <input type='password' name='pass' id='mdp'/>
                </li><br/>
                <li>
                    <label for='NewPass'>Votre nouveau mot de passe</label><br/>
                    <input type='password' name='NewPass' id='mdp'/>
                </li><br/>
                <li>
                    <label for='NewPassVerif'>Confirmez votre nouveau mot de passe</label><br/>
                    <input type='password' name='NewPassVerif' />
                </li><br/>
                <li><input type='submit' name='valider'/></li>
            </ul>
        </form>
    </article>
</section>