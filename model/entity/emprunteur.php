<?php

class emprunteur extends entity
{

    //attributs
    protected $id;
    protected $nom;
    protected $prenom;
    protected $email;
    protected $password;
    protected $poste;
    protected $status;
    //const status = ["user", "admin"];

    //setter
    public function setNom($nom) {
        $this->nom = $nom;
    }
    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function setPassword($password) {
        $this->password = $password;
    }
    public function setPoste($poste) {
        $this->poste = $poste;
    }
    public function setStatus($status) {
      $this->status = $status;
        // if ($status = "admin" || $status = "user") {
        //     $this->status = self::status[$status];
        // }
    }
    public function setId($id) {
        $this->id = $id;
    }

    //getter
    public function getNom() {
        return $this->nom;
    }
    public function getPrenom() {
        return $this->prenom;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getPassword() {
        return $this->password;
    }
    public function getPoste() {
        return $this->poste;
    }
    public function getStatus() {
        return $this->status;
    }
    public function getId() {
        return $this->id;
    }

    //constructeur
    function __construct(array $data = null)
    {
      if ($data) {
        $this->hydrate($data);
      }
    }
  }

 ?>
