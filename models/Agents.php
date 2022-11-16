<?php
  class Agents {
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
    public function get_all_agents() {
      $sql = 'SELECT * FROM agents';
      $query = $this->connexion->prepare($sql);
      $query->execute();
      $agents = $query->fetchAll();

      return $agents;
    }

    public function update_agent($data) {
      $id = (int) $data['id'];

      $sql = 'SELECT * FROM agents WHERE id_agent=:id_agent';
      $query = $this->connexion->prepare($sql);
      $query->execute([
                      'id_agent' => $id
                      ]);
      $agent = $query->fetch();
      
      // On met a jour le password seulmenet s'il est different de celui dans la base
      if ($data['password'] !== $agent['password']) {
          $pwd = password_hash($data['password'] , PASSWORD_DEFAULT);
      }
      else {
        $pwd = $agent['password'];
      }

      /* admin peut modifier tous les champs */
      if(isset($_SESSION['LOGGED_USER_STATUT']) &&  ($_SESSION['LOGGED_USER_STATUT'] == "admin")) {
        $sql = "UPDATE agents SET nom=:nom, prenom=:prenom, statut=:statut, email=:email, password=:password, telephone=:telephone WHERE id_agent=:id_agent";
        $query = $this->connexion->prepare($sql);
        $query->execute([
                        'id_agent' => $id,
                        'nom' => $data['nom'],
                        'prenom' => $data['prenom'], 
                        'statut' => $data['statut'], 
                        'email' => $data['email'],
                        'password' => $pwd,
                        'telephone' => $data['telephone']
                        ]);
      }
      /* agent autre que admin peut seulement modifier son mot de passe */
      else {
        $sql = "UPDATE agents SET password=:password WHERE id_agent=:id_agent";
        $query = $this->connexion->prepare($sql);
        $query->execute([
                        'id_agent' => $id,
                        'password' => $pwd,
                        ]);       
      }
    }

    public function create_agent($data) {
      $pwd = $data['password'];
      $pwdHashed = password_hash($pwd, PASSWORD_DEFAULT);
      
      $sql = 'INSERT INTO agents(nom, prenom, statut, email, password, telephone) VALUES(:nom, :prenom, :statut, :email, :password, :telephone)';
      $query = $this->connexion->prepare($sql);
      $query->execute([
                      'nom' => $data['nom'],
                      'prenom' => $data['prenom'],
                      'statut' => $data['statut'],
                      'email' => $data['email'],
                      'password' => $pwdHashed,
                      'telephone' => $data['telephone']
                      ]);
    }

    public function delete_agent($id) {
      $sql = 'DELETE FROM agents WHERE id_agent=:id_agent';
      $query = $this->connexion->prepare($sql);
      $query->execute([
                      'id_agent' => $id,
                      ]);
    }
  }
?>