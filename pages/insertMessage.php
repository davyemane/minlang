<?php
include 'dbConnexion.php';

$expediteur= $_POST["expediteur"];
$destinataire=  $_POST["destinataire"];
$message= htmlspecialchars($_POST["message"]);
$date = date('D, M d | h:i', time());

$output="";

$inserMessage =( "INSERT INTO minlang_messages(id_expediteur,id_destinataire,messages,dates) VALUES ('$expediteur','$destinataire','$message','$date')");
if($connexion-> query($inserMessage))
{
    $output = "qwerty";
}
else
{
    $output = "Error. please try again.";
}
echo $output;
?>