<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<?php
include 'topBar.php';
include 'links.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Chat</title>
    <link rel="stylesheet" href="../css/chat2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link rel="shortcut icon" href="../images/minlang Logo small.png" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
</head>
<!--Coded With Love By Mutiullah Samim-->

<body>
    <div class="container-fluid">
        <div class="row justify-content-center h-100">
            <div class="col-md-4 col-xl-3 chat gauche">
                <div class="card mb-sm-3 mb-md-0 contacts_card">
                    <div class="card-header">
                        <div class="input-group">
                            <input type="text" placeholder="Search..." name="" class="form-control search" style="padding-left: 15px; width: 70px;">
                            </input>
                            <div class="input-group-text search_btn justify-content-end" style="border-radius: 15px; height: 3rem; width: 40px ;"><i class="fas fa-search"></i>
                            </div>
                        </div>
                    </div>

                    <!-- list of members-->
                    <div class="card-body contacts_body">
                        <?php

                        if (isset($_GET['id']) and !empty($_GET['id'])) {
                            $id_destinataire = ($_GET['id']);
                        }

                        $getId = $_SESSION['id'];
                        $recupUser = $connexion->prepare('SELECT * FROM minlang_users WHERE id = ?');
                        $recupUser->execute(array($getId));
                        $userInfo = $recupUser->fetch();


                        ?>
                        <input type="text" name="exp" id="exp" value=<?= $userInfo['id']; ?> hidden />

                        <ui class="contacts">
                            <?php

                            $destinataire = $connexion->prepare('SELECT * FROM minlang_follow, minlang_users WHERE minlang_follow.id_following =minlang_users.id AND minlang_follow.id_follower =? ');
                            $destinataire->execute(array($_SESSION['id']));
                            while ($msg = $destinataire->fetch()) {
                            ?>
                                <li>
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="../membre/profile/<?= $msg["profiles"] ?>" class="rounded-circle user_img">
                                            <?php
                                            if ($online = true) {
                                            ?>
                                                <span class="online_icon"></span>
                                            <?php
                                            } else {
                                            ?>
                                                <span class="online_icon offline"></span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="user_info"><a href="?id_destinataire='.$msg['id_following'].'">
                                                <div><a href="?id_destinataire=<?= $msg['id_following'] ?>"><span><?= $msg['user_name'] ?></span>
                                                    </a>
                                                    <p><?= $msg['user_name'] ?> is online</p>
                                                </div>
                                        </div>
                                    </div>
                                </li>
                            <?php
                            } ?>


                    </div>

                    <div class="card-footer"></div>
                </div>
            </div>
            <div class="col-md-8 col-xl-6 chat">
                <div class="card">
                    <div class="card-header msg_head">

                        <!--header of chat that content the name and other-->
                        <div class="d-flex bd-highlight">
                            <?php
                            include 'destinataire.php';
                            ?>
                            <div class="video_cam">
                                <span><i class="fas fa-video"></i></span>
                                <span><i class="fas fa-phone"></i></span>
                            </div>
                        </div>

                        <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
                        <div class="action_menu">
                            <ul>
                                <li><i class="fas fa-user-circle"></i><a href="profile.php?id=<?= $destinataireName['id']; ?>"> View profile</a></li>
                                <li><i class="fas fa-users"></i> Add to close friends</li>
                                <li><i class="fas fa-plus"></i> Add to group</li>
                                <li><i class="fas fa-ban"></i> Block</li>
                            </ul>
                        </div>

                    </div>
                    <div class="card-body msg_card_body">
                        <div id="msgBody">
                            <?php
                            include 'afficher.php';
                            ?>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                            </div>
                            <textarea name="" id="message" class="form-control type_msg" placeholder="Type your message..."></textarea>
                            <div class="input-group-append">
                                <span class="input-group-text send_btn" id="send"><i class="fas fa-location-arrow" id="send"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--notification de reussite-->
        <div id="win" class="notif">
            🤟 Envoi Réussi ✔️
        </div>

        <div id="echec" class="notif"> 🤟 Echec d'envoi ❌ </div>
        <!--<div class="col-md-4">-->

</body>

</html>
<script>
    $(document).ready(function() {
        $('#action_menu_btn').click(function() {
            $('.action_menu').toggle();
        });
    });
    $(document).ready(function() {
        $("#send").on("click", function() {
            $.ajax({
                url: "insertMessage.php",
                method: "POST",
                data: {
                    expediteur: $("#exp").val(),
                    destinataire: $("#dest").val(),
                    message: $("#message").val(),
                },
                datatype: "text",
                success: function(data) {
                    $("#message").val("");
                    win.classList.add('show');
                },
                error: function(data) {
                    echec.classList.add('show');

                }
            });
            setTimeout(() => {
                win.classList.remove('show');
                echec.classList.remove('show');
            }, 2000);

        });
        //partie qui envoi en temps réel
        setInterval(function() {
            $.ajax({
                url: "realTimeChat.php",
                method: "POST",
                data: {
                    expediteur: $("#exp").val(),
                    destinataire: $("#dest").val(),
                },
                dataType: "text",
                success: function(data) {
                    $("#msgBody").html(data);
                },
                error: function(data) {
                    echec.classList.add('show');
                }
            });
        }, );1000
    });
</script>