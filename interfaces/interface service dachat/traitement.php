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
<script >

    function getSelectValue()
    {
      var selectedValue=document.getElementById("list").value;
          document.getElementById("txtvalue").value=selectedValue;
    }
  </script>
<body>
<div id="contener">
<div id="image"><img class="back" src="../../images\home.jpg" ></div>
<div id ="texte"><h1>Traitement d'une demande</h1></div>
</div>
<center>
  <div class="form-style-5">
<select  id="list" onchange="getSelectValue();" >
            <option > Demandes non traites </option>   
         
          <?php   session_name("session_administration");
                  session_start();
           include_once '../../connexion.php';
  $req = $pdo->prepare("SELECT * FROM demande WHERE etat = 'enattente' ");
        $req->execute();
           while ($table= $req->fetchObject())
          { ?>
        <option > <?php echo $date1=$table->date1;  } ?>
        </option>  
         </select>

            <form  role="form" method="post" action = "" >
         <input class="txtT" type="text"  name="date1"  id="txtvalue" /> 
<input class="s" type="submit" name="submit" value="Traiter">  
        </form>

         <br>
      
         
   
    <?php  
    if(isset($_POST['submit'])){
 
          echo"<b>Les details de la demande:</b>";
         $date1=$_POST['date1'];
  $req = $pdo->prepare("SELECT * FROM demande WHERE date1 = :date1 ");
   $req->bindValue('date1', $date1);
        $req->execute();
  while ($table= $req->fetchObject()) {?>
<ul style="list-style-type:none;">
              <li ><b>Nom:</b>  <?php echo $table->nom; ?><br></li>
            <li >  <b>Prenom: </b> <?php echo $table->prenom; ?> <br></li>
              <li><b>Service: </b> <?php echo $table->service; ?> <br></li>
             <li > <b>Composant demandé: </b> <?php echo $table->nomC; ?> <br></li>
           <li >   <b>Quantite: </b> <?php echo $table->qte; ?> <br></li>
            <li >  <b>Prix: </b> <?php echo $table->prixT; ?> <br></li>
             <li > <b>Date: </b> <?php echo $table->date1; ?> <br></li>
            <li >  <b>Etat: </b> <?php echo $table->etat; ?> <br></li>

<li><form method="post">
            <button   class="btnaccept" style="color: green" value = "submit" name="Accepter">
              Accepter
            </button>
            <button  class="btnaccept" style="color: red" value = "submit" name="Refuser">
              Refuser
            </button>
          </form></li></ul>
<?php  } }?>

        </center>
</div>
       <?php 

      if(isset($_POST['Accepter'])){
            $req1 = $pdo->prepare("UPDATE demande SET etat = 'accepte' WHERE date1 = :date1");
    $req1->bindValue('date1',$date1);
     $res= $req1->execute();
header('location:traitement.php');
$req1=$pdo->prepare('INSERT into demande values(:matricule,:nom,:prenom,:service,:reference,:qte,:prixtotale,:etat,:date1)');
 $req1->bindValue(':matricule', $matricule);
$req1->bindValue(':nom', $nom);
$req1->bindValue(':prenom', $prenom);
$req1->bindValue(':service', $service);
$req1->bindValue(':reference', $reference);
$req1->bindValue(':qte', $qte);
$req1->bindValue(':prixtotale', $prixtotale);
$req1->bindValue(':etat', $etat);
$req1->bindValue(':date1', $date1);

$req1->fetchAll();
$req1->execute();   

     
}
elseif(isset($_POST['Refuser'])){
             $req1 = $pdo->prepare("UPDATE demande SET etat = 'refuse' WHERE date1 = :date1");
    $req1->bindValue('date1',$date1);
     $res= $req1->execute();

header('location:traitement.php');
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
<div class="A" >  <a href="Accueil.php"  ><i class="material-icons">dashboard</i><br> Accueil</a> <div>
  <div class="B">  <a href="demandes.php"><i class="material-icons">toc</i><br>Demandes</a> <div>
    <div class="C"><a href="traitement.php"><i class="material-icons">send</i><br>Traiter une demande</a> <div>
  </div>


  </body>
</html>
