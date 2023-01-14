<?php
session_start();

    //verification de la conformité des données
    echo 'date = '.$_POST['date'];
            $champs_vide=array();
                 
            if (empty($_POST['nom'])){
                 $champs_vide[]='"nom"';
            }
             
            if (empty ($_POST['date'])){
                 $champs_vide[]='"date"';
            }
             
            if (empty ($_POST['genre'])){
                 $champs_vide[]='"genre"';
            }
                 
            if (empty ($_POST['email'])){
                 $champs_vide[]='"email"';
            }
             
            if (empty ($_POST['password'])){
                 $champs_vide[]='"password"';
            }
             
            if (empty ($_POST['confirm_password'])){
                 $champs_vide[]='"confirm_password"';
            }
             
            // VERIFICATION DE L'EMAIL
             function verif_email($email)
                {
                 $syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
                 if(preg_match($syntaxe,$email))
                    return true;
                 else
                    return false;
                }   
         
           if (!verif_email($_POST['email'])) {
               $message = "Email invalide";
               $champs_vide[]='"email"';
                echo ' <div style="margin-top:245px; float:right; margin-right: 70px"><span style="color:red; font-weight:normal;">'.$message.'</span></div>';                       
                                              }
         // VERIFICATION DU MOT DE PASSE 
              if ( $_POST['confirm_password'] != $_POST['password'] ) {
            
                echo 'Les 2 mots de passe sont différents! ';
                $champs_double = array();
                $champs_double[] = "doublons";}

            //Pour le profile
            if(isset($_FILES['profile']) AND !empty($_FILES['profile']['name'])){
                $tailleMax = 2097152;
                $extensionValide = array('jpg', 'jpeg', 'gif', 'png');
                if($_FILES['profile']['size']<= $tailleMax){
                    $extensionUpload = strtolower(substr(strrchr($_FILES['profile']['name'], '.'), 1));
                    if(in_array($extensionUpload, $extensionValide)){
                        $chemin = "membre/profile/".$_SESSION['id'].".".$extensionUpload;
                        $resultat = move_uploaded_file($_FILES['profile']['tmp_name'], $chemin);
                    }if($resultat){
                        $profil = $_SESSION['id'].".".$extensionUpload;
                    }
                }               
            }else{
                $profil = 'minlanfont.jpg';
            }
            // AFFECTATION DES DONNÉES DANS DES VARIABLES ET ENVOIE DES DONNEE A LA BASE DE DONNÉE
           if (empty ($champs_vide) && empty($champs_double) && empty($champs_mail)){ 
    
              $nom = htmlspecialchars($_POST['nom']);
              $date_naiss = htmlspecialchars($_POST['date']);
              $email = htmlspecialchars($_POST['email']);
              $tel = htmlspecialchars($_POST['tel']);
              $genre = htmlspecialchars($_POST['genre']);
              $passeword = sha1($_POST['password']);
              
              echo 'user name :'.$nom.'</br>';
              echo 'date of birth : '.$date_naiss.'</br>';
              echo 'email : '.$email.'</br>';
              echo 'tel : '.$tel.'</br>';
              echo 'profile : '.$profil.'</br>';
              echo 'genre : '.$genre.'</br>';
              echo 'passeword : '.$passeword.'</br></br></br>';
    
             
    //connexion a la base de donnée
    $server = 'localhost';
    $login = 'davy';
    $password = '2002';
    
    
    
    try{
        //connexion à la base de donnée
        $connexion = new PDO("mysql:host=$server;dbname=minlang",$login,$password);
        $connexion-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    // envoi des données à la base de donnée
    $requettes= $connexion ->prepare( "INSERT INTO minlang_users(user_name,date_naiss,profiles,email,passeword,tel) 
    VALUE(:nom,:date_naiss,:profil,:email,:passeword,:tel)");
    
    
       $requettes->bindParam(':nom',$nom);
       $requettes->bindParam(':date_naiss',$date_naiss);
       $requettes->bindParam(':profil',$profil);
       $requettes->bindParam(':email',$email);
       $requettes->bindParam(':passeword',$passeword);
       $requettes->bindParam(':tel',$tel);
    
       $requettes->execute();

       $_SESSION['email'] = $email;
       header('Location: acceuil.php');
    
       echo 'votre compte a bien été créé!';
//creationde la session


    }       //fin creation
    
    catch (PDOException $e) {
         echo 'Echec : cette adresse mail est déjà prise  ' ;
        $erreur = $e -> getMessage();
echo $erreur;
     }
             
            //echo ' <div style="padding-left:240px; margin-top: 10px; margin-bottom:-10px">Votre inscription a bien été pris en compte.</div>';
           } 
        ?>
