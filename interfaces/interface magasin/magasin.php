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
<link rel="stylesheet" type="text/css" href="../../css\form.css">
</head>

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
<div id ="texte"><h1> Accueil</h1></div>
</div>
<div class="grid-container">
  <div style="font-size: 20px">
  
<?php
           
           
          $req = $pdo->prepare('SELECT sum(qte) AS num1 FROM composant ');
                
          $req->execute();
           $row1 = $req->fetch(PDO::FETCH_ASSOC);
?>
Il y'a  <?php echo $row1['num1']; ?> composants
  <div class="form-style-5" >
<form method="post"  action="">
<legend style="font-size: 20px">Modifier la quantité de composants:</legend>
  <select   onchange="getSelectValue();" name="produits" id="list"    class="form-control" required>
            <option selected="" disabled=""> selectionner un composants </option>
               <?php           
         $stmt = $pdo->prepare("SELECT * FROM composant");
    $stmt->execute();
    $composants = $stmt->fetchAll(PDO::FETCH_ASSOC);
           foreach ($composants as $composant) {

          echo "<option  value='".$composant['nomC']."'>".$composant['nomProduit'].":".$composant['nomC']."</option>";}
        
           
      
          ?>
          </select>
       
          <legend style="font-size: 20px">Quantité</legend>
<input  type="text" class="txtT1" name="qteC" >
   <center>    <button type="submit" style=" color: white;  background-color: green ;border: none;" name="augmenter" >augmenter
           </button> 
           <button type="submit" style="color: white; background-color:red; border: none;" name="diminuer" >
            diminuer
           </button></center>
              <input  class="txtT" type="text" name="nomC"  id="txtvalue"  />

</form>
<?php


      if(isset($_POST['augmenter'])){
         extract($_POST);
            $req1 = $pdo->prepare("SELECT qte  as num from composant where  nomC= :nomC");
    $req1->bindValue(':nomC',$nomC);
     $req1->execute();
        $row = $req1->fetch(PDO::FETCH_ASSOC);
      $qte=$row['num'];
      $qte2=$qte+$qteC;
      $req=$pdo->prepare('UPDATE composant set qte=:qte2 where     nomC= :nomC');
      $req->bindValue(':qte2', $qte2);
      $req->bindValue(':nomC', $nomC);
        $res= $req->execute();
     echo "<script>alert(\"la quantité a augmenté\")</script>";
  
header('location:magasin.php');


     
}
elseif(isset($_POST['diminuer'])){
extract($_POST);
            $req1 = $pdo->prepare("SELECT qte  as num from composant where  nomC= :nomC");
    $req1->bindValue(':nomC',$nomC);
     $req1->execute();
        $row = $req1->fetch(PDO::FETCH_ASSOC);
      $qte=$row['num'];
      $qte2=$qte-$qteC;
      $req=$pdo->prepare('UPDATE composant set qte=:qte2 where     nomC= :nomC');
      $req->bindValue(':qte2', $qte2);
      $req->bindValue(':nomC', $nomC);
        $res= $req->execute();
     echo "<script>alert(\"la quantité a diminué\")</script>";
     header('location:magasin.php');
   }
   ?>
</div>
  </div>




    <div class="bnj">Bonjour
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
<div >  <a href="magasin.php"  ><i class="material-icons">dashboard</i><br> Accueil</a> <div>
  <div><a href="ajoutCom.php"><i class="material-icons">send</i><br>Ajouter un composant</a> <div>
  </div>
   <div "><a href="ajoutPro.php"><i class="material-icons">send</i><br>Ajouter un produit</a> <div>
     <div class="B">  <a href="composants.php"><i class="material-icons">toc</i><br>Composants</a> <div> 
  </div>



  </html>
</body>
