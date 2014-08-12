<?php
require_once ('../../bootstrap.php');
   
   $expression = "";
   if(!empty($_GET['expression'])){
        $expression = $_GET['expression'];
   }

   $carnet= new CarnetDB();
   $contacts = $carnet->rechercher($expression);
   
   header('content-type: text/xml');
   echo '<?xml version="1.0" encoding="UTF-8"?>';
   echo "<contacts>";
   foreach($contacts as $k => $contact){
		include('../xml/xml.contact.php');
   }
    echo "</contacts>";
?>