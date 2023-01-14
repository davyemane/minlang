<?php
session_start();
?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr" >
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="../css/styleinscrip.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
     <link rel="shortcut icon" href="../images/minlang Logo small.png" type="image/x-icon">

<title>Minlang SignUp</title>
   
   
    </head>
<body>
  <div class="container">
    <div class="title"><p class="titles">Registration</p></div>
    <div class="content">
      <form action="inscription.php" method="POST">
        <div class="user-details">

        <!--votre nom complet -->
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" required name="nom">
          </div>

          <!--Date de naissance-->
          <div class="input-box">
            <span class="details">Date of Birth</span>
            <input type="date" placeholder="Enter your name" required name="date" min="1990-01-01" max="2050-01-01">
          </div>

          <!--email-->
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" placeholder="Enter your email" name="email" required>
          </div>

          <!--numero de téléphone-->
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" name="tel" required>
          </div>

          <!--mote de passe -->
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="password" required id="password" onkeyup='check();'>
          </div>

          <!--confirmation du mot de passe-->
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm your password" name="confirm_password" required id="confirm_password" onkeyup='check();'>
          </div>
        </div>

        <!--choix du genre-->
        <div class="gender-details">
          <input type="radio" name="genre" id="dot-1" value="Male">
          <input type="radio" name="genre" id="dot-2" value="Female">
          <input type="radio" name="genre" id="dot-3" value="Prefer not to say">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender" >Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender" >Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender" name="genre">Prefer not to say</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register" name="valider" id="valider">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
<?php
    //ici dans cette partie je verifie si le mot de passe correspond à la confirmation et j'y ajoute du style en fonction des cas
    echo"<script>
        // verification du mot de passe
         var check = function() {
      if (document.getElementById('password').value ==
          document.getElementById('confirm_password').value) {
          document.getElementById('confirm_password').style.border = '3px solid green';
          //document.getElementById('confirm_password').innerHTML = 'matching';
      } else {
      		document.getElementById('confirm_password').style.border = '3px solid red';
          //document.getElementById('confirm_password').innerHTML = 'not matching';
      }
          
      }
      // blocage du formulaire si le mot de passe ne correspond pas à la confirmation
      valider= document.getElementById('valider');
      valider.addEventListener('click', validation);
      
      function validation(e){
        if (document.getElementById('password').value !=
          document.getElementById('confirm_password').value){
            e.preventDefault(); 
          }
          
  }
    </script>"
    ?>
