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
        display: block;
        overflow-x: auto; 
        white-space: nowrap;

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
        display: table;
        width: 100%;
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
                        <a href="index.php" class="logo"style="color:black">Yasmine<em> Immobiliere</em></a>
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
                                        <a class="dropdown-item active" href="index.php?agents">AGENTS</a>
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
                <li><h2><a href='index.php?agents'><i class="fa fa-briefcase"></i><b><u> Agents</u></b></a><h2></li>
                <br>
                <br>
                <li><h2><a href='index.php?projets'><i class="fa fa-home"></i> Projets</a></h2></li>
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
                  <div class="col-sm-9"><h3><u>Liste des agents</u></h3></div>
                </div>
                <br>
                <div style="overflow-x:hidden; overflow-y:auto;">
                  <table>
                    <thead>
                      <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Statut</th>
                        <th>email</th>
                        <th>Mot de passe</th>
                        <th>Telephone</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- ***** Parcourir la bd et remplir le tableau ***** -->
                      <?php foreach ($agents->get_all_agents() as $agent): ?>
                        <!-- ***** Seul un admin peut voir et editer tous les agents ***** -->
                        <?php if(isset($_SESSION['LOGGED_USER_STATUT']) && (($_SESSION['LOGGED_USER_STATUT'] == "admin") || ($_SESSION['LOGGED_USER'] == $agent['email']))): ?>
                          <tr>
                            <!-- ***** Agent à editer ***** -->
                            <?php if ($agents->get_edit_id() == $agent['id_agent']): ?>
                              <form method="POST">
                                <td><input type="text" class="form-control" name="nom" value=<?php echo $agent['nom']; ?>></td>                          
                                <td><input type="text" class="form-control" name="prenom" value=<?php echo $agent['prenom']; ?>></td>
                                <td>
                                    <select name="statut">
                                    <option value="admin" <?php if($agent['statut'] == "admin") echo "selected";?>>admin</option>
                                    <option value="responsable de ventes" <?php if($agent['statut'] == "responsable de ventes") echo "selected";?>>responsable de ventes</option>
                                    <option value="commercial" <?php if($agent['statut'] == "commercial") echo "selected";?>>commercial</option>
                                    </select>
                                </td>
                                <td><input type="mail" class="form-control" name="email" value=<?php echo $agent['email']; ?>></td>
                                <td><input type="password" class="form-control" name="password" value=<?php echo $agent['password']; ?>></td>
                                <td><input type="text" class="form-control" name="telephone" value=<?php echo $agent['telephone']; ?>></td>
                                <td>
                                    <input type="hidden" name="_METHOD" value="AGENT_SUBMIT_EDIT">
                                    <input type="hidden" name="id" value="<?php echo $agent['id_agent'];?>">
                                    <button type="submit" class="btn btn-info btn-rounded btn-sm my-0 fa fa-edit" ></button>
                                </td>
                              </form>
                              <form method="POST">
                                <td>
                                  <input type="hidden" name="_METHOD" value="AGENT_SUBMIT_CANCEL">
                                  <button type="submit" class="btn btn-info btn-rounded btn-sm my-0 fa fa-undo" ></button>
                                </td>                                            
                              </form>
                            <?php else: ?>
                              <!-- ***** Agent à afficher ***** -->
                              <td><?php echo $agent['nom']; ?></td>
                              <td><?php echo $agent['prenom']; ?></td>
                              <td><?php echo $agent['statut']; ?></td>
                              <td><?php echo $agent['email']; ?></td>
                              <td>********</td>
                              <td><?php echo $agent['telephone']; ?></td>
                              <td>
                                <form method="POST">
                                  <input type="hidden" name="_METHOD" value="AGENT_EDIT">
                                  <input type="hidden" name="id" value="<?php echo $agent['id_agent'];?>">
                                  <button type="submit" class="btn btn-info btn-rounded btn-sm my-0 fa fa-edit" ></button>
                                </form>
                              </td>
                              <td>
                                <!-- ***** Seul un admin peut supprimer un agent ***** -->
                                <?php if(isset($_SESSION['LOGGED_USER_STATUT']) &&  ($_SESSION['LOGGED_USER_STATUT'] == "admin")): ?>
                                  <form method="POST" onsubmit="return confirm('Voulez vous vraiment supprimer cet element');">
                                      <input type="hidden" name="_METHOD" value="AGENT_DELETE">
                                      <input type="hidden" name="id" value="<?php echo $agent['id_agent'];?>">
                                      <button type="submit" class="btn btn-danger btn-rounded btn-sm my-0 fa fa-trash" ></button>
                                  </form>
                                <?php endif; ?>
                              </td>
                            <?php endif; ?>
                          </tr>
                        <?php endif; ?>
                      <?php endforeach; ?>
                      <!-- ***** Nouvel agent ***** -->
                      <!-- ***** Seul un admin peut ajouter des agents ***** -->
                      <?php if(isset($_SESSION['LOGGED_USER_STATUT']) &&  ($_SESSION['LOGGED_USER_STATUT'] == "admin")): ?>
                        <tr>
                          <form method="POST">
                            <td><input type="text" class="form-control" name="nom" value='Nom'></td>                             
                            <td><input type="text" class="form-control" name="prenom" value='Prenom'></td>
                            <td>
                              <select name="statut">
                              <option value="admin">admin</option>
                              <option value="responsable de ventes">responsable de ventes</option>
                              <option value="commercial" selected="commercial">commercial</option>
                              </select>
                            </td> 
                            <td><input type="mail" class="form-control" name="email" value='prenom.nom@google.com'></td>
                            <td><input type="password" class="form-control" name="password" value='123456789'></td>
                            <td><input type="text" class="form-control" name="telephone" value='12345678'></td>
                            <td>
                              <input type="hidden" name="_METHOD" value="AGENT_ADD">
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
                        <u> Copyright © 2022 HAJER </u>
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