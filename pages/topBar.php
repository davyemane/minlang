<?php
include 'dbConnexion.php';
include 'user-info.php';
include('links.php');
?>
<head>

<link rel="shortcut icon" href="../images/minlang Logo small.png" type="image/x-icon">
<title>Account Home</title>
</head>
<style>
  *{
    transition: 0.5s;
  }
  .mobile-links{
    text-align : center;
    text-decoration : none;
    background-color : #fff;
    display : flex ;
    flex-direction: column ;
    justify-content : center ; 
    border: 5px solid rgb(28, 1, 34);
    box-shadow: 10px 7px 10px rgba(28,1,34,0.6);
    transition: 0.5s;
    opacity: 0;
    height: 0;
    margin: 0;
    width: 0;
    
    
  }
  .mobile-links a{
    font-weight : bold;
    font-size : 17px;
    color : rgb(28, 1, 34);
    margin : 15px 0px ;
  }
  .mobile-links a:hover{
    text-decoration: none;
    color: #fff;
  }
  .mobile-links li{
    height : 30px;
  }
  .mobile-links li:hover{
    background-color : rgb(28, 1, 34); 
    color: #fff;
  }
  .mobile-links li:hover a{
    color: #fff;
  }

  .nav-wrapper{
    background-color: rgb(28, 1, 34);
    position : fixed;
    top:0px;
    left:0px;
    z-index: 1;
  }
  #nav-mobile {
    margin-right : 20%;
  }
  #nav-mobile li a{
    font-weight : bold ;
    color : #fff;
    text-transform: uppercase;
  }
  #nav-mobile li a:hover {
    background-color : #fff;
    transition:0.5s;
  }

  #nav-mobile li a:hover{

    text-decoration : none;
    color : rgb(28, 1, 34) ;
    transition:0.5s;
  }

  .mobile-links-active{
    opacity: 1;
    transition: 0.5s;
    pointer-events: auto;
    width: 200px;
    height: auto;

  }
  .circle-image {
    background-color: #fff;
    border: 1px solid #fff ;
    border-radius : 50%;
    margin: 2px 0px;
    height: 50px;
    width: auto;
    margin-top: 7px;
    display: flex;
    align-content: center;



  }

  .circle-image .cercle {
    padding : 8px;
    padding-bottom: 5px;
  }

  .container .monprofil{
    display : flex;
    flex-direction : row;
    position: fixed;
    top:10px;
    right : 50px;
    background-color : #4d435f50;
    height : 40px;
    border-radius : 50px;
    padding-right: 20px;
    justify-content : center;
    align-items : center ;
  }
  .container .monprofil .imj {
    width: 40px;
    height : 40px;
    border-radius : 50%;
    background-color : green;
    display : flex ;
    justify-content : center;
    align-items : center ;
    margin-right : 10px;
  }
  .imjprofil{
    z-index: 1;
  }
  .zone {
    display: flex;
    flex-direction: row;
  }

  @media (max-width:800px){

  }

</style>

<nav>
    <div class="nav-wrapper">
        <div class="container" >
            <a href="index.php" class="brand-logo ">
            <div class="circle-image" >
                <img height="50" width="50" class='cercle' src="../images/minlang Logo 5.png" alt="">
            </div>
              
            </a>
            <a href="#" class="sidenav-trigger" data-target="mobile-links">
                <i class="material-icons" id="toggleMenu">menu</i>
              </a>
            <ul  id="nav-mobile" class="right hide-on-med-and-down">  
              <li> <a href="chat2.php" class="name">Chat</a></li>
              <li><a href="membre.php?id=<?=$_SESSION['id'];?>">Membres</a></li>
              <!-- <li><a href="publier_article.php">publier un statut</a></li> -->
              <li><a href="profile.php?id=<?=$_SESSION['id'];?>">profile</a></li>
              <!-- <li><a href="article.php">statuts</a></li> -->
              <li><a href="deconnexion.php">Deconnexion</a></li>
            </ul>
            <div class="monprofil">
              <div class="zoneimj">
                <img src="../membre/profile/<?=$userInfo['profiles'] ;?>" alt="" width=30px height= 30px class="imj">
              </div>
              <div>
                <span style="color:white ;"><?=$userInfo['user_name'] ;?></span>
              </div>
            </div>
        </div>
      </div>
    </a></li>

  </nav>
  <div class="zone">
  <ul  id="mobile-links" class="mobile-links" >
    <li> <a href="chat2.php" class="name">Chat</a></li>
    <li><a href="membre.php?id=<?=$_SESSION['id'];?>">Membres</a></li>
    <!-- <li><a href="publier_article.php">publier un statut</a></li> -->
    <li><a href="profile.php?id=<?=$_SESSION['id'];?>">Profile</a></li>
    <!--<li><a href="article.php">statuts</a></li> -->
    <li><a href="deconnexion.php">Deconnexion</a></li>
  </ul>

  <script>
document.addEventListener('DOMContentLoaded', function() {
    // var elems = document.querySelectorAll('.sidenav');
    // var instances = M.Sidenav.init(elems, options);

    document.getElementById('toggleMenu').addEventListener('click', (e)=>{
      console.log('je suis cliquer')

      document.getElementById('mobile-links').classList.toggle('mobile-links-active')
    })
  });


  $(document).ready(function() {

$('mobile-links').sidenav();

});
    </script>
  </div>
  
    