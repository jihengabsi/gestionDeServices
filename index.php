<html>
<head>
<title>Login Form Design</title>
    <link rel="stylesheet" type="text/css" href="css\styleLogin.css">
      <link rel="icon" type="image/png" href="images/2.png" />
  </head>
<body>
    <div class="loginbox">
    <img src="images\7.jpg" class="avatar">
        <h1>Connexion</h1>
        <form  action = "" method = "post">
            <p>Matricule</p>
            <input type="text" name="matricule" placeholder="Entrer votre matricule" required>
            <p>Mot de passe</p>
            <input type="password" name="mdp" placeholder="Entrer votre mot de passe" required>
            <input type="submit" name="submit" value="connexion">
        </form>
        <?php
      include 'connexion.php';
      if(isset($_POST['submit'])){

      $matricule = $_POST['matricule'];
      $mdp = $_POST['mdp'];
      $stmt = $pdo->prepare("SELECT COUNT(matricule) AS num FROM membre WHERE matricule = :matricule and mdp = :mdp");
      $stmt2 = $pdo->prepare("SELECT COUNT(matricule) AS num2 FROM membre WHERE matricule = :matricule AND  mdp = :mdp AND service='achat'");
      $stmt1 = $pdo->prepare("SELECT COUNT(matricule) AS num1 FROM membre WHERE matricule = :matricule AND  mdp = :mdp AND service='magasin'");
      
   
          $stmt->bindValue(':matricule', $matricule);
          $stmt->bindValue(':mdp', $mdp);
          $stmt->execute();
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          $stmt2->bindValue(':matricule', $matricule);
          $stmt2->bindValue(':mdp', $mdp);
          $stmt2->execute();
          $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                $stmt1->bindValue(':matricule', $matricule);
          $stmt1->bindValue(':mdp', $mdp);
          $stmt1->execute();
          $row1= $stmt1->fetch(PDO::FETCH_ASSOC);

  
         if( $row2['num2'] > 0){
          session_name('matricule');
            session_start();
          $_SESSION['matricule'] = 'matricule';
       $temps = 365*24*3600;
      setcookie ("matricule", $_POST['matricule'], time() + $temps);
              header('location:interfaces/interface service dachat/Accueil.php');
            }
            elseif( $row1['num1'] > 0){
          session_name('matricule');
            session_start();
          $_SESSION['matricule'] = 'matricule';
       $temps = 365*24*3600;
      setcookie ("matricule", $_POST['matricule'], time() + $temps);
              header('location:interfaces/interface magasin/magasin.php');
            }
          elseif($row['num'] > 0 &&  $row2['num2'] == 0){
            session_name('matricule');
            session_start();
          $_SESSION['matricule'] = 'matricule';
       $temps = 365*24*3600;
      setcookie ("matricule", $_POST['matricule'], time() + $temps);

               header('location:interfaces/interface membre/membre.php');
          }
           elseif($matricule=="admin" && $mdp=="admin"){
    session_name("session_administration");
    session_start();
    $_SESSION["session_administration"] = "session_administration";
        header('location:interfaces/interface admin/adminA.php');
      }

          else echo "<script>alert(\"saisir une matricule ou un mot de passe valide\")</script>";
        }
          ?>

    </div>

</body>
</head>
</html>
