<?php
   require_once ('../../bootstrap.php');
   $index=$_GET['id'];
   $carnet= new CarnetDB();
   $contact = $carnet->obtenirParIndex($index);
   header('content-type: text/xml');
   echo '<?xml version="1.0" encoding="UTF-8"?>';
   echo "<contacts>";
   include('../xml/xml.contact.php');
   
    echo "</contacts>";
   //echo ($liste);
?>