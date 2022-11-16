<?php
  class Projets {
    protected $edit_id;
    protected $connexion;

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

    // CRUD OPERATIONS
    public function get_all_projets() {
      $sql = 'SELECT * FROM projets';
      $query = $this->connexion->prepare($sql);
      $query->execute();
      $projets = $query->fetchAll();
      return $projets;
    }

    public function update_projet($data) {
      $id = (int) $data['id'];

      $sql = "UPDATE projets SET nom_projet=:nom_projet, status=:status, superficie=:superficie, cout=:cout, ventes=:ventes, somme=:somme WHERE id_projet=:id_projet";
      $query = $this->connexion->prepare($sql);
      $query->execute([
                      'id_projet' => $id,
                      'nom_projet' => $data['nom'],
                      'status' => $data['status'], 
                      'superficie' => $data['superficie'],
                      'cout' => $data['cout'],
                      'ventes' => $data['somme_ventes'], 
                      'somme' => $data['somme_perçue']
                      ]);
    }

    public function create_projet($data) {
      $sql = 'INSERT INTO projets(nom_projet, status, superficie, cout, ventes, somme) VALUES(:nom_projet, :status, :superficie, :cout, :ventes, :somme)';
      $query = $this->connexion->prepare($sql);
      $query->execute([
                      'nom_projet' => $data['nom'],
                      'status' => $data['status'], 
                      'superficie' => $data['superficie'],
                      'cout' => $data['cout'],
                      'ventes' => $data['somme_ventes'], 
                      'somme' => $data['somme_perçue']
                      ]);
    }

    public function delete_projet($id) {
      $sql = 'DELETE FROM projets WHERE id_projet=:id_projet';
      $query = $this->connexion->prepare($sql);
      $query->execute([
                      'id_projet' => $id,
                      ]);
    }
  }
?>