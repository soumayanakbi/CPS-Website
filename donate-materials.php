<?php
session_start();

if (isset($_POST['boutton-valider'])) {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['governorate']) && isset($_POST['phonenumber']) && isset($_POST['now']) && isset($_POST['remark'])) {
        $nom_serveur = "localhost";
        $utilisateur = "root";
        $mot_de_passe = "";
        $nom_base_donnees = "utilisateur";
        
        $con = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_base_donnees);
        if ($con->connect_error) {
            die("Connection non établie : " . $con->connect_error);
        }

        $e = $_POST['name'];
        $n = $_POST['email'];
        $p = $_POST['address'];
        $m = $_POST['governorate'];
        $v = $_POST['phonenumber'];
        $k = $_POST['now'];
        $l = $_POST['remark'];

        $requet = "INSERT INTO materials(name, email, address, city, phonenumber, donate, remark) VALUES ('$e', '$n', '$p', '$m', '$v', '$k', '$l')";

        if (empty($e) || empty($n) || empty($p) || empty($m) || empty($v) || empty($k) || empty($l)) {
            $erreur = "All fields are required!";
        } else if ($con->query($requet) === true) {
            $msg = "Your Message Successfully Sent!";
        }
        
        mysqli_close($con);
    }
}
?>




<!-- -----------php footer form---- -->
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

<head>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <link rel="stylesheet" href="materials.css">
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
              <li><a href="log.php"><strong> Log out</strong></a></li>
      
   </ul>
</div>
     
  </header>
  <br><br><br><br><br><br><br><br><br>
   <!------donate----->
  <section>
    <div class="donate-class">

        <form action="" method="Post">

            <div class="row">

                <div class="col">

                    <h3 class="title">DONATE</h3>
                    <?php 
       if(isset($erreur)){// si la variable $erreur existe , on affiche le contenu ;
           echo "<p id= erreur >".$erreur."</p>"  ;
       }
       ?>

                    <div class="inputBox">
                        <span>Full name :</span>
                        <input type="text" placeholder="Your Name" name="name" requiered="required">
                    </div>
                    <div class="inputBox">
                        <span>Email :</span>
                        <input type="email" placeholder="Email Address" name="email" requiered="required">
                    </div>
                    <div class="inputBox">
                        <span>Address :</span>
                        <input type="text" placeholder="room - street - locality" name="address" requiered="required">
                    </div>
                    <div class="inputBox">
                        <span>City :</span>
                        <input list="gov" id="govern"  required="required" placeholder="Choose Your City" id="name" name="governorate" requiered>
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
                    
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <span>Phone Number :</span>
                            <input type="text" placeholder="State" name="phonenumber" requiered="required">
                        </div>
                        
                    </div>

                </div>

                <div class="col">

                    <div class="inputBox">
                        <span>Materials :</span>
                        <img src="donate/clothes.jpg" alt="">
                        <img src="donate/food.jpg" alt="">
                        <img src="donate/school.jpg" alt="">
                        <img src="donate/shoes.jpg" alt="">
                    </div>
                    
                        <span>What to donate :<br><br></span>
                        
                        <div> 
                            <input id="1" type="radio" name="now" value="1">
                            <label for="1">Clothes </label>
                        </div>
                        <br>
                        <div>
                            <input id="2" type="radio" name="now" value="2">
                            <label for="2">Food</label>
                        </div>
                        <br>
                        <div>
                            <input id="3" type="radio" name="now" value="3">
                            <label for="3">Shoes </label>
                        </div>
                        <br>
                        <div>
                            <input id="4" type="radio" name="now" value="4">
                            <label for="4">School Supplies</label>
                        </div>
                        <br>
                        <div>
                            <input id="5" type="radio" name="now" value="5">
                            <label for="5">Other </label>
                        </div>
                    

                        <br><br>
                    <span>Any Remarks :</span>
                    <div class="inputBox">
                        
                        <textarea type="text" id="message" cols="40" rows="5" class="field" name="remark" requiered="required" ></textarea>
                        
                    </div>
                


                </div>

            </div>
            <input type="submit" value="Proceed To Checkout" class="submit-btn" name='boutton-valider'>
            <?php 
       if(isset($msg)){// si la variable $msg existe , on affiche le contenu ;
           echo "<p id=msg align=center>".$msg."</p>"  ;
       }
       ?>

        </form>

    </div>
</section>

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
             <textarea rows="2" cols="25" name="messageF" ></textarea>
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
