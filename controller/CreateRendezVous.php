<?php 
$con=mysqli_connect('localhost', 'root','', 'dbname');

if (!$con){ // Contrôler la connexion
    $MessageConnexion = die ("connection impossible");
}
else {
    if(isset($_POST['submit'])){ // Autre contrôle pour vérifier si la variable $_POST['Bouton'] est bien définie
      
      $patient=$_POST['patient'];
      $fiche=$_POST['fiche'];
      
      echo ' $patient' ;
      // Requête d'insertion
      $AjouterRdv="INSERT INTO `rendez-vous` (patient,fiche) VALUES ('$patient', '$fiche')";

      // Exécution de la reqête
      mysqli_query($con, $AjouterRdv) or die('Erreur SQL !'.$AjouterRdv.'<br>'.mysqli_error($con));
      
      header('Location: ../pages/Patient/RendezVousValider.php');
      exit();
     
    } 
}


?>
