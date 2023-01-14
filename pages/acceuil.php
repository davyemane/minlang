<html lang="en">

<head>

    <?php 
    include("links.php");
    ?>
    
    <link rel="shortcut icon" href="../images/minlang Logo small.png" type="image/x-icon">

    <link rel="stylesheet" href="../css/styleacceuil.css">

    <title>Minlang</title>

    <style>
        *{
            transition : 0.5s;
            scroll-behavior: smooth;
        }
        #nav-wrapper {
    background-color: rgb(28, 1, 34) ;
    }
    .sideText {
        color:  #fff;
        font-weight : bold ;
    }
    .sideText:hover {
        color:  rgb(28, 1, 34);
        font-weight : bold ;
        text-decoration : none ;
    }
    #zone {
        background-color : rgb(28, 1, 34) ;
    }
    #zone:hover {
        background-color : #fff ;
    }
    
    </style>
</head>

<body>
    <div>
        <nav class="nav-wrapper" id="nav-wrapper" >
            <div class="container">
                <a href="#" class="brand-logo"> Minlang
                    <a class="logo"><img src="../images/minlang Logo small.png" alt="" width="35px" ;></a>
                </a>
                <a href="#" class="sidenav-trigger" data-target="mobile-menu">
                    <i class="material-icons">menu</i>
                </a>


                <ul class="right hide-on-med-and-down" id="zone">
                    <li><a class="sideText" href="#partieConnection">CONNEXION / INSCRIPTION</a></li>
                </ul>
                <ul class="sidenav brown lighten-4 white-text" id="mobile-menu">
                    <div class="sidelogo">
                        <img src="../images/minlang Logo 5.png" alt="" class="sidelogo" id="LogoAfter">
                    </div>
                    <div class="sidenavlist">
                        <li><a class="sideText" href="#partieConnection">CONNEXION / INSCRIPTION</a></li>
                    </div>
                </ul>
            </div>
        </nav>
    </div>

    <div>
        <header>

        </header>
    </div>


    <!-- photo / grid -->
    <br><br><br><br><br><br><br>

    <section class="container section" id="photos">
        <div class="row">
            <div class="col s12 l4 leftlogo">
                <img src="../images/minlang Logo 5.png" alt="" class="responsive-img materialboxed" id="LogoAfter">
            </div>
            <div class="col s12 l6 offset-l1">
                <h2 class="deep-purple-text darken-3">Bienvenue sur <p class="MinlangBienvenue">Minlang!</p></h2>

                <br>
                <p><big> Nous sommes heureux de l'intéret que vous avez porté à notre site, <strong>Minlang </strong> est un nouveau réseau de messagerie instantanée conçue par des étudiants de <strong>L'UIECC </strong> au Cameroun. <br> <br>
            Vous bénéficierez de plusieurs services qui vous permettront de mieux partager vos informations </big>
                </p>


            </div>
        </div>
    </section>

    <section>
        <div class="Options">

        </div>
    </section>


    <br><br><br><br><br><br>



    <!-- parallax -->
    <div class="parallax-container">
        <div class="parallax">
            <img src="../images/clouds.jpg" alt="" class="responsive-img">
        </div>
    </div>

    <br><br><br><br><br><br>

    <!-- services / tabs -->
    <section class="section container" id="services">
        <div class="row">
            <div class="col s12 l4">
                <h2 class="indigo-text text-darken-4">Commencer...</h2>
                <p> <big> Vous pouvez vous connecter ou alors démarrer votre inscription sur Minlang après quoi vous pourrez profiter de contenus superbes de vos amis et connaissances... Alors allons-y !! </big> </p>
                <br><br><br><br>
            </div>

            <br><br><br>


            <div class="col s12 l6 offset-l2">
                <!-- tabs -->
                <ul class="tabs waves-effect waves-light">
                    <li class="tab col s6">
                        <a href="#Connect" class="active deep-purple-text text-darken-4" id="partieConnection"> <strong> <big> Connexion </big></strong></a>
                    </li>
                    <li class="tab col s6">
                        <a href="#Sign" class="deep-purple-text text-darken-4"> <strong> <big>Inscription </big></strong></a>
                    </li>
                </ul>
                <br><br><br>
                <div id="Connect" class="col s12">
                    <p class="flow-text deep-purple-text text-darken-4">SE CONNECTER</p>
                    <p><big>Connectez-vous au réseau Minlang et accédez ainsi à votre compte et explorez votre contenu et celui de vos connaissances</p>
            <p>Accedez à la page de connexion</big></p>

                    <!-- contact form -->
                    <div class="section container scrollspy" id="contact">
                        <form method="POST" action="connexion.php">

                            <div class="input-field">
                                <i class="material-icons prefix deep-purple-text text-darken-4">person</i>
                                <input type="email" id="name" name="email" class="materialize-password" cols="20" rows="20"></input>
                                <label for="message">ID ou Nom d'utilisateur</label>
                            </div>
                            <br>
                            <div class="input-field">
                                <i class="material-icons prefix deep-purple-text text-darken-4">password</i>
                                <input type="password" id="password" name="password" class="materialize-password" cols="20" rows="20"></input>
                                <label for="message">Mot de passe</label>
                            </div>
                            <br>
                            <div class="input-field center">
                                <button class="btn deep-purple darken-4 waves-effect waves-light">Connexion</button>
                            </div>
                        </form>
                    </div>

                </div>
                <div id="Sign" class="col s12">
                    <p class="flow-text deep-purple-text text-darken-4">S'INSCRIRE</p>
                    <p><big>Inscrivez-vous gratuitement au réseau Minlang et obtenez ainsi votre propre compte, expolrez ce nouvel univers qui sera le votre</p>
            <p>Poursuivez votre inscription en appuyant sur le bouton en-dessous</big></p>
            <div class="input-field center">
                               <a href="inscp.php"><button class="btn deep-purple darken-4 waves-effect waves-light ins">Inscription</button> </a>
                            </div>
                </div>
            </div>
        </div>

        </div>
    </section>


    <br><br><br><br><br><br>
    <br><br><br><br><br><br>


    <div class="parallax-container">
        <div class="parallax">
            <img src="../images/pink bkg.jpg" alt="" class="responsive-img">
        </div>
        <div class="container white-text">
           
        </div>
    </div>

</body>

<script src="../assets/jquery.min.js"></script>
<script src="../assets/materialize.min.js"></script>

<script>
    $(document).ready(function() {

        $('.sidenav').sidenav();
        $('.materialboxed').materialbox();
        $('.parallax').parallax();
        $('.tabs').tabs();
    });
</script>

</html>

