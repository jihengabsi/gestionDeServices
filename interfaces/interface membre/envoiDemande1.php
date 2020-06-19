
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link rel="icon" type="image/png" href="../../images/2.png" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css"  href="../../css\syle1.css">
<link rel="stylesheet" type="text/css"  href="../../css\form.css">


</head>


<body>
<div id="contener">
<div id="image"><img class="back" src="../../images\home.jpg" ></div>
<div id ="texte"><h1>Envoi d'une demande</h1></div>
</div>
<?php
 include '../../connexion.php';
session_name('matricule');
  session_start(); 

       $matricule= $_COOKIE['matricule'];
       $req2 = $pdo->prepare('SELECT * FROM membre WHERE matricule="'.$matricule.'"');
       $req2->execute();
       $table=$req2->fetchObject();  
       $prenom=$table->prenom; 
       $nom=$table->nom;
       $service=$table->service;
       $qte= $_COOKIE['qte'];
       $nomC= $_COOKIE['nomC'];
       $req= $pdo->prepare('SELECT * FROM composant where nomC=:nomC');
       $req->bindValue(':nomC', $nomC);
       $req->execute();
       $table1= $req->fetchObject();  
       $prix= $table1->prix;
       $prixT=$prix*$qte;
        if(isset($_POST['submit'])){ 
      
$date1= date("Y-m-d H:i:s");        
$etat='enattente';      
$req1=$pdo->prepare('INSERT into demande values(NULL,:matricule,:nom,:prenom,:service,:nomC,:qte,:prixT,:etat,:date1)');
 $req1->bindValue(':matricule', $matricule);
$req1->bindValue(':nom', $nom);
$req1->bindValue(':prenom', $prenom);
$req1->bindValue(':service', $service);
$req1->bindValue(':nomC', $nomC);
$req1->bindValue(':qte', $qte);
$req1->bindValue(':prixT', $prixT);
$req1->bindValue(':etat', $etat);
$req1->bindValue(':date1', $date1);

$req1->fetchAll();
$req1->execute();              
  header('location:envoiDemande2.php');
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


  <div class="form-style-5">
<form  role="form" action = "" method = "post">

  <legend> Envoyer une demande</legend>
  <label  >Prix totale:</label>

 <input  class="txtT1" type="text" disabled="" name="prixT" value="<?php echo $prixT;?>"  />      
     <label   >Confirmer votre demande:</label>
   <input class="s" type="submit" name="submit" value="Confirmer">

</form>


<center>
<div class="pagination">
  <a href="#">&laquo;</a>
  <a href="#">1</a>
  <a href="#" class="active" >2</a>
  <a href="#">3</a>
  
  <a href="#">&raquo;</a>
</div>
</center>
  </div>

</div>
  <div class="sidenav">
  <div class="A" >  <a href="membre.php"  ><i class="material-icons">dashboard</i><br> Accueil</a> <div>
  <div class="B">  <a href="dEnv.php"><i class="material-icons">toc</i><br>   Demandes</a> <div>
    <div class="C"><a href="envoiDemande.php"><i class="material-icons">send</i><br>Envoyer une demande</a> <div>

  </div>


</body>
</html>

