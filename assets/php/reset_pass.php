<?php

    session_start();
    $mysqli = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);

//This code runs if the form has been submitted
if (isset($_POST['submit']))
{

// check for valid email address
    $email = $_POST['email'];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error[] = 'Adresse email valide';
    }

/*// checks if the username is in use
    $check = $mysqli->query("SELECT email FROM t_users WHERE email = '$email'");
    $check2 = $check->num_rows;


//if the name exists it gives an error
    if ($check2 == 0) {
        $error[] = 'Email déjà existant';
    }
*/

    if (!isset($error)) {
/*
        $query = $mysqli->query("SELECT pseudo FROM t_users WHERE email = '$email' ");
        $r = $mysqli->fetch_object($query);
*/

//create a new random password

        $password = substr(md5(uniqid(rand(),1)),3,10);
        $pass = md5($password); //encrypted version for database entry

//send email
        $to = "$email";
        $subject = "Account Details Recovery";
        $body = "Hi MON BON MONSIEUR, nn you or someone else have requested your account details. nn Here is your account information please keep this as you may need this at a later stage. nnYour username is MON BON MONSIEUR 
         nn your password is $password nn Your password has been reset please login and change your password to something more rememberable.nn Regards Site Admin";
        $lheaders= "From: <contact@domain.com>rn";
        $lheaders.= "Reply-To: noprely@domain.com";
        mail($to, $subject, $body, $lheaders);

//update database
        $sql = $mysqli->query("UPDATE t_users SET MDP='$pass' WHERE email = '$email'");
        $rsent = true;


    }// close errors
}// close if form sent

//show any errors
if (!empty($error))
{
    $i = 0;
    while ($i < count($error)){
        echo "<div class='error-msg'>".$error[$i]."</div>";
        $i ++;}
}// close if empty errors


if (isset($rsent)){
    echo "<p>Just sent an email with your account details to $email</p>
    <a href='./main.php''>Retour début</a>";
} else {
    echo "<p>Entrer votre email adresse. Vous allez recevoir un nouveau MDP par email.</p>

        <form action=\"\" method=\"post\">
            <p>Votre email  <input type=\"text\" name=\"email\" size=\"50\" maxlength=\"255\">
                <input type=\"submit\" name=\"submit\" value=\"Nouveau MDP\"></p>
        </form>
   ";
}



    include_once 'script.php';
?>
