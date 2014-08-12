<?php
   require_once ('../../bootstrap.php');
   
   if(!empty($_GET['id'])){
	  $id		= $_GET['id'];
   }
   
   
   
   $carnet= new CarnetDB();
   $carnet->supprimer($id);
?>