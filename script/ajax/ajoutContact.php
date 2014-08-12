<?php
   require_once ('../../bootstrap.php');
   
   
   $prenom=$_GET['prenom'];
   $nom=$_GET['nom'];
   $telephone=$_GET['telephone'];
   $courriel=$_GET['courriel'];
   $codepostal=$_GET['codepostal'];
   $image=$_GET['image'];

   
   
    $contact= new Contact($prenom, $nom, $telephone, $courriel, $codepostal, $image);
	
	   $carnet= new CarnetDB();

   $carnet->inserer($contact);

   //echo ($liste);
?>