<?php

	require_once ('class.Database.php');
	require_once ('class.Contact.php');

	class CarnetDB extends Database
	{
		public function __construct()
		{
			parent::__construct();
		}
	
		public function inserer(Contact $p)
		{
			try 
			{
				$sql = "INSERT into contacts(prenom, nom, telephone, courriel, codepostal, image) values (:prenom, :nom, :telephone, :courriel, :codepostal, :image)";
				$stmt = $this->dba->prepare($sql);
				$stmt->bindValue(':prenom', $p->getPrenom());
				$stmt->bindValue(':nom', $p->getNom());
				$stmt->bindValue(':telephone', $p->getTelephone());
				$stmt->bindValue(':courriel', $p->getCourriel());
				$stmt->bindValue(':codepostal', $p->getCodepostal());
				$stmt->bindValue(':image', $p->getImage());
				$stmt->execute();
				return $stmt->rowCount();
			}
			catch(PDOException $exc)
			{
				die($exc);
			}
		}
		
		
		public function modifier(Contact $p)
		{
			try{
				$sql = "UPDATE contacts SET prenom=:prenom, nom=:nom, telephone=:telephone, courriel=:courriel, codepostal=:codepostal, image=:image WHERE idNom=:idNom";
				
				$stmt = $this->dba->prepare($sql);
				$stmt->bindValue(':prenom', $p->getPrenom());
				$stmt->bindValue(':nom', $p->getNom());
				$stmt->bindValue(':telephone', $p->getTelephone());
				$stmt->bindValue(':courriel', $p->getCourriel());
				$stmt->bindValue(':codepostal', $p->getCodePostal());
				$stmt->bindValue(':image', $p->getImage());
				$stmt->bindValue(':idNom', $p->getIdnom());
				//print_r($stmt);
				$stmt->execute();
			}
			catch(PDOException $exc)
			{
				die($exc);
			}
		}
		
		
		//Effacer une question
		public function supprimer($id)
		{
			try 
			{
				$sql = "DELETE FROM contacts WHERE idNom=:id";
				$stmt = $this->dba->prepare($sql);
				$stmt->bindValue(":id", $id);
				$stmt->execute();
		
			}
			catch(PDOException $exc)
			{
				die($exc);
			}			
		}
		
		
		
/*
		//Chercher par ID. c'est utilisé surtout lors des modification des questions.
		public function obtenirParId($id)
		{		
			try 
			{
				$sql = "SELECT * from questions where id=$id";
				$resultats = $this->dba->query($sql, PDO::FETCH_CLASS, "Question");
				$this->nbResultats = $resultats->rowCount();
				return $resultats;
			}
			
			catch(PDOException $exc)
			{
				die("Erreur lors de la suppression.");
			}		
		}
		*/
		
		//retourner un tableau de Produits qui contient tous les produits de la base de données
		public function obtenirTous()
		{
			try 
			{
				$sql = "SELECT * from contacts";
				$resultat = $this->dba->query($sql, PDO::FETCH_CLASS, "Contact");
				$this->nbResultats = $resultat->rowCount();
				$listeContacts=$resultat->fetchAll();
				return $listeContacts;
			}
			catch(PDOException $exc)
			{
				die($exc);
			}
		}
		
		public function rechercher($expression){
			try 
			{
				$sql = "SELECT * from contacts where nom LIKE :expression or prenom LIKE :expression or telephone LIKE :expression or courriel LIKE :expression or codepostal LIKE :expression";
				$preparedSQL = $this->dba->prepare($sql);
				$preparedSQL->bindValue(':expression', '%' . $expression . '%');
				$preparedSQL->setFetchMode(PDO::FETCH_CLASS, "Contact");
				$preparedSQL->execute();
				$this->nbResultats = $preparedSQL->rowCount();
				$listeContacts = $preparedSQL->fetchAll();
				return $listeContacts;
			}
			catch(PDOException $exc)
			{
				die($exc);
			}
		}
		
		
		
		public function obtenirParIndex($index)
		{
			try 
			{
				$sql = "SELECT * from contacts where idNom=$index";
				$resultat = $this->dba->query($sql, PDO::FETCH_CLASS, "Contact");
				$this->nbResultats = $resultat->rowCount();
				$contact = $resultat->fetch();
				return $contact;
			}
			catch(PDOException $exc)
			{
				//die("Erreur lors de la suppression.");
				die($exc);
			}
			
		}
		
		public function getNbResultats(){
			return $this->nbResultats;
		}
	}

?>