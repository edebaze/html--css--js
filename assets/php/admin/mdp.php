<h2 class="header">users</h2>
<section>
    <article>
        <h4>Changez votre mot de passe</h4>
        <form method='post' action="../php/newMdp.php">
            <ul>
                <li>
                    <label for='pass'>Votre ancien mot de passe</label><br/>
                    <input type='password' name='mdp' id='mdp'/>
                </li><br/>
                <li>
                    <label for='NewPass'>Votre nouveau mot de passe</label><br/>
                    <input type='password' name='newMdp' id='newMdp'/>
                </li><br/>
                <li>
                    <label for='NewPassVerif'>Confirmez votre nouveau mot de passe</label><br/>
                    <input type='password' name='newMdpVerif' />
                </li><br/>
                <li><input type='submit' name='valider'/></li>
            </ul>
        </form>
    </article>
</section>