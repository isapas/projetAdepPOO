<?php 

	class emprunt extends entity {

		//attributes
		protected $idEmprunteur;
		protected $idMateriel;
		protected $dateEmprunt;
		protected $dateRetour;

	//methods
		//setters

		public function setDateEmprunt($dateEmprunt) {
			$this->dateEmprunt = $dateEmprunt;
		}
		public function setDateRetour($dateRetour) {
			$this->dateRetour = $dateRetour;
		}
		public function setIdEmprunteur($idEmprunteur) {
			$this->idEmprunteur = $idEmprunteur;
		}
		public function setIdMateriel($idMateriel) {
			$this->idMateriel = $idMateriel;
		}

		//getters
		public function getDateEmprunt() {
			return $this->dateEmprunt;
		}
		public function getDateRetour() {
			return $this->dateRetour;
		}
		public function getIdEmprunteur() {
			return $this->idEmprunteur;
		}
		public function getIdMateriel() {
			return $this->idMateriel;
		}

		//constructor

		public function __construct(array $data = NULL) {
			if($data) {
				$this->hydrate($data);
			}
		}
		//other methods


	}

 ?>