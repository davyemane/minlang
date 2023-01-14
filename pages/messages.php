<?php

ini_set('display_errors', 'off');

session_start();
if(!$_SESSION['id']){
      header('Location: connexion.php');
}
include('topBar.php');
include('lien.php');
$server = 'localhost';
$login = 'root';
$password = '';
$connexion = new PDO("mysql:host=$server;dbname=minlang",$login,$password);




if(isset($_GET['id']) AND !empty($_GET['id'])){ 
    $id_destinataire = ($_GET['id']);
}

$getId=$_SESSION['id'];
$recupUser = $connexion-> prepare('SELECT * FROM minlang_users WHERE id = ?');
$recupUser-> execute(array($getId));
$userInfo = $recupUser->fetch();
include ('lien.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>tchatBox</title>
    <style>
    body{
        background-color: #212121;
    }</style>
</head>
<body >
<div class="row">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4" style="background-color: #616161 ; display: flexbox; width: 25%;">
            <?//ici on positione l'utilisateur?>    
                    <h2 style="background-color: #3892db; border-radius: 20px; font-size: 12px; "><a href="index.php"><img height="50" width="50" class="circle" src="membre/profile/<?=$userInfo['profiles']?>" alt="accueil" );" /></a> <?php echo $userInfo['user_name'];?> </h2>

                <input type="text" name="exp" id="exp" value=<?=$userInfo['id']; ?> hidden />

                <!--envoyer à: choix du destinataire -->
                <ul class="collection">
                    <?php
                            $destinataire = $connexion->prepare('SELECT * FROM minlang_follow, minlang_users WHERE minlang_follow.id_following =minlang_users.id AND minlang_follow.id_follower =? ');
                            $destinataire->execute(array($_SESSION['id']));
                        while($msg = $destinataire->fetch())
                        {
                            echo '
                            <a href="?id_destinataire='.$msg['id_following'].'"><li class="collection-item avatar">
                            <img class="circle" height="30" width="30" src="membre/profile/'.$msg["profiles"].'" alt="">
                                <a href="?id_destinataire='.$msg['id_following'].'">'.$msg['user_name'].'</a></li>';
                        }

                     ?>
                </ul>
            </div>
            <div class="col-md-6" style="display: flexbox;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #757575 ; width: 100%; ">
                            <h4>

                                <?php
                                    include('destinataire.php');
                                ?>
                            </h4>
                        </div>
                        <div class="modal-body" id="msgBody" style="height: 500px; width: 100%; ; border-radius: 30px;  overflow-y: scroll; overflow-x: hidden;">
                            <?php
                            include('afficher.php');
                            ?>
                        </div>
                        <div class="modal-footer">
                            <textarea class="form-control" id="message" style="height: 50px; border-radius: 28PX;"></textarea>
                            <button style="border-radius: 36px;" class="btn waves-effect waves-light" type="submit" id="send" name="action"> Send
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="col-md-4">

                <?php
                    include('profile.php');
                ?>
            </div>-->
        </div>
    </div>
</div>
</body>

<script type='text/javascript'>
     $(document).ready(function(){
         $("#send").on("click",function(){
             $.ajax({
                url:"insertMessage.php",
                method:"POST",
                data:{
                    expediteur: $("#exp").val(),
                    destinataire: $("#dest").val(),
                    message: $("#message").val(),
                },
                datatype:"text",
                success:function(data)
                {
                    $("#message").val("");
                    alert ('succes d\'envoi');
                },
                error:function(data){
                    alert ('erreur d\'envoi');
                }
             });
         });
         setInterval(function(){
            $.ajax({
                url:"realTimeChat.php",
                method:"POST",
                data:{
                    expediteur: $("#exp").val(),
                    destinataire: $("#dest").val(),
                },
                dataType:"text",
                success:function(data)
                {
                    $("#msgBody").html(data);
                },
                error:function(data){
                    alert ('erreur d\'envoi');
                }
            });
         },);800
     });
 </script>
 <?php
    //$_SESSION['id']=$userInfo['id'];
    
 ?>
</html>