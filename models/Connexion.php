<?php
    class Connexion {
        public function login_form($data, $agents) {
            // Validation du formulaire
            if (isset($data['email']) &&  isset($data['password'])) {
                foreach ($agents as $agent) {
                    if ($agent['email'] == $data['email']) {
                        //echo 'found mail' . '</br>';
                        $pwd = $data['password'];
                        if (password_verify($pwd, $agent['password'])) {
                            //echo "Password matches.";
                            $_SESSION['LOGGED_USER'] = $agent['email'];
                            $_SESSION['LOGGED_USER_NAME'] = $agent['prenom'];
                            $_SESSION['LOGGED_USER_PASSWORD'] = $data['password'];
                            $_SESSION['LOGGED_USER_STATUT'] = $agent['statut'];
        
                            // retenir l'email de la personne connectée pendant 1 an
                            setcookie(
                                'LOGGED_USER',
                                $data['email'],
                                [
                                    'expires' => time() + 365*24*3600,
                                    'secure' => true,
                                    'httponly' => true,
                                ]
                            );
        
                            return true;                   
                        }
                    }
                }
            }
            return false;
        }

        public function login($agents) {
            $found = false;
            foreach ($agents as $agent) {
                if ($agent['email'] == $_SESSION['LOGGED_USER']) {
                    $pwd = $_SESSION['LOGGED_USER_PASSWORD'];
                    if (password_verify($pwd, $agent['password'])) {
                        $found = true;
                        $_SESSION['LOGGED_USER_STATUT'] = $agent['statut'];
                    }
                    break;
                }
            }
            if ($found == false) {
                session_destroy();

                $_SESSION = array();

                include_once('../index.php');

                return false;
            }

            return true;
        }

        public function deconnexion() {
            session_destroy();

            $_SESSION = array();
        }
    }
?>