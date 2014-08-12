<?php
   require_once ('../../bootstrap.php');
   
   $idNom		= "";
   $prenom 		= "";
   $nom 		= "";
   $telephone	= "";
   $courriel	= "";
   $codepostal	= "";
   $image		= "";
   
   if(!empty($_GET['idNom'])){
	  $idNom		= $_GET['idNom'];
   }
   if(!empty($_GET['prenom'])){
	  $prenom		= $_GET['prenom'];
   }
   if(!empty($_GET['nom'])){
	  $nom		= $_GET['nom'];
   }
   if(!empty($_GET['telephone'])){
	  $telephone	= $_GET['telephone'];
   }
   if(!empty($_GET['courriel'])){
	  $courriel		= $_GET['courriel'];
   }
   if(!empty($_GET['codepostal'])){
	  $codePostal	= $_GET['codepostal'];
   }
   if(!empty($_GET['image'])){
	  $image		= $_GET['image'];
   }

   $carnet= new CarnetDB();

   $contact = $carnet->obtenirParIndex($idNom);
   
   if($carnet->getNbResultats() > 0){
	  
	  $contact->setPrenom($prenom);
	  $contact->setNom($nom);
	  $contact->setCourriel($courriel);
	  $contact->setCodePostal($codePostal);
	  $contact->setImage($image);
	  $contact->setTelephone($telephone);
	  
	  $carnet->modifier($contact);
	  
	  echo "1";
	  exit;
   }
   
   echo "0";

   //echo ($liste);
?>