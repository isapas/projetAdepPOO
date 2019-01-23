<?php
class materiel extends entity{
  protected $id;
  protected $nom;
  protected $description;
  protected $numSerie;
  protected $etat;
  protected $acces;
  // const ETAT = ["0"=>"Indisponible","1"=>"En stock"];
  // const ACCES = ["0"=>"Restreint","1"=>"libre"];

  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }

  public function setNom($nom) {
    $this->nom = $nom;
  }

  public function getNom() {
    return $this->nom;
  }

  public function setDescription($description) {
    $this->description = $description;
  }

  public function getDescription() {
    return $this->description;
  }

  public function setNumSerie($numSerie) {
    $this->numSerie = $numSerie;
  }

  public function getNumSerie() {
    return $this->numSerie;
  }

  public function setEtat($etat) {
    $this->etat = $etat;
  }

  public function getEtat() {
    return $this->etat;
  }

  public function setAcces($acces) {
    $this->acces = $acces;
  }

  public function getAcces() {
    return $this->acces;
  }

  function __construct(array $data = null)
  {
    if ($data) {
      $this->hydrate($data);
    }
  }
}
 ?>
