<?php
                                        if(isset($_SESSION['id']) AND $_SESSION['id'] != $user['id']){
                                            $dejaSuivitOuNon = $connexion->prepare('SELECT * FROM minlang_follow WHERE id_follower =? AND id_following =?');
                                            $dejaSuivitOuNon->execute(array($_SESSION['id'],$userInfo['id']));
                                            $dejaSuivitOuNon=$dejaSuivitOuNon->rowCount();
                                
                                            if($dejaSuivitOuNon !=0){
                                
                                            ?>
                                                
                                                <a class="btn-large disabled" href="follow.php?id=<?=$user['id'];?>">Se désabonné</a>
                                                <br /><br />
                                
                                            <?php }else { ?>
                                        <a style="margin-right: 20px;" class="waves-effect waves-light btn  pink lighten-2 right" href="follow.php?id=<?=$user['id'];?>">S'abonner</a>
                                        <br /><br />
                                        <?php
                                            }
                                        }
                                        ?>
