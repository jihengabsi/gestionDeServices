<?php
 include '../../connexion.php';
 ?>
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

<script >
    function getSelectValue()
    {
      var selectedValue=document.getElementById("list").value;
          document.getElementById("txtvalue").value=selectedValue;
    }
  </script>
</head>


<body>
<div id="contener">
<div id="image"><img class="back" src="../../images\home.jpg" ></div>
<div id ="texte"><h1>Envoi d'une demande</h1></div>
</div>

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
<label for="produits" >Nom de composant:</label>

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
                
                    <input  class="txtT" type="text" name="nomC"  id="txtvalue"  />                           
<label >Quantité:</label>
            <input type="text"  class="txtT1" name="qte" placeholder="Entrer la quantité" required>
     
<br><br>

            <input class="s" type="submit" name="submit" value="Envoyer une demande">


  </form>
  <?php
                            
                       if(isset($_POST['submit'])){ 
                             session_name('matricule');
                              session_start();
                               $matricule= $_COOKIE['matricule'];
                          $qte = $_POST['qte'];
                          $nomC = $_POST['nomC'];

                          $temps = 365*24*3600;
                                                  
                          setcookie ("qte", $qte, time() + $temps);
                          setcookie ("nomC", $nomC, time() + $temps);

                          header('location:envoiDemande1.php');
                        }

  ?>
<center>

<div class="pagination">
  <a href="#">&laquo;</a>
  <a href="#"class="active">1</a>
  <a href="#" >2</a>
  <a href="#">3</a>
  
  <a href="#">&raquo;</a>
</div>
</center>
  </div>

</div>
  <div class="sidenav">
  <div class="A" >  <a href="membre.php"  ><i class="material-icons">dashboard</i><br> Accueil</a> <div>
  <div class="B">  <a href="dEnv.php"><i class="material-icons">toc</i><br>   Demandes</a> <div>
    <div class="C"><a href="envoiDemande.php"><i class="material-icons">send</i><br>Envoyer une demande</a> <div>s

  </div>

</body>
</html>

