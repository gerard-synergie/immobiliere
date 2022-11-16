<?php
  class Affectations {
    protected $edit_id;
    protected $connexion;
    protected $projets;
    protected $agents;

    public function set_edit_id($id) {
      $this->edit_id = $id;
    }

    public function get_edit_id() {
      return $this->edit_id;
    }

    public function connect_db() {
      try {
        $this->connexion = new PDO(
                    'mysql:host=localhost;dbname=immobiliere;charset=utf8;port=3306',
                    'phpmyadmin','Ipdcdb2m'
        );
      }
      catch (Exception $e)
      {
        die('Erreur : ' . $e->getMessage());
      }
    }

    public function init($_projets, $_agents) {
      $this->projets = $_projets;
      $this->agents = $_agents;
    }

    public function get_all_affectations() {
      // Faire une jointure des 3 tables projets_agent projets et agents
      $sql = 'SELECT * FROM projets_agents p INNER JOIN agents a ON p.id_agent = a.id_agent INNER JOIN projets pr ON p.id_projet = pr.id_projet ORDER BY p.id_projet';
      $query = $this->connexion->prepare($sql);
      $query->execute();
      $projets_agents_join = $query->fetchAll();

      return $projets_agents_join;
    }

    public function update_affectation($data) {
      $id = (int) $data['id'];
  
      // Chercher le projet qui porte ce nom dans la table projets
      $projet_id = 0;
      foreach ($this->projets as $projet) {
          if ($projet["nom_projet"] == $data['nom']) {
              $projet_id =  $projet["id_projet"];
              break;
          }
      }

      // Chercher l'agent ayant ce mail dans la table agents
      $agent_id = 0;
      foreach ($this->agents as $agent) {
          if ($agent["email"] == $data['mail']) {
              $agent_id =  $agent["id_agent"];
              break;
          }
      }        
    
      // On met a jour la table seulement si le nom du projet et le mail de l'agent sont connus 
      if (($projet_id != 0) && ($agent_id != 0)) {
          $sql = 'UPDATE projets_agents SET id_projet=:id_projet, id_agent=:id_agent WHERE id=:id';
          $query = $this->connexion->prepare($sql);
          $query->execute([
                          'id' => $id,
                          'id_projet' => $projet_id,
                          'id_agent' => $agent_id
          ]);    
      };
    }

    public function create_affectation($data) {
      // Ajouter un nouvelle correspondance entre projet et agent

      // Chercher le projet qui porte ce nom dans la table projets
      $projet_id = 0;
      foreach ($this->projets as $projet) {
        if ($projet["nom_projet"] == $data['nom']) {
          $projet_id =  $projet["id_projet"];
          break;
        }
      }

      // Chercher l'agent ayant ce mail dans la table agents
      $agent_id = 0;
      foreach ($this->agents as $agent) {
        if ($agent["email"] == $data['mail']) {
          $agent_id =  $agent["id_agent"];
          break;
        }
      }
        
      // On ajoute une nouvelle entree dans la table seulement si le nom du projet et le mail de l'agent sont connus 
      if (($projet_id != 0) && ($agent_id != 0)) {
        $sql = 'INSERT INTO projets_agents(id_projet, id_agent) VALUES(:id_projet, :id_agent)';
        $query = $this->connexion->prepare($sql);
        $query->execute([
                        'id_projet' => $projet_id,
                        'id_agent' => $agent_id
        ]);
      }
    }

    public function delete_affectation($id) {
      $sql = 'DELETE FROM projets_agents WHERE id=:id';
      $query = $this->connexion->prepare($sql);
      $query->execute([
                      'id' => $id
                      ]);
    }
  }
?>