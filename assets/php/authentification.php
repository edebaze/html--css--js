<?php

    if($reponse==1) {
    $connexion=mysqli_connect("localhost","root","","blog2");
    $requete = "SELECT * FROM t_users";
    $result = mysqli_query($connexion,$requete);
    echo("<table>");
        while($donnees=mysqli_fetch_array($reponse)) {

        echo("<tr><td>".$donnees['pseudo']."</td>"."<td>".$donnees['userId']."</td>"."<td>".$donnees['email']
                ."</td>"."<td>".$donnees['T_ROLES_ID_ROLE']."</td>"."<td>"."<form method='post' action='#'>"."<select name='select'><option value='1'>1</option>
                        <option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='7'>7</option>
                    </select> "."</td>"."<td>"."<input type='text' name='id'><input type='submit' value='Mettre a jour' name='formulaire'>"."</form>"."</td>"."</tr>");
        }
        echo("</table>");
    if(isset($_POST['formulaire'])){
    $id=$_POST['id'];
    $choix=$_POST['select'];
    $requete2= "UPDATE t_users SET T_ROLES_IDt_ROLES='$choix' WHERE IDt_USERS='$id'";
    mysqli_query($connexion,$requete2);
    }
    else {
    echo "erreur ";
    }
    }

    echo ' a revoir';



if($_SESSION['grade'] != '1'){
    //accès refusé si pas 'admin'
    header('Location: ./main.php');
}

