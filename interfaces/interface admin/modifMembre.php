<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
        <link rel="icon" type="image/png" href="../../images/2.png" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../../css\syle1.css">
<link rel="stylesheet" type="text/css"  href="../../css\form.css">
<link rel="stylesheet" type="text/css"  href="../../css\btn.css">
</head>
<script src="../../javascript\js1.js" charset="utf-8"></script>

<body>
<div id="contener">
<div id="image"><img class="back" src="../../images\home.jpg" ></div>
<div id ="texte"><h1>Modification d'une demande</h1></div>
</div>
<center>
  <?php
 include '../../connexion.php';      
 $matricule1= $_COOKIE['matricule1'];
  $req2 = $pdo->prepare('SELECT * FROM membre WHERE matricule="'.$matricule1.'"');
   $req2->execute();
       $table=$req2->fetchObject();  
?>

 <div class="form-style-5">
<form method="post" action = "">
<label>Ajouter un membre</label>
<label>Matricule:</label>
<input type="text" class="txtT1" name="matricule" value="<?php echo $matricule1; ?>" >

<label>Nom:</label>
<input type="text" class="txtT1" name="nom" value="<?php echo $table->nom; ?>" >
<label>Prenom:</label>
<input type="text"class="txtT1" name="prenom" value="<?php echo $table->prenom; ?>" >
<label>Service:</label>
<input type="text"class="txtT1" name="service" value="<?php echo $table->service; ?>" >
<label>Mot de passe:</label>
<input type="text"class="txtT1" name="mdp" value="<?php echo $table->mdp; ?>" >
<label>Email:</label>
<input type="text"class="txtT1" name="email" value="<?php echo $table->email; ?>" >
<input class="s" type="submit" name="submit" value="Modifier">
  </form>
</div>
<?php
  if(isset($_POST['submit'])){ 
    extract($_POST);
$req1=$pdo->prepare('UPDATE membre set matricule=:matricule,nom=:nom,prenom=:prenom,service=:service,mdp=:mdp,email=:email where matricule="'.$matricule1.'"');
 $req1->bindValue(':matricule', $matricule);
$req1->bindValue(':nom', $nom);
$req1->bindValue(':prenom', $prenom);
$req1->bindValue(':service', $service);
$req1->bindValue(':mdp', $mdp);
$req1->bindValue(':email', $email);
$req1->fetchAll();
$res= $req1->execute();  
  echo "<script>alert(\"membre modifié avec succées\")</script>";            
  header('location:adminA.php');
}

?>

<div class="topnav">
<img src="../../images\1.png" alt="">
<form action="https://www.google.com/search" method="GET">
  <input type="text" name="search" placeholder="Google search..">

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
