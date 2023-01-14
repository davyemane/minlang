<?php
include('topBar.php');

include('links.php');
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Home</title>
    <link rel="shortcut icon" href="../images/minlang Logo small.png" type="image/x-icon">
    <link rel="shortcut icon" href="image/minlang Logo 2.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/index.css">
</head>


<body>
<?php
    include 'file.php';
    include 'recup_pub.php';
?>

        <div class="home_content" style="margin-top: 70px;">


            <div class="col-md-8 col-xl-8 chat">
                                
                <ul>
                    <?php
                    while($recupPubs= $recupPub-> fetch())
                    {
                    ?>

                        <li>
                            <div class="card" style="height: 600px;">
                                                <div class="card-header msg_head">

                                                    <!--header of chat that content the name and other-->
                                                    <div class="d-flex bd-highlight">
                                                    <div class="img_cont">
                                                        <img src="../membre/profile/<?=$recupPubs['profiles'] ;?>" class="rounded-circle user_img">
                                                    </div>
                                                    <div class="user_info">
                                                        <span><?=$recupPubs['user_name'] ;?></span>
                                                    </div>

                                                    </div>

                                                </div>
                                                <div class="card-body msg_card_body">
                                                    <div id="msgBody"  style="width:100% !important";>
                                                    <img src="<?=$recupPubs['lien'] ;?>" alt="" style=" width:100%; image-rendering: optimizeQuality;">                        
                                                    </div>

                                                </div>
                                                <div class="card-footer">
                                                    <div class="input-group">
                                                        <!-- like-->
                                                        <div style="display: none;" id="file"><?=$recupPubs['minlang_ficher.id'] ;?></div>
                                                        <span id="exp" style="display: none;"><?=$_SESSION['id'] ;?></span>
                                                        <div class="input-group-append">
                                                            <button class="input-group-text attach_btn" id="like"></button>
                                                                <span id="likes"></span>
                                                        </div>
                                                        <!--commentaire-->
                                                        <textarea name="" id="message" class="form-control type_msg" placeholder="Type your comment..."  style="width: 10rem !important;"></textarea>

                                                        <div class="input-group-append">
                                                            <input style="display: none;" type="text" name="" id="exp" value="<?=$_SESSION['id'] ;?>">
                                                            <button class="input-group-text send_btn" id="send"></button>
                                                        </div>
                                                        <div id="msgBody"></div>
                                                    </div>
                                                </div>
                                            </div>
                        </li> 
                    <?php
                    }
                    ?>
                </ul>
            </div>
         </div>


  
            <div class="text-bottom-right">
                <?=$date = date('h:i:s a', time());?>

            </div>    
</body>

<script type='text/javascript'>
        $(document).ready(function() {
        $("#send").on("click", function() {
            $.ajax({
                url: "comment.php",
                method: "POST",
                data: {
                    expediteur: $("#exp").val(),
                    message: $("#message").val(),
                },
                datatype: "text",
                success: function(data) {
                    alert('good');
                },
                error: function(data) {
                    alert('error');
                }
            });


        });
    })
</script>