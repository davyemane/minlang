<?php
include('links.php');
include('topBar.php');
//recuperation de l'id envoyé
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getId = $_GET['id'];//affecte l'id é une variable en le convertissant en entier

    //ici on recupère donc lUtilisateur dans le BD
    $recupUser = $connexion -> prepare('SELECT * FROM `minlang_users`  WHERE id = ?');
    $recupUser-> execute(array($getId));
    $userInfo = $recupUser->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Liste des membres</title>

<style>


::-webkit-scrollbar{
    width: 15px !important;
    height: 15px !important;
    }
::-webkit-scrollbar-track{
    background-color: rgba(22, 16, 26, 0.473) !important;
    border-radius: 10px !important;
    }
::-webkit-scrollbar-thumb{
    background-image: linear-gradient(45deg,#00aeff,#a68eff) !important;
    border-radius: 10px !important;
    -webkit-shadow: rgba(0,0,0,.12) 0 3px 13px 1px !important;
    }
::-webkit-scrollbar{
    width: 15px !important;
    height: 15px !important;
    }
    

</style>



</head>

<body style="background-image: linear-gradient(45deg,#00aeffa9,#a68eff) !important;">
<div class="col-md-8 col-xl-8" style="left: 16vw">
	<!-- affiicher tous les membres-->
	<?php
		//connexion à la base de donnée


		$recupUsers = $connexion->query('SELECT * FROM minlang_users');
		while($user = $recupUsers->fetch()){
			?>
            <div class="col s5  ">
                <div class="card-panel yellow lighten-4 z-depth-1" style="border-radius: 15px;">
                    <div class="row valign-wrapper">

                        <? //ici on affiche la photo de profile ?>
                        <div class="col s1">
                            <a href="profile.php?id=<?=$user['id'];?>">
                                <img class="circle img" id="avatar" width="50px" height="50px" border-radius="50% !important" src="../membre/profile/<?php echo $user['profiles'];?>" alt=""  />
                            </a> 
                        </div>

                        <!-- ici j'affiche tous les noms des membres -->

                        <div class="col s3">
                            <span class="black-text">
                                <h2><?php echo $user['user_name'];?> </h2>                               
                            </span>
                        </div>
                   </div>

                   <!--ajout du boutton de message-->

                   <a style="width: 70px;" class="waves-effect waves-light btn-small orange lighten-2 white-text right" href="chat2.php?id_destinataire=<?=$user['id'];?>"><i class="material-icons right">mail</i></a>
                <!--systèm d'abonnement-->
                   <?php include('abonner.php')?>

                
                </div>
    
                <SCript>
                    document.addEventListener('DOMContentLoaded', function() {
                        var elems = document.querySelectorAll('.fixed-action-btn');
                        var instances = M.FloatingActionButton.init(elems, {
                        direction: 'left'
                            });
                        });
                </SCript>
            </div>
            <?php
?>
	   <br><br>
			<?php
		}
		
	?>

	<!--fin d'affichage-->
</div>
</body>
</html>  
<?php
}
else{
    echo'erreur ';
}
?>