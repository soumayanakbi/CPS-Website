<?php 
 //Nous allons démarrer la session avant toute chose
   session_start() ;
  if(isset($_POST['boutton-valider'])){ // Si on clique sur le boutton , alors :
    //Nous allons verifiér les informations du formulaire
    if(isset($_POST['email']) && isset($_POST['pass'])) { //On verifie ici si l'utilisateur a rentré des informations
      //Nous allons mettres l'email et le mot de passe dans des variables
      $email = $_POST['email'] ;
      $pass = $_POST['pass'] ;
      $erreur = "" ;
       //Nous allons verifier si les informations entrée sont correctes
       //Connexion a la base de données
       $nom_serveur = "localhost";
       $utilisateur = "root";
       $mot_de_passe ="";
       $nom_base_données ="utilisateur" ;
       $con = mysqli_connect($nom_serveur , $utilisateur ,$mot_de_passe , $nom_base_données);
       //requete pour selectionner  l'utilisateur qui a pour email et mot de passe les identifiants qui ont été entrées
        $query =  "SELECT * FROM `signup` WHERE email = '$email' AND pass ='$pass ' limit 1 " ;
        $result = mysqli_query($con,$query);
        if ($result){
          if ($result && mysqli_num_rows($result)>0 ){
            $user_data = mysqli_fetch_assoc($result);
            if ($user_data['pass']==$pass){
              header("Location:get-involved.php") ;
              die;
            }
          }
          else {//si non
            $erreur = "Adresse Mail ou Mots de passe incorrectes !";
        }
    }
        }
  
        
  }
?>

<!--------php contactfooter ------ -->
<?php
                  if (isset($_POST["submit"])){
                    $emailF = $_POST["emailF"];
                    $messageF= $_POST["messageF"];
                    //After this, the code initializes an empty $errors array to store any validation errors that may occur during the form submission process.
                    $success = "";
                    $errors = array();//This code initializes an empty array $errors to store any validation errors that may occur during the form submission process.
                   if(empty($emailF) OR empty($messageF)) {
                     array_push($errors,"All fields are required");
                    }
                    if (!filter_var($emailF, FILTER_VALIDATE_EMAIL)) {
                     array_push($errors, "Email is not valid");
                    }
                    require_once "database.php";
                    if (count($errors)>0) {
                     foreach ($errors as  $error) {
                     }
                    }else{
                     $sql = "INSERT INTO footercontact ( emailF, messageF) VALUES (?, ? )";
                     $stmt = mysqli_stmt_init($conn);
                     //This code initializes a new mysqli_stmt object and assigns it to the $stmt variable. The mysqli_stmt_init() function is used to initialize a new statement object, which is then used to prepare and execute SQL statements with parameterized queries.
                     $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
                     if ($prepareStmt) {
                      mysqli_stmt_bind_param($stmt, "ss",  $emailF, $messageF);
                         mysqli_stmt_execute($stmt);
                         $success = "your message was successfully sent!";
                     }else{
                         die("Something went wrong");
                     }
                    }
                   
                  }
                ?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPS ENSI</title>
    <link rel="icon" href="cps.png"/>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="footer.css">


    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="logo">
            <img src="cps.png"> 
        </div>
        <div class="navigation">
            <input type="checkbox" id="nav">
            <label for="nav" class="navig">
                <img src="menu.png" alt="open" class="open">
                <img src="close2.jpg" alt="close" class="close">
            </label>
            
        
        <ul class="nav-barre">            
            
          <li><a href="home.php"><strong>Home</strong></a></li>
              
          <li><a href="events.php"><strong>Events</strong></a></li>
              <li><a href="gallery.php"><strong>Gallery</strong></a></li>
              <li><a href="team.php"><strong>Team</strong></a></li>
              <li><a href="getintouch.php"><strong>Get In Touch</strong></a></li>
              <li><a href="log.php"><strong> Log in</strong></a></li>
              
           </ul>
        </div>
    </header>
    
    <br><br><br><br><br><br><br><br><br>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
          window.addEventListener('scroll', function() {
            var gap = 50;
            if (window.scrollY > gap) {
              document.querySelector('header').classList.add('active');
            } else {
              document.querySelector('header').classList.remove('active');
            }
          });
        });
      </script>
    
    <br><br>
    

    <section>
        <div class="imgBox"></div>
        <div class="contentBox">
            <div class="formBox">
                <h2>Login To Donate</h2>
                <?php 
       if(isset($erreur)){// si la variable $erreur existe , on affiche le contenu ;
           echo "<p id= erreur>".$erreur."</p>"  ;
       }
       ?>
                <form  action="" method="POST">
                    <div class="inputBx">
                        <span>Email</span>
                        <input type="text" name="email">

                    </div>
                    <div class="inputBx">
                        <span>Password</span>
                        <input type="password" name="pass">

                    </div>
                    <div class="remember">
                        <label><input type="checkbox">Remember Me</label>
                    </div>
                    <div class="inputBx">
                        <input type="submit" value="Log In" class="submit" name="boutton-valider">
                    </div>
                    <div class="inputBx">
                        <p>Don't have an account ?  <a href="sign.php" >Sign</a></p>
                    </div>

                </form>
            </div>
        </div>
    </section>



    <!--------footer------------>
<footer>
    <div class="main-content">
      <div class="left box">
          <h2>Stay Updated</h2>
         <div class="content-footer">
            <p>Stay connected
             Keep up to date with all the CPS news and events by following us on social media . We regularly post about the newest updates, partnerships and upcoming events. You will learn what the CPS team is up to, and who is behind all those amazing work.</p>
             <div class="social">
             <a href ="https://www.facebook.com/CPSENSI" target="_blank"><span class="fab fa-facebook-f"></span></a>
             <a href ="https://www.instagram.com/cps.ensi/" target="_blank"><span class="fab fa-instagram"></span></a>
             </div>
            
           </div>
       </div>
  
       <div class="center box">
         <h2>Address</h2>
         <div class="content-footer">
           <div class="place">
             <span class="fas fa-map-marker-alt"></span>
             <span class="text">Tunisie,la Manouba</span>
           </div>
           <div class="phone">
             <span class="fas fa-phone-alt"></span>
             <span class="text">+21622909766</span>
           </div>
           <div class="email">
             <span class="fas fa-envelope"></span>
             <span class="text">cps.ensi@gmail.com</span>
           </div>
         </div>
       </div>
  
  
       <div class="right box">
         <h2>Contact Us</h2>
         <div class="content-footer">
         <form action=""  method="post">
   
   <div class="email">
     <div class="text">Email *</div>
     <input type="email" name="emailF" required>
   </div>
   <div class="msg">
     <div class="text">Message *</div>
     <textarea rows="2" cols="25" name="messageF" required></textarea>
   </div>
   <div class="btn">
     <button type="submit" name="submit">Send</button>
   </div>
   <?php 
if(isset($errors)){// si la variable $erreur existe , on affiche le contenu ;
foreach($errors as $err)  
  echo "<p id= error >".$err."</p>"  ;
} 
?>
<?php if (!empty($success)): ?>
<p><?php echo $success; ?></p>
<?php endif; ?>
 </form>
         </div>
       </div>
   </div>
   <div class="bottom">
     <center>
       <span class="credit">Created By <a href="#"> BenHassen Mariem,Lakhal Imen et Nakbi Soumaya</a></span>
         <span class="far fa-copyright"></span> <span> 2023 All rights reserved.</span>   
     </center>
   </div>
  </footer>
</body>
</html>