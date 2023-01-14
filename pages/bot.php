
<?php

include("dbConnexion.php");
include("links.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="shortcut icon" href="../images/minlang Logo small.png" type="image/x-icon">
     <link rel="stylesheet" href="../css/mystyle.css">
</head>

<body>

<nav class="nav">
        <a href="index.php" class="brand-logo center"><img src="../images/minlang Logo small.png" alt="" width="35px" class="Logo"></a>
</nav>

<div class="view">








<div class="contactview hide-on-med-and-down"> 
<?php

if(isset($_GET['id']) AND !empty($_GET['id'])){ 
    $id_destinataire = ($_GET['id']);
}

$getId=$_SESSION['id'];
$recupUser = $connexion-> prepare('SELECT * FROM minlang_users WHERE id = ?');
$recupUser-> execute(array($getId));
$userInfo = $recupUser->fetch();


?>
<input type="text" name="exp" id="exp" value=<?=$userInfo['id']; ?> hidden />

<ul>
<?php

$destinataire = $connexion->prepare('SELECT * FROM minlang_follow, minlang_users WHERE minlang_follow.id_following =minlang_users.id AND minlang_follow.id_follower =? ');
$destinataire->execute(array($_SESSION['id']));
while($msg = $destinataire->fetch())
{
echo '
<div class="card-panel #ff59d z-depth-1"><div class="row valign-wrapper"><div class="col s5"><a href="?id_destinataire='.$msg['id_following'].'"><li>
<img class="Round responsive-img" max-height="40px !important" max-width="40px !important" src="../membre/profile/'.$msg["profiles"].'" alt=""></a></div>
<div class="col s10"><a href="?id_destinataire='.$msg['id_following'].'"><span class="black-text">'.$msg['user_name'].'</span></a></div></div></div></li>';

}





?>
</ul>
</div>







<div class="chatview">

    <div class="wrapper">
        <div class="title">
        
        <?php
            include('destinataire.php');
        ?>

        </div>

        <div class="form" id="msgBody">
        <?php
            include('afficher.php');
        ?>

        </div>
        <div class="typing-field">
            <div class="input-data">
                <textarea class="form-control" id="message" style="height: 50px; border-radius: 28PX;" placeholder="Type something here.." ></textarea>
                <button id="send">Send</button>
            </div>
        </div>
    </div>
    </div>
    </div>

                <!--notification de reussite-->
                <div id="win" class="notif">
                    🤟 Envoi Réussi ✔️
                </div>

                <div id="echec" class="notif"> 🤟 Echec d'envoi ❌ </div>
                <!--<div class="col-md-4">-->

 
    
<script type='text/javascript'>
    const win = document.getElementById('win');
const echec =document.getElementById('echec');

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
                    win.classList.add('show');
  
                    // when chat goes down the scroll bar automatically comes to the bottom
             $(".form").scrollTop($(".form")[0].scrollHeight);

                },
                error:function(data){
                    echec.classList.add('show');
                }
             });

             setTimeout(() =>{
                    win.classList.remove('show');
                    echec.classList.remove('show');
                }, 2000 );


         
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
            });
         },);800

     });
    </script>

    
</body>
</html>