<?php ?>
<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Promotion Immobiliere - Yasmineimmobiliere.tn - Promoteur immobilier</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">Yasmine<em> Immobiliere</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="#" class="active">ACCUEIL</a></li>
                            <li><a href="#societe">A PROPOS</a></li>
                            <li><a href="#trainers">Projets</a></li>
                            <li><a href="#contact">NOUS CONTACTER</a></li>
                            <?php if(isset($_SESSION['LOGGED_USER'])): ?>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['LOGGED_USER_NAME'] ?></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="index.php?projets">PROJETS</a>
                                        <a class="dropdown-item" href="index.php?agents">AGENTS</a>
                                        <?php if((isset($_SESSION['LOGGED_USER_STATUT']) && ($_SESSION['LOGGED_USER_STATUT'] == "admin")) || (isset($_SESSION['LOGGED_USER_STATUT']) && ($_SESSION['LOGGED_USER_STATUT'] == "responsable de ventes"))): ?>                  
                                            <a class="dropdown-item" href="index.php?affectations">AFFECTATIONS</a>
                                        <?php endif; ?>
                                        <a class="dropdown-item" href="index.php?deconnexion">DECONNEXION</a>
                                    </div>
                                </li>
                            <?php else: ?>
                                <li><a href="views/login.php">CONNEXION</a></li> 
                            <?php endif; ?>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="assets/images/video.mp4" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="caption">
                <!--h6>Yasmine Immobiliere</h6-->
                <h2>Votre <em>projet de reve</em></h2>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

   <!-- ***** Cars Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Projets <em>En cours</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>Nos projets en cours</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/Jasmins-480x480.png" alt="">
                        </div>
                        <div class="down-content">
                            <span>
                                <del><sup>€</sup>80 000</del>  <sup>€</sup>70 000
                            </span>

                            <h4>Résidence Jasmins</h4>

                            <p>T3 &nbsp;/&nbsp; A vendre &nbsp;/&nbsp; 100 m2 &nbsp;/&nbsp; 2022</p>

                            <ul class="social-icons">
                                <li><a href="#">+ View More</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/prestige-480x480.png" alt="">
                        </div>
                        <div class="down-content">
                            <span>
                                <del><sup>€</sup>80 000</del>  <sup>€</sup>70 000
                            </span>

                            <h4>Residence Prestige</h4>

                            <p>T3 &nbsp;/&nbsp; A vendre &nbsp;/&nbsp; 100 m2 &nbsp;/&nbsp; 2022</p>

                            <ul class="social-icons">
                                <li><a href="#">+ View More</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                        <img src="assets/images/Jasmins-480x480.png" alt="">
                        </div>
                        <div class="down-content">
                            <span>
                                <del><sup>€</sup>80 000</del>  <sup>€</sup>70 000
                            </span>

                            <h4>Residence La Tese</h4>

                            <p>Villa T4 &nbsp;/&nbsp; A vendre &nbsp;/&nbsp; 100 m2 &nbsp;/&nbsp; 2022</p>

                            <ul class="social-icons">
                                <li><a href="#">+ View More</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Cars Ends ***** -->

    <section class="section section-bg" id="schedule" style="background-image: url(assets/images/about-fullscreen-1-1920x700.jpg)">
        <div class="container" id="societe"> 
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading dark-bg">
                        <h2>Lire <em>A propos</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p><br><hr>Yasmine immobiliere.</hr></br></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="cta-content text-center">
                        <p>Fondée en 2001 par Monsieur Abdelmonem BEN HMIDA, Yasmine immobilière possède plus d’une dizaine
                             de programmes immobiliers entre le résidentiel, le bureautique et le commercial. Cette expérience
                             dans le secteur immobilier a toujours été combinée à une recherche d’innovation et d’écoute de la
                             demande de nos partenaires ainsi qu’une ouverture sur les nouvelles technologies dans le domaine 
                             énergétique et écologique.
                        </p>

                        <p>Siège Social</p>
                        <i class="fas fa-location">
                        <i class="fas fa-map-marker-alt">157 rue Farhat Hached 6000 Gabes, Tunisie</i>
                            
                        </i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container" id="contact">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <h2>Nous <em>contacter</em></h2>
                        <p>Nous ecrire.</p>
                        <div class="main-button">
                            <a href="#">Nous contacter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->
    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        Copyright © 2022 HAJER
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/mixitup.js"></script> 
    <script src="assets/js/accordions.js"></script>
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

  </body>
</html>