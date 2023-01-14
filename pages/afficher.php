<?php 
                                
                                $getId=$_SESSION['id'];
                                $recupUser = $connexion-> prepare('SELECT * FROM minlang_users WHERE id = ?');
                                $recupUser-> execute(array($getId));
                                $userInfo = $recupUser->fetch();  
                                if(isset($_GET['id_destinataire']))
                                {
                                    $chats = $connexion->prepare("SELECT * FROM  minlang_messages WHERE (id_expediteur ='".$_SESSION['id']."' AND id_destinataire='".$_GET['id_destinataire']."') 
                                    OR (id_expediteur ='".$_GET['id_destinataire']."' AND id_destinataire='".$_SESSION['id']."')");
                                    $chats->execute();
                                }
                                else
                                {
                                    $chats = $connexion->prepare("SELECT * FROM  minlang_messages WHERE (id_expediteur ='".$_SESSION['id']."' AND id_destinataire='".$_SESSION['id_destinataire']."')
                                     OR (id_expediteur ='".$_SESSION['id_destinataire']."' AND id_destinataire='".$_SESSION['id']."')");
                                     $chats->execute();
                                }
                                while($chat= $chats->fetch())
                                {
                                    if($chat['id_expediteur']==$_SESSION['id'])
                                    {
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
                                        
                                        $recupUser = $connexion-> prepare('SELECT * FROM minlang_users WHERE id = ?');
                                        $recupUser-> execute(array($_GET['id_destinataire']));
                                        $userInfos = $recupUser->fetch();
                                        ?>
                                        <div class="d-flex justify-content-end mb-4">
                                            <div class="msg_cotainer_send">
                                                <?=$chat['messages'] ?><br>
                                            </div>
                                            <span class="msg_time_send"><?=$chat['dates']?></span>
                                            <div class="img_cont_msg">
                                        <img src="../membre/profile/<?=$userInfos['profiles']; ?>" class="rounded-circle user_img_msg">
                                            </div>
                                        </div>
                                        <?php
                                        
                                    }
                                }
                            ?> 
