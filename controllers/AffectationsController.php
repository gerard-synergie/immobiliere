<?php
  require_once 'models/Affectations.php';

  $projets_agents_join = new Affectations();
  $projets_agents_join->connect_db();
  $projets_agents_join->init($projets->get_all_projets(), $agents->get_all_agents());
?>
