<?php
    $recupPub = $connexion-> prepare('SELECT minlang_users.id ,user_name,profiles,lien,id_expediteur,minlang_ficher.id  FROM minlang_users,minlang_ficher WHERE id_expediteur = minlang_users.id;');
    $recupPub->execute();

?>