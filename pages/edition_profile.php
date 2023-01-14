
<?php
session_start();
if(!$_SESSION['id']){
    header('Location: connexion.php');
}

$server = 'localhost';
$login = 'root';
$password = '';

    if(isset($_SESSION['email'])){
            $connexion = new PDO("mysql:host=$server;dbname=minlang",$login,$password);

    $recupEmail = $_SESSION['email'];
        $recupUser = $connexion->prepare('SELECT * FROM minlang_users WHERE email =?');
        $recupUser->execute(array($recupEmail));
        $user = $recupUser->fetch();
    $messageErreur = "";

        // verification des données entré

        //1 pour le nom d'utiliateur
        if(isset($_POST['NewUser_name']) AND !empty($_POST['NewUser_name']) AND $_POST['NewUser_name'] != $user['user_name']){
            $NewUser_name = htmlspecialchars($_POST['NewUser_name']);
            $insertUser_name = $connexion->prepare("UPDATE `minlang_users` SET `user_name`= ? WHERE id=?");
            $insertUser_name -> execute(array($NewUser_name, $_SESSION['id']));
            header('Location: profile.php?id='.$_SESSION['id']);
        }

    //2 pour l'email
    if(isset($_POST['NewEmail']) AND !empty($_POST['NewEmail']) AND $_POST['NewEmail'] != $user['NewEmail']){
        $NewEmail = htmlspecialchars($_POST['NewEmail']);
            // verification de l'email
            function verif_email($NewEmail){
                $syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
                if(preg_match($syntaxe,$NewEmail))
                    return true;
                else
                    return false;
                }   
    
            if (!verif_email(htmlspecialchars($_POST['NewEmail']))) {
                $message = "Email invalide";
                echo ' <div><span style="color:red; font-weight:normal;">'.$message.'</span></div>';  
                //fin de verification
            }
            else{
                $insertEmail = $connexion->prepare("UPDATE `minlang_users` SET `email`= ? WHERE id=?");
                $insertEmail -> execute(array($NewEmail, $_SESSION['id']));
                header('Location: profile.php?id='.$_SESSION['id']);
            }
    }

    //3 pour le numero de téléphone
    if(isset($_POST['Newtel']) AND !empty($_POST['Newtel']) AND $_POST['Newtel'] != $user['Newtel']){
        $Newtel = intval($_POST['Newtel']);
        $insertTel = $connexion->prepare("UPDATE `minlang_users` SET `tel`= ? WHERE id=?");
        $insertTel -> execute(array($Newtel, $_SESSION['id']));
        header('Location: profile.php?id='.$_SESSION['id']);
    }

    // 4 pour le mot de passe
    if(isset($_POST['NewPassword']) AND !empty($_POST['NewPassword'])){
        $NewPassword = sha1($_POST['NewPassword']);
        $insertTel = $connexion->prepare("UPDATE `minlang_users` SET `passeword`= ? WHERE id=?");
        $insertTel -> execute(array($NewPassword, $_SESSION['id']));
        header('Location: profile.php?id='.$_SESSION['id']);
    }
//Pour la photo de profile
    if(isset($_FILES['profile']) AND !empty($_FILES['profile']['name'])){
        $tailleMax = 2097152;
        $extensionValide = array('jpg', 'jpeg', 'gif', 'png');
        if($_FILES['profile']['size']<= $tailleMax){
            $extensionUpload = strtolower(substr(strrchr($_FILES['profile']['name'], '.'), 1));
            if(in_array($extensionUpload, $extensionValide)){
                $chemin = "../membre/profile/".$_SESSION['id'].".".$extensionUpload;
                $resultat = move_uploaded_file($_FILES['profile']['tmp_name'], $chemin);
                if($resultat){
                    $insertProfile =$connexion->prepare('UPDATE minlang_users SET profiles= :profiles WHERE id = :id');
                    $insertProfile->execute(array(
                     'profiles'=> $_SESSION['id'].".".$extensionUpload,
                     'id'=> $_SESSION['id']
                    ));
                    header('Location: profile.php?id='.$_SESSION['id']); 
                }else{
                    echo 'nous somme désolé il y\'a eu une erreur pendant l\'importation de votre fichier';
                }
            }else{
                echo'votre photo de profile doit être aux format jpg, jpeg, gif ou alors png';
            }
        }else{
           echo  'le poid de votre ne doit pas dépacerles 2Mo'; 
        }
    }echo $messageErreur;

       //fin creation

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/styleinscrip.css">
</head>

<body>

<nav>
</nav>

    <div class="container">
        <div class="title"><p class="titles">Profile Edition</p></div>
        <div class="content">


        <form action="" method="POST" enctype="multipart/form-data">
        
        
        <div class="user-details">

            <!--votre nom complet -->
            <div class="input-box">
                <span class="details">Full Name</span>
                <input type="text" id="name" name="NewUser_name" placeholder="<?php echo $user['user_name']; ?>" value="<?php echo $user['user_name']; ?>" /><br /><br />
            </div>


            <!--email-->
            <div class="input-box">
                <span class="details">Email</span>
                <input type="email" id="email" name="NewEmail" placeholder="email" value="<?php echo $user['email']; ?>"/><br /><br />
            </div>

            <!--numero de téléphone-->
            <div class="input-box">
                <span class="details">Phone Number</span>
                <input type="tel" id="tel" name="Newtel" placeholder="tel" value="<?php echo $user['tel']; ?>"/><br /><br />
            </div>

            <!--mote de passe -->
            <div class="input-box">
                <span class="details">Password</span>
                <input type="password" id="password" name="NewPassword" placeholder="password"  /><br /><br />
            </div>


            <!-- Photo -->
                <span class="details">Choix d'avatar</span>
                <input type="file" id="profile" name="profile" accept="image/gif, image/jpeg, image/png, image/jpg" /><br /><br />

            <div class="button" style="width:100%;">
            <input type="submit" value="Enregistrer les mise à jour">
                
            </div>
            
            </div>
        </form>

    </div>
    </div>

</body>
</html>
<?php
}
else{
    header("Location: connexion.php");
}
    

?>