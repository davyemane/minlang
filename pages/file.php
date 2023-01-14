<?php 
    include('function.php');
    include('links.php');
    recupFile($_FILES);

    if(isset($_POST['send']))
    {
        $lien = '../upload/'.$_FILES['img']['name'];

//ici on insert les images dans la base de donnée
        $insert = $connexion->prepare('INSERT INTO minlang_ficher(lien,id_expediteur) VALUES(?,?)');
        $insert->execute(array($lien,$_SESSION['id']));

        //ici je recupère toute les images 
        $recupImage = $connexion->prepare('SELECT * FROM minlang_ficher WHERE id_expediteur=?');
        $recupImage->execute(array($_SESSION['id']));

        //j'affecte les données à un new table
        $images = $recupImage ->fetchAll();
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minlang | Photo</title>

<style> 

</style>
</head>
<body>
    <div class="contain" style="margin-bottom: 100px !important; margin-right: 10px !important; ">     
        <div class="addimage" style="display: flex; flex-direction: column; align-content: center;  border-radius: 10px !important; background-color: rgba(0, 0, 0, 0.288) !important; position: fixed; right: 22px !important">
        <h3 class="center" style="color: #fff;"> 
            Publier un statut
        </h3>
            <div class="addimage_form">
                <form action="" method="POST" enctype="multipart/form-data">                
                    <div class="photo">
                        <input class="center waves btn blue-grey" id="file" type="file" name="img" accept="image/gif, image/jpeg, image/png, image/jpg" />
                    </div>
                    <button class="waves btn blue-grey" style="border-radius: 5px; margin-left: 38%; margin-top: 10px;" type="submit" name="send" value="ok">Refresh</button>
            </form>  
            </div>
        </div>
    </div>
</body>
</html> 

