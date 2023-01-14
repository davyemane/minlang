<?php 
include('dbConnexion.php');

include('links.php');

    if(!empty($_POST['email']) AND !empty($_POST['password'])){
        


            // verification de l'email
        function verif_email($email){
            $syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
            if(preg_match($syntaxe,$email))
                return true;
            else
                return false;
            }   

        if (!verif_email(htmlspecialchars($_POST['email']))) {
            $message = "Email invalide";
            $champs_vide[]='"email"';
            echo ' <div><span style="color:red; font-weight:normal;">'.$message.'</span></div>';  
            //fin de verification
            }

        else{
        // verification du compte
            $recupEmail = ($_POST['email']);
            $recupPassword = sha1($_POST['password']);
            $recupUser =$connexion->prepare('SELECT * FROM minlang_users WHERE email=? AND passeword=?');
                
            $recupUser -> execute(array($recupEmail,$recupPassword));
                
            if($recupUser->rowCount() <= 0){
                echo 'ce compte n\'existe pas';
            }
            else{   
                $userInfo = $recupUser->fetch();
                
                $_SESSION['id'] = $userInfo['id'];
                $_SESSION['user_name']= $userInfo['user_name'];
                $_SESSION['email'] = $userInfo['email'];
                    header('Location: index.php');
                }   
        }
        // fin de verification
    
        }

    else{
        echo 'veillez remplire tous les champs';
    }
?>

    <?php
    /*if($_SESSION['passwor']){
        echo '<div><span style="color:green; font-weight:normal;">connecté</span></div>';
    }else{
        echo '<div><span style="color:red; font-weight:normal;">connecté</span></div>';
    }*/
    ?>
