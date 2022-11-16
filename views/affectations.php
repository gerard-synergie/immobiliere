<?php
    // La page se charge seulement pour les utilisateurs 'admin' et 'responsable de ventes'
    if(!isset($_SESSION['LOGGED_USER']) || !isset($_SESSION['LOGGED_USER_STATUT']) || ($_SESSION['LOGGED_USER_STATUT'] != "admin") && ($_SESSION['LOGGED_USER_STATUT'] != "responsable de ventes")) {
        include_once('index.php');
        return;
    }
?>

<!DOCTYPE html>
<html lang="fr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Promotion Immobiliere - yasmineimmobiliere.tn - Promoteur immobilier</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    
      table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
      }

      th {
        text-align: center;
        padding: 8px 10px;
        width: 128px;
        color: black;
      }
     
      td {
        text-align: left;
        padding: 8px 10px;
        border: 1px solid #ddd;
        width: 128px;
      }

      thead, tbody {
        display:block;
        text-align: left;
      }

      tbody {
        height: 200px;
        overflow-y: scroll; 
      }

      tr:nth-child(even){
        background-color: #f2f2f2
      }
      tr:hover { 
        background: #d0d0d0 
      }

    </style>
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
                            <a href="index.php" class="logo" style="color:black">Yasmine<em> Immobiliere</em></a>
                            <!-- ***** Logo End ***** -->
                            <!-- ***** Menu Start ***** -->
                            <ul class="nav"> 
                                <li><a href="index.php" style="color:black">ACCUEIL</a></li>
                                <li><a href="index.php#societe" style="color:black">A PROPOS</a></li>
                                <li><a href="index.php#trainers" style="color:black">PROJETS</a></li>
                                <li><a href="index.php#contact" style="color:black">NOUS CONTACTER</a></li>
                                <?php if(isset($_SESSION['LOGGED_USER'])): ?>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['LOGGED_USER_NAME'] ?></a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="index.php?projets">PROJETS</a>
                                            <a class="dropdown-item" href="index.php?agents">AGENTS</a>
                                            <a class="dropdown-item active" href="index.php?affectations"><b><u>AFFECTATIONS</b></u></a>
                                            <a class="dropdown-item" href="index.php?deconnexion">DECONNEXION</a>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            </ul>
                            <!-- ***** Menu End ***** -->
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- ***** Header Area End ***** -->

        <!-- ***** Our Classes Start ***** -->
        <section class="section" id="our-classes">
            <div class="container">
                <br>
                <br>
                <br>
                <br>
                <div class="row">
                    <div class="col-lg-3">
                        <ul>
                            <br>
                            <?php if((isset($_SESSION['LOGGED_USER_STATUT']) && ($_SESSION['LOGGED_USER_STATUT'] == "admin")) || (isset($_SESSION['LOGGED_USER_STATUT']) && ($_SESSION['LOGGED_USER_STATUT'] == "responsable de ventes"))): ?>                                                                
                                <li><h2><a href='index.php?affectations'><i class="fa fa-briefcase"></i><b><u> Affectations</b></u></a><h2></li>                    
                                <br>
                                <br>
                            <?php endif; ?>
                            <li><h2><a href='index.php?agents'><i class="fa fa-briefcase"></i> Agents</a><h2></li>
                            <br>
                            <br>
                            <li><h2><a href='index.php?projets'><i class="fa fa-home"></i> Projets</a></h2></li>
                        </ul>
                    </div>
        
                    <div class="col-lg-9">
                        <ul>
                            <div class="row">
                                <div class="col-sm-10"><h3><u> Liste des affectations</u></h3></div>
                            </div>
                            <br>
                            <div style="overflow-x:hidden; overflow-y:auto;">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Nom du projet</th>
                                            <th>Email de l'agent</th>
                                            <th>Editer</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- ***** Parcourir la bd et remplir le tableau ***** -->
                                        <?php foreach ($projets_agents_join->get_all_affectations() as $projets_agent_join): ?>
                                            <!-- ***** Seul un admin peut voir et editer tous les agents ***** -->
                                            <?php if((isset($_SESSION['LOGGED_USER_STATUT']) && ($_SESSION['LOGGED_USER_STATUT'] == "admin")) || (isset($_SESSION['LOGGED_USER_STATUT']) && ($_SESSION['LOGGED_USER_STATUT'] == "responsable de ventes"))): ?>
                                                <tr>
                                                    <!-- ***** Editer ***** -->
                                                    <?php if ($projets_agents_join->get_edit_id() == $projets_agent_join['id']): ?>
                                                        <form method="POST">
                                                            <td>
                                                                <select name="nom">                
                                                                    <?php foreach ($projets->get_all_projets() as $projet): ?>
                                                                        <option value="<?php echo $projet['nom_projet']; ?>" <?php if($projet['id_projet'] == $projets_agent_join['id_projet']) echo "selected";?>><?php echo $projet['nom_projet']; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>    
                                                            </td>                          
                                                            <td>
                                                                <select name="mail">                
                                                                    <?php foreach ($agents->get_all_agents() as $agent): ?>
                                                                        <option value="<?php echo $agent['email']; ?>" <?php if($agent['email'] == $projets_agent_join['email']) echo "selected";?>><?php echo $agent['email']; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>                                                                  
                                                            <td>
                                                                <input type="hidden" name="_METHOD" value="AFFECTATION_SUBMIT_EDIT">
                                                                <input type="hidden" name="id" value="<?php echo $projets_agent_join['id'];?>">
                                                                <button type="submit" class="btn btn-info btn-rounded btn-sm my-0 fa fa-edit" ></button>
                                                            </td>                                                            
                                                        </form>
                                                        <form method="POST">
                                                            <td>
                                                                <input type="hidden" name="_METHOD" value="AFFECTATION_SUBMIT_CANCEL">
                                                                <button type="submit" class="btn btn-info btn-rounded btn-sm my-0 fa fa-undo" ></button>
                                                            </td>                                            
                                                        </form>
                                                    <?php else: ?>
                                                        <!-- ***** Afficher ***** -->
                                                        <td><?php echo $projets_agent_join['nom_projet']; ?></td>
                                                        <td><?php echo $projets_agent_join['email']; ?></td>
                                                        <td>
                                                            <form method="POST">
                                                                <input type="hidden" name="_METHOD" value="AFFECTATION_EDIT">
                                                                <input type="hidden" name="id" value="<?php echo $projets_agent_join['id'];?>">
                                                                <button type="submit" class="btn btn-info btn-rounded btn-sm my-0 fa fa-edit" ></button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <form method="POST" onsubmit="return confirm('Voulez vous vraiment supprimer cet element');">
                                                                <input type="hidden" name="_METHOD" value="AFFECTATION_DELETE">
                                                                <input type="hidden" name="id" value="<?php echo $projets_agent_join['id'];?>">
                                                                <button type="submit" class="btn btn-danger btn-rounded btn-sm my-0 fa fa-trash" ></button>
                                                            </form>
                                                        </td>
                                                    <?php endif; ?>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <!-- ***** Nouvel agent ***** -->
                                        <!-- ***** Seul un admin peut ajouter des agents ***** -->
                                        <?php if((isset($_SESSION['LOGGED_USER_STATUT']) && ($_SESSION['LOGGED_USER_STATUT'] == "admin")) || (isset($_SESSION['LOGGED_USER_STATUT']) && ($_SESSION['LOGGED_USER_STATUT'] == "responsable de ventes"))): ?>
                                            <tr>
                                                <form method="POST">
                                                    <td>
                                                        <select name="nom">                
                                                            <?php foreach ($projets->get_all_projets() as $projet): ?>
                                                                <option value="<?php echo $projet['nom_projet']; ?>"><?php echo $projet['nom_projet']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="mail">                
                                                            <?php foreach ($agents->get_all_agents() as $agent): ?>
                                                                <option value="<?php echo $agent['email']; ?>"><?php echo $agent['email']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="_METHOD" value="AFFECTATION_ADD">
                                                        <button type="submit" class="btn btn-info btn-rounded btn-sm my-0 fa fa-user-plus" ></button>
                                                    </td>
                                                </form>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </ul>
                    </div>
                </div>    
            </div>
        </section>
        <!-- ***** Our Classes End ***** -->

        <!-- ***** Footer Start ***** -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p>
                            <u>Copyright © 2022 HAJER</u>
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