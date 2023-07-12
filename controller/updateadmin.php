<?php

include_once '../racine.php';
include_once RACINE.'/services/SecretaireService.php';
include_once RACINE.'/beans/Secretaire.php';
extract($_POST);

$pa = new AdminService();

$host = 'localhost';
$dbname = 'dbname';
$login = 'root';
$password = '';
try {
    $con = new PDO("mysql:host=$host;dbname=$dbname", $login, $password);
    $con->query("SET NAMES UTF8");
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
  }
$image = $_FILES["photo"];

// Saving file in uploads folder
//move_uploaded_file($image["tmp_name"], "../dossiers/" . $image["name"]);

$id=$_POST['id'];

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$cin=$_POST['cin'];
$telephone=$_POST['telephone'];

$date_naissance=$_POST['date_naissance'];
$photo = $_FILES['photo']['name'];
$id_user = $_POST['id_user'];

echo "$id-$prenom-$nom-$telephone-$date_naissance-$photo-$id_user-$cin";
if($photo != ''){
$query = "UPDATE `admin` SET `nom` = '$nom', `prenom` = '$prenom', `cin` = '$cin', `telephone` = '$telephone', `id_user` = '$id_user', `date_naissance` = '$date_naissance', `photo` = '$photo' WHERE `id` = $id ";
}else{
    $query = "UPDATE `admin` SET `nom` = '$nom', `prenom` = '$prenom', `cin` = '$cin', `telephone` = '$telephone', `id_user` = '$id_user', `date_naissance` = '$date_naissance' WHERE `id` = $id ";
}
$req = $con->prepare($query);
$req->execute() or die('Erreur dans votre code SQL');

/*$pa->update(new patient($id, $nom, $prenom, $cin, $telephone, $id_user, $adresse, $date_naissance, $compteur, $photo));*/


header("location: ../admin-profile.php");

