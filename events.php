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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPS ENSI</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/514c1af453.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="events.css">
    <link rel="stylesheet" href="home.css">
    <link rel="icon" href="cps.png"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    
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

  <section class="swiper mySwiper">

    <div class="swiper-wrapper">

      <div class="card swiper-slide">
        <div class="card__image">
          <img src="don.jpg" alt="card image">
        </div>

        <div class="card__content">
          <span class="card__title">Dafihom FE Chetehom</span>
          
          <p class="card__text">دفيهم في شتاهم خاترهم مستحقين لشنوا يقيهم من البرد و ماهمش منجمين يقاومو الصقعة, صغار كبار نساء و رجال..
            كل واحد فينا قادر باش يفرح الناس هاذيا حتى بالقليل ما يبخلش عليهم ، اللي عندو دبش معاش يستعملو ولا بطانيات ينجم يجيبهملنا و اللي يحب يعاون حتى بالفلوس زادة  و ربي يبارك لكم .</p>
            <br><br>
          <button class="card__btn"><a class="goto" href="participate.php">participate</a></button>
        </div>
      </div>

      <div class="card swiper-slide">
        <div class="card__image">
          <img src="ecole.jpg" alt="card image">
        </div>

        <div class="card__content">
          <span class="card__title">Visite A L'école</span>
          
          <p class="card__text"> مفماش احلى من ضحكة صغير و فرحتو اللي يراك مثال و انت تحاول من شيرتك تكون قدوة ليه .
          لعبنا شطحنا لونا و حكينا و فهمنا robot شيعمل و هكاكا تعدا نهار مزيان باش يقعد في بالنا كلنا .</p>
          <br><br>
          <button class="card__btn"><a class="goto" href="participate.php">participate</a></button>
        </div>
      </div>

      <div class="card swiper-slide">
        <div class="card__image">
          <img src="sos.jpg" alt="card image">
        </div>

        <div class="card__content">
          <span class="card__title">SOS Village</span>
          
          <p class="card__text"> مفماش احلى من ضحكة صغير و فرحتو اللي يراك مثال و انت تحاول من شيرتك تكون قدوة ليه .
          لعبنا شطحنا لونا و حكينا و فهمنا robot شيعمل و هكاكا تعدا نهار مزيان باش يقعد في بالنا كلنا .</p>
          <br><br>
          <button class="card__btn"><a class="goto" href="participate.php">participate</a></button>
        </div>
      </div>

      <div class="card swiper-slide">
        <div class="card__image">
          <img src="secous.jpg" alt="card image">
        </div>

        <div class="card__content">
          <span class="card__title">Formations secourisme</span>
          
          <p class="card__text">"Une minute de secourisme, une vie sauvée"<br>La formation aux gestes de premiers secours est une compétence essentielle pour être capable d'intervenir en cas d'urgence.
            <br><br>
            <button class="card__btn"><a class="goto" href="participate.php">participate</a></button>
        </div>
      </div>

      <div class="card swiper-slide">
        <div class="card__image">
          <img src="wa.jpg" alt="card image">
        </div>

        <div class="card__content">
          <span class="card__title">"والدينا و يعزو علينا"</span>
          
          <p class="card__text">كبار السن هم فرحة الأيام ورائحتها الطيبة و معنى الحياة اللهم أمد في اعمارهم و أدم عليهم الصحة والعافي"</p>
          <br><br>
          <button class="card__btn"><a class="goto" href="participate.php">participate</a></button>
        </div>
      </div>

      <div class="card swiper-slide">
        <div class="card__image">
          <img src="don.jpg" alt="card image">
        </div>

        <div class="card__content">
          <span class="card__title">Don du sang</span>
         
          <p class="card__text">A l'occasion de la journée nationale du don du sang, notre evenement a pour objectif de consacrer l'importance du don de sang dans la sauvegarde de la vie humaine et de sensibiliser davantage l'étudiant à prendre l'initiative d'une telle action et à renforcer en lui l'esprit de la solidarité.</p>
          <br><br>
          <button class="card__btn"><a class="goto" href="participate.php">participate</a></button>
        </div>
      </div>

    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

  
  <script>
    var swiper = new Swiper(".mySwiper", {
      effect: "coverflow", // (effet de couverture en cascade)
      // les diapositives seront superposées les unes sur les autres
      grabCursor: true, //permet de changer le curseur de la souris en une main qui semble saisir les diapositives,
      centeredSlides: true,
      slidesPerView: "auto", 
      // le nombre de diapositives visibles à la fois sera déterminé automatiquement en fonction de l'espace disponible dans le conteneur.
      coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 300,
        modifier: 1, 
        //permet d'ajuster l'intensité de l'effet de couverture en cascade.
        slideShadows: false, //les ombres des diapositives 
      },
      pagination: {
        el: ".swiper-pagination",
      },
    });
  </script> 
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
</body>
</html>