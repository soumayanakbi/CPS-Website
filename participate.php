<?php
session_start();
if (isset($_POST['boutton-valider'])) {
    if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['occupation']) && isset($_POST['age']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['governorate']) && isset($_POST['even']) && isset($_POST['time']) && isset($_POST['comments'])) {
        $nom_serveur = "localhost";
        $utilisateur = "root";
        $mot_de_passe = "";
        $nom_base_donnees = "utilisateur";
        $con = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_base_donnees);

        $e = $_POST['fname'];
        $n = $_POST['lname'];
        $p = $_POST['occupation'];
        $m = $_POST['age'];
        $v = $_POST['email'];
        $k = $_POST['phone'];
        $l = $_POST['governorate'];
        $s = $_POST['even'];
        $t = $_POST['time'];
        $u = $_POST['comments'];
        $con = new mysqli($nom_serveur, $utilisateur, $mot_de_passe, $nom_base_donnees);
        if ($con->connect_error) {
            die("connection non etablie : " . $con->connect_error);
        }
        $requete = "INSERT INTO participate (fname, lname, occupation, age, email, phone, governorate, event, temps, comments) VALUES ('$e','$n','$p','$m','$v','$k','$l','$s','$t','$u')";

        if (empty($e) || empty($n) || empty($p) || empty($m) || empty($k) || empty($l) || empty($s) || empty($t) || empty($u)) {
            $erreur = "All fields are required!";
        } else if ($con->query($requete) === true) {
            $msg = "Your Message Successfully Sent!";
        }
        mysqli_close($con);
    }
}
?>

             
              
              
              <!-- ----- php footer form------ -->
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




<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <link rel="stylesheet" href="events.css">

  <link rel="stylesheet" href="participate.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CPS ENSI</title>
  <link rel="icon" href="cps.png"/>
  
  <script src="https://kit.fontawesome.com/514c1af453.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    

</head>
<body>
<!----------------Barre -------------->

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

<br><br><br><br><br>
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

<!--------PARTICIPATE----------->

<div class="main">
    <div class="register">
        <h2>Register Here</h2>
        <?php 
       if(isset($erreur)){// si la variable $erreur existe , on affiche le contenu ;
           echo "<p id= erreur >".$erreur."</p>"  ;
       }
        
       if(isset($msg)){// si la variable $msg existe , on affiche le contenu ;
           echo "<p id=msg align=center>".$msg."</p>"  ;
       }
       ?>
        <form id="register" action="" method="Post">
                <label>First name :</label>
                <br>
                <input  type="text"  name="fname" id="name" placeholder="Enter Your First Name">
            <br><br>
                <label>Last name :</label>
                <br>
                <input type="text" name="lname" id="name" placeholder="Enter Your Last Name">
            <br><br>
                <label>Your Occupation :</label>
                <br>
                <input type="text" name="occupation" id="name" placeholder="Enter Your Occupation" >
            <br><br>
                <label>Your Age :</label>
                <br>
                <input type="number"  min="0" max="100" placeholder="How old are you?"name="age" id="name">
            <br><br>
                <label>Email :</label>
                <br>
                <input type="email"  placeholder="Enter Your Valid Email"name="email" id="name">
            <br><br>
                <label>Phone number :</label>
                <br>
                <input  type="tel"  pattern="[0-9]{8}" placeholder="Enter Your Phone number"name="phone" id="name">
            <br><br>
                <label>Governorate :</label>
                <br>
                <input list="gov" id="govern"  required="required" placeholder="Choose Your Governorate" id="name"name="governorate">
                <datalist id="gov">
                <option value="Ariana">Ariana</option>
                <option value="Béja">Béja</option>
                <option value="Ben Arous">Ben Arous</option>
                <option value="Bizerte">Bizerte</option>
                <option value="Gabès">Gabès</option>
                <option value="Gafsa">Gafsa</option>
                <option value="Jendouba">Jendouba</option>
                <option value="Kairouan">Kairouan</option>
                <option value="Kasserine">Kasserine</option>
                <option value="Kébili">Kébili</option>
                <option value="Kef">Kef</option>
                <option value="Mahdia">Mahdia</option>
                <option value="Manouba">Manouba</option>
                <option value="Médenine">Médenine</option>
                <option value="Monastir">Monastir</option>
                <option value="Nabeul">Nabeul</option>
                <option value="Sfax">Sfax</option>
                <option value="Sidi Bouzid">Sidi Bouzid</option>
                <option value="Siliana">Siliana</option>
                <option value="Sousse">Sousse</option>
                <option value="Tataouine">Tataouine</option>
                <option value="Tozeur">Tozeur</option>
                <option value="Tunis">Tunis</option>
                <option value="Zaghouan">Zaghouan</option>
                </datalist>
            <br><br>
            <div>
                <label >Event :</label>
                <div>
                    <input id="eve" type="radio" name="even" value="1">
                    <span for eve>DAFIHOM FE CHETEHOM</span>
                </div>
                <div>
                    <input id="eve" type="radio" name="even" value="2">
                    <span for eve>VISITE A L'ÉCOLE</span>
                </div>
                <div>
                    <input id="eve" type="radio" name="even" value="3">
                    <span for eve>SOS VILLAGE</span>
                </div>
                <div>
                    <input id="eve" type="radio" name="even" value="4">
                    <span for eve>DON DU SANG</span>
                </div>
                <div>
                    <input id="eve" type="radio" name="even" value="5">
                    <span for eve>FORMATIONS SECOURISME</span>
                </div>
                <div>
                    <input id="eve" type="radio" name="even" value="6">
                    <span for eve>والدينا و يعزو علينا</span>
                </div>
            </div>
            <br><br>
                <label>What time do you expect to arrive? :</label>
                <br>
                <input type="time" required name="time" id="name">
                <br><br>
                <label>Your Comments</label>
                <br>
                <input  type="text" required="required" name="comments"id="name" placeholder="Enter Your Comments">
                <br><br>
                <br>
            <button type="submit" name="boutton-valider">Participate</button><br>
            
            <br><p>Attached is the map showing the location of the CPS club.
                Please contact us for more details.</p><br>
            <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3194.1990604805114!2d10.0637659!3d36.81374960000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd2d96d4a9d6c9%3A0xbbe38a2694938acf!2s%C3%89cole%20Nationale%20des%20Sciences%20de%20l&#39;Informatique!5e0!3m2!1sfr!2stn!4v1682961274397!5m2!1sfr!2stn" width="540px" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
        </form> 
    </div>
</div>
<br><br><br><br><br>
<!---------footer------->
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
     <input type="email" name="emailF" >
   </div>
   <div class="msg">
     <div class="text">Message *</div>
     <textarea rows="2" cols="25" name="messageF"></textarea>
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
<!-- <p>Attached is the map showing the location of the CPS club.
    Please contact us for more details.</p>
<p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3194.1990604805114!2d10.0637659!3d36.81374960000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd2d96d4a9d6c9%3A0xbbe38a2694938acf!2s%C3%89cole%20Nationale%20des%20Sciences%20de%20l&#39;Informatique!5e0!3m2!1sfr!2stn!4v1682961274397!5m2!1sfr!2stn" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p> -->
</body>
</html>