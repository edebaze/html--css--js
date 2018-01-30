<?php
    session_start();
    $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);



    
    if(isset($_POST['email']) && isset($_POST['pseudo']) && isset($_POST['MDP'])) {

        if(!testExist('email') && !testExist('pseudo')) {
            $email = $_POST['email'];

            if (filter_var($email,  FILTER_VALIDATE_EMAIL)) {
                $req = $bdd->prepare('INSERT INTO t_users(pseudo, email, MDP, T_ROLES_idT_ROLES) VALUES(:pseudo, :email, :MDP, :role)');
                $req->execute(array(

                    'pseudo' => $_POST['pseudo'],
                    'email' => $_POST['email'],
                    'MDP' => $_POST['MDP'],
                    'role' => 1,

                ));
                $_SESSION['login'] = true;
                $_SESSION['success'] = true;

                $_SESSION['pseudo'] = $_POST['pseudo'];
                header ('Location: ./login.php');
            }

    }

        }



    header('Location: ./main.php');




    // FONCTION TESTEXIST()
    function testExist($var) {
        $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);
        $data = $bdd->query('SELECT * FROM t_users');

        $test = false;

        while ($user = $data->fetch()) {
            if($user[$var] == $_POST[$var]) {
                $test = true;
            }
        }

        return $test;
    }


