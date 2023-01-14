<?php
include('dbConnexion.php');
$expediteur= $_POST["expediteur"];
$destinataire=  $_POST["destinataire"];
$output="";






$chats = $connexion->prepare("SELECT * FROM  minlang_messages WHERE ((id_expediteur= '".$expediteur."' AND id_destinataire = '".$destinataire."') OR (id_expediteur = '".$destinataire."' AND id_destinataire = '".$expediteur."'))");
$chats->execute();


while($chat= $chats->fetch())
{
    if($chat['id_expediteur']==$expediteur)
    {
        $getId=$expediteur;
        $UserName = $connexion->prepare('SELECT * FROM  minlang_users WHERE id = ?');
                                $UserName-> execute(array($getId));
                                $userInfo = $UserName->fetch();
        ?>
                                        <div class="d-flex justify-content-start mb-4">
                                            <div class="img_cont_msg">
                                            <img src="../membre/profile/<?=$userInfo['profiles']; ?>" class="rounded-circle user_img_msg">
                                            </div>

                                            <div class="msg_cotainer">
                                                <?=$chat['messages']?>
                                            </div>
                                        </div>

                                        <?php
    }
    else
    {
        $UserName = $connexion->prepare('SELECT * FROM  minlang_users WHERE id = ?');
        $UserName-> execute(array($destinataire));
                                        $destinataireName = $UserName->fetch();
        ?>
        <div class="d-flex justify-content-end mb-4">
            <div class="msg_cotainer_send">
                <?=$chat['messages'] ?><br>
            </div>
            <div class="img_cont_msg">
        <img src="../membre/profile/<?=$destinataireName['profiles'] ;?>" class="rounded-circle user_img_msg">
            </div>
        </div>
        <?php
        
}
}
echo $output
?>