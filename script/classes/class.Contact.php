<?php
	class Contact
	{		
		private $prenom;
		private $nom;
		private $telephone;
		private $courriel;
		private $codepostal;
		private $image;
		private $idNom;
		
		public function __construct($prenom = "", $nom = "", $telephone = "", $courriel = "", $codepostal = "", $image = "")
		{
			if(!isset($this->idNom))
			{
				$this->setPrenom($prenom);
				$this->setNom($nom);
				$this->setTelephone($telephone);
				$this->setCourriel($courriel);
				$this->setCodepostal($codepostal);
				$this->setImage($image);
			}				
		}
	/*	
		$stmt->bindValue(':prenom', $p->getPrenom());
		$stmt->bindValue(':nom', $p->getNom());
		$stmt->bindValue(':telephone', $p->getTelephone());
		$stmt->bindValue(':courriel', $p->getCourriel());
		$stmt->bindValue(':codepostal', $p->getCodepostal());
		$stmt->bindValue(':image', $p->getImage());		
		
		*/
		
		public function getPrenom()
		{
			return $this->prenom;
		}
		
		public function getNom()
		{
			return $this->nom;
		}
		
		public function getTelephone()
		{
			return $this->telephone;
		}
		
		public function getCourriel()
		{
			return $this->courriel;
		}
		
		public function getCodepostal()
		{
			return $this->codepostal;
		}
		
		public function getImage()
		{
			return $this->image;
		}
		
		public function getIdnom()
		{
			return $this->idNom;
		}
		

				
		public function setPrenom($prenom)
		{
			$this->prenom = $prenom;
		}
		
		public function setNom($nom)
		{
			$this->nom = $nom;
		}
		
		public function setTelephone($telephone)
		{
			$this->telephone = $telephone;
		}
		
		public function setCourriel($courriel)
		{
			$this->courriel = $courriel;
		}
		
		public function setCodepostal($codepostal)
		{
			$this->codepostal = $codepostal;
		}
		
		public function setImage($image)
		{
			$this->image = $image;
		}
		
	/*	public function affiche()
		{
			echo "<h1>Description d'un contact</h1>";
			echo "<ul>";
			echo "<li>Prenom :" . $this->getPrenom() . "</li>";
			echo "<li>nom :" . $this->getNom() . "</li>";
			echo "</ul>";
		}*/
	}
?>