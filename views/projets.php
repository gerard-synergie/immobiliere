<!DOCTYPE html>
<html lang="fr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Promotion Immobiliere - benhmidaimmobiliere.tn - Promoteur immobilier</title>

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
                        <a href="index.php" class="logo" style="color:black">YASMINE<em> Immobiliere</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index.php" style="color:black">ACCUEIL</a></li>
                            <li><a href="index.php#societe" style="color:black">A PROPOS</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="color:black">NOS PROJETS</a>
                                
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="index.php#trainers">EN COURS</a>
                                    <a class="dropdown-item" href="index.php#trainers">REALISES</a>
                                </div>
                            </li>
                            <li><a href="index.php#contact" style="color:black">NOUS CONTACTER</a></li>
                            <?php if(isset($_SESSION['LOGGED_USER'])): ?>
                                <li class="dropdown">
                                    <a class="dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['LOGGED_USER_NAME'] ?></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item active" href="index.php?projets">PROJETS</a>
                                        <a class="dropdown-item" href="index.php?agents">AGENTS</a>
                                        <?php if((isset($_SESSION['LOGGED_USER_STATUT']) && ($_SESSION['LOGGED_USER_STATUT'] == "admin")) || (isset($_SESSION['LOGGED_USER_STATUT']) && ($_SESSION['LOGGED_USER_STATUT'] == "responsable de ventes"))): ?>                  
                                            <a class="dropdown-item" href="index.php?affectations">AFFECTATIONS</a>
                                        <?php endif; ?>
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
                  <li><h2><a href='index.php?projets'><i class="fa fa-home"></i><b><u> Projets</b></u></a></h2></li>
                  <br>
                  <br>
                  <li><h2><a href='index.php?agents'><i class="fa fa-briefcase"></i> Agents</a></h2></li>
                  <?php if((isset($_SESSION['LOGGED_USER_STATUT']) && ($_SESSION['LOGGED_USER_STATUT'] == "admin")) || (isset($_SESSION['LOGGED_USER_STATUT']) && ($_SESSION['LOGGED_USER_STATUT'] == "responsable de ventes"))): ?>                                                                
                      <br>
                      <br>
                      <li><h2><a href='index.php?affectations'><i class="fa fa-briefcase"></i> Affectations</a><h2></li>                    
                  <?php endif; ?>                  
                </ul>
              </div>
 
              <div class="col-lg-9">
                <ul>
                  <div class="row">
                    <div class="col-sm-10"><h3><u>Liste de projets</u> </h3></div>
                    <!--div class="col-sm-2">
                      <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                    </div-->
                  </div>
                  <br>
                  <div style="overflow-x:hidden; overflow-y:auto;">
                    <table>
                      <thead>
                        <tr>
                          <th>Nom du projet</th>
                          <th>Etat</th>
                          <th>Superficie</th>
                          <th>Coût</th>
                          <th>Somme des ventes</th>
                          <th>Somme perçue</th>
                          <th>Editer</th>
                          <th>Supprimer</th>
                        </tr>
                      </thead>
                      <tbody>
                          <!-- ***** Parcourir la bd et remplir le tableau ***** -->
                          <?php foreach ($projets->get_all_projets() as $projet): ?>
                            <tr>
                              <?php if ($projets->get_edit_id() == $projet['id_projet']): ?>
                                <!-- ***** Projet à editer ***** -->
                                <form method="POST">
                                  <td><input type="text" class="form-control" name="nom" value="<?php echo $projet['nom_projet']; ?>"></td>
                                  <td>
                                    <select name="status">
                                      <option value="Etude" <?php if($projet['status'] == "Etude") echo "selected";?>>Etude</option>
                                      <option value="Travaux en cours" <?php if($projet['status'] == "Travaux en cours") echo "selected";?>>Travaux en cours</option>
                                      <option value="Travaux finis" <?php if($projet['status'] == "Travaux finis") echo "selected";?>>Travaux finis</option>
                                      <option value="Vendu" <?php if($projet['status'] == "Vendu") echo "selected";?>>Vendu</option>
                                    </select>
                                  </td>
                                  <td><input type="float" class="form-control" name="superficie" value=<?php echo $projet['superficie']; ?>></td>
                                  <td><input type="double" class="form-control" name="cout" value=<?php echo $projet['cout']; ?>></td>
                                  <td><input type="double" class="form-control" name="somme_ventes" value=<?php echo $projet['ventes']; ?>></td>
                                  <td><input type="double" class="form-control" name="somme_perçue" value=<?php echo $projet['somme']; ?>></td>
                                  <td>
                                    <input type="hidden" name="_METHOD" value="PROJET_SUBMIT_EDIT">
                                    <input type="hidden" name="id" value="<?php echo $projet['id_projet'];?>">
                                    <button type="submit" class="btn btn-info btn-rounded btn-sm my-0 fa fa-edit" ></button>
                                  </td>
                                </form>
                                <td>
                                  <form method="POST">
                                    <input type="hidden" name="_METHOD" value="PROJET_SUBMIT_CANCEL">
                                    <button type="submit" class="btn btn-info btn-rounded btn-sm my-0 fa fa-undo" ></button>
                                  </form>  
                                </td>
                              <?php else: ?>
                                <!-- ***** Projet à afficher ***** -->
                                <td><?php echo $projet['nom_projet']; ?></td>
                                <td><?php echo $projet['status']; ?></td>
                                <td><?php echo $projet['superficie']; ?></td>
                                <td><?php echo $projet['cout']; ?></td>
                                <td><?php echo $projet['ventes']; ?></td>
                                <td><?php echo $projet['somme']; ?></td>
                                <?php if(isset($_SESSION['LOGGED_USER_STATUT']) &&  ($_SESSION['LOGGED_USER_STATUT'] == "admin")): ?>
                                  <td>
                                    <form method="POST">
                                      <input type="hidden" name="_METHOD" value="PROJET_EDIT">
                                      <input type="hidden" name="id" value="<?php echo $projet['id_projet'];?>">
                                      <button type="submit" class="btn btn-info btn-rounded btn-sm my-0 fa fa-edit" ></button>
                                    </form>
                                  </td>
                                  <td>
                                    <form method="POST" onsubmit="return confirm('Voulez vous vraiment supprimer cet element');">
                                      <input type="hidden" name="_METHOD" value="PROJET_DELETE">
                                      <input type="hidden" name="id" value="<?php echo $projet['id_projet'];?>">
                                      <button type="submit" class="btn btn-danger btn-rounded btn-sm my-0 fa fa-trash" ></button>
                                    </form>
                                  </td>
                                <?php endif; ?>
                              <?php endif; ?>
                            </tr>
                          <?php endforeach; ?>
                          <!-- ***** Nouveau projet ***** -->
                          <?php if(isset($_SESSION['LOGGED_USER_STATUT']) &&  ($_SESSION['LOGGED_USER_STATUT'] == "admin")): ?>
                            <tr>
                              <form method="POST">
                                <td><input type="text" class="form-control" name="nom" value='Nom'></td>
                                <td>
                                  <select name="status">
                                    <option value="Etude">Etude</option>
                                    <option value="Travaux en cours">Travaux en cours</option>
                                    <option value="Travaux finis">Travaux finis</option>
                                    <option value="Vendu">Vendu</option>
                                  </select>
                                </td>                              
                                <td><input type="float" class="form-control" name="superficie" value=0></td>
                                <td><input type="double" class="form-control" name="cout" value=0></td>
                                <td><input type="double" class="form-control" name="somme_ventes" value=0></td>
                                <td><input type="double" class="form-control" name="somme_perçue" value=0></td>
                                <td>
                                  <input type="hidden" name="_METHOD" value="PROJET_ADD">
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
                        <u>Copyright © 2022 HAJER </u>
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