<?php
include('dbConnexion.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getFollowedId = intval($_GET['id']);

    if($getFollowedId != $_SESSION['id']){
        $dejafollowed = $connexion->prepare('SELECT * FROM minlang_follow WHERE id_follower=? AND id_following = ?');
        $dejafollowed ->execute(array($_SESSION['id'],$getFollowedId));
        $dejafollowed = $dejafollowed->rowCount();

        if($dejafollowed == 0){
            $addfollow = $connexion->prepare('INSERT INTO minlang_follow(id_follower, id_following) VALUES (?,?)');
            $addfollow ->execute(array($_SESSION['id'], $getFollowedId));
        }elseif($dejafollowed == 1){
            $deletefollow = $connexion->prepare('DELETE FROM minlang_follow WHERE 	id_follower= ? AND id_following=?');
            $deletefollow->execute(array($_SESSION['id'],$getFollowedId));
        }
    }
}
header('Location:'.$_SERVER['HTTP_REFERER']); //PERMERT D'AVOIR LA PAGE PRÉCÉDENTE

?>