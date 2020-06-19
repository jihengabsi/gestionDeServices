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
<div id ="texte"><h1> Demandes</h1></div>
</div>
<?php
 include '../../connexion.php';

                $req = $pdo->prepare('SELECT * FROM membre  ');
          $req->execute();
      
          ?>
          <table>
  <tr>
  
    <th>Matricule</th>
    <th>Nom</th>
    <th>Prenom</th>
    <th>Service</th>
    
    <th>Mot de passe</th>
    <th>Email</th>


  </tr>
    <?php while ($table= $req->fetchObject()) {?>
  <tr>

    <td ><?php echo $table->matricule;?></td>
    <td ><?php echo $table->nom;?></td>
    <td ><?php echo $table->prenom;?></td>
      <td ><?php echo $table->service;?></td>
       <td><?php echo $table->mdp;?></td>
    <td><?php echo $table->email;?></td>
   
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
<div class="A" >  <a href="adminA.php"  ><i class="material-icons">dashboard</i><br> Accueil</a> <div>
  <div class="B">  <a href="membres.php"><i class="material-icons">toc</i><br>Membres</a> <div>
    <div class="C"><a href="traitMembre.php"><i class="material-icons">send</i><br>Traiter un membre</a> <div>
      <div class="C"><a href="ajoutMembre.php"><i class="material-icons">send</i><br>Ajouter un membre</a> <div>
  </div>

  </body>
</html>
