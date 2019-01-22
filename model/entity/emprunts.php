<?php 

	class emprunts extends entity {

		//attributes
		protected $idEmprunteur;
		protected $idMateriel;
		protected $dateEmprunt;
		protected $dateRetour;

	//methods
		//setters

		public function setDateEmprunt() {
			$this->dateEmprunt = $dateEmprunt;
		}
		public function setDateRetour() {
			$this->dateRetour = $dateRetour;
		}
		public function setIdEmprunteur(int $id) {
			$this->idEmprunteur = $idEmprunteur;
		}
		public function setIdMateriel(int $id) {
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