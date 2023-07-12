<?php

      $con=mysqli_connect('localhost', 'root','', 'dbname');

      if (!$con){ // Contrôler la connexion
          $MessageConnexion = die ("connection impossible");
      }
      else {
        if(isset($_GET['deleteid'])){
            $id=$_GET['deleteid'];
            $sql="delete from `rendez-vous` where id=$id ";
            $result=mysqli_query($con,$sql);
            if($result){
                header('location:historique.php');
                exit();
            }
        }
 
 }
 ?>