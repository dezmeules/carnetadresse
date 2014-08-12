<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<title></title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/normalize.min.css">
<link rel="stylesheet" href="css/main.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="js/main.js"></script>
</head>
<body>
<div class="header-container">
  <header class="wrapper clearfix">
    <h1 class="title">Carnet d'adresse</h1>
    <nav>
      <ul>
        <li><a id="menuGestion">Gestion</a></li>
        <li><a id="menuRecherche">Recherche</a></li>
      </ul>
    </nav>
  </header>
</div>
<div class="main-container">
<div class="main wrapper clearfix">
  <div id="gestion">
    <div id="outils">
      <div id="outilsRecherche">
        <label for="rechercheInput">Rechercher un contact</label>
        <input type="text" name="recherche" id="rechercheInput" />
        <div id="gifLoader" style="display:none"> <img src="img/ui/ajax-loader2.gif" width="100" height="40"> </div>
      </div>
    </div>
    
    <div id='droite'>
      <div id='divFormulaireAjout' style="display: none">
        <form id='newForm' method="get">
          <table border="0">
            <tr>
              <td>Prenom</td>
              <td><input name="prenom" type="text" value=""></td>
            </tr>
            <tr>
              <td>Nom</td>
              <td><input name="nom" type="text" value=""></td>
            </tr>
            <tr>
              <td>Courriel</td>
              <td><input name="courriel" type="text" value=""></td>
            </tr>
            <tr>
              <td>Code Postal</td>
              <td><input name="codepostal" type="text" value=""></td>
            </tr>
            <tr>
              <td>Téléphone</td>
              <td><input name="telephone" type="text" value=""></td>
            </tr>
            <tr>
              <td>URL de votre photo</td>
              <td><input name="image" type="text" value=""></td>
            </tr>
            <tr>
              <td></td>
              <td><input type="button" name="envoyerformulaire" class="boutonSend" value="Envoyer" /></td>
            </tr>
          </table>
        </form>
      </div>
      <div id="detail" style="display: none"></div>
    </div>
    
    <div id="liste">
      <ul class="listeNom">
      </ul>
      <div id="outilsGestion">
        <p id="ajouter">ajouter un contact</p>
      </div>
    </div>
    
  </div>
</div>
<div class="footer-container">
  <footer class="wrapper">
    <h3>&nbsp;</h3>
  </footer>
</div>
</body>
</html>
