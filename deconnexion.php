<?php session_start(); 

  unset($_SESSION); 
  session_destroy();  
  echo "Deconnexion reussie<br/>";  
  header("location:index.php"); 
 ?>
