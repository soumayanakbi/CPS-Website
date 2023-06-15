<?php             //checks if the form was submitted. This line is checking if there is a POST parameter named "submit" set, indicating that the form was submitted.
                  if (isset($_POST["submit"])){
                    //retrieve the values of "emailF" and "messageF" from the submitted form data and store them in variables.
                    $emailF = $_POST["emailF"];
                    $messageF= $_POST["messageF"];
                   
                    $success = ""; //initializes an empty string variable to store a success message
                    $errors = array();//This code initializes an empty array $errors to store any validation errors that may occur during the form submission process.
                   if(empty($emailF) OR empty($messageF)) {//checks if either the email or message field is empty
                     array_push($errors,"All fields are required");
                    }
                    if (!filter_var($emailF, FILTER_VALIDATE_EMAIL)) {//checks if the email is not valid using the FILTER_VALIDATE_EMAIL filter.
                     array_push($errors, "Email is not valid");
                    }
                    require_once "database.php";//includes the "database.php" file, which presumably contains the necessary database connection code.
                    if (count($errors)>0) {//checks if there are any validation errors
                     foreach ($errors as  $error) {
                     }
                    }else{//If there are no validation errors, the code proceeds to insert the form data into the database using a prepared statement.
                     $sql = "INSERT INTO footercontact ( emailF, messageF) VALUES (?, ? )";//defines an SQL query with placeholders for the email and message fields.
                     $stmt = mysqli_stmt_init($conn);//initializes a new mysqli_stmt object using the database connection $conn
                     //prepares the SQL statement by binding the statement object $stmt with the SQL query $sql
                     $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
                     if ($prepareStmt) {
                      mysqli_stmt_bind_param($stmt, "ss",  $emailF, $messageF);
                         mysqli_stmt_execute($stmt);
                         $success = "Your message was successfully sent!";
                     }else{
                         die("Something went wrong");//If there is an error during the statement preparation or execution, the code terminates with the message "Something went wrong" using die().
                     }
                    }
                   
                  }
                ?>


<html lang="en">
<head>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

  <link rel="stylesheet" href="service.css">
  <link rel="stylesheet" href="about-us.css">
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="footer.css">
  

  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
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
            
              <li><a href="#home"><strong>Home</strong></a></li>
              
              <li><a href="events.php"><strong>Events</strong></a></li>
              <li><a href="gallery.php"><strong>Gallery</strong></a></li>
              <li><a href="team.php"><strong>Team</strong></a></li>
              <li><a href="getintouch.php"><strong>Get In Touch</strong></a></li>
              <li><a href="log.php"><strong> Log in</strong></a></li>
           </ul>
        </div>
    </header>

    <div class="title">
    <h2 class="title2">“We only have what we give.”
          ― Isabel Allende</h2><br><br>
        <a href="log.php">Donate Now</a>
    </div>
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

   

  <!-- ABOUT US  -->

  <section class="about">
    <div class="main">
      <img  class="im1" src="about.jpg">
      <div class="all-text">
        <h4>About Us</h4>
        <h1>Citoyens Positifs et Sociables</h1>
        <p>is a club founded in 2011 within the National School of Computer Science (ENSI) and is supported by the regional committee of the Tunisian 
          Red Crescent in La Manouba. It collaborates with trustworthy associations and civil society organizations. Initially, the club focused solely on awareness and ambulatory health.
          However, now it has expanded its scope to include a humanitarian and volunteer axis in all of its activities. 
          Every year, Positive and Sociable Citizens organizes first aid training, blood donation drives, visits to child protection centers, visits to elderly protection centers,
          and finally visits to primary schools in rural areas. The club's visits to schools are well planned and based on several criteria, such as the living standards of the areas to be visited, weather conditions, and financial conditions.</p>
      </p>
      <div class="btn">
        <a href="team.php"><button type="button">Our Team</button></a>
        <a href="video.php"><button type="button">Watch video </button></a>
      </div>
      </div>

    </div>
  </section>
      <br><br>

   <!-- ......Services....... -->   

   <div class="services">
    <h1>Our Services</h1>
    <div class="cen">
      <div class="service">
        <i class="fa-solid fa-handshake"></i>
        <h2>Most Trusted</h2>
        <p>We value your trust and demonstrate accountability in every task we do.
        </p><br><br>
      </div>
      <div class="service">
        <i class="fa-solid fa-droplet"></i>
        <h2>Transparent</h2>
        <p>We regularly publish our records and progress in all projects.
        </p><br><br>
      </div>
      <div class="service">
        <i class="fa-solid fa-hand-holding-heart"></i>
        <h2>Commited</h2>
        <p>We are fully dedicated to successfully run and accomplish our missions.</p><br><br>
      </div>
      <div class="service">
        <i class="fa-solid fa-heart-circle-plus"></i>
  
        <h2>Charitable</h2>
        <p>We are all driven by a sense of charity and willingness of help to those in need.</p><br><br>
      </div>
      <div class="service">
        <i class="fa-solid fa-people-roof"></i>
        <h2>Diverse</h2>
        <p>Young, old, students, alumnis and professionals contribute to our organizations.</p><br><br>
      </div>
      <div class="service">
        <i class="fa-solid fa-lock"></i>
        <h2>Confidential</h2>
        <p>We treat the information of our partners and donors strictly confidential.</p><br><br>
      </div>
    </div>
  
  </div>
   </div>
  <br><br><br> <br><br><br>
  
    <!-- /features-4 -->
    <section class="features-4">
      <div class="features4-block py-5">
        <div class="container py-lg-4">
          <div class="title-content text-center mb-lg-5 mt-4">
            <h6 class="sub-title">Why Choose Us</h6>
            <h3 class="hny-title">How Can Help?</h3>
            <p class="fea-para">Our goal is to make a positive impact in the lives of those we serve, and we strive to do so with compassion, respect, and integrity. </p>
          </div>
          <div class="row features4-grids text-left mt-lg-4">
            <div class="col-lg-3 col-md-6 features4-grid mt-4">
              <div class="features4-grid-inn">
                      <div class="img-featured">
           <div class="ch-item ch-img-1">
                    <div class="ch-info-wrap">
                      <div class="ch-info">
           <div class="ch-info-front ch-img-1"></div>
                        <div class="ch-info-back">
                          <h4>Donate</h4>
                        </div>
                      </div>
        </div>
                  </div>
       </div>
  
                <div class="features4-rightinfo">
         <h5><a href="#URL">Donate financially</a></h5>
                  <p>Donating financially is a powerful way to make a meaningful impact on the lives of those in need.</p>
  
        </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 features4-grid mt-4">
              <div class="features4-grid-inn">
                <div class="img-featured">
          <div class="ch-item ch-img-2">
                    <div class="ch-info-wrap">
           <div class="ch-info">
                        <div class="ch-info-front ch-img-2"></div>
             <div class="ch-info-back">
                          <h4>Participate</h4>
           </div>
                      </div>
             </div>
                  </div>
                </div>
       <div class="features4-rightinfo">
                  <h5><a href="#URL">
                      Become A Volunteer</a></h5>
        <p>Volunteering can be a truly rewarding experience, both for the individual and for the community . </p>
                           
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 features4-grid mt-4">
              <div class="features4-grid-inn">
      <div class="img-featured">
                  <div class="ch-item ch-img-3">
                    <div class="ch-info-wrap">
          <div class="ch-info">
                        <div class="ch-info-front ch-img-3"></div>
           <div class="ch-info-back">
                <h4>Donate</h4>
                        </div>
                      </div>
                    </div>
            </div>
                </div>
          <div class="features4-rightinfo">
                  <h5><a href="#URL">
                      Donate Materials</a></h5>
                  <p>Your contribution, no matter how big or small, will be greatly appreciated and put to good use. 
                    
                  </p>
  
          </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 features4-grid mt-4">
              <div class="features4-grid-inn">
        <div class="img-featured">
                  <div class="ch-item ch-img-4">
          <div class="ch-info-wrap">
                      <div class="ch-info">
             <div class="ch-info-front ch-img-4"></div>
              <div class="ch-info-back">
                          <h4>Contact</h4>
                  </div>
           </div>
             </div>
                  </div>
        </div>
                <div class="features4-rightinfo">
          <h5><a href="#URL">
                      Contact Us</a></h5>
          <p>If you have any questions or would like to learn more about us, Do not hesitate to contact us.</p>
  
                </div>
       </div>
       </div>
          </div>
        </div>
      </div>
      </div>
    </section>
</div>
  
    <!--//features-4 -->

<section class="about">
  <div class="main" >
    <div class="all-text">
      <h4>OUR PARTNER</h4>
      <h1 style="color: black;">The Tunisian Red Crescent</h1>
      <p>Our sincere appreciation goes out to our valued partner for their continued support.
        He has contributed greatly to our mission
        The Tunisian Red Crescent is an organization of public interest, created on October 7, 1956, and recognized by decree of May 6, 1957 as a voluntary organization of aid and aid auxiliary to the public authorities in the humanitarian field, in accordance with the 1949 Geneva Conventions and its Additional Protocols. 
        The Tunisian Red Crescent became a member of the International Red Cross and Red Crescent Movement on 13 September 1957</p>
    </div>
    <img  class="im2" src="croissantR.png" >
  </div>
</section>
    </div>
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
             <input type="email" name="emailF">
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