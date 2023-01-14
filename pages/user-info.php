<?php

if(isset($_GET['id']) AND !empty($_GET['id'])){ 
    $id_destinataire = ($_GET['id']);
}

$getId=$_SESSION['id'];
$recupUser = $connexion-> prepare('SELECT * FROM minlang_users WHERE id = ?');
$recupUser-> execute(array($getId));
$userInfo = $recupUser->fetch();

?>