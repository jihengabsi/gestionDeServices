<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../../css\syle1.css">
<link rel="stylesheet" type="text/css" href="../../css\table.css">
</head>


<body>
<div id="contener">
<div id="image"><img class="back" src="../../images\home.jpg" ></div>
<div id ="texte"><h1> Composants</h1></div>
</div>
<?php
 include '../../connexion.php';

                $req = $pdo->prepare('SELECT * FROM composant  ');
          $req->execute();
      
          ?>
          <table>
  <tr>
  
    <th>Nom de composant</th>
    <th>Nom de produit</th>
    <th>Prix</th>
    <th>Quantité</th>


  </tr>
    <?php while ($table= $req->fetchObject()) {?>
  <tr>

    <td ><?php echo $table->nomC;?></td>
    <td ><?php echo $table->nomProduit;?></td>
    <td ><?php echo $table->prix;?></td>
      <td ><?php echo $table->qte;?></td>

  </tr>
<?php  }?>
</table>




<div class="topnav">
<img src="../../images\1.png" alt="">
<form>
  <input type="text" name="search" placeholder="Search..">

</form>
<a href="../../deconnexion.php"  class="btn1"><i class="material-icons">face</i>
 logout</a>
    </div>
  <div class="sidenav">
<div >  <a href="magasin.php"  ><i class="material-icons">dashboard</i><br> Accueil</a> <div>
  <div><a href="ajoutCom.php"><i class="material-icons">send</i><br>Ajouter un composant</a> <div>
  </div>
   <div "><a href="ajoutPro.php"><i class="material-icons">send</i><br>Ajouter un produit</a> <div>
     <div class="B">  <a href="composants.php"><i class="material-icons">toc</i><br>Composants</a> <div> 
  </div>

  </body>
</html>
