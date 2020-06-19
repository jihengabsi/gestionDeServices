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
<div id ="texte"><h1>Traitement d'un membre</h1></div>
</div>
<center>
  <div class="form-style-5">
<select  id="list" onchange="getSelectValue();" >
            <option > Membres </option>   
        
<center> 
          <?php  
           include_once '../../connexion.php';
  $req = $pdo->prepare("SELECT * FROM membre  ");
        $req->execute();
           while ($table= $req->fetchObject())
          { ?>
        <option > <?php echo $table->matricule;  } ?>
        </option>  
         </select>

         <form method="post">
          <input class="txtT" type="text"  name="matricule"  id="txtvalue" /> 
          <br>
            <button   class="btnaccept" style="color: green;  font-weight: 200" value = "submit" name="modifier">
              Modifier
            </button>
            <button  class="btnaccept" style="color: red" value = "submit" name="supprimer">
              Supprimer
            </button>
          </form>
        </center>
</div>
         <br>
  <?php


      if(isset($_POST['supprimer'])){
          $matricule=$_POST['matricule'];
            $req1 = $pdo->prepare("delete from membre where  matricule = :matricule");
    $req1->bindValue('matricule',$matricule);
     $res= $req1->execute();
     echo "<script>alert(\"le membre est supprimé\")</script>";
  
header('location:adminA.php');


     
}
elseif(isset($_POST['modifier'])){
        $temps = 365*24*3600;
      setcookie ("matricule1", $_POST['matricule'], time() + $temps);
      header('location:modifMembre.php');
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
