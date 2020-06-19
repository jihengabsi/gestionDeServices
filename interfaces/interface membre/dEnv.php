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
<script src="../../javascript\js1.js" charset="utf-8"></script>

<body>
<div id="contener">
<div id="image"><img class="back" src="../../images\home.jpg" ></div>
<div id ="texte"><h1> Demandes envoyé</h1></div>
</div>
<table>
	<?php 
 include '../../connexion.php';
session_name('matricule');
  session_start(); 

       
         $matricule= $_COOKIE['matricule'];
                $req = $pdo->prepare('SELECT * FROM demande WHERE matricule="'.$matricule.'" ');
          $req->execute();
      
          ?>
  <tr>
  
    <th>Num demande</th>

    <th>Composant</th>
    <th>Quantité</th>
    <th>Prix totale</th>
    <th>Date</th>
    <th>Etat</th>

  </tr>
  	<?php while ($table= $req->fetchObject()) {?>
  <tr>

    <td ><?php echo $table->numD;?></td>
       <td><?php echo $table->nomC;?></td>
    <td><?php echo $table->qte;?></td>
    <td><?php echo $table->prixT;?></td>
    <td><?php echo $table->date1;?></td>
    <td><?php echo $table->etat;?></td>
  </tr>
<?php  }?>
</table>




<div class="topnav">
<img src="../../images\1.png" alt="">
<form action="https://www.google.com/search" method="GET">
  <input type="text" name="search" placeholder="Google search..">

</form>
<a href="../../deconnexion.php"  class="btn1"><i class="material-icons">face</i>
 logout</a>

    </div>

  <div class="sidenav">
  <div class="A" >  <a href="membre.php"  ><i class="material-icons">dashboard</i><br> Accueil</a> <div>
  <div class="B">  <a href="dEnv.php"><i class="material-icons">toc</i><br>   Demandes</a> <div>
    <div class="C"><a href="envoiDemande.php"><i class="material-icons">send</i><br>Envoyer une demande</a> <div>
  </div>

  <div class="main">

  </div>

</body>
</html>


  </body>
</html>
