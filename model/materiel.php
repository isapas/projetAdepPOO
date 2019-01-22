<?php
class materiel extends entity{
  protected $id;
  protected $nom;
  protected $description;
  protected $num_serie;

  const ETAT = ["0"=>"Indisponible","1"=>"En stock"];
  const ACCES = ["0"=>"Restreint","1"=>"libre"];

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

  public function setNumSerie($num_serie) {
    $this->num_serie = $num_serie;
  }

  public function getNumSerie() {
    return $this->num_serie;
  }
}
 ?>
