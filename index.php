<?php
    // index.php : Un routeur qui dispatche les requetes du serveur
    // On charge les modeles et les controleurs
    require_once 'controllers/ConnexionController.php';
    require_once 'controllers/AgentsController.php';
    require_once 'controllers/ProjetsController.php';
    require_once 'controllers/AffectationsController.php';

    // gestion des routes
    if (($_SERVER['REQUEST_METHOD'] == 'POST') && ($_POST['_METHOD'] == 'LOGIN')) {
        if ($connexion->login_form($_POST, $agents->get_all_agents())) {
            include_once('views/home.php');
        };
    }
    elseif (($_SERVER['REQUEST_METHOD'] == 'POST') && ($_POST['_METHOD'] == 'AGENT_EDIT')) {
        $agents->set_edit_id((int)$_POST['id']);
        include_once('views/agents.php');
    }
    elseif (($_SERVER['REQUEST_METHOD'] == 'POST') && ($_POST['_METHOD'] == 'AGENT_SUBMIT_EDIT')) {
        $agents->update_agent($_POST);
        $agents->get_all_agents();
        include_once('views/agents.php');
    }
    elseif (($_SERVER['REQUEST_METHOD'] == 'POST') && ($_POST['_METHOD'] == 'AGENT_ADD')) {
        $agents->create_agent($_POST);
        $agents->get_all_agents();
        include_once('views/agents.php');
    }
    elseif (($_SERVER['REQUEST_METHOD'] == 'POST') && ($_POST['_METHOD'] == 'AGENT_DELETE')) {
        $agents->delete_agent((int)$_POST['id']);
        $agents->get_all_agents();
        include_once('views/agents.php');
    }
    elseif (($_SERVER['REQUEST_METHOD'] == 'POST') && ($_POST['_METHOD'] == 'PROJET_EDIT')) {
        $projets->set_edit_id((int)$_POST['id']);
        include_once('views/projets.php');
    }
    elseif (($_SERVER['REQUEST_METHOD'] == 'POST') && ($_POST['_METHOD'] == 'PROJET_SUBMIT_EDIT')) {
        $projets->update_projet($_POST);
        $projets->get_all_projets();
        include_once('views/projets.php');
    }
    elseif (($_SERVER['REQUEST_METHOD'] == 'POST') && ($_POST['_METHOD'] == 'PROJET_ADD')) {
        $projets->create_projet($_POST);
        $projets->get_all_projets();
        include_once('views/projets.php');
    }
    elseif (($_SERVER['REQUEST_METHOD'] == 'POST') && ($_POST['_METHOD'] == 'PROJET_DELETE')) {
        $projets->delete_projet((int)$_POST['id']);
        $projets->get_all_projets();
        include_once('views/projets.php');
    }
    elseif (($_SERVER['REQUEST_METHOD'] == 'POST') && ($_POST['_METHOD'] == 'AFFECTATION_EDIT')) {
        $projets_agents_join->set_edit_id((int)$_POST['id']);
        include_once('views/affectations.php');
    }
    elseif (($_SERVER['REQUEST_METHOD'] == 'POST') && ($_POST['_METHOD'] == 'AFFECTATION_SUBMIT_EDIT')) {
        $projets_agents_join->update_affectation($_POST);
        $projets_agents_join->get_all_affectations();
        include_once('views/affectations.php');
    }
    elseif (($_SERVER['REQUEST_METHOD'] == 'POST') && ($_POST['_METHOD'] == 'AFFECTATION_ADD')) {
        $projets_agents_join->create_affectation($_POST);
        $projets_agents_join->get_all_affectations();
        include_once('views/affectations.php');
    }
    elseif (($_SERVER['REQUEST_METHOD'] == 'POST') && ($_POST['_METHOD'] == 'AFFECTATION_DELETE')) {
        $projets_agents_join->delete_affectation((int)$_POST['id']);
        $projets_agents_join->get_all_affectations();
        include_once('views/affectations.php');
    }
    else {
        $uri = $_SERVER['REQUEST_URI'];
        if (('/immobiliere/' == $uri) || ('/immobiliere/index.php' == $uri)) {
            include_once('views/home.php');
        }
        elseif ('/immobiliere/index.php?deconnexion' == $uri) {
            $connexion->deconnexion();
            include_once('views/home.php');
        }
        elseif ('/immobiliere/index.php?agents' == $uri) {
            include_once('views/agents.php');
        }
        elseif ('/immobiliere/index.php?projets' == $uri) {
            include_once('views/projets.php');
        }
        elseif ('/immobiliere/index.php?affectations' == $uri) {
            include_once('views/affectations.php');
        }
    }
  ?>