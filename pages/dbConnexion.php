<?php
session_start();

if(!$_SESSION['email']){
    header('Location: acceuil.php');
    $online = false;
    
}

$online = true;

$server = 'localhost';
$login = 'davy';
$password = '2002';

try {

    $connexion = new PDO("mysql:host=$server;dbname=minlang",$login,$password);
    
    $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


} catch (PDOException $e) {
    
    echo"Error :".$e->getMessage(); 

}


?>