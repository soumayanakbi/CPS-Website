<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CPS ENSI</title>
        <link rel="stylesheet" href="home.css">
        <link rel="stylesheet" href="video.css">
        <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
      
        <link rel="icon" href="cps.png"/>
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
    
    <br><br><br><br><br><br><br><br><br><br><br>
    <div class="cont">
    <video src="video.mp4" controls></video>
    </div>


</body>
</html>