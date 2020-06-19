<!DOCTYPE html>
<?php 
 include '../../connexion.php';
session_name('matricule');
  session_start(); 

       
         $matricule= $_COOKIE['matricule'];
                $req = $pdo->prepare('SELECT * FROM membre WHERE matricule="'.$matricule.'"');
          $req->execute();
          $table1= $req->fetchObject();  
         

?>
<html>
<head>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
        <link rel="icon" type="image/png" href="../../images/2.png" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../../css\syle1.css">
<link rel="stylesheet" type="text/css" href="../../css\btn.css">
<link rel="stylesheet" type="text/css" href="../../css\grid.css">
</head>
<script src="../../javascript\js1.js" charset="utf-8"></script>

<body>
<div id="contener">
<div id="image"><img class="back" src="../../images\home.jpg" ></div>
<div id ="texte"><h1> Accueil</h1></div>
</div>
<div class="grid-container">
  <div>
    <br><br><br>
<?php
         $date1= date("Y-m-d");  
                $req1 = $pdo->prepare('SELECT COUNT(matricule) AS num FROM demande WHERE etat = "enattente"  ');
                   $req1->bindValue('date1', $date1);
          $req1->execute();
           $row = $req1->fetch(PDO::FETCH_ASSOC);
         
?>
Il y'a <?php echo $row['num']; ?> demandes ajoutés récément
 <br><br> <a href="traitement.php"   class="btnaccept" style="color: white; background-color: grey"  >
              Traiter
            </a>

  </div>

    <div class="bnj">Bonjour <?php echo $table1->prenom;?> <?php echo $table1->nom; ?>
      <img src="../../images/img.jpg" class="img1">

    </div>
<div class="div1">
  <iframe src="../../calendar\cal.html">
</iframe></div>


<div class="div2"> <img src="../../images/valeurs.png"></div>

</div>


<div class="topnav">
<img src="../../images\1.png" alt="">
<form action="https://www.google.com/search" method="GET">
  <input type="text" name="search" placeholder="Google search..">

</form>
<a href="../../deconnexion.php"  class="btn1"><i class="material-icons">face</i>
 logout</a>

    </div>


  <div class="sidenav">
 <div class="A" >  <a href="Accueil.php"  ><i class="material-icons">dashboard</i><br> Accueil</a> <div>
  <div class="B">  <a href="demandes.php"><i class="material-icons">toc</i><br>Demandes</a> <div>
    <div class="C"><a href="traitement.php"><i class="material-icons">send</i><br>Traiter une demande</a> <div>
  </div>



  </html>
</body>
