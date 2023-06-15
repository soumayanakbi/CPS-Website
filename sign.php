<?php
                  if (isset($_POST["submit"])){
                    $firstname = $_POST["firstname"];
                    $lastname = $_POST["lastname"];
                    $email = $_POST["email"];
                    $password= $_POST["password"];
                    $passwordconfirm= $_POST["passwordconfirm"];
                    $sub = "";
                    //After this, the code initializes an empty $errors array to store any validation errors that may occur during the form submission process.
                    $errors = array();//This code initializes an empty array $errors to store any validation errors that may occur during the form submission process.
                    
                    if (empty($firstname) OR empty($lastname) OR empty($email) OR empty($password) OR empty($passwordconfirm)) {
                     array_push($errors,"All fields are required");
                    }
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                     array_push($errors, "Email is not valid");
                    }
                    if (strlen($password)<8) {
                     array_push($errors,"Password must be at least 8 charactes long");
                    }
                    if ($password!==$passwordconfirm) {
                     array_push($errors,"Password does not match");
                    }
                    require_once "database.php";
                    $sql = "SELECT * FROM signup WHERE email = '$email'";
                    $result = mysqli_query($conn, $sql);
                    $rowCount = mysqli_num_rows($result);
                    //This code executes an SQL query to check if the email provided by the user already exists in the database. It uses the mysqli_query() function to execute the query and passes the database connection $conn and the SQL query $sql as arguments.
         
         //The query selects all rows from the users table where the email column matches the email provided by the user. The code then uses the mysqli_num_rows() function to count the number of rows returned by the query. If the count is greater than 0, it means that the email already exists in the database, so the code adds an error message "Email already exists!" to the $errors array using the array_push() function. 
         
         // This is an important validation check to ensure that a user cannot create multiple accounts with the same email address.
                    if ($rowCount>0) {
                     array_push($errors,"Email already exists!");
                    }
                    if (count($errors)>0) {
                     foreach ($errors as  $error) {
                         echo "<div class='alert alert-danger'>$error</div>";
                         
                     }
                    }else{
                     
                    $sql = "INSERT INTO signup (firstname, lastname, email, pass) VALUES (?, ?, ?, ? )" ;
                     
                     $stmt = mysqli_stmt_init($conn);
                     //This code initializes a new mysqli_stmt object and assigns it to the $stmt variable. The mysqli_stmt_init() function is used to initialize a new statement object, which is then used to prepare and execute SQL statements with parameterized queries.
                     $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
                     if ($prepareStmt) {
                      print_r($firstname);
                      mysqli_stmt_bind_param($stmt, "ssss",  $firstname ,$lastname, $email,$password);
                         mysqli_stmt_execute($stmt);
          
                         $sub = "You are registered successfully!";
                         header("Location:log.php") ;
                    
                     }else{
                         die("Something went wrong");
                     }
                    }
                   
                  }
                ?>
<!-- -------------php footer form-------- -->
<?php
                  if (isset($_POST["submit2"])){
                    $emailF = $_POST["emailF"];
                    $messageF= $_POST["messageF"];
                    //After this, the code initializes an empty $errors array to store any validation errors that may occur during the form submission process.
                    $success = "";
                    $erreurs = array();//This code initializes an empty array $errors to store any validation errors that may occur during the form submission process.
                   if(empty($emailF) OR empty($messageF)) {
                     array_push($erreurs,"All fields are required");
                    }
                    if (!filter_var($emailF, FILTER_VALIDATE_EMAIL)) {
                     array_push($erreurs, "Email is not valid");
                    }
                    require_once "database.php";
                    if (count($erreurs)>0) {
                     foreach ($erreurs as  $erreur) {
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
                <h2>Sign Up</h2><br>
                <h5>It’s quick and easy.</h5>
       
     
      <?php 
       if(isset($errors)){// si la variable $erreur existe , on affiche le contenu ;
        foreach($errors as $err)  
          echo "<p id= error>".$err."</p>"  ;
       }
       ?>
        <?php if (!empty($sub)): ?>
  <p id="sub"><?php echo $sub; ?></p>
<?php endif; ?>
                <form action=""  method="post">
                    <div class="inputBx">
                        <span>First Name</span>
                        <input type="text"  name="firstname">

                    </div>
                    <div class="inputBx">
                        <span>Last Name</span>
                        <input type="text"  name="lastname" >

                    </div>
                    <div class="inputBx">
                        <span>Email</span>
                        <input type="email"  name="email" >

                    </div>
                    <div class="inputBx">
                        <span>Password</span>
                        <input type="password"  name="password"  >

                    </div>
                    <div class="inputBx">
                        <span>Confirm Password</span>
                        <input type="password" name="passwordconfirm" >

                    </div>
                    
                    <div class="inputBx">
                        <input type="submit" value="Submit" name="submit" class="submit">
                    </div>
                    <div class="inputBx">
                        <p>Already have an account ?  <a href="log.php" >Login Here</a></p>
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
             <input type="email" name="emailF" >
           </div>
           <div class="msg">
             <div class="text">Message *</div>
             <textarea rows="2" cols="25" name="messageF" ></textarea>
           </div>
           <div class="btn">
             <button type="submit" name="submit2">Send</button>
           </div>
           <?php 
       if(isset($erreur)){// si la variable $erreur existe , on affiche le contenu ;
        foreach($erreurs as $erreur)  
          echo "<p id= error >".$erreur."</p>"  ;
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