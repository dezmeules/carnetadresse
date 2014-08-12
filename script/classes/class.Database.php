<?php


	abstract class Database
	{
		private $hote;
		private $username;
		private $password;
		private $nomBase;
		
		protected $dba;
		protected $nbResultats;			
		
		//construit l'objet, et place les parametres dedans.
		public function __construct()
		{
			$this->hote = DATABASE_HOST;
			$this->username = DATABASE_USER;
			$this->password = DATABASE_PASS;
			$this->nomBase = DATABASE_NAME;
			
			//avec les parametres, tu te connecte, avec les infos que tu as.
			$this->connecter();
		}
		
		public function connecter()
		{
			try
			{
				//
				$this->dba = new PDO("mysql:dbname=" . $this->nomBase . ";host=" . $this->hote, $this->username, $this->password);
				$this->dba->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		
			}
			catch(PDOException $exc)
			{
				die($exc);
			}
		}
		
		public function getNbResultats()
		{
			return $this->nbResultats;
		}
	}
?>