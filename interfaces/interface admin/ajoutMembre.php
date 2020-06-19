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
<script src="../../javascript\js1.js" charset="utf-8"></script>

<body>
<div id="contener">
<div id="image"><img class="back" src="../../images\home.jpg" ></div>
<div id ="texte"><h1> Ajouter un membre</h1></div>
</div>
<?php
 include '../../connexion.php';      
?>

 <div class="form-style-5">
<form method="post" action = "">
<label>Ajouter un membre</label>
<label>Matricule:</label>
<input type="text" class="txtT1" name="matricule" placeholder="Entrer la matricule" required="">

<label>Nom:</label>
<input type="text" class="txtT1" name="nom" placeholder="Entrer le nom" required="">
<label>Prenom:</label>
<input type="text"class="txtT1" name="prenom" placeholder="Entrer le prenom" required="">
<label>Service:</label>
<input type="text"class="txtT1" name="service" placeholder="Entrer le service" required="">
<label>Mot de passe:</label>
<input type="text"class="txtT1" name="mdp" placeholder="Entrer le mot de passe" required="">
<label>Email:</label>
<input type="text"class="txtT1" name="email" placeholder="Entrer le email" required="">
<input class="s" type="submit" name="submit" value="Ajouter">
  </form>
</div>
<?php
  if(isset($_POST['submit'])){ 
    extract($_POST);
$req1=$pdo->prepare('INSERT into membre  values(:matricule,:nom,:prenom,:service,:mdp,:email)');
 $req1->bindValue(':matricule', $matricule);
$req1->bindValue(':nom', $nom);
$req1->bindValue(':prenom', $prenom);
$req1->bindValue(':service', $service);
$req1->bindValue(':mdp', $mdp);
$req1->bindValue(':email', $email);
$req1->fetchAll();
$req1->execute();  
  echo"<script>alert(\"membre ajouté avec succées\")</script>";            
  header('location:adminA.php');
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
<div class="A" >  <a href="adminA.php"  ><i class="material-icons">dashboard</i><br> Accueil</a> <div>
  <div class="B">  <a href="membres.php"><i class="material-icons">toc</i><br>Membres</a> <div>
    <div class="C"><a href="traitMembre.php"><i class="material-icons">send</i><br>Traiter un membre</a> <div>
      <div class="C"><a href="ajoutMembre.php"><i class="material-icons">send</i><br>Ajouter un membre</a> <div>
  </div>

  </body>
</html>
