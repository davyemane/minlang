
                                <?php
                                    if(isset($_GET['id_destinataire'])){
                                        $UserName = $connexion->prepare('SELECT * FROM  minlang_users WHERE id=?');
                                        $UserName->execute(array($_GET['id_destinataire']));
                                        $destinataireName= $UserName->fetch();
                                        echo '<input type="text" id="dest" value='.$_GET['id_destinataire'].' hidden />';
                                        ?>
                                        <div class="img_cont">
									<img src="../membre/profile/<?=$destinataireName["profiles"]?>" class="rounded-circle user_img">
									<span class="online_icon"></span>
								</div>
								<div class="user_info">
									<span> <?=$destinataireName['user_name']?></span>
									<p>1767 Messages</p>
								</div>
                                <?php
                                    }
                                    else
                                    {
                                        $UserName = $connexion->prepare('SELECT * FROM  minlang_users');
                                        $UserName->execute();
                                        $destinataireName = $UserName->fetch();
                                        $_SESSION['id_destinataire'] = $destinataireName['id'];
                                        echo '<input type="text" id="dest" value='.$_SESSION['id_destinataire'].' hidden />';
                                        ?>
                                        <div class="img_cont">
									<img src="../membre/profile/<?=$destinataireName["profiles"]?>" class="rounded-circle user_img">
									<span class="online_icon"></span>
								</div>
								<div class="user_info">
									<span><?=$destinataireName['user_name']?></span>
									<p>1767 Messages</p>
								</div>
                                <?php

    
                                    }
                                ?>

