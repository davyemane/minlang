<?php
    include('topBar.php');
//ici on verifie si l'id a bien été envoyé et s'il n'est pas inferieur à 0
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getId = intval($_GET['id']);//affecte l'id é une variable en le convertissant en entier

    //ici on recupère donc lUtilisateur dans le BD
    $recupUser = $connexion-> prepare('SELECT * FROM minlang_users WHERE id = ?');
    $recupUser-> execute(array($getId));
    $userInfo = $recupUser->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('links.php'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>
    <style>
        
        body {
    background: #eee
}

.card {
    border: none;
    position: relative;
    overflow: hidden;
    border-radius: 8px;
    cursor: pointer
}

.card:before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 4px;
    height: 100%;
    background-color: #E1BEE7;
    transform: scaleY(1);
    transition: all 0.5s;
    transform-origin: bottom
}

.card:after {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 4px;
    height: 100%;
    background-color: #8E24AA;
    transform: scaleY(0);
    transition: all 0.5s;
    transform-origin: bottom
}

.card:hover::after {
    transform: scaleY(1)
}

.fonts {
    font-size: 11px
}

.social-list {
    display: flex;
    list-style: none;
    justify-content: center;
    padding: 0;
}

.social-list li {
    padding: 10px;
    color: #8E24AA;
    font-size: 19px
}

.buttons button {
    border: 1px solid #8E24AA !important;
    background-color: #fff;
    color: rgb(28, 1, 34);
    height: 40px;
    font-weight : bold;
    transition : 0.5s;
}
.buttons button a {
    color: rgb(28, 1, 34);
    height: 40px;
    font-weight : bold;
    transition : 0.5s;
}

.buttons button:hover {
    border: 1px solid #8E24AA !important;
    color: #fff;
    height: 40px;
    background-color: rgb(28, 1, 34);
    text-decoration : none;
    letter-spacing: 2px;
    transition : 0.5s;
    
}
.buttons button:hover a{
    color: #fff;
    height: 40px;
    text-decoration : none;
    transition : 0s;
}



.arr{

margin: 0;
background: #fafafa ;
height: 100%;
width: 100%;

}

.valign-wrapper{

    position: relative;
    top: 25%;
    align-items: center;
}



    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body style="background-image: linear-gradient(45deg,#00aeffa9,#a68eff) !important; height: 100vh ;">

<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-7 valign-wrapper">
            <div class="card p-3 py-4">
                <div class="text-center"> <img src="../membre/profile/<?php echo $userInfo['profiles'];?>" width="100" height="100" class="rounded-circle"> </div>
                <div class="text-center mt-3"> <span class="bg-secondary p-1 px-4 rounded text-white">User</span>
                    <h5 class="mt-2 mb-0"><?php echo $userInfo['user_name'];?></h5> <span>UI/UX Designer</span>
                    <div class="px-4 mt-1">
                        <p class="fonts">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                    </div>
                    <ul class="social-list">
                        <li><i class="fa fa-facebook"></i></li>
                        <li><i class="fa fa-dribbble"></i></li>
                        <li><i class="fa fa-instagram"></i></li>
                        <li><i class="fa fa-linkedin"></i></li>
                        <li><i class="fa fa-google"></i></li>
                    </ul>
                    <div class="buttons"> 
                        <?php
                            if(isset($_SESSION['id']) AND $_SESSION['id'] != $userInfo['id']){
                                $dejaSuivitOuNon = $connexion->prepare('SELECT * FROM minlang_follow WHERE id_follower =? AND id_following =?');
                                $dejaSuivitOuNon->execute(array($_SESSION['id'],$userInfo['id']));
                                $dejaSuivitOuNon=$dejaSuivitOuNon->rowCount();

                            if($dejaSuivitOuNon == 1){

                        ?>
                    <button class="btn btn-primary px-4 ms-3"><a href="follow.php?id=<?=$userInfo['id'];?>" > Se désabonner</a></button>
                <br /><br />

            <?php }else { ?>
                <button class="btn btn-primary px-4 ms-3"><a href="follow.php?id=<?=$userInfo['id'];?>" > S'abonner</a></button>
        <br /><br />
        <?php
            }
        }
        ?> <br><br>
                    <?php
        // ici on rend le contenu individuel
        if(isset($_SESSION['email']) AND $userInfo['email'] == $_SESSION['email'])
        {
        ?>
        <button class="btn btn-primary px-4 ms-3"><a href="edition_profile.php" >Editer mon profil</a></button>
        <button class="btn btn-primary px-4 ms-3"> <a href="deconnexion.php" >deconnexion</a></button>
        <?php
        }
        ?>

        </div>
                </div>
            </div>

        </div>
    </div>
</div>

























</body>
</html>
<?php
}
else{
    echo'erreur ';
}
?>
