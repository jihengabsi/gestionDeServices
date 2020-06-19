<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../../css\syle1.css">
<link rel="stylesheet" type="text/css"  href="../../css\form.css">
<link rel="stylesheet" type="text/css"  href="../../css\btn.css">
</head>

<body>
<div id="contener">
<div id="image"><img class="back" src="../../images\home.jpg" ></div>
<div id ="texte"><h1> Ajouter un produit</h1></div>
</div>
<?php
 include '../../connexion.php';      
?>

 <div class="form-style-5">
<form method="post" action = "">
<label>Ajouter un produit</label>
<label>Nom de produit:</label>
<input type="text"class="txtT1" name="nomProduit" placeholder="Entrer le nom" required="">

 
<label>Quantité:</label>
<input type="text"class="txtT1" name="qte" placeholder="Entrer la quantité" required="">

<input class="s" type="submit" name="submit" value="Ajouter">


  </form>
</div>
<?php
  if(isset($_POST['submit'])){ 
    extract($_POST);
$req1=$pdo->prepare('INSERT into produit  values(NULL,:nomProduit,:qte)');

$req1->bindValue(':nomProduit', $nomProduit);
$req1->bindValue(':qte', $qte);

$req1->fetchAll();
$req1->execute();  
  echo"<script>alert(\"produit ajouté avec succées\")</script>";            
  header('location:magasin.php');
}

?>

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
