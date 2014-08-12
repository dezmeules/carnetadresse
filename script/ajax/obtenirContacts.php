<?php
   require_once ('../../bootstrap.php');
   
   $carnet= new CarnetDB();
   $contacts = $carnet->obtenirTous();
   header('content-type: text/xml');
   echo '<?xml version="1.0" encoding="UTF-8"?>';
   echo "<contacts>";
   foreach($contacts as $k => $contact){
        include('../xml/xml.contact.php');
   }
    echo "</contacts>";
   //echo ($liste);
?>