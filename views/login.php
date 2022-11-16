<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Promotion Immobiliere - benhmidaimmobiliere.tn - Promoteur immobilier</title>

    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">

    <link rel="stylesheet" href="../assets/css/style.css">

    </head>

    <body>
        <!--
            Si utilisateur/trice est non identifié(e), on affiche le formulaire
        -->
        <?php if(!isset($_SESSION['LOGGED_USER'])): ?>
            <br>
            <br>
            <br>
            <div class="main-panel">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4" style="float:none;margin:auto;">
                                <div class="card">
                                    <div class="card-body">
                                    <form action="../index.php" method="post">
                                        <div class="login-wrap">
                                            <div class="image-thumb" align="middle"><img src="../assets/images/line-dec.png" alt="Ben Hmida Immobiliere"></div>
                                            <div class="form-group">
                                                <div class="form-group-prepend">
                                                </div>
                                                <label for="email" class="form-label">Email</label>
                                                <input type="text" name="email" class="form-control" placeholder="you@benhmidaimmobiliere.tn">
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group-prepend">
                                                </div>
                                                <label for="password" class="form-label">Mot de passe</label>
                                                <input type="password" name="password" class="form-control input_pass" placeholder="*******">
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Connexion</button>
                                        <button class="btn btn-link btn-lg btn-block" type="button"><a href="login.php">Creer un compte</a></button>
                                        <input type="hidden" name="_METHOD" value="LOGIN">
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    
        <!-- ***** Footer Start ***** -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <br>
                        <br>
                        <p>
                            Copyright © 2022 HAJER
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>